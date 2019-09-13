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
	<meta name="keywords" content="SMKN1 talang padang">
	<meta name="author" content="Tapisdev" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url();  ?>asset/assets/images/favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/bootstrap/css/bootstrap.min.css">
	<!-- waves.css -->
	<link rel="stylesheet" href="<?php echo base_url();  ?>asset/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
	<!-- feather icon -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/feather/css/feather.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/pages.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/sweetalert/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/icofont/css/icofont.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/css/component.css"> -->



	<!--  jquery-->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/sweetalert/js/sweetalert.min.js">
	</script>

	 <!-- Data Table Css -->
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
</head>

<body >
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>
	<!-- [ Pre-loader ] end -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			<!-- [ Header ] start -->
			<nav class="navbar header-navbar pcoded-header">
				<div class="navbar-wrapper">
					<div class="navbar-logo">
						<a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="sample-page.html#!">
								<i class="feather icon-toggle-right"></i>
							</a>
						<a href="#">
								
						</a>
						<a class="mobile-options waves-effect waves-light">
								<i class="feather icon-more-horizontal"></i>
							</a>
					</div>
					<div class="navbar-container container-fluid">
						<ul class="nav-left">
							<li>
								<a href="#" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
										<i class="full-screen feather icon-maximize"></i>
									</a>
							</li>
						</ul>
						<ul class="nav-right">
							<li class="user-profile header-notification">
								<div class="dropdown-primary dropdown">
									<div class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo base_url();  ?>asset/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
										<span><?php echo $this->session->userdata()['nama'] ?></span>
										<i class="feather icon-chevron-down"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<!--<li>
											<a href="sample-page.html#!">
													<i class="feather icon-settings"></i> Settings
                                            </a>
										</li>-->
										<li>
											<a href="<?php echo base_url(); ?>Login/logout">
													<i class="feather icon-log-out"></i> Logout

												</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- [ Header ] end -->