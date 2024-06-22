@php
    $pagetitle = 'Liste des Elicitation(s)';
    $breadcrumbs = ['Liste des Elicitation(s)' => route('elicitations.index')];
@endphp

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <form>
                <div class="form-group">

                    <h5 for="">Rechercher un cas élicité</h5>
                    <p>Saisir le code élicitation / Code UIC de l'index </p>
                    <div class="input-group">

                        <input type="text" class="form-control form-control-sm rounded-0"
                            value="{{ request()->search ?? '' }}" name="search" style="padding-right: 30px;">


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
            {{-- <div class="col-sm-12"> --}}
            @forelse ($elicitations as $elicitation)
                <div class="modal fade" id="modalEli{{ $elicitation->id }}" tabindex="-1"
                    aria-labelledby="importerModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-lg rounded-05">
                        <div class="modal-content rounded-05">

                            <div class="modal-header">
                                <h5 class="modal-title" id="importerModalLabel">Détails du cas élicité</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-12">
                                        @include('elicitation.show-table')
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-05 "
                                    data-bs-dismiss="modal">Fermer</button>
                                {{-- <button type="submit" class="btn btn-success rounded-05">Effectuer</button> --}}
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset($elicitation->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                                    class=" w-100 rounded-3 mb-3">
                                {{-- <img src="https://flagcdn.com/{{ strtolower($brs->CodePays) }}.svg" class=" w-100 rounded-3 mb-3"> --}}
                            </div>

                            <div class="text-dark">

                                <h5 class="card-title">
                                    {{ $elicitation->CodeElicitation . ' ( ' . $elicitation->age() . ' ans )' }}
                                </h5>
                                <small class=" text-truncate" style="max-width: 100%">
                                    Date Naiss : <span class="fw-bold">
                                        {{ $elicitation->DateNaissance->format('d/m/Y') }} </span> | Code UIC Index :
                                    <span class="fw-bold">{{ Str::limit($elicitation->CodeUICIndex) }} </span>
                                </small>
                                <hr>

                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <a data-bs-toggle="modal" data-bs-target="#modalEli{{ $elicitation->id }}"
                                        class="btn btn-light text-nowrap rounded-2 w-100 mb-1 ">
                                        <i class="fa fa-eye me-1"></i>
                                        Détails</a>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <a href="" class="btn btn-warning text-nowrap rounded-2 w-100 mb-1">
                                        <i class="fa fa-paper-plane me-2"></i>
                                        Effectué</a>
                                </div> --}}
                            </div>

                            {{-- <a href="{{ route('bourses.show', $brs->id) }}" class="btn btn-warning">En savoir plus</a> --}}
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('spike/empty_box.png') }}" height="200" class="mb-4">

                            <h5>
                                Aucun cas élicité trouvé
                            </h5>
                            <p>
                                @if (request()->search)
                                    Aucun cas élicité trouvé pour la recherche :
                                    <span class="fw-bold">{{ request()->search }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
            {{-- </div> --}}
            <div class="col-sm-12">
                {{-- {!! $elicitations->links() !!} --}}
                {!! $elicitations->withQueryString()->links() !!}

            </div>
        </div>
    </div>
@endsection
