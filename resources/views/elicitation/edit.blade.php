@php
    $pagetitle = 'Modifier Elicitation';
    $breadcrumbs = ['Liste des Elicitation(s)' => route('elicitations.index'), 'Modifier Elicitation' => ''];
@endphp
@extends('layouts.app')

@section('template_title')
    Formulaire de modification: Elicitation
@endsection

@section('content')
    <section class="">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">

                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('elicitations.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Mettre à jour Elicitation</h5>
                            <span>Formulaire de modification: Elicitation</span>
                            <hr>
                        </div>
                        <form method="POST" action="{{ route('elicitations.update', $elicitation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('elicitation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
