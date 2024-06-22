<?php

namespace App\Imports;

use App\Models\Elicitation;
use App\Models\Sexe;
use App\Models\Patient;
use Illuminate\Support\Collection;
use App\Models\RelationElicitation;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ElicitationImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    protected $rowIndex = 1;
    public $nonValidRows = array();


    function prepareData($row)
    {
        try {
            $date_de_naissance = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_naissance'])->format('Y-m-d');
        } catch (\Throwable $th) {
            $date_de_naissance = $row['date_de_naissance'] ?? '';
        }


        // $date_rdv = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_rdv'])->format('Y-m-d') ?? $row['date_rdv'];
        // $date_de_visite = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_de_visite'])->format('Y-m-d') ?? $row['date_de_visite'];

        $row['date_de_naissance'] = $date_de_naissance;

        $row['sexe'] = Sexe::getSexe($row['sexe'] ?? '');
        if (isset($row['lien_avec_index'])) {
            $tp = RelationElicitation::where('CodeRelation', trim($row['lien_avec_index']))
                ->orWhere('LibelleRelation', trim($row['lien_avec_index']))
                ->firstOrCreate([
                    'CodeRelation' => $row['lien_avec_index'],
                    'LibelleRelation' => $row['lien_avec_index'],
                ]);
            $row['lien_avec_index'] = $tp->CodeRelation;
        }
        if (isset($row['contact_teste'])) {
            $row['contact_teste'] = strtoupper($row['contact_teste']);

            if ($row['contact_teste'] == "Y" || $row['contact_teste'] == "YES") {
                $row['contact_teste'] = "OUI";
            } elseif ($row['contact_teste'] == "N" || $row['contact_teste'] == "NO") {
                $row['contact_teste'] = "NON";
            }
        }
        return $row;
    }
    public function model($row)
    {
        $this->rowIndex++;

        $row = $this->prepareData($row);
        // dd($row);

        $res = validator($row, [
            'code_elicitation' => 'required',
            'code_uic_de_lindex' => 'required',
            'sexe' => 'required|in:' . implode(',', Sexe::$SEXES),
            'date_de_naissance' => 'required|date',
            'lien_avec_index' => 'required|exists:relation_elicitations,CodeRelation',
            'contact_teste' => 'required|in:OUI,NON',
        ]);
        if ($res->fails()) {
            $this->writeInvalidRowToExcel($row);
            $this->putError($res->errors());
            return null;
        }
        $row['contact_teste'] = ($row['contact_teste'] == "OUI") ? true : false;

        $patient = Patient::where('CodeUIC', $row['code_uic_de_lindex'])->firstOrCreate(
            [
                'CodeUIC' => $row['code_uic_de_lindex'],
            ],
            [
                'CodeUIC' => $row['code_uic_de_lindex'],
                'DateNaissance' => '1900-01-01',
                "Sexe" => "Autre",
                'TypePopulation' => "General Population",
            ]
        );

        Elicitation::where('CodeElicitation', $row['code_elicitation'])->delete();
        return new Elicitation([
            'CodeElicitation' => $row['code_elicitation'],
            'CodeUICIndex' => $row['code_uic_de_lindex'],
            'Sexe' => $row['sexe'],
            'DateNaissance' => $row['date_de_naissance'],
            'LienAvecIndex' => $row['lien_avec_index'],
            'isTested' => $row['contact_teste'],
            "PatientIndex" => $patient->id,
            "CodeRelation" => $row['lien_avec_index'],
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
