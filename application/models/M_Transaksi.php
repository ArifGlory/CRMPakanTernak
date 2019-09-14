<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 29/08/2019
 * Time: 6:03
 */
class M_Transaksi extends CI_Model
{




    function deleteKeranjang($id){
        $this->db->where('id_keranjang',$id);
        $query = $this->db->delete('tb_keranjang');
        $redirect =  base_url()."User/keranjang";

        redirect($redirect);
    }

    function getPesanan($idPelanggan){
        $this->db->where('id_pelanggan',$idPelanggan);
        $data = $this->db->get("tb_pesanan");
        return $data;
    }

    function getAllPesanan(){
        $q = $this->db->query("SELECT * FROM tb_pesanan 
        INNER JOIN tb_pelanggan 
            ON (tb_pesanan.id_pelanggan = tb_pelanggan.id_pelanggan)
            WHERE tb_pesanan.status_lunas = 'F'
            ORDER BY tb_pesanan.id_pesanan DESC");

        return $q;
    }

    function getAllPenjualan(){
        $q = $this->db->query("SELECT * FROM tb_pesanan 
        INNER JOIN tb_pelanggan 
            ON (tb_pesanan.id_pelanggan = tb_pelanggan.id_pelanggan)
            WHERE tb_pesanan.status_lunas = 'T'
            ORDER BY tb_pesanan.id_pesanan DESC");

        return $q;
    }

    function getSinglePesanan($idPesanan){
        $this->db->where('id_pesanan',$idPesanan);
        $data = $this->db->get("tb_pesanan");
        return $data;
    }

    function getDetailPesanan($idPesanan){
        $q = $this->db->query("SELECT * FROM detail_pesanan 
        INNER JOIN tb_produk 
            ON (detail_pesanan.id_produk = tb_produk.id_produk)
            WHERE detail_pesanan.id_pesanan = $idPesanan
            ORDER BY detail_pesanan.id_detail_pesanan DESC");

        return $q;
    }

    function savePesanan($data,$idPelanggan){
        $query          = $this->db->insert('tb_pesanan',$data);
        $lastPesanan    = $this->getLastIDRowPesanan()->result_array()[0];
        $idPesanan      = $lastPesanan['id_pesanan'];
        $keranjang      = $this->getDataKeranjang($idPelanggan)->result();
        $redirect       = base_url()."User/konfirmasiPembayaran/".$idPesanan;

        //store detail pesanan
        foreach ($keranjang as $val){
            $detailPesanan = array(
              'id_produk'=>$val->id_produk,
                'id_pesanan'=>$idPesanan,
                'jumlah'=>$val->jumlah
            );
            $this->db->insert('detail_pesanan',$detailPesanan);
        }

        //hapus keranjang
        $this->db->where('id_pelanggan',$idPelanggan);
        $this->db->delete('tb_keranjang');

        //send invoice

        redirect($redirect);
    }

    function getLastIDRowPesanan(){
        $q = $this->db->query("SELECT id_pesanan FROM tb_pesanan ORDER BY id_pesanan DESC LIMIT 1");

        return $q;
    }

    function getDataKeranjang($idPelanggan){
        $q = $this->db->query("SELECT * FROM tb_keranjang 
        INNER JOIN tb_produk 
            ON (tb_keranjang.id_produk = tb_produk.id_produk)
            WHERE tb_keranjang.id_pelanggan = $idPelanggan
            ORDER BY tb_produk.id_produk DESC");

        return $q;
    }

    function saveBukti($idPesanan,$foto){
        $target_dir = "foto/bukti/";
        $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
        $nmfile     = $idPesanan."file_".time() . "." . $imgType;
        $targetFile = $target_dir . $nmfile;
        $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile);
        $redirect       =  base_url()."User/detailPesanan/".$idPesanan;

        $data_update = array(
            'bukti_bayar'=>$nmfile,
        );

        if ($uploaded){
            $this->db->where('id_pesanan',$idPesanan);
            $query =  $this->db->update("tb_pesanan",$data_update);
            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil di update";
                $response['redirect']   = $redirect;

                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }
        }else{
            $response['status']     = "error";
            $response['message']    = "Upload gagal, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function konfirmasiPesanan($idPesanan){
        $data_update = array(
          'status_lunas'=>"T"
        );
        $this->db->where('id_pesanan',$idPesanan);
        $this->db->update("tb_pesanan",$data_update);

        redirect('Pesanan/terjual');
    }

    function getLaporanPenjualan($bulan,$tahun){
        $q = $this->db->query("SELECT * FROM tb_pesanan 
        INNER JOIN tb_pelanggan 
            ON (tb_pesanan.id_pelanggan = tb_pelanggan.id_pelanggan)
            WHERE tb_pesanan.status_lunas = 'T'
            AND MONTH(tb_pesanan.tanggal_pesan) = $bulan
            AND YEAR(tb_pesanan.tanggal_pesan) = $tahun 
            ORDER BY tb_pesanan.id_pesanan DESC");

        return $q;
    }

    function getDetailLaporanPenjualan(){
        $q = $this->db->query("SELECT * FROM detail_pesanan 
        INNER JOIN tb_produk 
            ON (detail_pesanan.id_produk = tb_produk.id_produk)
            ORDER BY detail_pesanan.id_detail_pesanan DESC");

        return $q;
    }


}