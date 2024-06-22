@php
    $pagetitle = 'Nouveau Type Population';
    $breadcrumbs = ['Liste des Type Population(s)' => route('type-populations.index'), 'Nouveau Type Population' => route('type-populations.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Type Population
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('type-populations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Type Population</h5>
                            <span>Formulaire d'ajout d'un(e)  Type Population</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('type-populations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('type-population.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
