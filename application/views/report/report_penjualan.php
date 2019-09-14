<!DOCTYPE html>
<html>
<head>
<title>Laporan Penjualan</title>
   
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
        }
        table th{
            border:1px solid #000;
            padding: 3px;
            font-weight: bold;
        }
        table td{
            border:1px solid #000;
            padding: 3px;
            vertical-align: top;
        }
        
        #logotable {
        border: 0 !important;
        }
        
        #logotable td{
        border: 0 !important;
        }

        #judul{
            font-size: 20px;
            font-weight: bold;
        }

        #tebal2{
            font-weight: bold;
        }

        #tebal{
            border:1px solid #000;
            padding: 3px;
            font-weight: normal;
            text-align: center;
        }

        #garis{
            width: 40%;
            border: 1px solid #000000;
        }

    </style>
    <style type="text/css">
        .under { text-decoration: underline;
            color: #000000;
        }
        .over  { text-decoration: overline; }
        .line  { text-decoration: line-through; }
        .blink { text-decoration: blink; }
        .all   { text-decoration: underline overline line-through; }
        a      { text-decoration: none; }
    </style>
</head>
<body>

<div align="center">
    <img src="<?php echo base_url();  ?>asset/assets/images/logo_crm.png">
    <br>
    <strong> Sistem Penjualan Bahan Baku Hasil Bumi<br> PRIME RESOURCES INDONESIA
        <br></strong>
    JL. Nakip No. 09, Kota Baru, Kec. Tj. Karang Tim., Kota Bandar Lampung, Lampung 35121
</div>

<!--<table id="logotable">
    <tr>
        <td>
            <img src="<?php /*echo base_url();  */?>asset/assets/images/logo_crm.png">
        </td>
        <td>
            <br>
            <strong> Sistem Penjualan Bahan Baku Hasil Bumi<br> PRIME RESOURCES INDONESIA
                <br></strong>
            <br>
            JL. Nakip No. 09, Kota Baru, Kec. Tj. Karang Tim., Kota Bandar Lampung, Lampung 35121
        </td>
    </tr>
</table>-->
<p style="text-align: center"> </p>



</p>
<br>
<p style="text-align: center" ><strong><u>Laporan Data Penjualan </u> </strong></p>

<br>
<br>
<!-- tabel detail disposisi -->
<h4>Tanggal Laporan = <?php echo date("d-F-Y",strtotime($tanggal)); ?></h4>
<br>


<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total</th>
        </tr>
    </thead>
<?php
$no = 1;
$totalSemua = 0;
?>
    <tbody>
    <?php foreach ($penjualan as $b){ ?>
        <tr>
           <td><?php echo $no++; ?></td>
           <td colspan="4">Pelanggan:
             <strong><?php echo $b->nama_pelanggan; ?></strong>
           </td>
        </tr>
        <?php foreach ($detail_penjualan as $val){
            if ($b->id_pesanan == $val->id_pesanan){
                $total = $val->jumlah * $val->harga;
                $totalSemua = $totalSemua + $total;
            ?>
                <tr class="even gradeA">
                    <td style="border-top: hidden;"></td>
                    <td><?php echo $val->nama_produk; ?></td>
                    <td><?php echo $val->jumlah; ?></td>
                    <td> <?php echo number_format($val->harga,0,",","."); ?></td>
                    <td> <?php echo number_format($total,0,",","."); ?></td>
                </tr>
        <?php }
        } ?>
    <?php
    }
    ?>
    </tbody>
</table>
<h5 align="right">Total Penjualan = Rp. <?php echo number_format($totalSemua,0,",","."); ?> </h5>
<br><br>

<br>

<br>
<p style="text-align: right">
    Mengetahui
    <br>
    <br><br><br>
    Pimpinan
</p>

</body>
</html>