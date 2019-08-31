<!DOCTYPE html>
<html lang="en">

<head>
	<title>Crm Pakan Ternak</title>
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

	<!--  jquery-->
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();  ?>asset/bower_components/sweetalert/js/sweetalert.min.js">
    </script>

	   <!-- star theme css -->
	   <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-1to10.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-horizontal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-movie.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-pill.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-reversed.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/bars-square.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/jquery-bar-rating/css/css-stars.css">
	
	 <!-- slick css -->
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/slick-carousel/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/bower_components/slick-carousel/css/slick-theme.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/icon/font-awesome/css/font-awesome.min.css">

    <!-- light-box css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/ekko-lightbox/css/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/lightbox2/css/lightbox.css">

    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>asset/assets/pages/j-pro/css/j-pro-modern.css">

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
	<div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header" header-theme="theme1">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="index.html">
                          <img class="img-fluid" src="<?php echo base_url(); ?>asset/assets/images/logo_crm.png" alt="Theme-Logo" />
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
					  	  <li class="header-search">
								<div class="main-search morphsearch-search">
									<div class="input-group">
										<span class="input-group-prepend search-close">
												<i class="feather icon-x input-group-text"></i>
											</span>
										<input type="text" class="form-control" placeholder="Cari produk">
										<span class="input-group-append search-btn">
												<i class="feather icon-search input-group-text"></i>
											</span>
									</div>
								</div>
						   </li>
						  <li>
                              <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">
                                  Home
                              </a>
						  </li>
						  <li>
                              <a href="<?php echo base_url(); ?>Utama/produk" class="waves-effect waves-light">
                                  Produk
                              </a>
						  </li>
						  <li>
                              <a href="<?php echo base_url(); ?>" class="waves-effect waves-light">
                                  Tentang kami
                              </a>
                          </li>
					  </ul>
                      <ul class="nav-right">
                          <li class="user-profile header-notification">
                              <button data-toggle="modal" data-target="#modalAkun" class="btn btn-sm waves-effect waves-light btn-primary">
                                  <i class="icofont icofont-user-alt-3"></i>
                                  Akun saya
                              </button>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>
        <?php
        $session = $this->session->userdata();
        if (!isset($session['nama'])){
            $nama = "Anda belum login";
        }else{
            $nama = $session['nama'];
        }
        ?>
        <div class="modal fade" id="modalAkun" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Profil</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div align="center">
                                        <img width="100" height="100" src="<?php echo base_url();  ?>asset/assets/images/ava2.png"
                                             class="img-radius" alt="User-Profile-Image">
                                    </div>

                                    <div align="center" class="form-group">
                                        <h3><?php echo  $nama; ?></h3>
                                    </div>
                                    <div align="center" class="form-group">
                                        <?php  if (!isset($session['nama']) || $session['nama'] = ""){ ?>
                                            <a style="width: 100%" type="button" href="<?php echo base_url();?>Utama/loginPelanggan" class="btn btn-primary waves-effect ">Login</a>
                                            <br><br>
                                            <a style="width: 100%" type="button" href="<?php echo base_url();?>Utama/daftar" class="btn btn-success waves-effect ">Daftar</a>
                                        <?php }else{ ?>
                                            <a style="width: 100%" type="button" href="<?php echo base_url();?>User/keranjang" class="btn btn-success waves-effect ">Keranjang Belanja</a>
                                            <br><br>
                                            <a style="width: 100%" type="button" href="<?php echo base_url();?>User/logout" class="btn btn-danger waves-effect ">Logout</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>