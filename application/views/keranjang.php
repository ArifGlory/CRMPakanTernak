<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <br><br>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h5>Keranjang Belanja</h5>
                        <a href="<?php echo base_url();?>Utama/produk"
                                class="btn btn-primary waves-effect waves-light float-right d-inline-block md-trigger"
                                data-modal="modal-13"><i class="icofont icofont-paper"></i></i> Lanjut ke Pembayaran
                        </a>
                    </div>
                    <div class="card-block">
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
                                                <table id="table_keranjang"
                                                       class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline"
                                                       role="grid" style="width: 1031px;">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 85px;">Gambar
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 571px;">Nama Produk
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 78px;">Harga
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 114px;">Jumlah
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 63px;">Aksi
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($keranjang as $val){
                                                        $foto = base_url()."foto/produk/".$val->foto_utama;
                                                    ?>
                                                    <tr role="row" class="odd">
                                                        <td class="pro-list-img" tabindex="0">
                                                            <img src="<?php echo $foto; ?>"
                                                                 class="img-fluid" alt="tbl">
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6><?php echo $val->nama_produk; ?></h6>
                                                        </td>
                                                        <td><?php echo number_format($val->harga,0,",","."); ?></td>
                                                        <td>
                                                            <label class="text-danger"><?php echo $val->jumlah; ?></label>
                                                        </td>
                                                        <td class="action-icon">
                                                            <a href="product-list.html#!" class="m-r-15 text-muted"
                                                               data-toggle="tooltip" data-placement="top" title=""
                                                               data-original-title="Edit"><i
                                                                        class="icofont icofont-ui-edit"></i></a>
                                                            <a href="product-list.html#!" class="text-muted"
                                                               data-toggle="tooltip" data-placement="top" title=""
                                                               data-original-title="Delete"><i
                                                                        class="icofont icofont-delete-alt"></i></a>
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
        var myTable = $("#table_keranjang").DataTable();
    });
</script>