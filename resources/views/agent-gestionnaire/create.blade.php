@php
    $pagetitle = 'Nouvel Agent Gestionnaire';
    $breadcrumbs = [
        'Liste des Agents Gestionnaire' => route('agent-gestionnaires.index'),
        'Nouvel Agent Gestionnaire' => route('agent-gestionnaires.create'),
    ];
@endphp
@extends('layouts.app')



@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('agent-gestionnaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouvel Agent Gestionnaire</h5>
                            <span>Formulaire d'ajout d'un Agent Gestionnaire</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('agent-gestionnaires.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('agent-gestionnaire.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
