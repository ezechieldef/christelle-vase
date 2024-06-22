<div class="">
    <div class="row">

        <div class="col-12">
            <div class="fw-bold fs-4 text-muted mb-3">Informations du patient : </div>
        </div>
        <div class="col-lg-5 form-group mb-2 mb20">
            <strong> <label for="code_u_i_c" class="form-label">{{ __('Code UIC') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="CodeUIC" class="form-control @error('CodeUIC') is-invalid @enderror rounded-05"
                value="{{ old('CodeUIC', $rdvCV?->CodeUIC) }}" id="code_u_i_c">
            {!! $errors->first('CodeUIC', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-7 form-group mb-2 mb20">
            <strong> <label for="type_population" class="form-label">{{ __('Population') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('TypePopulation', $typePopulations)->class('form-control form-select select2 rounded-05' . ($errors->has('TypePopulation') ? ' is-invalid' : ''))->value(old('TypePopulation', $rdvCV?->TypePopulation))->placeholder('-- Sélectionner --') }}

            {!! $errors->first(
                'TypePopulation',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            {{ html()->select('Sexe', $rdvCV::sexesPluck())->class('form-control form-select rounded-05' . ($errors->has('Sexe') ? ' is-invalid' : ''))->value(old('Sexe', $rdvCV?->Sexe))->placeholder('-- Sélectionner --') }}
            {{-- <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05"
                value="{{ old('Sexe', $rdvCV?->Sexe) }}" id="sexe"> --}}
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Date Naissance') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateNaissance"
                class="form-control @error('DateNaissance') is-invalid @enderror rounded-05"
                value="{{ old('DateNaissance', $rdvCV?->DateNaissance) }}" id="date_naissance">
            {!! $errors->first(
                'DateNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_r_d_v" class="form-label">{{ __('Date du Rendez-vous') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DateRDV" class="form-control @error('DateRDV') is-invalid @enderror rounded-05"
                value="{{ old('DateRDV', $rdvCV?->DateRDV) }}" id="date_r_d_v">
            {!! $errors->first('DateRDV', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-12">
            <hr>
            <div class="fw-bold fs-4 text-muted mb-3">Informations complémentaires :</div>
        </div>

        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="date_prelevement" class="form-label">{{ __('Date Prélevement') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="date" name="DatePrelevement"
                class="form-control @error('DatePrelevement') is-invalid @enderror rounded-05"
                value="{{ old('DatePrelevement', $rdvCV?->DatePrelevement) }}" id="date_prelevement">
            {!! $errors->first(
                'DatePrelevement',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="nombre_copie" class="form-label">{{ __('Nombre de Copie') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="number" step=".001" name="NombreCopie"
                class="form-control @error('NombreCopie') is-invalid @enderror rounded-05"
                value="{{ old('NombreCopie', $rdvCV?->NombreCopie) }}" id="nombre_copie">
            {!! $errors->first('NombreCopie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-4 form-group mb-2 mb20">
            <strong> <label for="resultat_c_v" class="form-label">{{ __('Resultat Charge Virale') }}</label>
                <strong class="text-danger"> * </strong> </strong>
            <input type="text" name="ResultatCV" max="255"
                class="form-control @error('ResultatCV') is-invalid @enderror rounded-05"
                value="{{ old('ResultatCV', $rdvCV?->ResultatCV) }}" id="resultat_c_v">
            {!! $errors->first('ResultatCV', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
