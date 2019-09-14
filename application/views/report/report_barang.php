<!DOCTYPE html>
<html>
<head>
<title>Laporan Barang</title>
   
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
<p style="text-align: center" ><strong><u>Laporan Data Barang </u> </strong></p>

<br>
<br>
<!-- tabel detail disposisi -->
<h4>Tanggal Laporan = <?php echo date("d-F-Y",strtotime($tanggal)); ?></h4>
<br>


<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga Barang</th>
            <th>Kategori</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
<?php
$no = 1;
$totalSemua = 0;
?>
    <tbody>
    <?php foreach ($barang as $val){ ?>
        <tr class="even gradeA">
            <td><?php echo $no++; ?></td>
            <td style="width: 200px"><?php echo $val->nama_produk; ?></td>
            <td><?php echo $val->satuan; ?></td>
            <td> <?php echo number_format($val->harga,0,",","."); ?></td>
            <td><?php echo $val->nama_kategori; ?></td>
            <td><?php echo $val->stok; ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
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