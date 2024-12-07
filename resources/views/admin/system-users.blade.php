<!doctype html>
<html lang="en" >
<head>
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
	<title>System Users | Quick Track Admin - Kelsey Developments PLC</title>

</head>

	<body>
		<!--wrapper-->
		<div class="wrapper" id="system-users-class">
			<!--sidebar wrapper -->
			@include('admin.partial.sidebar')

	@include('admin.partial.topbar')
			<!--end header -->
			<!--start page wrapper -->
            <div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">System Users</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Management</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <h6 class="mb-0 text-uppercase">System Users List</h6>
            </div>
            <div class="col-sm-6 text-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
            </div>
        </div>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>

                                <th>Contact</th>
                                <th>Desig</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Password Reset</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->U_Title }} {{ $user->U_FName }} {{ $user->U_LName }}</td>
                                    <td>{{ $user->U_Email }}</td>

                                    <td>{{ $user->U_Contact }}</td>
                                    <td>{{ $user->U_Designation }}</td>
                                    <td>
                                        @switch($user->U_Type)
                                            @case(0)
                                                <span class="badge bg-success">Super Admin</span>
                                                @break
                                            @case(1)
                                                <span class="badge bg-info">Admin</span>
                                                @break
                                            @case(2)
                                                <span class="badge bg-primary">Sales Admin</span>
                                                @break
                                            @case(3)
                                                <span class="badge bg-danger">Sales Person</span>
                                                @break
                                            @case(4)
                                                <span class="badge bg-warning">Account Person</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">View Person</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        @if ($user->U_Status == 0)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Deactivate</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="">
                                            <button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">View & Edit</button>
                                        </a>
                                    </td>
                                    <td><a><button type="button" data-bs-toggle="modal" data-bs-target="#editPasswordModal"
        class="btn btn-sm btn-secondary btn-rounded waves-effect waves-light"
        onclick="setUserIdToModal('{{ $user->id }}', '{{ $user->U_Title . ' ' . $user->U_FName . ' ' . $user->U_LName }}')">
    Password Reset
</button>
</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>

                                <th>Contact</th>
                                <th>Designation</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Password Reset</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Initialize DataTable -->
        <script>
           $(document).ready(function () {
            $('#example2').DataTable({
                dom: 'lBfrtip',
                buttons: ['excel', 'pdf', 'print'], // Export buttons
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]], // Dropdown options
                pageLength: 10
            });
        });

</script>

<!-- Modal for Adding New User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Add System User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
			<div class="row">
			<div class="card-body p-4">
                <form method="POST" action="{{ route('admin.store') }}"  class="row g-3 needs-validation">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <label for="U_Title" class="form-label">Title</label>
                            <select class="form-select" name="U_Title" required>
                                <option selected disabled value="">Choose.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                            <div class="invalid-feedback">Please select a title.</div>
                        </div>
                        <div class="col-md-5">
                            <label for="U_FName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="U_FName" required>
                            <div class="invalid-feedback">Please enter first name.</div>
                        </div>
                        <div class="col-md-5">
                            <label for="U_LName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="U_LName" >
                            <div class="invalid-feedback">Please enter last name.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="U_Email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="U_Email" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="U_Contact" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="U_Contact" required>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="U_Designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" name="U_Designation" required>
                        <div class="invalid-feedback">Please enter the designation.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="U_Type" class="form-label">User Type</label>
                        <select class="form-select" name="U_Type" required>
                            <option value="0">Super Admin</option>
                            <option value="1">Admin</option>
                            <option value="2">Sales Admin</option>
                            <option value="3">Sales Person</option>
                            <option value="4">Account Person</option>
                            <option value="5">View Person</option>
                        </select>
                        <div class="invalid-feedback">Please select the user type.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="U_Password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="U_Password" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="U_Password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="U_Password_confirmation" required>
                        <div class="invalid-feedback">Please confirm the password.</div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success px-4">Add User</button>
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Password Reset -->

<div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPWLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password for <span id="modalUserName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h6 class="form-label" id="showUserModelTitle">User Name</h6>
            <div class="row">
                <div class="card-body p-4">
                <form class="row g-3 needs-validation" novalidate id="passwordForm" method="POST" action="{{ route('admin.updatepassword') }}">
                    @csrf
                    <input type="hidden" id="showUserModelTitle" name="user_id">
                    <div class="col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please Type a password.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <div class="invalid-feedback">
                            Please Re Enter Password.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Reset Password</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setUserIdToModal(userId, userName) {
    document.getElementById('showUserModelTitle').value = userId;
    document.getElementById('modalUserName').innerText = userName;
}
</script>


<script>


   document.addEventListener('DOMContentLoaded', function () {
    const updatePasswordButton = document.getElementById('updatePasswordButton');
    updatePasswordButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent form submission

        const userId = document.getElementById('showUserModelTitle').value;
        const password = document.getElementById('updatePassword2').value;
        const confirmPassword = document.getElementById('updateCheckPassword2').value;

        // Validate passwords match
        if (password !== confirmPassword) {
            Swal.fire('Error', 'Passwords do not match!', 'error');
            return;
        }

        const requestData = {
            user_id: userId,
            password: password,
            password_confirmation: confirmPassword,
        };

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.updatepassword") }}',
                    data: requestData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        Swal.fire('Updated!', response.message, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire('Oops...', xhr.responseJSON?.message || 'Something went wrong!', 'error');
                    },
                });
            }
        });
    });
});

