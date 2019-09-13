<?php
$session = $this->session->userdata();
$level = $session['level'];
?>
<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<!-- [ navigation menu ] start -->
					<nav class="pcoded-navbar">
						<div class="pcoded-inner-navbar main-menu">
							<div class="">
								<div class="main-menu-header">
									<img class="img-menu-user" src="<?php echo base_url();  ?>asset/assets/images/logo_crm.png" alt="User-Profile-Image">
									<div class="user-details">
									
									</div>
								</div>
							</div>
							<div class="pcoded-navigation-label">Menu</div>
							<ul class="pcoded-item pcoded-left-item">
                                <?php if ($level == "admin") { ?>
                                <li class="">
                                    <a href="<?php echo base_url(); ?>Admin" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-home"></i>
											</span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
								<li class="">
									<a href="<?php echo base_url(); ?>Admin/pelanggan" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-user"></i>
											</span>
											<span class="pcoded-mtext">Data Pelanggan</span>
										</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Produk" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-file-text"></i>
											</span>
											<span class="pcoded-mtext">Produk</span>
										</a>
								</li>
                                <li class="">
                                    <a href="<?php echo base_url(); ?>Kategori" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-file-text"></i>
											</span>
                                        <span class="pcoded-mtext">Kategori Produk</span>
                                    </a>
                                </li>
								<li class="">
									<a href="<?php echo base_url(); ?>Pesanan" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-briefcase"></i>
											</span>
											<span class="pcoded-mtext">Pesanan</span>
										</a>
								</li>
                                <li class="">
                                    <a href="<?php echo base_url(); ?>Pesanan/terjual" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-briefcase"></i>
											</span>
                                        <span class="pcoded-mtext">Penjualan</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="">
                                    <a href="<?php echo base_url(); ?>Laporan" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-book"></i>
											</span>
                                        <span class="pcoded-mtext">Laporan</span>
                                    </a>
                                </li>
							</ul>
						</div>
					</nav>
					<!-- [ navigation menu ] end -->