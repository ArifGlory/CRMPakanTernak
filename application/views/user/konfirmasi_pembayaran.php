<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <br><br>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h5>Konfirmasi Pembayaran</h5>
                    </div>
                    <div class="card-block text-center">
                        <h3>Pemesanan Berhasil !</h3>
                        <p>Silakan Lakukan Pembayaran ke Rekening Berikut : </p>
                        <h4>Jumlah = Rp. <?php echo number_format($pesanan['total_bayar'],0,",","."); ?></h4>
                        <br>
                        <h4>Mandiri 900-111332-44242</h4>
                        <p>
                            <br><br>
                            Invoice Pemesanan akan dikirimkan ke Email anda, Terima kasih.
                            <br>
                            <strong>Jangan lupa lakukan konfirmasi pembayaran dengan upload bukti bayar anda di Dahsboard Pelanggan</strong>
                        </p>
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

    });
</script>