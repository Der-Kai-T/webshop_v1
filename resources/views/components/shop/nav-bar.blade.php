<nav
    class="navbar navbar-expand-lg navbar-light bg-white border-bottom mx-0 p-0 flex-column  ">
    <div class="w-100 pb-lg-0 pt-lg-0 pt-4 pb-3">
        <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">

            <!-- Logo-->
            <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0" href="/">
                <!-- Start of Logo-->
                <div class="d-flex align-items-center">
                    <div class="f-w-6 d-flex align-items-center me-2 lh-1">
                        {{--  TODO: place logo here --}}
                    </div>
                    <span class="fs-5">{{config("app.name")}}</span>
                </div>
                <!-- / Logo-->

            </a>
            <!-- / Logo-->

            <!-- Main Navigation-->
            <div class="ms-5 flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1"
                 id="navbarNavDropdown">

                <!-- Mobile Nav Toggler-->
                <button
                    class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 position-absolute top-0 end-0 mt-3 me-2"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ri-close-circle-line ri-2x"></i>
                </button>
                <!-- / Mobile Nav Toggler-->

                <ul class="navbar-nav py-lg-2 mx-auto">
                    {{-- <x-shop.nav.mega/>--}}
                    {{-- <x-shop.nav.direct/>--}}

                    @foreach(\App\Models\Category::whereNull("parent_id")->orderBy("name")->get() as $category)
                        <x-shop.nav.dropdown-category :category="$category"/>
                    @endforeach
                </ul>
            </div>
            <!-- / Main Navigation-->

            <!-- Navbar Icons-->
            <ul class="list-unstyled mb-0 d-flex align-items-center">

                <!-- Navbar Toggle Icon-->
                <li class="d-inline-block d-lg-none">
                    <button
                        class="btn btn-link px-2 text-decoration-none navbar-toggler border-0 d-flex align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ri-menu-line ri-lg align-middle"></i>
                    </button>
                </li>
                <!-- /Navbar Toggle Icon-->

                {{--                <!-- Navbar Search-->--}}
                {{--                <li class="ms-1 d-inline-block">--}}
                {{--                    <button--}}
                {{--                        class="btn btn-link px-2 text-decoration-none d-flex align-items-center"--}}
                {{--                        data-pr-search>--}}
                {{--                        <i class="ri-search-2-line ri-lg align-middle"></i>--}}
                {{--                    </button>--}}
                {{--                </li>--}}
                {{--                <!-- /Navbar Search-->--}}

                {{--                <!-- Navbar Wishlist-->--}}
                {{--                <li class="ms-1 d-none d-lg-inline-block">--}}
                {{--                    <a class="btn btn-link px-2 py-0 text-decoration-none d-flex align-items-center"--}}
                {{--                       href="#">--}}
                {{--                        <i class="ri-heart-line ri-lg align-middle"></i>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <!-- /Navbar Wishlist-->--}}

                <!-- Navbar Archive-->
                <li class="ms-1 d-none d-lg-inline-block">
                    <a class="btn btn-link px-2 py-0 text-decoration-none d-flex align-items-center"
                       href="/history"
                       title="Archiv"
                    >
                        <i class="ri-archive-drawer-line ri-lg align-middle"></i>
                    </a>
                </li>
                <!-- /Navbar Archive-->

                <!-- Navbar Login-->
                <li class="ms-1 d-none d-lg-inline-block">
                    <a class="btn btn-link px-2 text-decoration-none d-flex align-items-center"
                       href="/user/profile" title="Profil bearbeiten">
                        <i class="ri-user-line ri-lg align-middle"></i>
                    </a>
                </li>
                <!-- /Navbar Login-->

                <!-- Navbar Cart-->
                <li class="ms-1 d-inline-block position-relative">
                    <button
                        class="btn btn-link px-2 text-decoration-none d-flex align-items-center disable-child-pointer"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                        <i class="ri-shopping-cart-2-line ri-lg align-middle position-relative z-index-10"></i>
                        <?php
                        $user = auth()->user();
                        $cart_count = $user->cart_count()
                        ?>
                        <span
                            class="fs-xs fw-bolder f-w-5 f-h-5 bg-orange rounded-lg d-block lh-1 pt-1 position-absolute top-0 end-0 z-index-20 mt-2 text-white">{{ $cart_count }}</span>
                    </button>
                </li>
                <!-- /Navbar Cart-->

            </ul>
            <!-- Navbar Icons-->

        </div>
    </div>
</nav>
<!-- / Navbar-->    <!-- / Navbar-->
