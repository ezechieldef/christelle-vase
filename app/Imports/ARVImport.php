<?php

namespace App\Imports;

use App\Models\Sexe;
use App\Models\RdvARV;
use App\Models\Patient;
use App\Exports\FailedExport;
use App\Models\TypePopulation;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ARVImport implements ToModel, WithHeadingRow
{
    public $nonValidRows = array();
    public $requiredFields = [
        'code_uic',
        'type_population',
        'sexe',
        'date_de_naissance',
        'date_rdv',
        'date_de_visite',
        'regime_actuel',
        'nombre_tar_dispense',
    ];
    public $rowIndex = 1;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function __destruct()
    {
    }

    function prepareData($row)
    {
        try {
            $date_de_naissance = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_naissance'])->format('Y-m-d');
        } catch (\Throwable $th) {
            $date_de_naissance = $row['date_de_naissance'] ?? '';
        }
        try {
            $date_rdv = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_rdv'])->format('Y-m-d');
        } catch (\Throwable $th) {
            $date_rdv = $row['date_rdv'] ?? '';
        }
        try {
            $date_de_visite = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_visite'])->format('Y-m-d');
        } catch (\Throwable $th) {
            $date_de_visite = $row['date_de_visite'] ?? '';
        }

        // $date_rdv = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_rdv'])->format('Y-m-d') ?? $row['date_rdv'];
        // $date_de_visite = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_visite'])->format('Y-m-d') ?? $row['date_de_visite'];

        $row['date_de_naissance'] = $date_de_naissance;
        $row['date_rdv'] = $date_rdv;
        $row['date_de_visite'] = $date_de_visite;
        $row['sexe'] = Sexe::getSexe($row['sexe'] ?? '');
        if (isset($row['type_population'])) {
            $tp = TypePopulation::where('TypePopulation', $row['type_population'])
                ->orWhere('Description', $row['type_population'])
                ->firstOrCreate([
                    'TypePopulation' => $row['type_population'],
                    'Description' => $row['type_population'],
                ]);
            $row['type_population'] = $tp->TypePopulation;
        }

        return $row;
    }
    public function model(array $row)
    {
        $this->rowIndex++;


        $row = $this->prepareData($row);

        $res = validator($row, [
            'code_uic' => 'required',
            'type_population' => 'required',
            'sexe' => 'required|in:' . implode(',', Sexe::$SEXES),
            'date_de_naissance' => 'required|date',
            'date_rdv' => 'required|date',
            'date_de_visite' => 'required|date',
            'regime_actuel' => 'required',
            'nombre_tar_dispense' => 'required|numeric',
        ]);

        if ($res->fails()) {
            $this->writeInvalidRowToExcel($row);
            $this->putError($res->errors());
            return null;
        }

        // Rest of the code for processing a valid row

        $patient = Patient::updateOrCreate(
            [
                'CodeUIC' => $row['code_uic'],
                'DateNaissance' => $row['date_de_naissance'],
                // 'TypePopulation' => $row['type_population'],
            ],
            [
                'CodeUIC' => $row['code_uic'],
                'TypePopulation' => $row['type_population'],
                'Sexe' => $row['sexe'],
                'DateNaissance' => $row['date_de_naissance'],
            ]
        );

        RdvARV::where('Patient', $patient->id)->where('DateRDV', $row['date_rdv'])->delete();

        return new RdvARV([
            "Patient" => $patient->id,
            'CodeUIC' => $row['code_uic'],
            'TypePopulation' => $row['type_population'],
            'Sexe' => $row['sexe'],
            'DateNaissance' => $row['date_de_naissance'],
            'DateRDV' => $row['date_rdv'],
            'DateVisite' => $row['date_de_visite'],
            'RegimeActuel' => $row['regime_actuel'],
            'NombreTarDispense' => $row['nombre_tar_dispense'],
        ]);
    }
    function putError($error)
    {
        $errors = session('import_errors', []);
        $errors["Ligne " . $this->rowIndex] = $error->all();
        // session(['import_errors' => $errors]);
        Session::put('import_errors', $errors);
        session()->save();
    }


    private function writeInvalidRowToExcel(array $row)
    {
        $this->nonValidRows[] = $row;
        Session::put('import_errors_data', $this->nonValidRows);
    }
}
    // {
    //     $res= validator($row, [
    //         'code_uic' => 'required',
    //         'type_population' => 'required',
    //         'sexe' => 'required',
    //         'date_naissance' => 'required',
    //         'date_rdv' => 'required',
    //         'date_de_visite' => 'required',
    //         'regime_actuel' => 'required',
    //         'nombre_tar_dispense' => 'required',
    //     ]);
    //     if ($res->fails()) {
    //         return null;
    //     }
    //     $patien = Patient::where('CodeUIC', $row['code_uic'])->first();
    //     if (!$patien) {
    //         $patien = new Patient([
    //             'CodeUIC' => $row['code_uic'],
    //             'TypePopulation' => $row['type_population'],
    //             'Sexe' => $row['sexe'],
    //             'DateNaissance' => $row['date_naissance'],
    //         ]);
    //     }
    //     return new RdvARV([
    //         "Patient" => $patien->id,
    //         'CodeUIC' => $row['code_uic'],
    //         'TypePopulation' => $row['type_population'],
    //         'Sexe' => $row['sexe'],
    //         'DateNaissance' => $row['date_naissance'],
    //         'DateRDV' => $row['date_rdv'],
    //         'DateVisite' => $row['date_de_visite'],
    //         'RegimeActuel' => $row['regime_actuel'],
    //         'NombreTarDispense' => $row['nombre_tar_dispense'],
    //     ]);
    // }
