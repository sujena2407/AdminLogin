    <style>
        .sidebar-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            overflow-y: auto;
            height: 100vh;
            transition: width 0.3s ease-in-out;  /* Smooth width transition */
        }

        .sidebar-wrapper.collapsed {
            width: 80px; /* Narrow sidebar when collapsed */
            overflow: hidden;
        }

        .sidebar-wrapper .menu-title {
            display: inline-block;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar-wrapper.collapsed .menu-title {
            display: none;
        }

        .sidebar-wrapper.collapsed .submenu {
            display: none;
        }

        .sidebar-wrapper.collapsed .toggle-arrow {
            display: none;
        }

        .sidebar-wrapper.collapsed .parent-icon {
            text-align: center;
        }

        .sidebar-wrapper.collapsed .logo-text {
            display: none;
        }

        .sidebar-wrapper.collapsed .bx-arrow-back {
            display: none;
        }

        .sidebar-wrapper.collapsed .logo-icon {
            display: inline-block;
            width: 40px;
            height: auto;
        }

        .sidebar-wrapper .logo-icon {
            display: inline-block;
            width: 40px;
        }

        .sidebar-wrapper.collapsed .sidebar-header {
            justify-content: center;
        }

        .submenu {
            display: none;
        }

        .toggle-arrow {
            transition: transform 0.3s ease;
        }

        .toggle-arrow.bx-rotate-180 {
            transform: rotate(180deg);
        }

        /* Expand sidebar and show submenu when hovering over collapsed sidebar */
        .sidebar-wrapper:hover {
            width: 260px;
        }

        /* Show submenu when hovering over the collapsed sidebar */
        .sidebar-wrapper.collapsed:hover .submenu {
            display: block;
        }

        /* Show menu title when hovering over the collapsed sidebar */
        .sidebar-wrapper.collapsed:hover .menu-title {
            display: inline-block;
        }

        .sidebar-wrapper.collapsed:hover .menu-label {
            display: inline-block;
        }

        /* Ensure text appears when hovering */
        .sidebar-wrapper.collapsed:hover .parent-icon,
        .sidebar-wrapper.collapsed:hover .logo-text {
            display: inline-block;
        }

        .sidebar-wrapper.collapsed:hover .bx-arrow-back {
            display: inline-block;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
        }

        /* Hide arrow icon in collapsed state */
        .sidebar-wrapper.collapsed .has-arrow .toggle-arrow {
            display: none;
        }

        .sidebar-wrapper.collapsed .metismenu .has-arrow:after {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar-wrapper" data-simplebar="true" id="sidebar">
        <div class="sidebar-header">
            <div>
                <img src="{{ asset('images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Quick Track</h4>
            </div>
            <div class="toggle-icon ms-auto" id="toggle-sidebar">
                <i class="bx bx-arrow-back"></i>
            </div>
        </div>

        <ul class="metismenu" id="menu">
            <li>
            <a href="{{ route('admin.dashboard') }}">
                    <div class="parent-icon"><i class="bx bx-home-alt"></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Sales Management</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-money"></i></div>
                    <div class="menu-title">Sales</div>
                    <i class="toggle-arrow"></i>
                </a>
                <ul class="submenu">
                <li><a href="{{ route('admin.new-sales') }}"><i class="bx bx-radio-circle"></i>Add New Sales</a></li>
                <li><a href="{{ route('admin.sales') }}"><i class="bx bx-radio-circle"></i>Sales List</a></li>
                </ul>
            </li>

            <li class="menu-label">Sales Payments Management</li>
            <li>
            <a href="{{ route('admin.payments') }}">
                    <div class="parent-icon"><i class="bx bx-credit-card-front"></i></div>
                    <div class="menu-title">Payments</div>
                </a>
            </li>

            <li class="menu-label">Refund Management</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-undo"></i></div>
                    <div class="menu-title">Refund</div>
                </a>
                <ul class="submenu">
                <li><a href="{{ route('admin.refunds') }}"><i class="bx bx-radio-circle"></i>Refund List</a></li>
                <li><a href="{{ route('admin.refund-payments') }}"><i class="bx bx-radio-circle"></i>Refund Payments</a></li>
                </ul>
            </li>

            <li class="menu-label">Reports</li>

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-analyse"></i></div>
                    <div class="menu-title">Collections Report</div>
                </a>
                <ul class="submenu">
                <li><a href="{{ route('admin.reports.due-collections') }}"><i class="bx bx-radio-circle"></i>Active Due Collections</a></li>
                    <li><a href="{{ route('admin.reports.collections') }}"><i class="bx bx-radio-circle"></i>Active Collections</a></li>
                    <li><a href="{{ route('admin.reports.inactive-due-collections') }}"><i class="bx bx-radio-circle"></i>Inactive Due Collections</a></li>
                    <li><a href="{{ route('admin.reports.inactive-collections') }}"><i class="bx bx-radio-circle"></i>Inactive Collections</a></li>
                </ul>
            </li>

            <li><a href="{{ route('admin.reports.stock') }}">
                <div class="parent-icon"><i class="bx bx-coin-stack"></i></div>
                <div class="menu-title">Stock Report</div></a>
            </li>

            <li> <a href="{{ route('admin.reports.payments') }}">
                <div class="parent-icon"><i class="bx bx-coin-stack"></i></div>
                <div class="menu-title">Payments Report</div></a>
            </li>

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-coin"></i></div>
                    <div class="menu-title">Sales Report</div>
                </a>
                <ul class="submenu">
                <li><a href="{{ route('admin.reports.sales-summary') }}"><i class="bx bx-radio-circle"></i>All Sales Summary</a></li>
                    <li><a href="{{ route('admin.reports.sales-summary', ['active_status' => 1]) }}"><i class="bx bx-radio-circle"></i>Active Sales Summary</a></li>
                    <li><a href="{{ route('admin.reports.sales-summary', ['active_status' => 0]) }}"><i class="bx bx-radio-circle"></i>Inactive Sales Summary</a></li>
                    <li><a href="{{ route('admin.reports.monthly-sales-summary') }}"><i class="bx bx-radio-circle"></i>Monthly Sales Summary</a></li>
                    <li><a href="{{ route('admin.reports.customer-list') }}"><i class="bx bx-radio-circle"></i>Customer List</a></li>
                </ul>
            </li>

            <li class="menu-label">Property Management</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-buildings"></i></div>
                    <div class="menu-title">Property</div>
                </a>
                <ul class="submenu">
                <li><a href="{{ route('admin.property.company') }}"><i class="bx bx-radio-circle"></i>Company</a></li>
                <li><a href="{{ route('admin.property.project') }}"><i class="bx bx-radio-circle"></i>Project</a></li>
            </ul>
            </li>

            <li class="menu-label">Customer Manage</li>
            <li>
            <a href="{{ route('admin.customer') }}">
                    <div class="parent-icon"><i class="bx bx-group"></i></div>
                    <div class="menu-title">Customer</div>
                </a>
            </li>

            <li class="menu-label">System Manage</li>
            <li>
            <a href="{{ route('admin.system-users') }}">
                    <div class="parent-icon"><i class="bx bx-user"></i></div>
                    <div class="menu-title">User Management</div>
                </a>
            </li>
        </ul>
    </div>
</body>
</html>