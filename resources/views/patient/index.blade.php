@php
    $pagetitle = 'Liste des Patient(s)';
    $breadcrumbs = ['Liste des Patient(s)' => route('patients.index')];
@endphp

@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">

            <form>
                <div class="form-group">

                    <h5 for="">Rechercher un patient</h5>
                    <p>Saisir le code UIC </p>
                    <div class="input-group">

                        <input type="text" class="form-control rounded-0" value="{{ request()->search ?? '' }}"
                            name="search" style="padding-right: 30px;">


                        <button class="btn px-3 btn-secondary text-center" type="submit">
                            <iconify-icon icon="icon-park-twotone:search" class="fs-6 aside-icon"></iconify-icon>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="text-end">
                            {{-- <a href="{{ route('patients.create') }}" class="btn btn-sm btn-primary rounded-05"> Nouveau</a> --}}
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Patient(s)</h5>
                            <span>Liste des Patient(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable datatable-no-search">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

                                        <th>Code UIC & Date Naiss. </th>
                                        <th>Type Population</th>
                                        <th>
                                            Agent Gestionnaire
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                <div class="d-flex align-items-center text-truncate">
                                                    <img src="{{ asset($patient->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                                                        alt="spike-img" class="img-fluid rounded-circle flex-shrink-0"
                                                        width="40" height="40">
                                                    <div class="ms-3">
                                                        <h4 class="card-title mb-1 fs-4">
                                                            {{ $patient->CodeUIC }}
                                                        </h4>
                                                        <p class="card-subtitle">
                                                            {{ $patient->DateNaissance->format('d-m-Y') }}</p>
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
                                                {{ $patient->agentGestionnaire()?->name }}
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
                                                        {{-- <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ route('patients.edit', $patient->id) }}">
                                                                <i class="fs-4 ti ti-edit"></i> Modifier
                                                            </a>
                                                        </li> --}}
                                                        {{-- <li>
                                                            <form action="{{ route('patients.destroy', $patient->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="fs-4 ti ti-trash"></i> {{ __('Supprimer') }}
                                                                </button>
                                                            </form>

                                                        </li> --}}
                                                    </ul>
                                                </div>
                                                {{--
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ route('patients.show',$patient->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                            <a class="dropdown-item" href="{{ route('patients.edit',$patient->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                            <div class="dropdown-divider"></div>
                                                            <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger"><i class="fa fa-fw fa-trash"></i> {{ __('Supprimer') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                --}}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $patients->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
