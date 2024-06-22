<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Elicitation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ElicitationRequest;
use App\Imports\ElicitationImport;

class ElicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $elicitations = Elicitation::paginate();

        return view('elicitation.index', compact('elicitations'))
            ->with('i', ($request->input('page', 1) - 1) * $elicitations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $elicitation = new Elicitation();

        return view('elicitation.create', compact('elicitation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ElicitationRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Elicitation::create($all);

        return Redirect::route('elicitations.index')
            ->with('success', 'Elicitation a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $elicitation = Elicitation::findOrFail($id);

        return view('elicitation.show', compact('elicitation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $elicitation = Elicitation::findOrFail($id);

        return view('elicitation.edit', compact('elicitation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElicitationRequest $request, Elicitation $elicitation): RedirectResponse
    {
        $all = $request->validated();
        $elicitation->update($all);

        return Redirect::route('elicitations.index')
            ->with('success', 'Elicitation a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Elicitation::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Elicitation !" . $th->getMessage()]);
        }


        return Redirect::route('elicitations.index')
            ->with('success', 'Elicitation a été supprimé(e) avec succes !');
    }
    function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $data = Excel::import(new ElicitationImport, $request->file('file'));
        $downloadInvalidRow = false;
        $invalidRows = session('import_errors_data', null);
        $message = "Les cas élicités ont été importés avec succès.";
        if (!is_null($invalidRows)) {
            $message = "Il y a des lignes rejetées lors de l'importation. Le téléchargement du fichier est en cours...";
            $downloadInvalidRow = true;
            return back()->with(['download_invalid_rows' => $downloadInvalidRow, 'message' => $message,]);
        }


        return redirect()->route('elicitations.index')->with(['downloadInvalidRow' => $downloadInvalidRow, 'message' => $message]);
    }

    function public(Request $request): View
    {

        if ($request->has('search') && $request->search != null) {
            $elicitations = Elicitation::where('CodeElicitation', 'like', '%' . $request->search . '%')
                ->orWhere('CodeUICIndex', 'like', '%' . $request->search . '%')
                ->paginate();
        } else {
            $elicitations = Elicitation::paginate();
        }

        return view('elicitation.public', compact('elicitations'))
            ->with('i', ($request->input('page', 1) - 1) * $elicitations->perPage());
    }
}
