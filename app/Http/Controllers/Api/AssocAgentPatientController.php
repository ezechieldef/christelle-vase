<?php

namespace App\Http\Controllers\Api;

use App\Models\AssocAgentPatient;
use Illuminate\Http\Request;
use App\Http\Requests\AssocAgentPatientRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssocAgentPatientResource;

class AssocAgentPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assocAgentPatients = AssocAgentPatient::paginate();

        return AssocAgentPatientResource::collection($assocAgentPatients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssocAgentPatientRequest $request): AssocAgentPatient
    {
        return AssocAgentPatient::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(AssocAgentPatient $assocAgentPatient): AssocAgentPatient
    {
        return $assocAgentPatient;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssocAgentPatientRequest $request, AssocAgentPatient $assocAgentPatient): AssocAgentPatient
    {
        $assocAgentPatient->update($request->validated());

        return $assocAgentPatient;
    }

    public function destroy(AssocAgentPatient $assocAgentPatient): Response
    {
        $assocAgentPatient->delete();

        return response()->noContent();
    }
}
