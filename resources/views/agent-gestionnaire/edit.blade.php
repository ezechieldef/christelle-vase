@php
    $pagetitle = 'Modifier Agent Gestionnaire';
    $breadcrumbs = [
        'Liste des Agents Gestionnaire' => route('agent-gestionnaires.index'),
        'Modifier Agent Gestionnaire' => '',
    ];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: User
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('agent-gestionnaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour User</h5>
                            <span>Formulaire de modification: User</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('agent-gestionnaires.update', $user->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('agent-gestionnaire.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
