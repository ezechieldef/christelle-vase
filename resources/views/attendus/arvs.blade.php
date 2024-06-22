<div class="row">
    <div class="col-12">
        {{-- <div class="card bg-light-primary bg-primary-subtle text-primary shadow-none">
            <div class="card-body py-3">


            </div>
        </div> --}}
        <h4 class="border-start border-5 border-primary bg-primary-subtle text-secondary ps-3 py-3 my-3 mb-4">
            Rendez-vous Antirétroviral ( ARV )
        </h4>


    </div>
    @forelse ($rdvARVs as $rdv)
        @php
            $rdvARV = $rdv;
        @endphp
        <div class="modal fade" id="modalDetail{{ $rdv->id }}" tabindex="-1" aria-labelledby="importerModalLabel"
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
                                @include('rdv-a-r-v.show-table', ['rdvARV' => $rdv])
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
                        <img src="{{ asset($rdv->patient->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                            class=" w-100 rounded-3 mb-3">
                        {{-- <img src="https://flagcdn.com/{{ strtolower($brs->CodePays) }}.svg" class=" w-100 rounded-3 mb-3"> --}}
                    </div>

                    <div class="text-dark">

                        <h5 class="card-title">
                            {{ $rdv->patient->CodeUIC . ' ( ' . $rdv->patient->age() . ' ans )' }}
                        </h5>
                        <small class=" text-truncate" style="max-width: 100%">
                             Population :
                            <span class="fw-bold">{{ Str::limit($rdv->patient->TypePopulation) }} </span>
                        </small>
                        <hr>

                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <a data-bs-toggle="modal" data-bs-target="#modalDetail{{ $rdv->id }}"
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
                        Aucun Rendez-vous Antirétroviral ( ARV )
                    </h5>
                    <p>Il n'y a aucun rendez-vous ARV de vos patients pour aujourd'hui.
                    </p>
                </div>
            </div>
        </div>
    @endforelse
</div>
