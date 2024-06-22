@php
    $pagetitle = 'Liste des Rdv C V(s)';
    $breadcrumbs = ['Liste des Rdv C V(s)' => route('rdv-c-vs.index')];
@endphp

@extends('layouts.app')
@section('script')
    @if (session('download_invalid_rows'))
        <script>
            window.onload = function() {
                window.location.href = "{{ route('downloadInvalidRows') }}";
            };
        </script>
    @endif
@endsection
@section('modal')
    <div class="modal fade" id="importerModal" tabindex="-1" aria-labelledby="importerModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg rounded-05">
            <div class="modal-content rounded-05">
                <form action="{{ route('rdv-c-vs.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importerModalLabel">Importer des données</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="alert alert-info">
                                <p>
                                    <strong>Informations : </strong>

                                <ul>
                                    <li>- Le fichier doit être au format excel : <strong>CSV, XLS, XLSX</strong> </li>
                                    <li>- Le fichier doit contenir les colonnes suivantes :
                                        <strong>Code UIC, Type Population, Sexe, Date de Naissance, Date RDV,

                                            Date du Prélèvement, Nombre de copie, Résultat CV </strong>


                                    </li>
                                    <li>
                                        <hr>
                                        Si besoin, vous pouvez télécharger le fichier modèle vierge et remplir ensuite avec
                                        les données
                                        <br>

                                    </li>
                                    <li>
                                        <div class="">

                                            <a href="{{ asset('exemple/rdv-CV.xlsx') }}"
                                                class="btn btn-outline-dark rounded-05 mt-3">
                                                Télécharger le fichier modèle CV
                                            </a>
                                        </div>
                                    </li>
                                </ul>

                                </p>
                            </div>
                            {{-- <label for="file" class="form-label">Choisir le fichier</label> --}}
                            <input type="file" name="file"
                                accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv"
                                class="form-control" id="file" required>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-05" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success rounded-05">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($rdvCVs as $rdvCV)
        @php
            $rdv = $rdvCV;
        @endphp
        <div class="modal fade" id="rdvCVModal{{ $rdv->id }}" tabindex="-1" aria-labelledby="importerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg rounded-05">
                <div class="modal-content rounded-05">

                    <div class="modal-header">
                        <h5 class="modal-title" id="importerModalLabel">Détails du Rendez-vous |
                            {{ $rdv->patient->CodeUIC . ' ( ' . $rdv->patient->age() . ' ans ) ' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                @include('rdv-c-v.show-table', ['rdvCV' => $rdv])
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-05 " data-bs-dismiss="modal">Fermer</button>
                        {{-- <button type="submit" class="btn btn-success rounded-05">Effectuer</button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('content')
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
                            <button class="btn btn-sm rounded-05 btn-secondary me-1" data-bs-toggle="modal"
                                data-bs-target="#importerModal">
                                {{-- <iconify-icon icon="material-symbols:file-upload" class="aside-icon"></iconify-icon> --}}
                                Importer</button>
                            <a href="{{ route('rdv-c-vs.create') }}" class="btn btn-sm btn-primary rounded-05"> Nouveau</a>
                        </div>
                        <div class="col mb-2">
                            <h5 class="card-title text-dark fw-bolder mb-0">Rdv C V(s)</h5>
                            <span>Liste des Rdv C V(s)</span>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

                                        <th>Code UIC & Date Naiss.</th>
                                        {{-- <th>Population</th>
                                        <th>Sexe</th>
                                        <th>Date Naiss.</th> --}}
                                        <th>Date RDV</th>
                                        <th>Date Prélèvement</th>
                                        <th>Nbre Copie</th>
                                        <th>Resultat CV</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rdvCVs as $rdvCV)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                <div class="d-flex align-items-center text-truncate">
                                                    <img src="{{ asset($rdvCV->patient->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                                                        alt="spike-img" class="img-fluid rounded-circle flex-shrink-0"
                                                        width="40" height="40">
                                                    <div class="ms-3">
                                                        <h4 class="card-title mb-1 fs-4">
                                                            {{ $rdvCV->patient->CodeUIC }}
                                                        </h4>
                                                        <p class="card-subtitle">
                                                            {{ $rdvCV->patient->DateNaissance->format('d-m-Y') }}</p>
                                                        {{-- <small class="badge bg-primary-subtle">
                                                            {{ $rdvCV->patient->TypePopulation }}
                                                        </small> --}}
                                                    </div>
                                                </div>

                                            </td>
                                            {{-- <td>{{ $rdvCV->TypePopulation }}</td>
                                            <td>{{ $rdvCV->Sexe }}</td>
                                            <td>{{ $rdvCV->DateNaissance->format('d/m/Y') }}</td> --}}
                                            <td>{{ $rdvCV->DateRDV->format('d/m/Y') }}</td>
                                            <td>{{ $rdvCV->DatePrelevement->format('d/m/Y') }}</td>
                                            <td>{{ $rdvCV->NombreCopie }}</td>
                                            <td>{{ $rdvCV->ResultatCV }}</td>

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
                                                                {{-- href="{{ route('rdv-c-vs.show', $rdvCV->id) }}" --}} data-bs-toggle="modal"
                                                                data-bs-target="#rdvCVModal{{ $rdvCV->id }}">
                                                                <i class="fs-4 ti ti-eye"></i> Détails
                                                            </a>
                                                        </li>
                                                        {{-- <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ route('rdv-c-vs.edit', $rdvCV->id) }}">
                                                                <i class="fs-4 ti ti-edit"></i> Modifier
                                                            </a>
                                                        </li> --}}
                                                        <li>
                                                            <form action="{{ route('rdv-c-vs.destroy', $rdvCV->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="fs-4 ti ti-trash"></i> {{ __('Supprimer') }}
                                                                </button>
                                                            </form>

                                                        </li>
                                                    </ul>
                                                </div>
                                                {{--
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="{{ route('rdv-c-vs.show',$rdvCV->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Détails') }}</a>
                                                            <a class="dropdown-item" href="{{ route('rdv-c-vs.edit',$rdvCV->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Modifier') }}</a>
                                                            <div class="dropdown-divider"></div>
                                                            <form action="{{ route('rdv-c-vs.destroy',$rdvCV->id) }}" method="POST">
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
                {!! $rdvCVs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
