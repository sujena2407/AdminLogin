<div class="wrapper">
<div class="sidebar-wrapper" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content mm-active" style="padding: 0px;">
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <div>
                <img src="{{ asset('/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <h4 class="logo-text">Quick Track</h4>
            <div class="toggle-icon ms-auto"><i class="bx bx-arrow-back"></i></div>
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
                </a>
                <ul>
                    <li><a href="{{ route('admin.new-sales') }}"><i class="bx bx-radio-circle"></i>Add New Sales</a></li>
                    <li><a href="{{ route('admin.sales') }}"><i class="bx bx-radio-circle"></i>Sales List</a></li>
                </ul>
            </li>

            <li class="menu-label">Payments Management</li>
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
                <ul>
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
                <ul>
                    <li><a href="{{ route('admin.reports.due-collections') }}"><i class="bx bx-radio-circle"></i>Active Due Collections</a></li>
                    <li><a href="{{ route('admin.reports.collections') }}"><i class="bx bx-radio-circle"></i>Active Collections</a></li>
                    <li><a href="{{ route('admin.reports.inactive-due-collections') }}"><i class="bx bx-radio-circle"></i>Inactive Due Collections</a></li>
                    <li><a href="{{ route('admin.reports.inactive-collections') }}"><i class="bx bx-radio-circle"></i>Inactive Collections</a></li>
                </ul>
            </li>
            <li>
            <a href="{{ route('admin.reports.stock') }}">
                    <div class="parent-icon"><i class="bx bx-coin-stack"></i></div>
                    <div class="menu-title">Stock Report</div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports.payments') }}">
                    <div class="parent-icon"><i class="bx bx-coin-stack"></i></div>
                    <div class="menu-title">payments Report</div>
                </a>
            </li>
             <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-coin"></i></div>
                    <div class="menu-title">Sales Report</div>
                </a>
                <ul>
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
                <ul>
                    <li><a href="{{ route('admin.property.company') }}"><i class="bx bx-radio-circle"></i>Company</a></li>
                    <li><a href="{{ route('admin.property.project') }}"><i class="bx bx-radio-circle"></i>Project</a></li>
                </ul>
            </li>

            <li class="menu-label">Customer Management</li>
            <li>
                <a href="{{ route('admin.customer') }}">
                    <div class="parent-icon"><i class="bx bx-group"></i></div>
                    <div class="menu-title">Customer</div>
                </a>
            </li>

            <li class="menu-label">System Management</li>
            <li>
                <a href="{{ route('admin.system-users') }}">
                    <div class="parent-icon"><i class="bx bx-user"></i></div>
                    <div class="menu-title">User Management</div>
                </a>
            </li>
        </ul>
    </div>
</div>
</div></div></div></div>
