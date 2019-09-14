<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Pesanan extends CI_Controller
{
    var $gallerypath;
    var $userSession;
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('The_Model');
        $this->load->model('M_Produk');
        $this->load->model('M_Transaksi');
        $this->load->model('M_User');

        $this->userSession = $this->session->userdata();

        $hakAkses   = $this->userSession['hak_akses'];
        $level      = $this->userSession['level'];
        if($hakAkses != "") {

            if ($level == "admin" || $level == "pimpinan" ){

            }else{
                redirect("Utama");
            }

        }else {
            redirect("Login");
        }
    }

    function index(){
        $data['pesanan']      = $this->M_Transaksi->getAllPesanan()->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/data_pesanan',$data);
        $this->load->view('part_admin/footer');
    }

    function detailPesanan($idPesanan){
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();
        $pesanan =  $this->M_Transaksi->getSinglePesanan($idPesanan)->result();
        foreach ($pesanan as $val){
            $idPelanggan = $val->id_pelanggan;
        }
        $data['pelanggan']      = $this->M_User->getSinglePelanggan($idPelanggan)->result_array()[0];
        $data['pesanan']        = $pesanan[0];

        //cek ketersediaan stok produk
        $cek = "T";
        foreach ($data['detail_pesanan'] as $val){
            $produk         = $this->M_Produk->getSingleProduk($val->id_produk)->result_array()[0];
            if ($produk['stok'] < $val->jumlah){
                $cek = "F";
            }
        }
        $data['cek'] = $cek;

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/detail_pesanan',$data);
        $this->load->view('part_admin/footer');

    }

    function invoice($idPesanan){
        $data['pesanan']        = $this->M_Transaksi->getSinglePesanan($idPesanan)->result_array()[0];
        $idPelanggan = $data['pesanan']['id_pelanggan'];
        $data['pelanggan']      = $this->M_User->getSinglePelanggan($idPelanggan)->result_array()[0];
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();

        $this->load->view('user/invoice',$data);
    }

    function konfirmasiPesanan($idPesanan){

        //kurangi stok
        $detail_pesanan = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();
        foreach ($detail_pesanan as $val){
            $produk         = $this->M_Produk->getSingleProduk($val->id_produk)->result_array()[0];
            $stok_lama      = $produk['stok'];
            $new_stok       = $stok_lama - $val->jumlah;

            $data_update = array(
              'stok' => $new_stok
            );

            $this->db->where('id_produk',$val->id_produk);
            $this->db->update("tb_produk",$data_update);

        }

        $this->sendKonfirmasiEmail($idPesanan);
        $this->M_Transaksi->konfirmasiPesanan($idPesanan);
    }

    function sendKonfirmasiEmail($idPesanan){
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();
        $pesanan =  $this->M_Transaksi->getSinglePesanan($idPesanan)->result();
        foreach ($pesanan as $val){
            $idPelanggan = $val->id_pelanggan;
        }
        $data['pelanggan']      = $this->M_User->getSinglePelanggan($idPelanggan)->result_array()[0];
        $data['pesanan']        = $this->M_Transaksi->getSinglePesanan($idPesanan)->result_array()[0];
        $to_email       = $data['pelanggan']['email'];
        $notifikasi     = $this->load->view('admin/invoice_pembayaranberhasil',$data,TRUE);

        //config email
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "tapiskuy3@gmail.com";
        $config['smtp_pass'] = "qwerty12345.";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);
        $from_email = "tapiskuy3@gmail.com";
        $this->email->from($from_email,"Sistem Penjualan Bahan Baku Hasil Bumi");
        $this->email->to($to_email);
        $this->email->subject('Pembayaran Dikonfirmasi');
        $this->email->message($notifikasi);
        $cek =  $this->email->send();

        if ($cek){

        }else{
            echo "error email tidak dikirim ke ";
            echo "<br>";
            print_r($to_email);
            echo "<br>";
            show_error($this->email->print_debugger());
        }

    }

    function terjual(){
        $data['penjualan']      = $this->M_Transaksi->getAllPenjualan()->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/data_penjualan',$data);
        $this->load->view('part_admin/footer');
    }


}