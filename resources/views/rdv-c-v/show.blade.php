@php
    $pagetitle = 'Détails Rdv C V';
    $breadcrumbs = ['Liste des Rdv C V' => route('rdv-c-vs.index'), 'Détails Rdv C V' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Rdv C V
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('rdv-c-vs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Codeuic:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->CodeUIC }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Typepopulation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->TypePopulation }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Sexe:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->Sexe }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Datenaissance:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->DateNaissance }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Daterdv:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->DateRDV }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Dateprelevement:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->DatePrelevement }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Nombrecopie:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->NombreCopie }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Resultatcv:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $rdvCV->ResultatCV }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
