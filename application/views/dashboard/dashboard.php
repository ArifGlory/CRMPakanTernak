<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Dashboard</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url(); ?>">Dashboard</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- [ breadcrumb ] end -->
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<!-- [ page content ] start -->
					<div class="row">
						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-user text-c-blue d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-blue"><?php echo $jml_alumni; ?></span> Orang</h4>
									<p class="m-b-20">Data Alumni</p>
									<a href="<?php echo base_url(); ?>Alumni" class="btn btn-primary btn-sm btn-round">Kelola</a>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-file-text text-c-green d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-green">40</span> Kuesioner</h4>
									<p class="m-b-20">Data Kuesioner</p>
									<button class="btn btn-success btn-sm btn-round">Kelola</button>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-briefcase text-c-red d-block f-40"></i>
									<h4 class="m-t-20">Lowongan Pekerjaan</h4>
									<p class="m-b-20">Data Lowongan</p>
									<button class="btn btn-danger btn-sm btn-round">Kelola</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card table-card">
								<div class="card-header">
									<h5>Data Alumni Terbaru</h5>
									<div class="card-header-right">
										<ul class="list-unstyled card-option" style="width: 30px;">
											<li class="first-opt" style=""><i
													class="feather open-card-option icon-chevron-left"></i></li>
											<li><i class="feather icon-minus minimize-card"></i></li>
											<!-- <li><i class="feather icon-refresh-cw reload-card"></i></li> -->
										</ul>
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Nama</th>
													<th>NIS</th>
													<th class="text-right">Tahun Lulus</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($alumni as $val){
													if($val->foto != null || strlen($val->foto) > 0 ){
														$foto = $val->foto;
													}else{
														$foto = "boy.png";
													} ?>
												<tr>
													<td>
														<div class="d-inline-block align-middle">
															<img src="<?php echo base_url(); ?>asset/assets/images/<?php echo $foto; ?>"
																alt="user image"
																class="img-radius img-40 align-top m-r-15">
															<div class="d-inline-block">
																<h6><?php echo $val->nama_alumni; ?></h6>
																<p class="text-muted m-b-0"><?php echo $val->pekerjaan; ?></p>
															</div>
														</div>
													</td>
													<td><?php echo $val->nis; ?></td>
													<td class="text-right"><?php echo $val->tahun_lulus; ?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										<div class="text-right m-r-20">
											<a href="<?php echo base_url(); ?>Alumni" class=" b-b-primary text-primary">Lihat
												Semua Data Alumni</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- [ page content ] end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ style Customizer ] start -->
<!-- <div id="styleSelector">
					</div> -->
<!-- [ style Customizer ] end -->
</div>
</div>
</div>
</div>