<!-- Container-fluid starts -->
<?php
$session = $this->session->userdata();
if (isset($session['level'])){
    $level = $session['level'];
    if ($level == "pelanggan"){
        $cek = "true";
    }
}else{
    $cek = "false";
}
?>
<div class="row">
    <div class="container-fluid">
        <div class="col-md-12">
            <br><br>
            <div class="card product-detail-page">
                <div class="card-block">
                    <div class="row">
                        <br><br>
                        <div class="col-lg-5 col-xs-12">
                            <div class="port_details_all_img row">
                                <div class="col-lg-12 m-b-15">
                                    <div id="big_banner">
                                        <img style="height: 400px;" class="img img-fluid"
                                             src="<?php echo base_url(); ?>foto/produk/<?php echo $produk['foto_utama']; ?>"
                                             alt="Big_ Details">
                                    </div>
                                </div>
                                <div class="col-lg-12 product-right">
                                    <div id="gallery">
                                        <div class="row">
                                            <?php foreach ($gambar as $val) {
                                                $foto = base_url() . "foto/produk/" . $val->nama_gambar;
                                                ?>
                                                <div class="col-xl-2 col-lg-3 col-sm-3 col-xs-12">
                                                    <a href="<?php echo $foto; ?>"
                                                       data-toggle="lightbox" data-gallery="example-gallery">
                                                        <img src="<?php echo $foto; ?>"
                                                             class="img-fluid m-b-10" alt="">
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                            <div class="row">
                                <div>
                                    <form id="form_simpan" action="<?php echo base_url(); ?>User/addToKeranjang" method="post"
                                          enctype="multipart/form-data">
                                        <input name="id_produk" value="<?php echo $produk['id_produk']; ?>"
                                               type="hidden">
                                        <div class="col-lg-12">
                                            <!-- <span class="txt-muted d-inline-block">Kode Produk: <a href="product-detail.html#!"> PRDPKN1 </a> </span>-->
                                            <span class="float-right">Stok : <?php echo $produk['stok']; ?> </span>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4 class="pro-desc"><?php echo $produk['nama_produk']; ?></h4>
                                        </div>
                                        <div class="col-lg-12">
                                            <span class="txt-muted"> Kategori : <?php echo $produk['nama_kategori']; ?> </span>
                                        </div>
                                        <div class="col-lg-12">
                                        <span class="text-primary product-price"><i
                                                    class="icofont icofont-cur-rupiah"></i>Rp. 80.000</span> <!--<span
                                                class="done-task txt-muted">Rp. 100.0000</span>-->
                                            <hr>
                                            <p>
                                                <?php echo $produk['deskripsi']; ?>
                                            </p>
                                            <hr>
                                            <h6 class="f-16 f-w-600 m-t-10 m-b-10">jumlah</h6>
                                        </div>
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="p-l-0 m-b-25">
                                                <div class="input-group">
                                                                                    <span class="input-group-btn">
                                                                                        <button id="btnMin"
                                                                                                type="button"
                                                                                                class="btn btn-default btn-number shadow-none btn-sm">
                                                                                            <span class="icofont icofont-minus m-0"></span>
                                                                                        </button>
                                                                                    </span>
                                                    <input type="text" name="jumlah" id="jumlah"
                                                           class="form-control input-number text-center" value="1">
                                                    <span class="input-group-btn">
                                                                                        <button id="btnPlus"
                                                                                                type="button"
                                                                                                class="btn btn-default btn-number shadow-none btn-sm">
                                                                                            <span class="icofont icofont-plus m-0"></span>
                                                                                        </button>
                                                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 mob-product-btn">
                                            <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light m-r-20">
                                                <i class="icofont icofont-cart-alt f-16"></i><span class="m-l-10">Tambah Ke Keranjang</span>
                                            </button>
                                    </form>
                                            <button type="button"
                                                    class="btn btn-outline-primary waves-effect waves-light m-r-20"
                                                    data-toggle="tooltip" title=""
                                                    data-original-title="Tambah ke favorit">
                                                <i class="icofont icofont-heart-alt f-16 m-0"></i>
                                            </button>
                                        </div>
                                    <!-- form end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- end of container-fluid -->


</div>
<script type="text/javascript">
    $(document).ready(function () {
        console.log("ready");
        var jml = parseInt($("#jumlah").val());
        var cek = "<?php echo  $cek; ?>";
        console.log(cek);

        $("#btnPlus").on("click", function (event) {
            jml = jml + 1;
            $("#jumlah").val(jml);
        });
        $("#btnMin").on("click", function (event) {
            if (jml > 0) {
                jml = jml - 1;
                $("#jumlah").val(jml);
            }

        });
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $("#form_simpan").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            if(cek == "true"){
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

            }else{
                swal("Belum Login", "Silakan login untuk melanjutkan pembelian", "error");
                setTimeout(function () {
                    swal.close();
                    window.location.replace("<?php echo base_url()."Utama/loginPelanggan"; ?>");
                }, 2000);
            }



        });
    });
</script>