<!DOCTYPE html>
<html lang="en">

<head>
	<title>CRM Pakan Ternak</title>
	<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Tracer study" />
	<meta name="keywords" content="SMKN 1 talang padang" />
	<meta name="author" content="Tapisdev" />
	<!-- Favicon icon -->

	<link rel="icon" href="<?php echo base_url();  ?>asset/assets/images/favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url();  ?>asset/bower_components/bootstrap/css/bootstrap.min.css">
	<!-- waves.css -->
	<link rel="stylesheet" href="<?php echo base_url();  ?>asset/assets/pages/waves/css/waves.min.css" type="text/css"
		media="all"><!-- feather icon -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/feather/css/feather.css">
	<!-- themify-icons line icon -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url();  ?>asset/assets/icon/themify-icons/themify-icons.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/icofont/css/icofont.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url();  ?>asset/assets/icon/font-awesome/css/font-awesome.min.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/pages.css">
    <!--  sweet alert-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/sweetalert/css/sweetalert.css">
	
	

</head>

<body themebg-pattern="theme1">
	<!-- Pre-loader start -->
	<div class="theme-loader">
		<div class="loader-track">
			<div class="preloader-wrapper">
				<div class="spinner-layer spinner-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
				<div class="spinner-layer spinner-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-yellow">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-green">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pre-loader end -->

	<section class="login-block">
		<!-- Container-fluid starts -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- Authentication card start -->

					<form id="form_login" method="post" action="<?php echo base_url();?>Login/cekLoginAdmin" enctype="multipart"
						class="md-float-material form-material">
						<div class="text-center">
							<img src="<?php echo base_url();  ?>asset/assets/images/logo_crm.png" alt="logo.png">
						</div>
						<div class="auth-box card">
							<div class="card-block">
								<div class="row m-b-20">
									<div class="col-md-12">
										<h2 class="text-center">Login Pelanggan</h2>
									</div>
								</div>
								<div class="form-group form-primary">
									<input type="text" name="username" class="form-control" required="">
									<span class="form-bar"></span>
									<label class="float-label">Username</label>
								</div>
								<div class="form-group form-primary">
									<input type="password" name="password" class="form-control" required="">
									<span class="form-bar"></span>
									<label class="float-label">Password</label>
								</div>

								<div class="row m-t-30">
									<div class="col-md-12">
										<button type="submit"
											class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
											in</button>
									</div>
								</div>
								<hr />

							</div>
						</div>
					</form>
					<!-- end of form -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>
   
	<!-- Required Jquery -->
    <!--  jquery-->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery/js/jquery.min.js">
	</script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery-ui/js/jquery-ui.min.js">
	</script>
    <script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/sweetalert/js/sweetalert.min.js">
	</script>

	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/popper.js/js/popper.min.js">
	</script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/bootstrap/js/bootstrap.min.js">
	</script>
	<!-- waves js -->
	<script src="<?php echo base_url();  ?>asset/assets/pages/waves/js/waves.min.js"></script>
	<!-- jquery slimscroll js -->
	<script type="text/javascript"
		src="<?php echo base_url();  ?>asset/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
	<!-- modernizr js -->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/modernizr/js/modernizr.js">
	</script>
	<script type="text/javascript"
		src="<?php echo base_url();  ?>asset/bower_components/modernizr/js/css-scrollbars.js"></script>
	<!-- i18next.min.js -->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/i18next/js/i18next.min.js">
	</script>
	<script type="text/javascript"
		src="<?php echo base_url();  ?>asset/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url();  ?>asset/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js">
	</script>
	<script type="text/javascript"
		src="<?php echo base_url();  ?>asset/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/assets/js/common-pages.js"></script>


    <script type="text/javascript">
      
      $(document).ready(function(){
          console.log("tes");
		  

          $("#form_login").submit(function(e){
            e.preventDefault();
            var form 	= $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url 	= form.attr("action");
            var data 	= new FormData(this);

            $.ajax({

                beforeSend:function() { 
				form.find("[type='submit']").addClass("disabled").html("<i class='fa fa-spinner fa-pulse fa-fw'></i> Loading ... ");
                },
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                url : url,
                data : data,
                dataType:'JSON',
                success: function(response) {
				form.find("[type='submit']").removeClass("disabled").html(btnHtml);
				if ( response.status == "success" ){
					swal("Login Berhasil", response.message, "success");
					console.log(response);
					setTimeout(function(){
						swal.close();
						window.location.replace(response.redirect);
						},1000);
					
				} else {
					swal("Login Gagal", response.message, "error");
				}
				}

            });

          });


      });
     
       
    </script>

</body>

</html>
