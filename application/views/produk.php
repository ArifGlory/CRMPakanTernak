<!-- Container-fluid starts -->

<div class="row">
	<div class="col-sm-12">
		<br>
		<h3 style="text-align: center;">Cari Produk</h3>
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="input-group input-group-button">
					<input type="text" class="form-control" placeholder="Nama Produk">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button"><i class="feather icon-search"></i>Cari</button>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>

		<br><br><br>
	</div>
	<!-- end of col-sm-12 -->
</div>
<div class="row">
	<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
            <?php foreach($produk as $val){
            $foto = base_url()."foto/produk/".$val->foto_utama;
            ?>
			<div class="col-xl-4 col-md-6 col-sm-6 col-xs-12">
				<div class="card prod-view">
					<div class="prod-item text-center">
						<div class="prod-img">
							<a href="<?php echo base_url(); ?>Utama/detailProduk/<?php echo $val->id_produk; ?>" class="hvr-shrink">
								<img style="height: 250px;" src="<?php echo  $foto;?>"
									class="img-fluid o-hidden" alt="prod1.jpg">
							</a>
						</div>
						<div class="prod-info">
							<a href="<?php echo base_url(); ?>Utama/detailProduk" class="txt-muted">
								<h4><?php echo $val->nama_produk; ?></h4>
							</a>
							<div class="m-b-10">
							</div>
							<span class="prod-price">Rp. <?php echo number_format($val->harga,0,",","."); ?>
                                <!--<small class="old-price"><i class="icofont icofont-cur-dollar"></i>50.000</small>--></span>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
		</div>

	</div>
	</div>
	
</div>
<!-- end of container-fluid -->


</div>