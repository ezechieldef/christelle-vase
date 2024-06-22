@php
    $pagetitle = 'Détails Type Population';
    $breadcrumbs = ['Liste des Type Population' => route('type-populations.index'), 'Détails Type Population' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  Type Population
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-populations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Typepopulation:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $typePopulation->TypePopulation }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Description:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $typePopulation->Description }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
