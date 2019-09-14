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
                        <h5>Pesanan</h5>
                    </div>
                    <div class="card-block text-center">
                        <h4>Pesanan anda</h4>
                        <div class="table-responsive">
                            <div class="table-content">
                                <div class="">
                                    <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                                        <th>Tanggal
                                                        </th>
                                                        <th>Total Bayar</th>
                                                        </th>
                                                        <th>Aksi</th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($pesanan as $val){
                                                        ?>
                                                        <tr role="row">
                                                            <td>
                                                                <?php echo date('d F, Y', strtotime($val->tanggal_pesan));?>
                                                            </td>
                                                            <td>Rp. <?php echo number_format($val->total_bayar,0,",","."); ?></td>
                                                            <td class="action-icon">
                                                                <a href="<?php echo base_url(); ?>User/detailPesanan/<?php echo $val->id_pesanan; ?>" class="text-muted"
                                                                   data-toggle="tooltip" data-placement="top" title=""
                                                                   data-original-title="Lihat">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
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

    </div>
</div>
<!-- end of container-fluid -->


</div>
<script type="text/javascript">
    $(document).ready(function () {
        var myTable = $("#table_pesanan").DataTable();
    });
</script>