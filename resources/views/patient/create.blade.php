@php
    $pagetitle = 'Nouveau Patient';
    $breadcrumbs = ['Liste des Patient(s)' => route('patients.index'), 'Nouveau Patient' => route('patients.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Patient
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('patients.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Patient</h5>
                            <span>Formulaire d'ajout d'un(e)  Patient</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('patients.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('patient.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
