<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <br><br>
            <div class="col-md-3">
                <br><br>
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Menu</h4>
                    </div>
                    <div class="card-block text-center">
                        <ul class="">
                            <li class="">
                                <a href="<?php echo base_url();?>User/dashboard">
                                    <i class="fa fa-shopping-cart fa-lg fa-2x"></i>
                                    <h5 class="text-lg-center">Pesanan</h5>
                                </a>
                            </li>
                            <br>
                            <li class="">
                                <a href="<?php echo base_url();?>User/gantiPassword">
                                    <i class="fa fa-gear fa-lg fa-2x"></i>
                                    <h5 class="text-lg-center">Setting</h5>
                                </a>
                            </li>
                            <br>
                            <li class="">
                                <a href="<?php echo base_url();?>User/logout">
                                    <i class="fa fa-sign-out fa-lg fa-2x"></i>
                                    <h5 class="text-lg-center">Logout</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Pesanan</h5>
                        <a href="<?php echo base_url();?>User/invoice/<?php echo  $id_pesanan;?>"
                           target="_blank"
                           class="btn btn-primary waves-effect waves-light float-right d-inline-block md-trigger">
                            <i class="icofont icofont-paper"></i> Lihat Invoice
                        </a>
                    </div>
                    <div class="card-block text-center">
                        <h4>Detail Pesanan anda</h4>
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
                                                       class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline"
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
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Bukti Bayar</h5>
                    </div>
                    <div class="card-block text-center">
                        <h4>Upload Bukti Bayar</h4>
                        <?php
                        if ($bukti_bayar == "" || $bukti_bayar == null){ ?>
                            <form action="<?php echo base_url(); ?>User/uploadBukti" name="form_simpan"
                                  id="form_simpan" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label>Foto Bukti Bayar </label>
                                    <input type="hidden" name="id_pesanan" value="<?php echo  $id_pesanan;?>">
                                    <input required type="file" name="bukti_bayar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="form-group">
                                <img width="200" height="200" src="<?php echo base_url();?>foto/bukti/<?php echo $bukti_bayar;?>" align="bukti bayar">
                            </div>
                        <?php } ?>

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
        var myTable = $("#table_pesanan").DataTable();

        $("#form_simpan").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

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