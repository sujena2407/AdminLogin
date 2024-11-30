<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu">
                <i class="bx bx-menu"></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;">
                            <i class="bx bx-moon"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-app">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;">
                            <i class="bx bx-grid-alt"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2 ps" style="height: auto;">
                                <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                    <div class="col">
                                        <a href="{{ route('admin.login') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <img src="{{ asset('/images/app/slack.png') }}" width="30" alt="">
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Login Log</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.activity') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <img src="{{ asset('/images/app/stack-overflow.png') }}" width="30" alt="">
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Activity Log</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.email') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <img src="{{ asset('/images/app/email.png') }}" width="30" alt="">
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Email Log</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
                            <span id="showDueCount" class="alert-count">1</span>
                            <i class="bx bx-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Today Dues</p>
                                    <p class="msg-header-badge">1 due</p>
                                </div>
                            </a>
                            <div class="header-notifications-list ps" style="height: auto;">
                                <a class="dropdown-item" href="javascript:;" onclick="viewSale(304)">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">
                                                A.. Subathra
                                                <span class="msg-time float-end text-danger">1,157,666.67</span>
                                            </h6>
                                            <p class="msg-info">Yarl Royal Palace - C-7th floor</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <script>
                                function viewSale(saleId) {
                                    window.location.href = "{{ url('view_sales') }}/" + saleId;
                                }
                            </script>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('/images/avatars/image_man.png') }}" class="user-img" alt="user avatar">

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                                        <i class="bx bx-home-circle fs-5"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-log-out-circle"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
