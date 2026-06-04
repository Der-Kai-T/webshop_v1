<aside {{ $attributes->class(['app-sidebar shadow']) }} data-bs-theme="dark">

    <x-app.admin.layout.sidebar.brand/>


    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" data-overlayscrollbars="host">
        <div class="os-size-observer os-size-observer-appear">
            <div class="os-size-observer-listener ltr"></div>
        </div>

        <div data-overlayscrollbars-viewport="scrollbarHidden"
             style="
             margin: -16px -16px -16px -8px;
             top: -8px;
             right: auto;
             left: -8px;
             width: calc(100% + 16px);
             padding-bottom: 10rem;
             overflow-y: scroll;">

            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                    data-accordion="false">

                    <div class="sidebar-to-mobile">
                        {{--                        <a href="{{ route('mobile.dashboard') }}">--}}
                        {{--                            <div class="sidebar-back-inner">--}}

                        {{--                                <div class="sidebar-back-text">--}}
                        {{--                                    {{ __('mobile view') }}--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </a>--}}
                    </div>




                    <x-app.admin.layout.sidebar.item
                        text="Dashboard"
                        icon="bi bi-speedometer"
                        route="admin.dashboard"
                        class="no-border"
                    />


                    <x-app.admin.layout.sidebar.header text="Artikelverwaltung" can="admin" class="application mt-4"/>
                    <x-app.admin.layout.sidebar.item
                        class="application"
                        text="Kategorien"
                        icon="bi bi-list-task"
                        route="admin.dashboard"
                        can="legal_field.read"
                    />

                    <x-app.admin.layout.sidebar.item
                        class="application"
                        text="Artikel"
                        icon="bi bi-list-task"
                        route="admin.dashboard"
                        can="legal_field.read"
                    />

                    <x-app.admin.layout.sidebar.header text="Bestellungen" can="admin" class="application mt-4"/>
                    <x-app.admin.layout.sidebar.item
                        class="application"
                        text="Bestellungen"
                        icon="bi bi-list-task"
                        route="admin.orders"
                        can="admin.order"
                    />

                    <x-app.admin.layout.sidebar.item
                        class="application"
                        text="offene Bestellungen (gruppiert)"
                        icon="bi bi-list-task"
                        route="admin.orders-grouped"
                        can="admin.order"
                    />


                    <x-app.admin.layout.sidebar.header text="Administration" can="admin" class="admin mt-4"/>
                    <x-app.admin.layout.sidebar.item
                        class="admin"
                        text="Benutzer"
                        icon="bi bi-person"
                        route="admin.users"
                        can="admin.users"
                    />
                    <x-app.admin.layout.sidebar.item
                        class="admin"
                        text="Teams"
                        icon="bi bi-building"
                        route="admin.teams"
                        can="admin.teams"
                    />
                    <x-app.admin.layout.sidebar.item
                        class="admin"
                        text="Rollen"
                        icon="bi bi-people"
                        route="admin.dashboard"
                        can="admin.roles"
                    />

                    <x-app.admin.layout.sidebar.item
                        class="admin"
                        text="Status"
                        icon="bi bi-people"
                        route="admin.dashboard"
                        can="admin.roles"
                    />

                </ul>

            </nav>
        </div>
        <div
            class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden os-theme-light">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%;"></div>
            </div>
        </div>
        <div
            class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-scrollbar-auto-hide-hidden os-theme-light">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 86.949%; transform: translateY(0%);"></div>
            </div>
        </div>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->
