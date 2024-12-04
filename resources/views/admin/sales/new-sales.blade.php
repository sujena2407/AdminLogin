<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon -->
<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" />

<!-- Plugins -->
<link href="{{ asset('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

<!-- Loader -->
<link href="{{ asset('css/pace.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/pace.min.js') }}"></script>

<!-- Bootstrap CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/icons.css') }}" rel="stylesheet">

<!-- Theme Style CSS -->
<link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}" />
<link rel="stylesheet" href="{{ asset('css/semi-dark.css') }}" />
<link rel="stylesheet" href="{{ asset('css/header-colors.css') }}" />

<title>New Sales | Quick Track Admin - Kelsey Developments PLC</title>

</head>
<body>
<div class="wrapper">
    @include('admin.partial.sidebar')
    @include('admin.partial.topbar')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">New Sales</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Sales</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h6 class="mb-0 text-uppercase">New Sales</h6>
                </div>
            </div>

            <hr/>

            <div class="card">
              <div class="card-body">
                <div class="form-body mt-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="p-4">
                        <h5 class="mb-4">Add New Sales</h5> <br/>
                        <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="firstowner" class="form-label">Select First Owner</label>
                              <select class="form-select" id="firstowner" required name="Customer_id">
                                <option selected disabled value>Select</option>
                                <option>Customer 1</option>
                                <option>Customer 2</option>
                                <option>Customer 3</option>
                              </select>
                            </div>

                            <div class="col-md-6">
                              <label for="secondowner" class="form-label">Select Second Owner</label>
                              <select class="form-select" id="secondowner" disabled name="Customer_idS">
                                <option selected disabled value>Select</option>
                                <option>Customer 1</option>
                                <option>Customer 2</option>
                                <option>Customer 3</option>
                              </select>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="project-select" class="form-label">Select Project</label>
                            <select class="form-select" id="project-select" required name="project_id">
                              <option selected disabled value>Select</option>
                              <option>Project 1</option>
                              <option>Project 2</option>
                              <option>Project 3</option>
                              <option>Project 4</option>
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="project-unit-select" class="form-label">Select Project Unit</label>
                            <select class="form-select" id="project-unit-select" required name="unit_id">
                              <option selected disabled value>Select</option>
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="sale_date" class="form-label">Sale Date</label>
                            <input type="date" class="form-control" id="sale_date" name="sale_date" required>
                          </div>

                          <div class="row">
                            <div class="col-md-3">
                              <label for="unit-price" class="form-label">Unit Price (LKR)</label>
                              <input type="text" class="form-control" id="unit-price" name="sale_unit_price" placeholder="00.00" readonly>
                            </div>

                            <div class="col-md-3">
                              <label for="inputDiscount" class="form-label">Discount (LKR)</label>
                              <input type="text" class="form-control" id="inputDiscount" placeholder="00.00" oninput="calculateDiscount()" name="sale_unit_discount_price">
                            </div>

                            <div class="col-md-3">
                              <label for="inputDiscountpercentage" class="form-label">Discount (%)</label>
                              <input type="text" class="form-control" id="inputDiscountpercentage" placeholder="00.0" readonly name="sale_unit_discount_price_presentage">
                            </div>

                            <div class="col-md-3">
                              <label for="inputSellingPrice" class="form-label">Selling Price (LKR)</label>
                              <input type="text" class="form-control" id="inputSellingPrice" placeholder="00.00" readonly name="selling_price">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <label for="sales-person" class="form-label">Sales Person</label>
                            <select class="form-select" id="sales-person" required name="sale_by">
                              <option selected disabled value>Select</option>
                              <option>Sales Person 1</option>
                              <option>Sales Person 2</option>
                              <option>Sales Person 3</option>
                              <option>Sales Person 4</option>
                            </select>
                          </div>

                          <div class="col-sm-12">
                          <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('admin.sales.store') }}" enctype="multipart/form-data">
                              @csrf
                              <!-- Form fields go here -->
                              <button type="submit" class="btn btn-primary btn-block" name="add_sales">Next</button>
                          </form>

                          </div>
                        </form>
                      </div>
                    </div>
                  </div><!--end row-->
                </div>
              </div>
            </div><!--end card-->
          </div><!--end page content-->
        </div><!--end page-wrapper-->
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
<script src="{{ asset('/js/app.js') }}"></script>

<script>
    // Enable second owner dropdown when first owner is selected
    $('#firstowner').on('change', function () {
        var selectedValue = $(this).val();
        $('#secondowner').prop('disabled', false);
        $('#secondowner option[value="' + selectedValue + '"]').prop('disabled', true);
    });

    // Fetch Project Units dynamically based on selected Project
    $('#project-select').on('change', function () {
        var selectedProject = $(this).val();
        var units = {
            "Project 1": ["Unit 1", "Unit 2", "Unit 3"],
            "Project 2": ["Unit 4", "Unit 5", "Unit 6"],
            "Project 3": ["Unit 7", "Unit 8", "Unit 9"],
            "Project 4": ["Unit 10", "Unit 11", "Unit 12"]
        };

        var unitOptions = units[selectedProject] || [];
        var unitSelect = $('#project-unit-select');
        unitSelect.empty();
        unitSelect.append('<option selected disabled value>Select</option>');

        unitOptions.forEach(function(unit) {
            unitSelect.append('<option>' + unit + '</option>');
        });
    });

    // Calculate Discount and Selling Price
    function calculateDiscount() {
        const unitPrice = parseFloat(document.getElementById("unit-price").value) || 0;
        const discountLKR = parseFloat(document.getElementById("inputDiscount").value) || 0;
        const discountPercentage = ((discountLKR / unitPrice) * 100).toFixed(1);
        const sellingPrice = (unitPrice - discountLKR).toFixed(2);

        document.getElementById("inputDiscountpercentage").value = discountPercentage;
        document.getElementById("inputSellingPrice").value = sellingPrice;
    }
</script>
<script>
$(document).ready(function () {
    // Handle sidebar toggle (collapse/expand)
    $('#toggle-sidebar').on('click', function () {
        $('#sidebar').toggleClass('collapsed');
        $('#sidebar').data('collapsed-once', $('#sidebar').hasClass('collapsed'));

        if ($('#sidebar').hasClass('collapsed')) {
            $('.submenu').slideUp();
            $('.menu-label').hide();
            $('.logo-text').hide();
            $('.bx-arrow-back').hide();
            $('.toggle-arrow').removeClass('bx-rotate-180');
        } else {
            $('.logo-text').fadeIn();
            $('.bx-arrow-back').fadeIn();
            $('.menu-label').fadeIn();
        }
    });

    // Handle submenu toggle when sidebar is not collapsed
    $('.has-arrow').on('click', function (e) {
        e.preventDefault();
        if (!$('#sidebar').hasClass('collapsed')) {
            var submenu = $(this).closest('li').find('.submenu');
            submenu.stop(true, true).slideToggle();
            $(this).find('.toggle-arrow').toggleClass('bx-rotate-180');
        }
    });

    // Expand sidebar when mouse enters the sidebar area
    $('#sidebar').on('mouseenter', function () {
        if ($('#sidebar').hasClass('collapsed')) {
            $('#sidebar').removeClass('collapsed');
            $('.menu-label').fadeIn();
        }
    });

    // Collapse sidebar when mouse leaves the sidebar area
    $('#sidebar').on('mouseleave', function () {
        if ($('#sidebar').data('collapsed-once')) {
            $('#sidebar').addClass('collapsed');
            $('.menu-label').fadeOut();
        }
    });
});


</script>
</body>
</html>
