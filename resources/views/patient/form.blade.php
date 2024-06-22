<div class="">
    <div class="row">
        
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_u_i_c" class="form-label">{{ __('Codeuic') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeUIC" class="form-control @error('CodeUIC') is-invalid @enderror rounded-05" value="{{ old('CodeUIC', $patient?->CodeUIC) }}" id="code_u_i_c" >
            {!! $errors->first('CodeUIC', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="type_population" class="form-label">{{ __('Typepopulation') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="TypePopulation" class="form-control @error('TypePopulation') is-invalid @enderror rounded-05" value="{{ old('TypePopulation', $patient?->TypePopulation) }}" id="type_population" >
            {!! $errors->first('TypePopulation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05" value="{{ old('Sexe', $patient?->Sexe) }}" id="sexe" >
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Datenaissance') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="DateNaissance" class="form-control @error('DateNaissance') is-invalid @enderror rounded-05" value="{{ old('DateNaissance', $patient?->DateNaissance) }}" id="date_naissance" >
            {!! $errors->first('DateNaissance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
