@php
    $pagetitle = 'Modifier Rdv C V';
    $breadcrumbs = ['Liste des Rdv C V(s)' => route('rdv-c-vs.index'), 'Modifier Rdv C V' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Rdv C V
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('rdv-c-vs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Rdv C V</h5>
                            <span>Formulaire de modification: Rdv C V</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('rdv-c-vs.update', $rdvCV->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('rdv-c-v.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
