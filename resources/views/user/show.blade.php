@php
    $pagetitle = 'Détails User';
    $breadcrumbs = ['Liste des User' => route('users.index'), 'Détails User' => ''];
@endphp

@extends('layouts.app')

@section('template_title')
    Détails  User
@endsection

@section('content')
    <section class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary"> Retour</a>
                        </div>
                        <div class="row">

                            

                        <div class="col-lg-4">
                            <strong class="text-dark ">Name:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $user->name }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Email:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $user->email }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Password:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $user->password }}"
                                readonly>
                        </div>

                        <div class="col-lg-4">
                            <strong class="text-dark ">Last Login At:</strong>
                            <input type="text" class="form-control rounded-05 my-1 text-dark" value="{{ $user->last_login_at }}"
                                readonly>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
