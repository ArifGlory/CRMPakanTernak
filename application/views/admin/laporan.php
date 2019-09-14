<div class="pcoded-content">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="page-header-title">
											<h4 class="m-b-10">Laporan</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="index.html">
														<i class="feather icon-home"></i>
													</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#"> Pilih Bentuk Laporan</a>
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
                                                        <i class="feather icon-shopping-cart text-c-blue d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-blue"></span> Laporan Penjualan</h4>
                                                        <button class="btn btn-primary btn-sm btn-round"
                                                                id="btnPenjualan"
                                                                data-toggle="modal" data-target="#modalRange">Pilih</button>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="feather icon-box text-c-green d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-blue"></span> Laporan Barang</h4>
                                                        <a href="<?php echo base_url();?>Laporan/barang" class="btn btn-success btn-sm btn-round"  id="btnBarang">Pilih</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="feather icon-trending-up text-c-red d-block f-40"></i>
                                                        <h4 class="m-t-20"><span class="text-c-blue"></span> Laporan Penerimaan Kas</h4>
                                                        <button class="btn btn-danger btn-sm btn-round" id="btnKas"
                                                                data-toggle="modal" data-target="#modalRange">Pilih</button>
                                                    </div>
                                                </div>
                                            </div>
										</div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Grafik Penjualan Bulan ini
                                                    </div>
                                                    <div class="card-block">
                                                        <canvas id="barChart" width="700" height="500" style="display: block; width: 300px; height: 300px;"></canvas>
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
<div class="modal fade" id="modalRange" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Range Laporan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form_laporan" action="" name="form_laporan" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="tipe" id="tipe_laporan" value="">
                        <div class="form-group">
                            <label for="">Pilih Bulan</label>
                            <select name="bulan" class="form-control">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Pilih Tahun</label>
                            <select name="tahun" class="form-control">
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#btnPenjualan").on("click", function(event) {
            var aksi = "<?php echo base_url();?>Laporan/penjualan";
            $('#tipe_laporan').val("penjualan");
            $("#form_laporan").attr("action",aksi);
        });
        $("#btnBarang").on("click", function(event) {
            var aksi = "<?php echo base_url();?>Laporan/barang";
            $('#tipe_laporan').val("barang");
            $("#form_laporan").attr("action",aksi);
        });
        $("#btnKas").on("click", function(event) {
            var aksi = "<?php echo base_url();?>Laporan/kas";
            $('#tipe_laporan').val("kas");
            $("#form_laporan").attr("action",aksi);
        });

        var ctx = document.getElementById('barChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($penjualan as $val){echo '"' . date('d F', strtotime($val->tanggal_pesan)) . '",';} ?>],
                datasets: [{
                    label: 'Penjualan',
                    data: [<?php foreach ($penjualan as $val){echo '"' . $val->total_bayar . '",';} ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        /*$("#table_pesanan").on("click", "#hapusProduk", function(event) {
         $(".id_produk").val($(this).attr('data-id_produk'));
         });*/



    });
</script>