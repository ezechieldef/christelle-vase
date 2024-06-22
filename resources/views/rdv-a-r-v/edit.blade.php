@php
    $pagetitle = 'Modifier Rdv A R V';
    $breadcrumbs = ['Liste des Rdv A R V(s)' => route('rdv-a-r-vs.index'), 'Modifier Rdv A R V' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Rdv A R V
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('rdv-a-r-vs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Rdv A R V</h5>
                            <span>Formulaire de modification: Rdv A R V</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('rdv-a-r-vs.update', $rdvARV->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('rdv-a-r-v.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
