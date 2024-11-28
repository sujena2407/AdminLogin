<div class="sidebar-wrapper" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content mm-active" style="padding: 0px;">
  <div class="sidebar-header">
    <div>
      <img src="/images/logo-icon.png" class="logo-icon" alt="logo icon">

    </div>
    <div>

    <h4 class="logo-text">Quick Track</h4></div>
    <div class="toggle-icon ms-auto"><i class="bx bx-arrow-back"></i>
    </div>
   </div>
  <!--navigation-->
  <ul class="metismenu mm-show" id="menu">
    <li class="">
    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
    </li>

    <li class="menu-label">Sales Management</li>

    <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-money'></i>
						</div>
						<div class="menu-title">Sales</div>
					</a>
					<ul>

						</li>
						<li> <a href="sales.php"><i class='bx bx-radio-circle'></i>Sales List</a></li>
					</ul>
			</li>

    <li class="menu-label">Sales payments Management</li>

    <li>
      <a href="payments.php">
        <div class="parent-icon"><i class='bx bx-credit-card-front'></i>
        </div>
        <div class="menu-title">Payments</div>
      </a>
    </li>


    <li class="menu-label">Refund Management</li>

    <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-undo'></i>
						</div>
						<div class="menu-title">Refund</div>
					</a>
					<ul>
	           <li> <a href="refund_sales.php"><i class='bx bx-radio-circle'></i>Refund List</a></li>
             <li> <a href="refund_payments.php"><i class='bx bx-radio-circle'></i>Refund Payments</a></li>

					</ul>
			</li>


    <li class="menu-label">Reports</li>

    <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-analyse'></i>
						</div>
						<div class="menu-title">Collections Report</div>
					</a>
					<ul>
            <li> <a href="due_collections_report.php"><i class='bx bx-radio-circle'></i>Active Due Collections</a>
						</li>
            <li> <a href="collections_report.php"><i class='bx bx-radio-circle'></i>Active Collections</a>
						</li>
            <li> <a href="inactive_due_collections_report.php"><i class='bx bx-radio-circle'></i>Inactive Due Collections</a>
						</li>
            <li> <a href="inactive_collections_report.php"><i class='bx bx-radio-circle'></i>Inactive Collections</a>
						</li>
					</ul>
				</li>

        <li>
					<a href="stock_report.php">
						<div class="parent-icon"><i class='bx bx-coin-stack'></i>
						</div>
						<div class="menu-title">Stock Report</div>
					</a>
				</li>

        <li>
					<a href="payments_report.php">
						<div class="parent-icon"><i class='bx bx-coin-stack'></i>
						</div>
						<div class="menu-title">Payments Report</div>
					</a>
				</li>

        <li>
          <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-coin'></i>
						</div>
						<div class="menu-title">Sales Report</div>
					</a>
					<ul>
						<li>
              <a href="sales_summery_report.php"><i class='bx bx-radio-circle'></i>All Sales Summery</a>
						</li>
            <li>
              <a href="sales_summery_report.php?active_status=1"><i class='bx bx-radio-circle'></i>Active Sales Summery</a>
						</li>
            <li>
              <a href="sales_summery_report.php?active_status=0"><i class='bx bx-radio-circle'></i>Inactive Sales Summery</a>
						</li>
						<li>
              <a href="monthly_sales_summery_report.php"><i class='bx bx-radio-circle'></i>Monthly Sales Summery</a>
						</li>

            <li>
              <a href="customer_report.php"><i class='bx bx-radio-circle'></i>Customer List</a>
						</li>

						</li>
					</ul>
				</li> </ul>
</div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 899px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 457px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>