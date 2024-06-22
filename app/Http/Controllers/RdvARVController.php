<?php

namespace App\Http\Controllers;

use App\Models\RdvARV;
use Illuminate\View\View;
use App\Imports\ARVImport;
use Illuminate\Http\Request;
use App\Exports\FailedExport;
use App\Models\TypePopulation;
use App\Http\Requests\RdvARVRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class RdvARVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // session()->forget('import_errors');
        $rdvARVs = RdvARV::paginate();

        return view('rdv-a-r-v.index', compact('rdvARVs'))
            ->with('i', ($request->input('page', 1) - 1) * $rdvARVs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rdvARV = new RdvARV();
        $typePopulations = TypePopulation::pluck('TypePopulation', 'Description');

        return view('rdv-a-r-v.create', compact('rdvARV', 'typePopulations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RdvARVRequest $request): RedirectResponse
    {
        $all = $request->validated();
        RdvARV::create($all);

        return Redirect::route('rdv-a-r-vs.index')
            ->with('success', 'RdvARV a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rdvARV = RdvARV::findOrFail($id);

        return view('rdv-a-r-v.show', compact('rdvARV'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rdvARV = RdvARV::findOrFail($id);
        $typePopulations = TypePopulation::pluck('TypePopulation', 'Description');

        return view('rdv-a-r-v.edit', compact('rdvARV', 'typePopulations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RdvARVRequest $request, RdvARV $rdvARV): RedirectResponse
    {
        $all = $request->validated();
        $rdvARV->update($all);

        return Redirect::route('rdv-a-r-vs.index')
            ->with('success', 'RdvARV a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = RdvARV::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du RdvARV !" . $th->getMessage()]);
        }


        return Redirect::route('rdv-a-r-vs.index')
            ->with('success', 'RdvARV a été supprimé(e) avec succes !');
    }
    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $data = Excel::import(new ARVImport, $request->file('file'));
        $downloadInvalidRow = false;
        $invalidRows = session('import_errors_data', null);
        $message = "Les RDV ont été importés avec succès.";
        if (!is_null($invalidRows)) {
            $message = "Il y a des lignes rejetées lors de l'importation. Le téléchargement du fichier est en cours...";
            $downloadInvalidRow = true;
            return back()->with(['download_invalid_rows' => $downloadInvalidRow, 'message' => $message,]);
        }



        return redirect()->route('rdv-a-r-vs.index')->with(['downloadInvalidRow' => $downloadInvalidRow, 'message' => $message]);
    }
}
