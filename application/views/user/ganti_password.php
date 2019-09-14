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
                                <a href="#">
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
                        <h5>Setting</h5>
                    </div>
                    <div class="card-block text-left">
                        <h4>Ganti Password</h4>
                        <form action="<?php echo base_url(); ?>User/updatePassword" name="form_simpan"
                              id="form_simpan" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Password lama</label>
                                <input required type="password" name="old_password" id="old_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input required type="password" name="new_password" id="new_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h5>Ganti Foto Profil</h5>
                    </div>
                    <div class="card-block text-left">
                        <h4>Upload Foto Profil baru</h4>
                        <br>
                        <?php
                        if ($foto == "" || $foto == null){ ?>
                            <form action="<?php echo base_url(); ?>User/updateFoto" name="form_update"
                                  id="form_update" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <input required type="file" name="foto_profil" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                                </div>
                            </form>
                        <?php }else { ?>
                            <div class="form-group">
                                <img width="200" height="200" src="<?php echo base_url();?>foto/pelanggan/<?php echo $foto;?>" align="bukti bayar">
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
        var password_lama = "<?php echo $password;?>";
        console.log(password_lama);

        $("#form_simpan").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            if ($("#old_password").val() != password_lama ){

                swal("Oops..", "Password lama salah !", "error");

            }else{
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
            }



        });

        $("#form_update").submit(function (e) {
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