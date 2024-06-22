@php
    $pagetitle = 'Détails Rdv A R V';
    $breadcrumbs = ['Liste des Rdv A R V' => route('rdv-a-r-vs.index'), 'Détails Rdv A R V' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Rdv A R V
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('rdv-a-r-vs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codeuic:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->CodeUIC }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Typepopulation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->TypePopulation }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Sexe:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->Sexe }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Datenaissance:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->DateNaissance }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Daterdv:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->DateRDV }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Datevisite:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->DateVisite }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Regimeactuel:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->RegimeActuel }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Nombretardispense:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvARV->NombreTarDispense }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
