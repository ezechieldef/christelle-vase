@php
    $pagetitle = 'Nouveau Rdv A R V';
    $breadcrumbs = ['Liste des Rdv A R V(s)' => route('rdv-a-r-vs.index'), 'Nouveau Rdv A R V' => route('rdv-a-r-vs.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Rdv A R V
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('rdv-a-r-vs.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Rdv A R V</h5>
                            <span>Formulaire d'ajout d'un(e)  Rdv A R V</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('rdv-a-r-vs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('rdv-a-r-v.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
