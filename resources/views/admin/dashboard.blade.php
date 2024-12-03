<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Quik Track Admin - Kelsey Developments PLC</title>
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/feather/feather.css">
	<link href="/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<link href="/css/pace.min.css" rel="stylesheet"/>
	<script src="/js/pace.min.js"></script>
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fstdropdown.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/header-colors.css') }}"/>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
</head>
<body class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<!--wrapper-->

	@include('admin.partial.sidebar')

	@include('admin.partial.topbar')
            <!-- partial -->
        <div class="page-wrapper">
            <div class="page-content">
				<div class="d-flex justify-content-end mb-3">
					<div class="btn-group">
						<button type="button" id="selectCompanyButton" class="btn btn-outline-primary">Overall</button>
						<button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">

						</button>
						<ul class="dropdown-menu dropdown-menu-end">
															<li><a class="dropdown-item" onclick="updateButtonText(this, 1)">Kelsey Homes (Central Park) (Pvt) Ltd.</a></li>
															<li><a class="dropdown-item" onclick="updateButtonText(this, 2)">Blue Ocean Residencies (PVT) LTD.</a></li>
															<li><a class="dropdown-item" onclick="updateButtonText(this, 3)">Tilko Blue Ocean Holdings (PVT) Ltd.</a></li>
														<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" onclick="updateButtonText(this, 0)">Overall</a></li>
						</ul>
					</div>
				</div>

				<script>
					function updateButtonText(element, companyId) {
						window.location.href = 'dashboard.php?companyId='+companyId;
					}
				</script>

				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">This Month Total Sales</p>

									<h4 class="my-1 text-info">1</h4>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class="bx bxs-cart"></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-primary">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">This Month Total Revenue</p>
									<h4 class="my-1 text-primary">7,500,000.00</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-cosmic  text-white ms-auto"><i class="bx bxs-wallet"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								    <p class="mb-0 text-secondary">This Month Total Collections</p>
									<h4 class="my-1 text-success">19,772,284.36</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-bar-chart-alt-2"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">To be Collect in This Month</p>
									<h4 class="my-1 text-warning">119,402,138.11</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class="bx bxs-bar-chart-alt-2"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				</div>

				<div class="row">
    				<div class="col-12 col-lg-3 d-flex">
        				<div class="card radius-10 w-100">
            				<div class="card-body">
                				<div class="row gy-3">
                    				<div class="col-md-8">
                        				<p style="margin-bottom:0px;"><strong style="color:#b91515;">519 Overdues by 2024-11-27 </strong></p>
                        				<p style="margin-bottom:0px;"><b>449,761,617.00</b></p>
                    				</div>
                    				<div class="col-md-4 text-end d-grid">
                        				<a href="due_collections_report.php?getDueCollectionsFilterValues=true&amp;startDate=&amp;endDate=&amp;formSelectedCompany=0&amp;formSelectedProject=Select%20Project&amp;formSelectedUnit=Select%20Unit&amp;formSalesPersonSelect=Select%20Sales%20Person&amp;formHandlingPersonSelect="><button type="button" class="btn btn-danger">Read</button></a>
                    				</div>
                				</div>
            				</div>
						</div>
    				</div>

    				<!-- Column 2 -->
    				<div class="col-12 col-lg-3 d-flex">
        				<div class="card radius-10 w-100">
            				<div class="card-body">
                				<div class="row gy-3">
                    				<div class="col-md-8">

                        				<p style="margin-bottom:0px;"><strong class="text-success">150 Dues by 2024-12-27 </strong></p>
                        				<p style="margin-bottom:0px;"><b>98,988,415.80</b></p>
                    				</div>
                    				<div class="col-md-4 text-end d-grid">
                        				<a href="next_month_collections_report.php?getDueCollectionsFilterValues=true&amp;startDate=&amp;endDate=&amp;formSelectedCompany=0&amp;formSelectedProject=Select%20Project&amp;formSelectedUnit=Select%20Unit&amp;formSalesPersonSelect=Select%20Sales%20Person&amp;formHandlingPersonSelect="><button type="button" class="btn btn-success">Read</button></a>
                    				</div>
                				</div>
            				</div>
        				</div>
    				</div>
                    <div class="col-12 col-lg-6 d-flex">
        				<div class="card radius-10 w-100">
            				<div class="card-body">
                				<!-- Form for Customer Sale -->
                				<form action="view_sales.php" method="get" id="searchform">
                    				<div class="row gy-3">
                        				<div class="col-md-9">
                            				<select class='fstdropdown-select' id="first" name="selected_option">
                                				<option value="">Select for Customer Sale</option>

                                				<option value="">
                                				</option>

                            				</select>
                        				</div>
                        				<div class="col-md-3 text-end d-grid">
                            				<input type="hidden" name="sale_id" id="sale_id">
                            				<button type="button" onclick="searchSales()" class="btn btn-primary">Search</button>
                        				</div>
                    				</div>
                				</form>
                				<script>
                    				// Function to set the selected sale ID and submit the form
                    				function searchSales() {
                        				var selectedSaleId = document.querySelector('select[name="selected_option"]').value;
                        				if (selectedSaleId !== '') {
                            				document.getElementById('sale_id').value = selectedSaleId;
                            				document.getElementById('searchform').submit();
                        				}
                    				}
                				</script>
            				</div>
        				</div>
    				</div>
    				<!-- Column 3 -->

				</div>

				<div class="row">
					<div class="col-12 col-lg-8 d-flex">
						<div class="card radius-10 w-100">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Sales Overview - 2024</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
									<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Revenue</span>
									<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Collections</span>
								</div>
								<div class="chart-container-1">
									<canvas id="chart1" width="640" height="520" style="display: block; box-sizing: border-box; height: 260px; width: 320px;"></canvas>
								</div>
							</div>
							<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
								<div class="col">
									<div class="p-3">
										<h5 class="mb-0">1,026,950,000.00</h5>
										<small class="mb-0">Total Sales - 2024</small>
									</div>
								</div>

								<div class="col">
									<div class="p-3">
									    <h5 class="mb-0">490,715,616.25</h5>
										<small class="mb-0">Total Collections - 2024</small>
									</div>
								</div>

								<div class="col">
							  		<div class="p-3">
										<h5 class="mb-0">33</h5>
										<small class="mb-0">Sales Count - 2024</small>
							  		</div>
								</div>
							</div>
					  	</div>
					</div>

					<div class="col-12 col-lg-4 d-flex">
						<div class="card radius-10 w-100">
							<div class="card-header">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Top Sales &amp; Collection Performing</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="chart-container-2">
								<canvas id="myChart" width="640" height="440" style="display: block; box-sizing: border-box; height: 220px; width: 320px;"></canvas>
									<input type="hidden" id="hiddenCompanyId" value="0">
							  	</div>
						   	</div>
						   	<ul class="list-group list-group-flush" id="topUsersList">
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Sameera Wijenayake<span class="badge rounded-pill" style="background-color: rgb(252, 74, 26);">807,470,000</span></li><li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Kevin kk<span class="badge rounded-pill" style="background-color: rgb(71, 118, 230);">460,667,524</span></li><li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Mahasen Lankeshwara<span class="badge rounded-pill" style="background-color: rgb(238, 9, 121);">439,100,000</span></li><li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Ram Ram<span class="badge rounded-pill" style="background-color: rgb(66, 230, 149);">317,924,134</span></li></ul>
						</div>
					</div>
				</div>
			</div>

            </div>

        <div class="overlay toggle-icon"></div>
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
	<script src="/js/jquery.min.js"></script>
	<script src="/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/plugins/chartjs/js/chart.js"></script>
	<script src="/select/fstdropdown.js"></script>
	<script src="/js/app.js"></script>
    <script>
		var companyId = document.getElementById('hiddenCompanyId').value;
		$.ajax({
			url: "chart1_fetch_data.php",
			type: "GET",
			data: { company_id: companyId },
			success: function (data) {
				var data = JSON.parse(data);

					var labels = [];
					var totalSalesRevenueData = [];
					var totalCollectionData = [];

					for (var i = 0; i < data.length; i++) {
						var monthData = data[i];
						labels.push(monthData.month);
						totalSalesRevenueData.push(monthData.totalSalesRevenue);
						totalCollectionData.push(monthData.totalCollection);
					}

					var ctx = document.getElementById("chart1").getContext('2d');

					var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke1.addColorStop(0, '#6078ea');
					gradientStroke1.addColorStop(1, '#17c5ea');

					var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
					gradientStroke2.addColorStop(0, '#ff8359');
					gradientStroke2.addColorStop(1, '#ffdf40');

					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

							datasets: [{
								label: 'Total Sales Revenue',
								data: totalSalesRevenueData,
								borderColor: gradientStroke1,
								backgroundColor: gradientStroke1,
								hoverBackgroundColor: gradientStroke1,
								pointRadius: 0,
								fill: false,
								borderRadius: 20,
								borderWidth: 0
							}, {
								label: 'Total Collection',
								data: totalCollectionData,
								borderColor: gradientStroke2,
								backgroundColor: gradientStroke2,
								hoverBackgroundColor: gradientStroke2,
								pointRadius: 0,
								fill: false,
								borderRadius: 20,
								borderWidth: 0
							}]
						},

						options: {
							maintainAspectRatio: false,
							barPercentage: 0.5,
							categoryPercentage: 0.8,
							plugins: {
								legend: {
									display: false,
								}
							},
							scales: {
								y: {
									beginAtZero: true
								}
							}
						}
					});
				},
			error: function (xhr, status, error) {
				console.error("AJAX error:", status, error);
			}
		});
	</script>

	<script>
		var companyId = document.getElementById('hiddenCompanyId').value;
		$.ajax({
			url: "chart2_fetch_data.php",
			type: "GET",
			data: { company_id: companyId },
			success: function (data) {
				// Check if data is already an object
				if (typeof data === 'object') {
					var parsedData = data;
				} else {
					try {
						// Try parsing the data as JSON
						var parsedData = JSON.parse(data);
					} catch (e) {
						console.error("Failed to parse data:", e);
						return;
					}
				}
					var names = [];
					var saleValues = [];
					var userList = document.getElementById('topUsersList');

					var barColors = ['#fc4a1a', '#4776e6', '#ee0979', '#42e695'];

					for (var i = 0; i < parsedData.length; i++) {
						names.push(parsedData[i].name);
						saleValues.push(parsedData[i].totalSales);

						var formattedAmount = saleValues[i].toLocaleString('en-US', { style: 'currency', currency: 'USD' });

						var listItem = document.createElement('li');
						listItem.classList.add('list-group-item', 'd-flex', 'bg-transparent', 'justify-content-between', 'align-items-center', 'border-top');

						var userBadge = document.createElement('span');
						userBadge.classList.add('badge', 'rounded-pill');
						userBadge.style.backgroundColor = barColors[i];
						userBadge.innerText = parseFloat(saleValues[i]).toLocaleString();
						// userBadge.innerText = parseFloat(saleValues[i]).toFixed(2);

						listItem.innerText = names[i];
						listItem.appendChild(userBadge);
						userList.appendChild(listItem);
					}

					new Chart("myChart", {
						type: "doughnut",
						data: {
							labels: names,
							datasets: [{
							backgroundColor: barColors,
							data: saleValues,
							borderWidth: 1
							}]
						},
						options: {
							maintainAspectRatio: false,
							plugins: {
								legend: {
									display: false
								}
							},
							cutout: 82
						}
					});
				},
			error: function (xhr, status, error) {
				console.error("AJAX error:", status, error);
			}
		});
	</script>

	<script>
		new PerfectScrollbar(".app-container")
	</script>

    <script>
        function setDrop() {
            if (!document.getElementById('third').classList.contains("fstdropdown-select"))
                document.getElementById('third').className = 'fstdropdown-select';
            setFstDropdown();
        }
        setFstDropdown();
        function removeDrop() {
            if (document.getElementById('third').classList.contains("fstdropdown-select")) {
                document.getElementById('third').classList.remove('fstdropdown-select');
                document.getElementById("third").fstdropdown.dd.remove();
                document.querySelector("#third~.fstdiv").remove();
            }
        }
        function addOptions(add) {
            var select = document.getElementById("fourth");
            for (var i = 0; i < add; i++) {
                var opt = document.createElement("option");
                var o = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                var last = o == undefined ? 1 : Number(o.value) + 1;
                opt.text = opt.value = last;
                select.add(opt);
            }
        }
        function removeOptions(remove) {
            for (var i = 0; i < remove; i++) {
                var last = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
                if (last == undefined)
                    break;
                Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0].remove();
            }
        }
        function updateDrop() {
            document.getElementById("fourth").fstdropdown.rebind();
        }
    </script>

