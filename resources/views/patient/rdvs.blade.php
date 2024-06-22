<h5 class="border-start border-5 border-primary bg-primary-subtle text-secondary ps-3 py-3 my-3 mb-4">
    Rendez-vous Antirétroviral ( ARV )
</h5>

<div class="table-responsive">
    <table class="table table-striped table-hover datatable">
        <thead class="thead">
            <tr>
                <th>N°</th>

                <th>Date RDV</th>
                <th>Date Visite</th>
                <th>Regime Actuel</th>
                <th>Nombre TAR dispensé</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($patient->rdvARVs()->get() as $rdvARV)
                <tr>
                    <td>{{ $loop->iteration }}</td>


                    <td>
                        @if ($rdvARV->DateRDV->isToday())
                            <span class="badge bg-success me-2">Aujourd'hui</span>
                        @endif
                        {{ $rdvARV->DateRDV->format('d-m-Y') }}
                    </td>
                    <td>{{ $rdvARV->DateVisite->format('d-m-Y') }}</td>
                    <td>{{ $rdvARV->RegimeActuel }}</td>
                    <td>{{ $rdvARV->NombreTarDispense }}</td>



                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h5 class="border-start border-5 border-primary bg-primary-subtle text-secondary ps-3 py-3 my-3 mb-4">
    Rendez-vous Charge Virale ( CV )
</h5>


<div class="table-responsive">
    <table class="table table-striped table-hover datatable">
        <thead class="thead">
            <tr>
                <th>N°</th>

                <th>Date RDV</th>
                <th>Date Prélèvement</th>
                <th>Nbre copie</th>
                <th>Resultat CV</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($patient->rdvCVS()->get() as $rdvCV)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if ($rdvCV->DateRDV->isToday())
                            <span class="badge bg-success me-2">Aujourd'hui</span>
                        @endif
                        {{ $rdvCV->DateRDV->format('d-m-Y') }}
                    </td>
                    <td>{{ $rdvCV->DatePrelevement->format('d-m-Y') }}</td>
                    <td>{{ $rdvCV->NombreCopie }}</td>
                    <td>{{ $rdvCV->ResultatCV }}</td>



                </tr>
            @endforeach
        </tbody>
    </table>
</div>