</script>

        <!-- Bootstrap JS -->
		<script src="/js/bootstrap.bundle.min.js"></script>
		<!--plugins-->
		<script src="/js/jquery.min.js"></script>
		<script src="/plugins/simplebar/js/simplebar.min.js"></script>
		<script src="/plugins/metismenu/js/metisMenu.min.js"></script>
		<script src="/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
		<script src="/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
		<script src="/plugins/validation/jquery.validate.min.js"></script>
		<script src="/plugins/validation/validation-script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


		<style>
			/* Add custom styling for the space between buttons and length menu */
			.btn-container {
			margin-top: 10px; /* Adjust this value as needed for the desired spacing */
			}
		</style>

		<script>
			var bsValidation10 = document.getElementById("bsValidation10").value;
			var bsValidation3 = document.getElementById("bsValidation3").value;
			var bsValidation4 = document.getElementById("bsValidation4").value;
			var bsValidation5 = document.getElementById("bsValidation5").value;
			var bsValidation6 = document.getElementById("bsValidation6").value;
			var bsValidation7 = document.getElementById("bsValidation7").value;
			var bsValidation9 = document.getElementById("bsValidation9").value;
			var password = document.getElementById("password").value;
			var checkPassword = document.getElementById("checkPassword").value;

			var getPasswordBox = document.getElementById("password");
			var getCheckPasswordBox = document.getElementById("checkPassword");

			var addUserButton = document.getElementById("addUserButton");

			if (bsValidation10 === '' || bsValidation4 === '' || bsValidation5 === '' || bsValidation6 === '' || bsValidation7 === '' || bsValidation9 === '' || bsValidation3 === '') {
				addUserButton.disabled = true;
				getPasswordBox.disabled = true;
				getCheckPasswordBox.disabled = true;
			}

			function checkInputElementsFilled() {
				var title = document.getElementById("bsValidation10").value;
				var fName = document.getElementById("bsValidation3").value;
				var lName = document.getElementById("bsValidation4").value;
				var email = document.getElementById("bsValidation5").value;
				var contact = document.getElementById("bsValidation6").value;
				var designation = document.getElementById("bsValidation7").value;
				var userType = document.getElementById("bsValidation9").value;
				if(title !== '' && fName !== '' && lName !== '' && email !== '' && contact !== '' && designation !== '' && userType !== '') {
					getPasswordBox.disabled = false;
					getCheckPasswordBox.disabled = false;
				} else {
					getPasswordBox.disabled = true;
					getCheckPasswordBox.disabled = true;
					addUserButton.disabled = true;
				}
			}

			var check = function() {
				var password = document.getElementById('password').value;
				var checkPassword = document.getElementById('checkPassword').value;
				var passwordLength = password.length;
				var validCharacters = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-@$!%*#?&_])[A-Za-z\d-@$!%*#?&_]{8,15}$/;

				if (passwordLength < 8 || passwordLength > 15) {
					document.getElementById('alertPassword').style.color = '#EE2B39';
					document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Password must be between 8 and 15 characters long!</span>';
				} else if (!validCharacters.test(password)) {
					document.getElementById('alertPassword').style.color = '#EE2B39';
					document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Password must contain at least one lowercase letter, one uppercase letter, one number, and one symbol!</span>';
				} else if (password !== checkPassword) {
					document.getElementById('alertPassword').style.color = '#EE2B39';
					document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Passwords do not match!</span>';
				} else {
					document.getElementById('alertPassword').style.color = '#8CC63E';
					document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Password is a match!</span>';
					addUserButton.disabled = false;
				}
			}

			var checkUpdatingPw = function() {
				var password = document.getElementById('updatePassword2').value;
				var checkPassword = document.getElementById('updateCheckPassword2').value;
				var passwordLength = password.length;
				var validCharacters = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/;

				if (passwordLength < 8 || passwordLength > 15) {
					document.getElementById('alertForChangePassword').style.color = '#EE2B39';
					document.getElementById('alertForChangePassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Password must be between 8 and 15 characters long!</span>';
				} else if (!validCharacters.test(password)) {
					document.getElementById('alertForChangePassword').style.color = '#EE2B39';
					document.getElementById('alertForChangePassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Password must contain at least one lowercase letter, one uppercase letter, one number, and one symbol!</span>';
				} else if (password !== checkPassword) {
					document.getElementById('alertForChangePassword').style.color = '#EE2B39';
					document.getElementById('alertForChangePassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i><b>Consideration:</b> Passwords do not match!</span>';
				} else {
					document.getElementById('alertForChangePassword').style.color = '#8CC63E';
					document.getElementById('alertForChangePassword').innerHTML = '<span><i class="fas fa-check-circle"></i> Password is a match!</span>';
				}
			}
		</script>

		<script src="/js/app.js"></script>
        <script src="/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
$(document).ready(function() {
    // Initialize theme based on localStorage
    const theme = localStorage.getItem("theme") || "light"; // Default to light
    setTheme(theme);

    // Theme toggle handler
    $(".dark-mode").on("click", function() {
        const newTheme = $("html").hasClass("light-theme") ? "dark" : "light";
        setTheme(newTheme);
        localStorage.setItem("theme", newTheme); // Save preference
    });

    // Function to apply a theme
    function setTheme(theme) {
        if (theme === "dark") {
            $("html").removeClass("light-theme").addClass("dark-theme");
            $(".dark-mode-icon i").removeClass("bx-moon").addClass("bx-sun");
        } else {
            $("html").removeClass("dark-theme").addClass("light-theme");
            $(".dark-mode-icon i").removeClass("bx-sun").addClass("bx-moon");
        }
    }
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
/* Example themes */
html.light-theme {
    background-color: #ffffff;
    color: #000000;
}

html.dark-theme {
    background-color: #000000;
    color: #ffffff;
}
</style>
	</body>
</html>