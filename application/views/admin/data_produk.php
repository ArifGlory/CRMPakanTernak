<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Produk</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Produk</a>
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
									<h5>Data Produk</h5>

									<div class="card-header-right">
										<button data-toggle="modal" data-target="#modalAdd"
											class="btn btn-primary btn-out-dashed btn-sm">New</button>
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_produk" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Nama</th>
															<th>Harga</th>
															<th>Kategori</th>
															<th>Stok</th>
															<th>Deskripsi</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($produk as $val){
                                                            $foto = base_url()."foto/produk/".$val->foto_utama;
                                                            ?>
														<tr>
															<td>
																<div class="d-inline-block align-middle">
                                                                    <a href="<?php echo base_url()?>Produk/moreGambar/<?php echo $val->id_produk;?>">
																	<img id="fotoProduk" src="<?php echo $foto; ?>"
																		alt="user image"
																		class="img-40 align-top m-r-15">
                                                                    </a>
																	<div class="d-inline-block">
																		<h6><?php echo $val->nama_produk; ?></h6>
																	</div>
																</div>
															</td>
															<td>
																<?php echo number_format($val->harga,0,",","."); ?>
															</td>
															<td>
																<?php echo $val->nama_kategori; ?>
															</td>
															<td>
																<?php echo $val->stok; ?>
															</td>
															<td>
																<?php echo $val->deskripsi; ?>
															</td>
															<td>
                                                                <button class="btn btn-round btn-sm btn-success"
                                                                        data-id_produk="<?php echo $val->id_produk; ?>"
                                                                        data-nama_produk="<?php echo $val->nama_produk; ?>"
                                                                        data-harga="<?php echo $val->harga; ?>"
                                                                        data-stok="<?php echo $val->stok; ?>"
                                                                        data-nama_kategori="<?php echo $val->nama_kategori; ?>"
                                                                        data-id_kategori="<?php echo $val->id_kategori; ?>"
                                                                        data-foto_utama="<?php echo $val->foto_utama; ?>"
                                                                        data-deskripsi="<?php echo $val->deskripsi; ?>"
                                                                        data-toggle="modal" data-target="#modalEdit"
                                                                        id="ubahProduk"
                                                                        title="Ubah Produk"
                                                                ><i class="icofont icofont-ui-edit"></i></button>
                                                                <button data-id_produk="<?php echo $val->id_produk; ?>"
                                                                        class="btn btn-round btn-sm btn-danger"
                                                                        id="hapusProduk"
                                                                        title="Hapus Produk"
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
					<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<form id="form_simpan" action="<?php echo base_url(); ?>Produk/simpanProduk"
											method="post" enctype="multipart/form-data">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Produk</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Nama Produk</label>
													<input required type="text" name="nama_produk" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Stok</label>
													<input required type="text" name="stok" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Harga</label>
													<input required type="text" name="harga" class="form-control">
												</div>
												<div class="form-group">
													<label for="">Deskripsi</label>
                                                    <textarea required type="text" name="deskripsi" class="form-control"></textarea>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Foto Utama</label>
													<input required type="file" name="foto_utama" class="form-control">
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
										class="btn btn-primary waves-effect waves-light">Simpan</button>
								</div>
								</form>
							</div>
						</div>
					</div>

                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_edit" action="<?php echo base_url(); ?>Produk/ubahProduk"
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
		var myTable = $("#table_produk").DataTable();
        var kode_produk;

        $("#table_produk").on("click", "#ubahProduk", function(event) {

            var src = "<?php echo base_url();?>foto/produk/"+$(this).attr('data-foto_utama');

            $("#id_produk").val($(this).attr('data-id_produk'));
            $("#nama_produk").val($(this).attr('data-nama_produk'));
            $("#harga").val($(this).attr('data-harga'));
            $("#stok").val($(this).attr('data-stok'));
            $("#harga").val($(this).attr('data-harga'));
            $("#deskripsi").text($(this).attr('data-deskripsi'));
            $("#id_kategori").val($(this).attr('data-id_kategori'));
            $("#foto").attr("src",src);
        });

        $("#table_produk").on("click", "#fotoProduk", function(event) {

        });

        $("#table_produk").on("click", "#hapusProduk", function(event) {
            $(".id_produk").val($(this).attr('data-id_produk'));
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