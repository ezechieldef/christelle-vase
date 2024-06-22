@php
    $pagetitle = 'Nouveau Elicitation';
    $breadcrumbs = ['Liste des Elicitation(s)' => route('elicitations.index'), 'Nouveau Elicitation' => route('elicitations.create')];
@endphp
@extends('layouts.app')

@section('template_title')
    Nouveau Elicitation
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default  border">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('elicitations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Nouveau : Elicitation</h5>
                            <span>Formulaire d'ajout d'un(e)  Elicitation</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('elicitations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('elicitation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
