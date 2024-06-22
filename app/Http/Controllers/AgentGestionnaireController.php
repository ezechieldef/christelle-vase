<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\AssocAgentPatient;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AgentGestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = Patient::getAllAgent()->paginate(50);

        return view('agent-gestionnaire.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    public function create()
    {
        $user = new User();

        return view('agent-gestionnaire.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        $user->assignRole('agent-gestionnaire');
        // dd($user->getRoleNames());
        return Redirect::route('agent-gestionnaires.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $patients = $user->patients()->get();
        $allPatients = Patient::pluck(DB::raw('CONCAT(CodeUIC," né le ",DateNaissance)'), "id");

        return view('agent-gestionnaire.show', compact('user', 'patients', 'allPatients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('agent-gestionnaire.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return Redirect::route('agent-gestionnaires.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('agent-gestionnaires.index')
            ->with('success', 'User deleted successfully');
    }

    function storePatients()
    {

        request()->validate(
            [
                "Patients" => "required|array",
                "Agent" => "required|in:" . (implode(",", User::role('Agent-gestionnaire')->pluck('id')->toArray())),
            ],
            ["Patients.required" => "Veuillez sélectionner au moins un patient."]
        );
        $ids = request()->input('Patients');
        $agent = request()->input('Agent');
        // dd($ids);
        foreach ($ids as $id) {

            AssocAgentPatient::updateOrCreate(
                [
                    "Patient" => $id,
                ],
                [
                    "Agent" => $agent,
                    "Patient" => $id,
                ]
            );
        }

        return Redirect::route('agent-gestionnaires.show', $agent)
            ->with('success', 'Patients ajoutés avec succès.');
    }

    function destroyPatient($id): RedirectResponse
    {
        AssocAgentPatient::where('Patient', $id)
            ->where('Agent', auth()->user()->id)
            ->delete();

        return Redirect::route('agent-gestionnaires.show', auth()->user()->id)
            ->with('success', 'Patient supprimé avec succès.');
    }
}
