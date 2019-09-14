<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Pesanan</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Pesanan</a>
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
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h5>Data Pesanan</h5>

									<div class="card-header-right">
										<!--<button data-toggle="modal" data-target="#modalLaporan"
											class="btn btn-success btn-out-dashed btn-sm">Laporan Pesanan</button>-->
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_pesanan" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Pelanggan</th>
															<th>Tanggal</th>
															<th>Total Bayar</th>
															<th>Bukti Bayar</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($pesanan as $val){
                                                            $foto_bukti = base_url()."foto/bukti/".$val->bukti_bayar;
                                                            ?>
														<tr>
                                                            <td>
                                                                <?php echo $val->nama_pelanggan; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date('d F, Y', strtotime($val->tanggal_pesan));?>
                                                            </td>
															<td>
																<?php echo number_format($val->total_bayar,0,",","."); ?>
															</td>
                                                            <?php if ($val->bukti_bayar != null){ ?>
                                                                <td>
                                                                    <img id="fotoBukti" src="<?php echo $foto_bukti; ?>"
                                                                         alt="user image"
                                                                         class="img-40 align-top m-r-15">
                                                                    <button id="btnLihat"
                                                                            data-foto="<?php echo $foto_bukti; ?>"
                                                                        class="btn btn-round btn-sm btn-primary"
                                                                            data-toggle="modal" data-target="#modalBuktiBayar">
                                                                        <i class="icofont icofont-document-search"></i>Lihat</button>
                                                                </td>
                                                            <?php }else { ?>
                                                                <td>
                                                                    Belum upload bukti bayar
                                                                </td>
                                                            <?php } ?>
															<td>
                                                                <a class="btn btn-round btn-sm btn-primary"
                                                                href="<?php echo base_url();?>Pesanan/detailPesanan/<?php echo $val->id_pesanan; ?>">
                                                                    <i class="icofont icofont-search-alt-1"></i>Detail</a>
															</td>
														</tr>
														<?php }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- [ page content ] end -->

                    <!--<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_delete" action="<?php /*echo base_url(); */?>Produk/hapusProduk"
                                      method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Produk</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>Anda yakin menghapus produk ini ?</h4>
                                                <input  type="hidden" name="id_produk" class="form-control id_produk">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect "
                                                data-dismiss="modal">Batal</button>
                                        <button type="submit"
                                                class="btn btn-danger waves-effect waves-light">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->

                    <div class="modal fade" id="modalBuktiBayar" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Foto Bukti Bayar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <img id="buktiBayar" width="300" height="450" align="bukti bayar" src="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


				</div>
			</div>
		</div>
	</div>


</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		var myTable = $("#table_pesanan").DataTable();
        var kode_produk;


        $("#table_pesanan").on("click", "#btnLihat", function(event) {
            var src = $(this).attr('data-foto');
            console.log(src);
            $("#buktiBayar").attr("src",src);
        });

        /*$("#table_pesanan").on("click", "#hapusProduk", function(event) {
            $(".id_produk").val($(this).attr('data-id_produk'));
        });*/



	});
</script>