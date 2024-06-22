@php
    $pagetitle = 'Liste des Attendus du jour (' . date('d-m-Y') . ')';
    $breadcrumbs = ['Liste des Attendus' => route('attendus.index')];
@endphp

@extends('layouts.app')

@section('modal')
    <div class="modal fade" id="importerModal" tabindex="-1" aria-labelledby="importerModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg rounded-05">
            <div class="modal-content rounded-05">

                <div class="modal-header">
                    <h5 class="modal-title" id="importerModalLabel">Importer des données</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-05" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-success rounded-05">Importer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                @include('attendus.arvs')
            </div>
            <div class="col-sm-12">
                @include('attendus.cvs')
            </div>
        </div>
    </div>
@endsection