<script>
$(document).ready(function () {
    // Handle sidebar toggle (collapse/expand)
    $('#toggle-sidebar').on('click', function () {
        $('#sidebar').toggleClass('collapsed'); // Toggle the collapse/expand state of the sidebar

        // When the sidebar is collapsed
        if ($('#sidebar').hasClass('collapsed')) {
            $('.submenu').slideUp();  // Hide all submenus when collapsed
            $('.logo-text').hide();   // Hide logo text
            $('.bx-arrow-back').hide(); // Hide back arrow
            $('.menu-label').hide();  // Hide menu labels
            $('.toggle-arrow').removeClass('bx-rotate-180');  // Reset rotation on collapse
        } else {
            $('.logo-text').fadeIn(); // Show logo text when expanded
            $('.bx-arrow-back').show();  // Show back arrow
            $('.menu-label').fadeIn();   // Show menu labels

            // Show all submenus and rotate all arrows when expanded
            $('.submenu').stop(true, true).slideDown(); // Slide all submenus down
            $('.toggle-arrow').addClass('bx-rotate-180'); // Rotate all arrows
        }
    });

    // Handle submenu toggle when sidebar is not collapsed
    $('.has-arrow').on('click', function (e) {
        e.preventDefault();
        if (!$('#sidebar').hasClass('collapsed')) {
            var submenu = $(this).closest('li').find('.submenu');
            submenu.stop(true, true).slideToggle(); // Toggle submenu visibility with a smooth transition

            // Toggle the rotation of the clicked arrow
            $(this).find('.toggle-arrow').toggleClass('bx-rotate-180');
        }
    });

    // Expand sidebar when mouse enters the sidebar area
    $('#sidebar').on('mouseenter', function () {
        if ($('#sidebar').hasClass('collapsed')) {
            $('#sidebar').removeClass('collapsed'); // Expand sidebar
        }
    });

    // Collapse sidebar when mouse leaves the sidebar area
    $('#sidebar').on('mouseleave', function () {
        if (!$('#sidebar').hasClass('collapsed')) {
            $('#sidebar').addClass('collapsed'); // Collapse sidebar
        }
    });
});

</script>
</body>

</html>