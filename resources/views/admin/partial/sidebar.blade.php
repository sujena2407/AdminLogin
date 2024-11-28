<nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>


    <!-- Sales Management Section Label -->
	<li class="nav-item menu-label">Sales Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/sales*') ? 'active' : '' }}" data-toggle="collapse" href="#sales-elements" aria-expanded="false" aria-controls="sales-elements">
                <i class="icon-tag menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('admin/sales*') ? 'show' : '' }}" id="sales-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/sales') ? 'active' : '' }}" href="{{ route('admin.sales') }}">Sales List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/new-sales') ? 'active' : '' }}" href="{{ route('admin.new-sales') }}">Add New Sales</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Payments Management Section -->
		<li class="nav-item menu-label">Sales Payement Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/payments') ? 'active' : '' }}" href="{{ route('admin.payments') }}">
                <i class="icon-credit-card menu-icon"></i>
                <span class="menu-title">Payments</span>
            </a>
        </li>
</li>

        <!-- Refund Management Section Label -->
        <li class="nav-item menu-label">Refund Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/refunds*') ? 'active' : '' }}" data-toggle="collapse" href="#refund-elements" aria-expanded="false" aria-controls="refund-elements">
                <i class="icon-undo menu-icon"></i>
                <span class="menu-title">Refund</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('admin/refunds*') ? 'show' : '' }}" id="refund-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/refunds') ? 'active' : '' }}" href="{{ route('admin.refunds') }}">Refund List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/refund-payments') ? 'active' : '' }}" href="{{ route('admin.refund-payments') }}">Refund Payments</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Reports Section Label -->
        <li class="nav-item menu-label">Reports</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}" data-toggle="collapse" href="#report-elements" aria-expanded="false" aria-controls="report-elements">
                <i class="bx bx-analyse menu-icon"></i>
                <span class="menu-title">Collections Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('admin/reports*') ? 'show' : '' }}" id="report-elements">
                <ul class="nav flex-column sub-menu">
                    <!-- Collections Report -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/collections') ? 'active' : '' }}" href="due_collections_report.php">
                            <i class="bx bx-radio-circle"></i> Active Due Collections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/collections') ? 'active' : '' }}" href="collections_report.php">
                            <i class="bx bx-radio-circle"></i> Active Collections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/collections') ? 'active' : '' }}" href="inactive_due_collections_report.php">
                            <i class="bx bx-radio-circle"></i> Inactive Due Collections
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/collections') ? 'active' : '' }}" href="inactive_collections_report.php">
                            <i class="bx bx-radio-circle"></i> Inactive Collections
                        </a>
                    </li>

                    <!-- Stock Report -->

                </ul>
            </div>
			<li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/stock') ? 'active' : '' }}" href="stock_report.php">
                            <i class="bx bx-coin-stack"></i> Stock Report
                        </a>
                    </li>

                    <!-- Payments Report -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/payments') ? 'active' : '' }}" href="payments_report.php">
                            <i class="bx bx-coin-stack"></i> Payments Report
                        </a>
                    </li>

                    <!-- Sales Report -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/reports/sales') ? 'active' : '' }}" data-toggle="collapse" href="#sales-report-elements" aria-expanded="false" aria-controls="sales-report-elements">
                            <i class="bx bx-coin"></i> Sales Report
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('admin/reports/sales*') ? 'show' : '' }}" id="sales-report-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="sales_summery_report.php">
                                        <i class="bx bx-radio-circle"></i> All Sales Summary
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sales_summery_report.php?active_status=1">
                                        <i class="bx bx-radio-circle"></i> Active Sales Summary
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sales_summery_report.php?active_status=0">
                                        <i class="bx bx-radio-circle"></i> Inactive Sales Summary
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="monthly_sales_summery_report.php">
                                        <i class="bx bx-radio-circle"></i> Monthly Sales Summary
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="customer_report.php">
                                        <i class="bx bx-radio-circle"></i> Customer List
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
        </li>

        <!-- Property Management Section Label -->
        <li class="nav-item menu-label">Property Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/property*') ? 'active' : '' }}" data-toggle="collapse" href="#property-elements" aria-expanded="false" aria-controls="property-elements">
                <i class="bx bx-buildings menu-icon"></i>
                <span class="menu-title">Property</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('admin/property*') ? 'show' : '' }}" id="property-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="company.php">Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="project.php">Project</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Customer Management -->
		<li class="nav-item menu-label">Customer Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/customers') ? 'active' : '' }}" href="customer.php">
                <i class="bx bx-group menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>

        <!-- System Management Section Label -->
        <li class="nav-item menu-label">System Management</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/system*') ? 'active' : '' }}" href="system-users.php">
                <i class="bx bx-user menu-icon"></i>
                <span class="menu-title">User Management</span>
            </a>
        </li>
    </ul>
</nav>