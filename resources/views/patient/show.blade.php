@php
    $pagetitle = 'Détails Patient';
    $breadcrumbs = ['Liste des Patient' => route('patients.index'), 'Détails Patient' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails Patient
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('patients.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            <div class="col-lg-4">
                                <strong class="text-dark ">Code UIC:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $patient->CodeUIC }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Type Population:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $patient->TypePopulation }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Sexe:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $patient->Sexe }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Date de Naissance:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $patient->DateNaissance->format('d-m-Y') }}" readonly>
                            </div>
                            <div class="col-lg-8">
                                <strong class="text-dark ">Agent Gestionnaire:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $patient->agentGestionnaire()?->name }}" readonly>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            @role('Super-admin')
                                <div class="col-12">
                                    <form method="POST" action="{{ route('patients.update', $patient->id) }}" role="form"
                                        enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="Agent" class="text-dark fw-bold mb-2">Agent Gestionnaire</label>
                                            {{ html()->select('Agent', $patient->getAllAgent()->pluck('name', 'id'))->class('form-control form-select select2 rounded-05' . ($errors->has('Agent') ? ' is-invalid' : ''))->value(old('Agent', $patient?->getAgentGestionnaireId()))->placeholder('-- Sélectionner --') }}
                                            {!! $errors->first('Agent', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success rounded-05">
                                                Enregistrer
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            @endrole
                            <div class="col-12">
                                @include('patient.rdvs', ['patient' => $patient])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
