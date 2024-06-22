<div class="">
    <div class="row">

        <div class="col-12">
            <div class="fw-bold fs-4 text-muted mb-3">Informations du patient : </div>
        </div>
        <div class="col-lg-5 form-group mb-2 mb20">
            <strong> <label for="code_u_i_c" class="form-label">{{ __('Code UIC') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="CodeUIC" class="form-control @error('CodeUIC') is-invalid @enderror rounded-05"
                value="{{ old('CodeUIC', $rdvARV?->CodeUIC) }}" id="code_u_i_c">
            {!! $errors->first('CodeUIC', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-7 form-group mb-2 mb20">
            <strong> <label for="type_population" class="form-label">{{ __('Population') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('TypePopulation', $typePopulations)->class('form-control form-select select2 rounded-05' . ($errors->has('TypePopulation') ? ' is-invalid' : ''))->value(old('TypePopulation', $rdvARV?->TypePopulation))->placeholder('-- Sélectionner --') }}

            {!! $errors->first(
                'TypePopulation',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('Sexe', $rdvARV::sexesPluck())->class('form-control form-select rounded-05' . ($errors->has('Sexe') ? ' is-invalid' : ''))->value(old('Sexe', $rdvARV?->Sexe))->placeholder('-- Sélectionner --') }}
            {{-- <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05"
                value="{{ old('Sexe', $rdvARV?->Sexe) }}" id="sexe"> --}}
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Date Naissance') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateNaissance"
                class="form-control @error('DateNaissance') is-invalid @enderror rounded-05"
                value="{{ old('DateNaissance', $rdvARV?->DateNaissance) }}" id="date_naissance">
            {!! $errors->first(
                'DateNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_r_d_v" class="form-label">{{ __('Date du Rendez-vous') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateRDV" class="form-control @error('DateRDV') is-invalid @enderror rounded-05"
                value="{{ old('DateRDV', $rdvARV?->DateRDV) }}" id="date_r_d_v">
            {!! $errors->first('DateRDV', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-12">
            <hr>
            <div class="fw-bold fs-4 text-muted mb-3">Informations complémentaires :</div>
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_visite" class="form-label">{{ __('Date dernière Visite') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateVisite"
                class="form-control @error('DateVisite') is-invalid @enderror rounded-05"
                value="{{ old('DateVisite', $rdvARV?->DateVisite) }}" id="date_visite">
            {!! $errors->first('DateVisite', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-5 form-group mb-2 mb20">
            <strong> <label for="regime_actuel" class="form-label">{{ __('Regime Actuel') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="RegimeActuel"
                class="form-control @error('RegimeActuel') is-invalid @enderror rounded-05"
                value="{{ old('RegimeActuel', $rdvARV?->RegimeActuel) }}" id="regime_actuel">
            {!! $errors->first('RegimeActuel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-3 form-group mb-2 mb20">
            <strong> <label for="nombre_tar_dispense" class="form-label">{{ __('Nombre de TAR dispensé') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="number" step=".001" name="NombreTarDispense"
                class="form-control @error('NombreTarDispense') is-invalid @enderror rounded-05"
                value="{{ old('NombreTarDispense', $rdvARV?->NombreTarDispense) }}" id="nombre_tar_dispense">
            {!! $errors->first(
                'NombreTarDispense',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
