@php
    $pagetitle = 'Détails Elicitation';
    $breadcrumbs = ['Liste des Elicitation' => route('elicitations.index'), 'Détails Elicitation' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Elicitation
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('elicitations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codeelicitation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->CodeElicitation }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Patientindex:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->PatientIndex }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codeuicindex:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->CodeUICIndex }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Datenaissance:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->DateNaissance }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Sexe:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->Sexe }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Coderelation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->CodeRelation }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Istested:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->isTested }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Testingcode:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->TestingCode }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Result:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $elicitation->Result }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
