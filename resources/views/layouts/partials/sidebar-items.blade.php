{{-- <li class="sidebar-item">
    <a class="sidebar-link primary-hover-bg" href="" aria-expanded="false">
        <iconify-icon icon="iconamoon:home" class="fs-6 aside-icon"></iconify-icon>
        <span class="hide-menu ps-1">Accueil</span>
    </a>
</li> --}}
@role('Agent-gestionnaire')
    <li class="sidebar-item">
        <a class="sidebar-link primary-hover-bg" href="{{ route('attendus.index') }}" aria-expanded="false">
            <iconify-icon icon="iconamoon:home" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Les attendus du jour</span>
        </a>
    </li>
@endrole

@role('Super-admin|Agent-gestionnaire')
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow success-hover-bg" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:layers-line-duotone" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Données</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">

            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('patients.index') }}" aria-expanded="false">
                    <iconify-icon icon="icomoon-free:users" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1">Patients</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('elicitations.public') }}" aria-expanded="false">
                    <iconify-icon icon="hugeicons:hierarchy-square-02" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1">Cas Élicité</span>
                </a>
            </li>


        </ul>
    </li>
@endrole
@role('Super-admin')
    <li class="sidebar-item">
        <a class="sidebar-link primary-hover-bg" href="{{ route('agent-gestionnaires.index') }}" aria-expanded="false">
            <iconify-icon icon="iconamoon:home" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Agent Gestionnaires</span>
        </a>
    </li>
@endrole


@role('Super-admin')
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow success-hover-bg" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:layers-line-duotone" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Users & Roles</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @haspermission('gerer users')
                <li class="sidebar-item">
                    <a class="sidebar-link primary-hover-bg" href="{{ route('users.index') }}" aria-expanded="false">
                        <iconify-icon icon="icomoon-free:users" class="fs-6 aside-icon"></iconify-icon>
                        <span class="hide-menu ps-1">utilisateurs</span>
                    </a>
                </li>
            @endhaspermission
            @haspermission('gerer roles')
                <li class="sidebar-item">
                    <a class="sidebar-link primary-hover-bg" href="{{ route('roles.index') }}" aria-expanded="false">
                        <iconify-icon icon="hugeicons:hierarchy-square-02" class="fs-6 aside-icon"></iconify-icon>
                        <span class="hide-menu ps-1">Roles</span>
                    </a>
                </li>
            @endhaspermission

        </ul>
    </li>
@endrole
@haspermission('gerer RDV')
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow success-hover-bg" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:layers-line-duotone" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Rendez-vous</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">

            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('rdv-a-r-vs.index') }}" aria-expanded="false">
                    <iconify-icon icon="icomoon-free:users" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1"> ARV </span>
                </a>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('rdv-c-vs.index') }}" aria-expanded="false">
                    <iconify-icon icon="hugeicons:hierarchy-square-02" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1">Charge Virale</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('elicitations.index') }}" aria-expanded="false">
                    <iconify-icon icon="hugeicons:hierarchy-square-02" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1">Elicitations</span>
                </a>
            </li>


        </ul>
    </li>
@endhaspermission
@role('Super-admin')
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow success-hover-bg" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:layers-line-duotone" class="fs-6 aside-icon"></iconify-icon>
            <span class="hide-menu ps-1">Paramètre de base</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">


            <li class="sidebar-item">
                <a class="sidebar-link primary-hover-bg" href="{{ route('type-populations.index') }}"
                    aria-expanded="false">
                    <iconify-icon icon="hugeicons:hierarchy-square-02" class="fs-6 aside-icon"></iconify-icon>
                    <span class="hide-menu ps-1">Type population</span>
                </a>
            </li>


        </ul>
    </li>
@endrole
