<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="col-md-12">
            <br><br>
            <div class="card product-detail-page">
                <div class="card-header">
                    <h5>Pendaftaran Pelanggan</h5>
                    <span>Silahkan isi form berikut</span>
                </div>
                <div class="card-block">
                    <div class="j-wrapper j-wrapper-640">
                        <form enctype="multipart/form-data" action="<?php echo base_url();?>Utama/simpanUser" method="post" class="j-pro" id="j-pro" novalidate="">
                            <div class="j-content">
                                <!-- start name -->
                                <div>
                                    <label class="j-label">Nama</label>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="name">
                                                <i class="icofont icofont-ui-user"></i>
                                            </label>
                                            <input required type="text" id="nama" name="nama_pelanggan">
                                        </div>
                                    </div>
                                </div>
                                <!-- end name -->
                                <!-- start email -->
                                <div>
                                    <div>
                                        <label class="j-label">Email</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="email">
                                                <i class="icofont icofont-envelope"></i>
                                            </label>
                                            <input required type="email" id="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label class="j-label">Phone</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="email">
                                                <i class="icofont icofont-android-tablet"></i>
                                            </label>
                                            <input required type="email" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label class="j-label">Alamat</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="email">
                                                <i class="icofont icofont-address-book"></i>
                                            </label>
                                            <textarea required type="email" class="alamat" id="alamat" name="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end email -->
                                <!-- start password -->
                                <div>
                                    <div>
                                        <label class="j-label ">Password</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="password">
                                                <i class="icofont icofont-lock"></i>
                                            </label>
                                            <input required type="password" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <!-- end password -->
                                <!-- start response from server -->
                                <div class="j-response"></div>
                                <!-- end response from server -->
                            </div>
                            <!-- end /.content -->
                            <div class="j-footer">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                            <!-- end /.footer -->
                        </form>
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

        var nama = $("#nama").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        var alamat = $("#alamat").val();

        $("#j-pro").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            if ($("#nama").val().length == 0 || $("#email").val().length == 0 || $("#phone").val().length == 0
                || $("#password").val().length == 0 || $("#alamat").val().length == 0){

                swal("Oops..", "Semua data harus diiisi !", "error");
                console.log("nama = "+$("#nama").val());
                console.log("email = "+$("#email").val());
                console.log("pass = "+$("#password").val());
                console.log("alamat = "+$("#alamat").val());
                console.log("phone = "+$("#phone").val());
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

    });
</script>