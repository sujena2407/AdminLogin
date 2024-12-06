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

<!-- Breadcrumb and Title -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">System Users</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
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
<hr/>

<!-- User List -->
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
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->U_Title }} {{ $user->U_FName }} {{ $user->U_LName }}</td>
                            <td>{{ $user->U_Email }}</td>
                            <td>{{ $user->U_Contact }}</td>
                            <td>{{ $user->U_Designation }}</td>
                            <td>
                                @if($user->U_Type == 0)
                                    <span class="badge bg-success shadow-sm w-100">Super Admin</span>
                                @elseif($user->U_Type == 1)
                                    <span class="badge bg-info shadow-sm w-100">Admin</span>
                                @elseif($user->U_Type == 2)
                                    <span class="badge bg-primary shadow-sm w-100">Sales Admin</span>
                                @elseif($user->U_Type == 3)
                                    <span class="badge bg-danger shadow-sm w-100">Sales Person</span>
                                @elseif($user->U_Type == 4)
                                    <span class="badge bg-warning shadow-sm w-100">Account Person</span>
                                @else
                                    <span class="badge bg-secondary shadow-sm w-100">View Person</span>
                                @endif
                            </td>
                            <td>
                                @if($user->U_Status == 0)
                                    <span class="badge bg-success shadow-sm w-100">Active</span>
                                @else
                                    <span class="badge bg-danger shadow-sm w-100">Deactivate</span>
                                @endif
                            </td>


                            <td><a href="View-System-user.php?view_user="><button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">View & Edit</button></a></td>
							<td><a><button type="button" data-bs-target="#editPasswordModal" data-bs-toggle="modal" class="btn btn-sm btn-secondary btn-rounded waves-effect waves-light" onclick="setUserIdToModal('{{ $user->id }}', '{{ $user->title . ' ' . $user->first_name . ' ' . $user->last_name }}')">Password Reset</button></a></td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                <h5 class="modal-title">Edit User Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="passwordForm" class="needs-validation">
                    @csrf
                    <input type="hidden" id="showUserModelTitle" value="{{ $userId ?? '' }}">
                    <div class="mb-3">
                        <label for="updatePassword2" class="form-label">New Password</label>
                        <input type="password" id="updatePassword2" class="form-control" name="password" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                    </div>
                    <div class="mb-3">
                        <label for="updateCheckPassword2" class="form-label">Confirm Password</label>
                        <input type="password" id="updateCheckPassword2" class="form-control" name="password_confirmation" required>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="updatePasswordButton" class="btn btn-success px-4">Update Password</button>
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="resetPasswordButton" class="btn btn-warning px-4">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

		<script>
			$(document).ready(function() {
			var table = $('#example2').DataTable( {
				buttons: ['excel', 'pdf', 'print'],
				lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
			});

			table.buttons().container()
				.appendTo('#example2_wrapper .col-md-6:eq(0)')
				.addClass('btn-container'); // Add a class to the buttons container
			});
		</script>

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
	</body>
</html>