@php
    $pagetitle = 'Modifier Type Population';
    $breadcrumbs = [
        'Liste des Type Population(s)' => route('type-populations.index'),
        'Modifier Type Population' => '',
    ];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Type Population
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-populations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Type Population</h5>
                            <span>Formulaire de modification: Type Population</span>
                            <hr>
                        </div>
                        <form method="POST"
                            action="{{ route('type-populations.update', $typePopulation->TypePopulation) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('type-population.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
