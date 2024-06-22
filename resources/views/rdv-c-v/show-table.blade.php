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
                    {{ $rdvCV->CodeUIC }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Type Population
                </td>
                <td>
                    {{ $rdvCV->TypePopulation }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Sexe
                </td>
                <td>
                    {{ $rdvCV->Sexe }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">
                    Date de Naissance
                </td>
                <td>
                    {{ $rdvCV->patient->DateNaissance->format('d-m-Y') }}
                    <span class="fw-bold">
                        ({{ $rdvCV->patient->age() }} ans)
                    </span>
                </td>
            </tr>

            <tr>
                <td class="fw-bold">
                    Date du Rendez-vous
                </td>
                <td>
                    {{ $rdvCV->DateRDV->format('d-m-Y') }}
                    @if ($rdvCV->DateRDV->isToday())
                        <span class="badge bg-success rounded-05">Aujourd'hui</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Date du Prélèvement
                </td>
                <td>
                    {{ $rdvCV->DatePrelevement->format('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Nombre de copie
                </td>
                <td>
                    {{ $rdvCV->NombreCopie }}
                </td>
            </tr>
            <tr>
                <td class="fw-bold">

                    Résultat Charge Virale
                </td>
                <td>
                    {{ $rdvCV->ResultatCV }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
