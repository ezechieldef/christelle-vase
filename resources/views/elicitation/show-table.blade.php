<style>
    .border-dark td {
        border-color: #000 !important;
    }
</style>

<div class="table-responsive">
    <table class="table w-100 table-bordered border-dark">
        <tbody>
            <tr>
                <td class="fw-bold">
                    Code Elicitation
                </td>
                <td>
                    {{ $elicitation->CodeElicitation }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Sexe
                </td>
                <td>
                    {{ $elicitation->Sexe }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Date de Naissance
                </td>
                <td>
                    {{ $elicitation->patient->DateNaissance->format('d-m-Y') }}
                    <span class="fw-bold">
                        ({{ $elicitation->patient->age() }} ans)
                    </span>
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Relation avec cas l'index
                </td>
                <td>
                    {{ $elicitation->relationElicitation->LibelleRelation . ' ( ' . $elicitation->relationElicitation->CodeRelation . ')' }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Cas Index
                </td>
                <td>
                    <a href="{{ route('patients.show', $elicitation->patient->id) }}">
                        <div class="d-flex align-items-center text-truncate">
                            <img src="{{ asset($elicitation->patient->Sexe != 'Feminin' ? 'spike/assets/images/profile/user-4.jpg' : 'spike/assets/images/profile/user-6.jpg') }}"
                                alt="spike-img" class="img-fluid rounded-circle flex-shrink-0" width="40"
                                height="40">
                            <div class="ms-3">
                                <h4 class="card-title mb-1 fs-4">
                                    {{ $elicitation->patient->CodeUIC }}
                                </h4>
                                <p class="card-subtitle">
                                    {{ $elicitation->patient->DateNaissance->format('d-m-Y') }}</p>
                                {{-- <small class="badge bg-primary-subtle">
                                {{ $rdvARV->patient->TypePopulation }}
                            </small> --}}
                            </div>
                        </div>
                    </a>
                </td>
            </tr>

            <tr>
                <td class="fw-bold">
                    Est déjà testé ?
                </td>
                <td>
                    <span class="fw-bold">
                        {{ $elicitation->isTested ? 'OUI' : 'NON' }}
                    </span>
                </td>
            </tr>


        </tbody>
    </table>
</div>
