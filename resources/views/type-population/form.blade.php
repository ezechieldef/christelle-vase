<div class="">
    <div class="row">
        
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="type_population" class="form-label">{{ __('Typepopulation') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="TypePopulation" class="form-control @error('TypePopulation') is-invalid @enderror rounded-05" value="{{ old('TypePopulation', $typePopulation?->TypePopulation) }}" id="type_population" >
            {!! $errors->first('TypePopulation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="description" class="form-label">{{ __('Description') }}</label> <!-- <strong class="text-danger"> * </strong> -->  </strong>
            <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror rounded-05" value="{{ old('Description', $typePopulation?->Description) }}" id="description" >
            {!! $errors->first('Description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
