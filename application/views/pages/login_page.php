<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">

    <link rel="icon" type="image/png" href="<?= base_url('assets/')?>logo.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= base_url('assets/')?>logo.png" sizes="32x32">


    <title>Sistem Informasi Akademik UNAS PASIM</title>



    <!-- // PLUGINS (css files) // -->

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="<?= base_url()?>assets/login_page/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">

    <link href="<?= base_url()?>assets/login_page/assets/css/main.css" rel="stylesheet">
    <style>
        #home{
            background: url('<?= base_url()?>assets/bg_fix2.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat; 
        }
        .btn-blue {
            background: #4680ff;
            padding: 10px 28px;
            border: 2px solid #4680ff;
            color: #fff;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 0.08em;
            -webkit-transition: 0.5s all;
                    transition: 0.5s all;
            box-shadow: 0px 0px;
            /* outline: none !important;  */
        }
        footer {
        background: #4680ff ;
        color: #fff;
        padding: 20px 0; }
        footer hr {
            margin: 40px 0; }
        footer img {
            width: 50px; }
        footer ul {
            padding: 0; }
        footer li {
            display: inline-block; }
            footer li a {
            font-size: 20px;
            padding: 12px;
            color: #fff;
            -webkit-transition: 0.4s;
                    transition: 0.4s; }
            footer li a:hover,
            footer li a:focus,
            footer li a:active {
            color: #496174; }
        .dropdown-backdrop{
            z-index: -1 !important;
        }
        .btn-blue{
            border-color: #ff5252 !important;
        }
        .btn-blue:click{
            color: white !important;
        }
        .btn-blue:hover{
            color: white !important;
        }
    </style>

</head>



<body>



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>

    <!--======================================== 

           Header

    ========================================-->


    <!--//** Navigation**//-->

    <!-- <nav class="navbar navbar-default navbar-fixed no-background bootsnav"> -->

        <!-- <div class="container"> -->

            <!-- Start Header Navigation -->

            <!-- <div class="navbar-header" style="background: transparent">
                <a class="navbar-brand" href="#brand">
                    <img src="<?= base_url()?>assets/logo2.png" class="logo" alt="logo" style="width:100px">
                </a>
            </div>
            <p style="margin-top:105px; margin-left:-55px; color:white">Universitas Nasional PASIM</p> -->

            <!-- End Header Navigation -->

        <!-- </div> -->

    <!-- </nav> -->
    

    <!--//** Banner**//-->

    <section id="home">

        <div class="container">     

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>Sistem Informasi Akademik Universitas Nasional PASIM</h1>

                    <h2>

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p>To make world class quality of human resources development in global era of information system.</p>


                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form id="login-form" class="signup-form">

                        <div class="alert alert-danger text-center" style="display:none"></div>

                        <h2 class="text-center">Login</h2>

                        <hr>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="User Name" id="username" name="username" autofocus="on">
                            <small id="username_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                            <small id="password_error" class="text-danger"></small>
                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block" style="background-color: #ff5252 !important;">Log In</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <!--======================================== 

           Footer

    ========================================-->



    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <h6 class="text-center">SIAKAD Universitas Nasional PASIM, &copy;2021 All rights reserved</h6>

                </div>

            </div>

        </div>

    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="<?= base_url()?>assets/login_page/assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.js"></script>

    <script src="<?= base_url()?>assets/login_page/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="<?= base_url()?>assets/login_page/assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="<?= base_url()?>assets/login_page/assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="<?= base_url()?>assets/login_page/assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="<?= base_url()?>assets/login_page/assets/js/main.js"></script>

</body>

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
					window.location.href="<?= base_url()?>dashboard";    
				}
				
				if(res.error_login){
					$('.alert').html(res.message).fadeIn();
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

    $(".animated-text").typed({
        strings: [
            "The best curriculum",
            "The best lectures",
            "The best fasilities",
        ],
        typeSpeed: 40,
        loop: true,
    });

});


</script>



</html>