<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Pesanan <?php echo $pelanggan['nama_pelanggan'];?> Tanggal <?php echo date('d F, Y', strtotime($pesanan->tanggal_pesan));?></h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Detail Pesanan</a>
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
									<h5>List Pesanan</h5>

									<div class="card-header-right">
										<a target="_blank" href="<?php echo base_url();?>Pesanan/invoice/<?php echo $pesanan->id_pesanan; ?>" class="btn btn-primary btn-out-dashed btn-sm">Lihat Invoice</a>
									</div>
								</div>
								<div class="card-block">
                                    <div class="table-responsive">
                                        <div class="table-content">
                                            <div class="project-table">
                                                <div id="e-product-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-sm-12 col-md-6"></div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                            <table id="table_pesanan"
                                                                   class="table table-striped "
                                                                   role="grid" style="width: 100%">
                                                                <thead>
                                                                <tr role="row">
                                                                    <th>Gambar</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Harga</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($detail_pesanan as $val){
                                                                    $foto = base_url()."foto/produk/".$val->foto_utama;
                                                                    $total = $val->jumlah*$val->harga;
                                                                    ?>
                                                                    <tr role="row" class="odd">
                                                                        <td>
                                                                            <img src="<?php echo $foto; ?>" width="50" height="50"
                                                                                 class="img-fluid" alt="tbl">
                                                                        </td>
                                                                        <td>
                                                                            <h6><?php echo $val->nama_produk; ?></h6>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo number_format($val->harga,0,",","."); ?>
                                                                        </td>
                                                                        <td>
                                                                            <label class="text-danger"><?php echo $val->jumlah; ?></label>
                                                                        </td>
                                                                        <td>
                                                                            Rp. <?php echo number_format($total,0,",","."); ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bukti Bayar</h5>
                                </div>
                                <div class="card-block text-center">
                                    <?php if ($pesanan->bukti_bayar != null){ ?>
                                        <img id="buktiBayar" width="300" height="450" align="bukti bayar"
                                             src="<?php echo base_url();?>foto/bukti/<?php echo $pesanan->bukti_bayar; ?>">
                                    <?php  }else { ?>
                                        <h5>Belum upload bukti bayar</h5>
                                   <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="text-right">
                                <?php if ($pesanan->status_lunas == "F" && $cek == "T"){ ?>
                                    <a href="<?php echo base_url();?>Pesanan/konfirmasiPesanan/<?php echo $pesanan->id_pesanan;?>" class="btn btn-primary btn-md">Konfirmasi Pemesanan <i class="icofont icofont-ui-check"></i></a>
                                <?php } ?>
                                <?php if ($cek != "T" && $pesanan->status_lunas == "F"){ ?>
                                    <button class="btn btn-danger btn-md" id="btnKonfirmasi">Stok Barang tidak cukup <i class="icofont icofont-ui-close"></i> </button>
                                <?php } ?>
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

        $("#btnKonfirmasi").on("click", function(event) {
            swal("Stok Tidak Cukup!", "Silakan update data stok produk", "error");
        });


	});
</script>