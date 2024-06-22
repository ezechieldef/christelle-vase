<div class="">
    <div class="row">
        
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_elicitation" class="form-label">{{ __('Codeelicitation') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeElicitation" class="form-control @error('CodeElicitation') is-invalid @enderror rounded-05" value="{{ old('CodeElicitation', $elicitation?->CodeElicitation) }}" id="code_elicitation" >
            {!! $errors->first('CodeElicitation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="patient_index" class="form-label">{{ __('Patientindex') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="PatientIndex" class="form-control @error('PatientIndex') is-invalid @enderror rounded-05" value="{{ old('PatientIndex', $elicitation?->PatientIndex) }}" id="patient_index" >
            {!! $errors->first('PatientIndex', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_u_i_c_index" class="form-label">{{ __('Codeuicindex') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeUICIndex" class="form-control @error('CodeUICIndex') is-invalid @enderror rounded-05" value="{{ old('CodeUICIndex', $elicitation?->CodeUICIndex) }}" id="code_u_i_c_index" >
            {!! $errors->first('CodeUICIndex', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Datenaissance') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="DateNaissance" class="form-control @error('DateNaissance') is-invalid @enderror rounded-05" value="{{ old('DateNaissance', $elicitation?->DateNaissance) }}" id="date_naissance" >
            {!! $errors->first('DateNaissance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05" value="{{ old('Sexe', $elicitation?->Sexe) }}" id="sexe" >
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_relation" class="form-label">{{ __('Coderelation') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="CodeRelation" class="form-control @error('CodeRelation') is-invalid @enderror rounded-05" value="{{ old('CodeRelation', $elicitation?->CodeRelation) }}" id="code_relation" >
            {!! $errors->first('CodeRelation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="is_tested" class="form-label">{{ __('Istested') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="isTested" class="form-control @error('isTested') is-invalid @enderror rounded-05" value="{{ old('isTested', $elicitation?->isTested) }}" id="is_tested" >
            {!! $errors->first('isTested', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="testing_code" class="form-label">{{ __('Testingcode') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="TestingCode" class="form-control @error('TestingCode') is-invalid @enderror rounded-05" value="{{ old('TestingCode', $elicitation?->TestingCode) }}" id="testing_code" >
            {!! $errors->first('TestingCode', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="result" class="form-label">{{ __('Result') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="Result" class="form-control @error('Result') is-invalid @enderror rounded-05" value="{{ old('Result', $elicitation?->Result) }}" id="result" >
            {!! $errors->first('Result', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
