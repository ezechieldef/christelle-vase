<?php

namespace App\Http\Controllers;

use App\Models\RdvCV;
use App\Imports\CVImport;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TypePopulation;
use App\Http\Requests\RdvCVRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class RdvCVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rdvCVs = RdvCV::paginate();

        return view('rdv-c-v.index', compact('rdvCVs'))
            ->with('i', ($request->input('page', 1) - 1) * $rdvCVs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rdvCV = new RdvCV();
        $typePopulations = TypePopulation::pluck('TypePopulation', 'Description');


        return view('rdv-c-v.create', compact('rdvCV', 'typePopulations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RdvCVRequest $request): RedirectResponse
    {
        $all = $request->validated();
        RdvCV::create($all);

        return Redirect::route('rdv-c-vs.index')
            ->with('success', 'RdvCV a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rdvCV = RdvCV::findOrFail($id);

        return view('rdv-c-v.show', compact('rdvCV'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rdvCV = RdvCV::findOrFail($id);
        $typePopulations = TypePopulation::pluck('TypePopulation', 'Description');


        return view('rdv-c-v.edit', compact('rdvCV', 'typePopulations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RdvCVRequest $request, RdvCV $rdvCV): RedirectResponse
    {
        $all = $request->validated();
        $rdvCV->update($all);

        return Redirect::route('rdv-c-vs.index')
            ->with('success', 'RdvCV a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = RdvCV::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du RdvCV !" . $th->getMessage()]);
        }


        return Redirect::route('rdv-c-vs.index')
            ->with('success', 'RdvCV a été supprimé(e) avec succes !');
    }

    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $data = Excel::import(new CVImport, $request->file('file'));
        $downloadInvalidRow = false;
        $invalidRows = session('import_errors_data', null);
        $message = "Les RDV ont été importés avec succès.";
        if (!is_null($invalidRows)) {
            $message = "Il y a des lignes rejetées lors de l'importation. Le téléchargement du fichier est en cours...";
            $downloadInvalidRow = true;
            return back()->with(['download_invalid_rows' => $downloadInvalidRow, 'message' => $message,]);
        }


        return redirect()->route('rdv-c-vs.index')->with(['downloadInvalidRow' => $downloadInvalidRow, 'message' => $message]);
    }
}
