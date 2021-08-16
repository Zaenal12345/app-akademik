<!DOCTYPE html>
<html lang="en">

<head>

	<title>Sistem Informasi Akademik UNAS PASIM</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/')?>logo.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets/')?>logo.png" sizes="32x32">
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= base_url()?>assets/template/dist/assets/css/style.css">

	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url()?>assets/toastr-master/build/toastr.css">
	
	<style>
        .fixed-button{
            display: none;
        }
		#card-login{
			transition: .4s;
		}
		#card-login{
			box-shadow: 0 10px 10px rgba(0,0,0,.3);
		}
    </style>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card" id="card-login">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<form id="login-form">
							<img src="<?= base_url()?>assets/logo.png" style="width: 100px;" class="img-fluid mb-4">
							<h4 class="mb-3 f-w-400" style="font-size:14px; font-weight: bold;">Sistem Informasi Akademik Universitas Nasional PASIM</h4>
							<div class="form-group mb-3" style="text-align:left">
								<label class="floating-label" for="NIK">Username</label>
								<input type="text" class="form-control" id="username" name="username">
								<small id="username_error" style="font-size:9px" class="text-danger"></small>
							</div>
							<div class="form-group mb-4" style="text-align:left">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control" id="password" name="password" autocomplete="off">
								<small id="password_error" style="font-size:9px" class="text-danger"></small>
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit">Login</button>
							<!-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
							<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= base_url()?>assets/template/dist/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/ripple.js"></script>
<script src="<?= base_url()?>assets/template/dist/assets/js/pcoded.min.js"></script>

<!-- Pnotify -->
<script src="<?= base_url()?>assets/toastr-master/toastr.js"></script>

<!-- login script with jquery ajax -->
<script>
$(function() {

	// when login form submit
	$('#login-form').submit(function(e) {
		e.preventDefault();
		
		$.ajax({
			url: '<?=base_url()?>auth/login',
			data: $(this).serialize(),
			dataType: 'JSON',
			type: 'POST',
			success:function(res){
				
				if(res.success){
					$('#password,#username').val('');
					toastr.info('Login berhasil',{timeOut: 4000});
					window.location.href="<?= base_url()?>dashboard";    
				}
				
				if(res.error_login){
					toastr.error(res.message,{timeOut: 4000});
					$('#password,#username').val('');
					$('#username_error').html('');
					$('#password_error').html('');
				}

				if(res.error){
				
					if (res.username_error != "") {
						$('#username_error').html(res.username_error);
					} else {
						$('#username_error').html('');
					}

					if (res.password_error != "") {
						$('#password_error').html(res.password_error);
					} else {
						$('#password_error').html('');
					}

				}

			}
		});
	})

});
</script>



</body>

</html>
