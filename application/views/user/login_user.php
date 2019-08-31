<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="col-md-12">
            <br><br>
            <div class="card product-detail-page">
                <div class="card-header">
                    <h5>Login Pelanggan</h5>
                    <span>Silahkan login untuk melanjutkan</span>
                </div>
                <div class="card-block">
                    <div class="j-wrapper j-wrapper-640">
                        <form enctype="multipart/form-data" action="<?php echo base_url();?>Utama/signInUser" method="post" class="j-pro" id="j-pro" novalidate="">
                            <div class="j-content">
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
                                <button type="submit" class="btn btn-primary">Login</button>
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

        var email = $("#email").val();
        var password = $("#password").val();

        $("#j-pro").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            if ($("#email").val().length == 0 || $("#password").val().length == 0){

                swal("Oops..", "Semua data harus diiisi !", "error");
                console.log("email = "+$("#email").val());
                console.log("pass = "+$("#password").val());

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