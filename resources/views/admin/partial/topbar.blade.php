<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand gap-3">
			<div class="mobile-toggle-menu"><i class="bx bx-menu"></i>
			</div>

            <div class="top-menu ms-auto">
				<ul class="navbar-nav align-items-center gap-1">

			<li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            @if ($LoggedAdminInfo->picture)

                            <img src="{{ asset('storage/' . $LoggedAdminInfo->picture) }}">

                            @else
                            <p>Admin Picture not available</p>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit" class="dropdown-item">
        <i class="ti-power-off text-primary"></i>
        Logout
    </button>
</form>

                        </div>
                    </li>
		</nav>
	</div>