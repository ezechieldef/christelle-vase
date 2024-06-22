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
                    Code UIC
                </td>
                <td>
                    {{ $rdvARV->CodeUIC }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Type Population
                </td>
                <td>
                    {{ $rdvARV->TypePopulation }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Sexe
                </td>
                <td>
                    {{ $rdvARV->Sexe }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Date de Naissance
                </td>
                <td>
                    {{ $rdvARV->patient->DateNaissance->format('d-m-Y') }}
                    <span class="fw-bold">
                        ({{ $rdvARV->patient->age() }} ans)
                    </span>
                </td>
            </tr>

            <tr>
                <td class="fw-bold">
                    Date du Rendez-vous
                </td>
                <td>
                    {{ $rdvARV->DateRDV->format('d-m-Y') }}
                    @if ($rdvARV->DateRDV->isToday())
                        <span class="badge bg-success rounded-05">Aujourd'hui</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Date visite
                </td>
                <td>
                    {{ $rdvARV->DateVisite->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Regime Actuel
                </td>
                <td>
                    {{ $rdvARV->RegimeActuel }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Nombre de TAR dispensé
                </td>
                <td>
                    {{ $rdvARV->NombreTarDispense }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
