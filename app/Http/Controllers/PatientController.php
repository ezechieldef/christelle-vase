<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Models\AssocAgentPatient;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        if ($request->has('search') && $request->search != null) {
            $patients = Patient::where('CodeUIC', 'like', '%' . $request->search . '%')
                ->paginate();
        } else {
            $patients = Patient::paginate();
        }

        return view('patient.index', compact('patients'))
            ->with('i', ($request->input('page', 1) - 1) * $patients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $patient = new Patient();

        return view('patient.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Patient::create($all);

        return Redirect::route('patients.index')
            ->with('success', 'Patient a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $patient = Patient::findOrFail($id);


        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $patient = Patient::findOrFail($id);

        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Patient $patient): RedirectResponse
    {
        request()->validate(
            ["Agent" => "required|exists:users,id"]
        );
        AssocAgentPatient::updateOrCreate(
            [
                'Patient' => $patient->id,
            ],
            [
                'Patient' => $patient->id,
                "Agent" => request()->Agent
            ]
        );

        return Redirect::route('patients.show', $patient->id)
            ->with('success', 'L\'Agent a été affecté au patient avec succès !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Patient::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du Patient !" . $th->getMessage()]);
        }


        return Redirect::route('patients.index')
            ->with('success', 'Patient a été supprimé(e) avec succes !');
    }
}
