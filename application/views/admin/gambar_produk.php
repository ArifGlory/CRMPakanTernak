
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Produk <?php echo  $produk['nama_produk'];?></h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Gambar Produk</a>
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
									<h5>Gambar Produk</h5>

									<div class="card-header-right">

									</div>
								</div>
								<div class="card-block">
                                    <div class="row">
                                        <?php foreach ($gambar as $val){
                                            $foto = base_url()."foto/produk/".$val->nama_gambar;
                                            ?>
                                            <div class="col-md-3">
                                                <div class="card prod-view">
                                                    <div class="prod-item text-center">
                                                        <div class="prod-img">
                                                            <a href="#" class="hvr-shrink">
                                                                <img src="<?php echo $foto ?>" class="img-fluid o-hidden" alt="produk">
                                                            </a>
                                                        </div>
                                                        <div class="prod-info">
                                                            <a href="<?php echo base_url();?>Produk/hapusGambar/<?php echo  $val->id_gambar;?>" class="btn waves-effect waves-light hor-grd btn-grd-danger ">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form enctype="multipart/form-data" id="form_simpan" action="<?php echo base_url();?>Produk/uploadGambar">
                                                <div class="custom-file">
                                                    <input type="hidden" value="<?php echo  $produk['id_produk'];?>" name="id_produk">
                                                    <input type="file" name="file" class="custom-file-input" id="uploadFile" required>
                                                    <label id="labelname" class="custom-file-label" for="uploadFile">Choose file...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">
                                                        <button style="width: 50%;" type="submit" class="btn waves-effect waves-light btn-grd-primary pull-right">Simpan</button>
                                                    </div>
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
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {

        $("#uploadFile").on("change",function(){
            var filename = $('#uploadFile').val();
            filename = filename.split("h")[1];
            filename = filename.substring(1);
            console.log(filename);

            $('#labelname').text(filename);
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