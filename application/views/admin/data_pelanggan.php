<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Pelanggan</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Pelanggan</a>
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
									<h5>Data Pelanggan</h5>

									<div class="card-header-right">
										
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_pelanggan" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Nama</th>
															<th>Email</th>
															<th>Phone</th>
															<th>Alamat</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($pelanggan as $val){
                                                            if($val->foto != null || strlen($val->foto) > 0 ){
                                                                $foto = base_url()."foto/pelanggan/".$val->foto;
                                                            }else{
                                                                $foto = base_url()."asset/assets/images/boy.png";
                                                            } ?>
														<tr>
															<td>
																<div class="d-inline-block align-middle">
																	<img id="fotoProduk" src="<?php echo $foto; ?>"
																		alt="user image"
																		class="img-40 img-radius align-top m-r-15">
																	<div class="d-inline-block">
																		<h6><?php echo $val->nama_pelanggan; ?></h6>
																	</div>
																</div>
															</td>
															<td>
                                                                <?php echo $val->email; ?>
															</td>
															<td>
																<?php echo $val->phone; ?>
															</td>
															<td>
																<?php echo $val->alamat; ?>
															</td>
															<td>
                                                               <!-- <button class="btn btn-round btn-sm btn-success"
                                                                        data-id_pelanggan="<?php /*echo $val->id_pelanggan; */?>"
                                                                        data-nama_pelanggan="<?php /*echo $val->nama_pelanggan; */?>"
                                                                        data-email="<?php /*echo $val->email; */?>"
                                                                        data-phone="<?php /*echo $val->nama_kategori; */?>"
                                                                        data-alamat="<?php /*echo $val->alamat; */?>"
                                                                        data-foto="<?php /*echo $val->foto; */?>"
                                                                        data-toggle="modal" data-target="#modalEdit"
                                                                        id="ubahPelanggan"
                                                                ><i class="icofont icofont-ui-edit"></i></button>-->
                                                                <button data-id_pelanggan="<?php echo $val->id_pelanggan; ?>"
                                                                        class="btn btn-round btn-sm btn-danger"
                                                                        id="hapusPelanggan"
                                                                        title="Hapus Pelanggan"
                                                                        data-toggle="modal" data-target="#modalDelete"><i class="icofont icofont-ui-delete"></i></button>
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

                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_edit" action="<?php echo base_url(); ?>pel/ubahProduk"
                                      method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah Data Produk</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input required type="hidden" id="id_produk" name="id_produk" class="form-control">
                                                <div class="form-group">
                                                    <label for="">Nama Produk</label>
                                                    <input required type="text" id="nama_produk" name="nama_produk" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Stok</label>
                                                    <input required type="text" id="stok" name="stok" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Harga</label>
                                                    <input required type="text" id="harga" name="harga" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Deskripsi</label>
                                                    <textarea required type="text" id="deskripsi" name="deskripsi" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div align="center" class="form-group">
                                                    <img id="foto" src=""
                                                         alt="user image"
                                                         class="img-100 align-top m-r-15">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Foto Utama</label>
                                                    <input type="file" name="foto_utama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Kategori</label>
                                                    <select required class="form-control" name="id_kategori" id="kategori">
                                                        <?php foreach($kategori as $val){ ?>
                                                            <option value="<?php echo $val->id_kategori; ?>">
                                                                <?php echo $val->nama_kategori; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect "
                                                data-dismiss="modal">Batal</button>
                                        <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_delete" action="<?php echo base_url(); ?>Produk/hapusProduk"
                                      method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Pelanggan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>Anda yakin menghapus pelanggan ini ?</h4>
                                                <input  type="hidden" name="id_pelanggan" class="form-control id_pelanggan">
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
		var myTable = $("#table_pelanggan").DataTable();
        var kode_produk;

        $("#table_pelanggan").on("click", "#ubahPelanggan", function(event) {

            var src = "<?php echo base_url();?>foto/produk/"+$(this).attr('data-foto_utama');

        });

        $("#table_pelanggan").on("click", "#fotoProduk", function(event) {

        });

        $("#table_pelanggan").on("click", "#hapusPelanggan", function(event) {
            $(".id_pelanggan").val($(this).attr('data-id_pelanggan'));
        });

		$("#form_simpan").submit(function (e) {
    		e.preventDefault();
    		var form = $(this);
    		var btnHtml = form.find("[type='submit']").html();
    		var url = form.attr("action");
    		var data = new FormData(this);
            
            console.log("diklik");
    		$.ajax({
                
    			beforeSend: function () {
    				form.find("[type='submit']").addClass("disabled").html("Loading ... ");
    			},
    			cache: false,
    			processData: false,
    			contentType: false,
    			type: "POST",
    			url: url,
    			data: data,
    			dataType: 'JSON',
    			success: function (response) {
    				form.find("[type='submit']").removeClass("disabled").html(btnHtml);
    				if (response.status == "success") {
    					swal("Berhasil", response.message, "success");
    					console.log(response);
    					setTimeout(function () {
    						swal.close();
    						window.location.replace(response.redirect);
    					}, 1000);

    				} else {
    					swal("Gagal", response.message, "error");
    				}
    			}

    		});

    	});

        $("#form_edit").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            console.log("diklik");
            $.ajax({

                beforeSend: function () {
                    form.find("[type='submit']").addClass("disabled").html("Loading ... ");
                },
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    form.find("[type='submit']").removeClass("disabled").html(btnHtml);
                    if (response.status == "success") {
                        swal("Berhasil", response.message, "success");
                        console.log(response);
                        setTimeout(function () {
                            swal.close();
                            window.location.replace(response.redirect);
                        }, 1000);

                    } else {
                        swal("Gagal", response.message, "error");
                    }
                }

            });

        });

        $("#form_delete").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            console.log("diklik");
            $.ajax({

                beforeSend: function () {
                    form.find("[type='submit']").addClass("disabled").html("Loading ... ");
                },
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",
                url: url,
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    form.find("[type='submit']").removeClass("disabled").html(btnHtml);
                    if (response.status == "success") {
                        swal("Berhasil", response.message, "success");
                        console.log(response);
                        setTimeout(function () {
                            swal.close();
                            window.location.replace(response.redirect);
                        }, 1000);

                    } else {
                        swal("Gagal", response.message, "error");
                    }
                }

            });

        });




	});
</script>