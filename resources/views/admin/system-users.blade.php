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
                                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
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
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Add New User</button>
                        </div>
                        </div>

                        <hr/>
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
                                    <a >
                                        <button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">View & Edit</button>
                                    </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#resetPasswordModal" onclick="setUserIdToModal('{{ $user->id }}', '{{ $user->U_Title }} {{ $user->U_FName }} {{ $user->U_LName }}')">
                                            Password Reset
                                        </button>
                                    </td>
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
    </div>
</div>

<script>
    function setUserIdToModal(userId, name) {
        document.getElementById('showUserModelTitle').textContent = name;
        document.getElementById('showUserModelTitle').value = userId;
    }
</script>
                            </div>
                        </div>



                        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="row">
        <div class="card-body p-4">
            <!-- Display Success Message -->
            <div id="response-message"></div>

        <!-- Add User Form -->
        <form action="{{ route('admin.store') }}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
            @csrf <!-- Laravel CSRF Protection -->

                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add System User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="U_Title" class="form-label">Title</label>
                                <select id="U_Title" class="form-select" name="U_Title" required>
                                    <option selected disabled value="">Choose.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Miss.">Miss.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Dr.">Dr.</option>
                                </select>
                                @error('U_Title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="U_FName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="U_FName" placeholder="First Name" name="U_FName" required>
                                @error('U_FName')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="U_LName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="U_LName" placeholder="Last Name" name="U_LName" required>
                                @error('U_LName')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class ="row">
                        <div class="col-md-6">
                            <label for="U_Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="U_Email" placeholder="Email" name="U_Email" required>
                            @error('U_Email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="bsValidation6" class="form-label">Contact No</label>
                            <input type="number" class="form-control" id="bsValidation6" placeholder="Contact No" name="U_Contact" required>
                            @error('U_Contact')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       </div>
                       <br>


                    <div class ="row">
                        <div class="col-md-6">
                            <label for="U_Designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="U_Designation" placeholder="Designation" name="U_Designation" required>
                            @error('U_Designation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="U_Type" class="form-label">User Type</label>
                            <select id="U_Type" class="form-select" name="U_Type" required>
                            <option selected disabled value="">Choose.</option>


                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>

                            <option value="2">Sales Admin</option>
                            <option value="3">Sales Person</option>
                            <option value="4">Account Person</option>
                            <option value="5">View Person</option>
                        </select>
                            @error('U_Type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     </div>
                     <br>

                    <div class = "row">
                        <div class="col-md-6">
                            <label for="U_Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="U_Password" placeholder="Enter Password" name="U_Password" required>
                            @error('U_Password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="U_Password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="U_Password_confirmation" placeholder="Re-Enter Password" name="U_Password_confirmation" required>
                        </div>
                    </div>
                    <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success px-4">Add User</button>
                            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

<script>
			function updatePassword() {
				var getUserId = document.getElementById('showUserModelTitle').value;
				var getCheckPW = document.getElementById('updateCheckPassword2').value;
				var getPW = document.getElementById('updatePassword2').value;

				var jSonData = {
					update_password: true,
					user_id: getUserId,
					password: getPW
				}

				Swal.fire({
					title: "Are you sure?",
					text: "You want to update this!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Yes, update it!"
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								type: 'GET',
								url: 'PHP/Write/update-user-password-script.php',
								data: jSonData,
								success: function(data1) {
									if (result.isConfirmed) {
										Swal.fire({
											title: "Updated!",
											text: "Your password has been updated.",
											icon: "success"
										}).then((result) => {
											location.reload();
										});
									}
								},
								error: function(xhr, status, error) {
									Swal.fire({
										icon: "error",
										title: "Oops...",
										text: "Something went wrong!",
										}).then((result) => {
											location.reload();
										});
								}
							})
						}
				});
			}

			document.addEventListener('DOMContentLoaded', function() {
			var updatePasswordButton = document.getElementById('updatePasswordButton');
				updatePasswordButton.addEventListener('click', function() {
					updatePassword();
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
	function checkInputElementsFilled() {
    // Assuming your form inputs have specific IDs
    var title = document.getElementById("inputTitle").value;
    var firstName = document.getElementById("inputFirstName").value;
    var lastName = document.getElementById("inputLastName").value;
    var email = document.getElementById("inputEmail").value;
    var contact = document.getElementById("inputContact").value;
    var designation = document.getElementById("inputDesignation").value;
    var userType = document.getElementById("inputUserType").value;
    var password = document.getElementById("inputPassword").value;
    var checkPassword = document.getElementById("inputCheckPassword").value;

    // Elements to disable when conditions are not met
    var passwordBox = document.getElementById("inputPassword");
    var checkPasswordBox = document.getElementById("inputCheckPassword");
    var addUserButton = document.getElementById("addUserButton");

    // Disable 'Add User' and password fields if any required field is empty
    if (title === '' || firstName === '' || lastName === '' || email === '' || contact === '' || designation === '' || userType === '') {
        addUserButton.disabled = true;
        passwordBox.disabled = true;
        checkPasswordBox.disabled = true;
    }
}

    // Check if all required fields are filled to enable password fields
    function checkInputElementsFilled() {
        title = document.getElementById("inputTitle").value;
        firstName = document.getElementById("inputFirstName").value;
        lastName = document.getElementById("inputLastName").value;
        email = document.getElementById("inputEmail").value;
        contact = document.getElementById("inputContact").value;
        designation = document.getElementById("inputDesignation").value;
        userType = document.getElementById("inputUserType").value;

        if (title !== '' && firstName !== '' && lastName !== '' && email !== '' && contact !== '' && designation !== '' && userType !== '') {
            passwordBox.disabled = false;
            checkPasswordBox.disabled = false;
        } else {
            passwordBox.disabled = true;
            checkPasswordBox.disabled = true;
            addUserButton.disabled = true;
        }
    }

    // Password validation function
    var checkPasswordStrength = function() {
        password = document.getElementById('inputPassword').value;
        checkPassword = document.getElementById('inputCheckPassword').value;
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
            document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i> Password is a match!</span>';
            addUserButton.disabled = false;
        }
    }

    // Password validation for updating password
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
	</body>
</html>