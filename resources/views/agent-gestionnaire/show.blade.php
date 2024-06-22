@php
    $pagetitle = 'Détails Agent Gestionnaire';
    $breadcrumbs = [
        'Liste des Agents Gestionnaire' => route('agent-gestionnaires.index'),
        'Détails Agent Gestionnaire' => '',
    ];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails User
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('agent-gestionnaires.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">



                            <div class="col-lg-4">
                                <strong class="text-dark ">Name:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $user->name }}" readonly>
                            </div>

                            <div class="col-lg-4">
                                <strong class="text-dark ">Email:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $user->email }}" readonly>
                            </div>


                            <div class="col-lg-4">
                                <strong class="text-dark ">Last Login At:</strong>
                                <input type="text" class="form-control rounded-05 my-1 text-dark"
                                    value="{{ $user->last_login_at }}" readonly>
                            </div>
                            <div class="col-12">

                                <hr>
                            </div>
                            <div class="col-12">
                                <strong class="text-dark mb-3">Patients de ce gestionnaire :</strong>
                                <div class="col-12">
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-outline-secondary rounded-05 mb-3" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#dipll" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            <i class="fa fa-plus me-2"></i>
                                            Ajouter un / des patients
                                        </button>
                                    </div>
                                    <div class="alert alert-info collapse" id="dipll">
                                        <form action="{{ route('agent-gestionnaires.storePatients', $user->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="Agent" value="{{ $user->id }}">
                                                        <label for="CodeDiplome" class="form-label">Patients
                                                        </label>

                                                        {{ html()->select('Patients[]', $allPatients)->class('form-control form-select select2')->multiple()->required() }}
                                                        {!! $errors->first('Patients[]', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit"
                                                        class="btn btn-success rounded-05 mt-2">Enregistrer</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover datatable">
                                        <thead class="thead">
                                            <tr>
                                                <th>N°</th>

                                                <th>Code UIC & Date Naiss. </th>
                                                <th>Type Population</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>
                                                        <div class="d-flex align-items-center text-truncate">
                                                            <img src="{{ asset($patient->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                                                                alt="spike-img"
                                                                class="img-fluid rounded-circle flex-shrink-0"
                                                                width="40" height="40">
                                                            <div class="ms-3">
                                                                <h4 class="card-title mb-1 fs-4">
                                                                    {{ $patient->CodeUIC }}
                                                                </h4>
                                                                <p class="card-subtitle">{{ $patient->DateNaissance }}</p>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="text-muted">

                                                        {{ $patient->TypePopulation }}
                                                        {{-- <span
                                                            class="badge rounded-pill bg-primary-subtle text-primary border-primary border">
                                                        </span> --}}
                                                    </td>


                                                    <td>
                                                        <div class="dropdown dropstart">
                                                            <a href="javascript:void(0)" class="text-muted show"
                                                                id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                                aria-expanded="true">
                                                                <i class="ti ti-dots-vertical fs-5"></i>
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-20px, 1.6px, 0px);"
                                                                data-popper-placement="left-start">
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                                        href="{{ route('patients.show', $patient->id) }}">
                                                                        <i class="fs-4 ti ti-eye"></i> Détails
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-danger"
                                                                        href="{{ route('agent-gestionnaires.destroyPatient', $patient->id) }}">
                                                                        <i class="fs-4 ti ti-trash"></i> Délier du
                                                                        gestionnaire
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
