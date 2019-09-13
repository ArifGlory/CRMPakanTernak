<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 31/08/2019
 * Time: 10:31
 */
class User extends CI_Controller
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
        $this->load->model('M_User');
        $this->load->model('M_Transaksi');

        $this->userSession = $this->session->userdata();

        $hakAkses   = $this->userSession['hak_akses'];
        $level      = $this->userSession['level'];

        if($hakAkses != "") {
            if ($level != "pelanggan"){
                redirect("Utama");
            }
        }else {
            redirect("Utama/loginPelanggan");
        }
    }

    function addToKeranjang(){
        $id_produk      = $this->input->post('id_produk');
        $id_pelanggan   = $this->userSession['id'];
        $jumlah         = $this->input->post('jumlah');
        $harga_satuan   = $this->input->post('harga_satuan');

        $data = array(
            'id_produk' =>$id_produk,
            'id_pelanggan' =>$id_pelanggan,
            'jumlah' => $jumlah,
            'harga_satuan'=>$harga_satuan
        );

        $this->M_User->saveKeranjang($data);
    }

    function keranjang(){
        $id_pelanggan   = $this->userSession['id'];
        $data['keranjang'] = $this->M_User->getDataKeranjang($id_pelanggan)->result();

        $this->load->view('parts/header');
        $this->load->view('keranjang',$data);
        $this->load->view('parts/footer');
    }

    function generatePemesanan(){
        $id_pelanggan   = $this->userSession['id'];
        $tanggal        = date('Y-m-d');
        $totalBayar     = 0;
        $keranjang      = $this->M_User->getDataKeranjang($id_pelanggan)->result();

        foreach ($keranjang as $value){
            $total      = $value->jumlah * $value->harga_satuan;
            $totalBayar = $totalBayar + $total;
        }

        $pesanan = array(
          'id_pelanggan'=>$id_pelanggan,
            'tanggal_pesan'=>$tanggal,
            'total_bayar'=>$totalBayar
        );

        $this->M_Transaksi->savePesanan($pesanan,$id_pelanggan);
    }

    function hapusDariKeranjang($idKeranjang){
        $this->M_Transaksi->deleteKeranjang($idKeranjang);
    }

    function konfirmasiPembayaran($idPesanan){
        $id_pelanggan   = $this->userSession['id'];
        $data['pesanan']        = $this->M_Transaksi->getSinglePesanan($idPesanan)->result_array()[0];
        $data['pelanggan']      = $this->M_User->getSinglePelanggan($id_pelanggan)->result_array()[0];
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();

        $to_email       = $data['pelanggan']['email'];
        $notifikasi     = $this->load->view('user/invoice',$data,TRUE);

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
        $this->email->subject('Faktur Belanja');
        $this->email->message($notifikasi);
        $cek =  $this->email->send();

        $data_2 ['pesanan'] = $data['pesanan'];
        if ($cek){
            $this->load->view('parts/header');
            $this->load->view('user/konfirmasi_pembayaran',$data_2);
            $this->load->view('parts/footer');
        }else{
            echo "error email tidak dikirim ke ";
            echo "<br>";
            print_r($to_email);
            echo "<br>";
            show_error($this->email->print_debugger());
        }


    }

    function dashboard(){
        $id_pelanggan   = $this->userSession['id'];
        $data['pesanan'] = $this->M_Transaksi->getPesanan($id_pelanggan)->result();

        $this->load->view('parts/header');
        $this->load->view('user/dashboard_user',$data);
        $this->load->view('parts/footer');
    }

    function gantiPassword(){
        $id_pelanggan   = $this->userSession['id'];
        $pelanggan      = $this->M_User->getSinglePelanggan($id_pelanggan)->result_array()[0];
        $data['password'] = $pelanggan['password'];
        $data['foto']     = $pelanggan['foto'];
        $this->load->view('parts/header');
        $this->load->view('user/ganti_password',$data);
        $this->load->view('parts/footer');
    }

    function updatePassword(){
        $id_pelanggan   = $this->userSession['id'];
        $new_password = $this->input->post('new_password');

        $this->M_User->updatePassword($id_pelanggan,$new_password);
    }

    function detailPesanan($idPesanan){
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();
        $pesanan                = $this->M_Transaksi->getSinglePesanan($idPesanan)->result_array()[0];
        $data['bukti_bayar']    = $pesanan['bukti_bayar'];
        $data['id_pesanan']     = $pesanan['id_pesanan'];

        $this->load->view('parts/header');
        $this->load->view('user/detail_pesanan',$data);
        $this->load->view('parts/footer');
      /* print_r($data);*/
    }

    function invoice($idPesanan){
        $id_pelanggan   = $this->userSession['id'];
        $data['pesanan']        = $this->M_Transaksi->getSinglePesanan($idPesanan)->result_array()[0];
        $data['pelanggan']      = $this->M_User->getSinglePelanggan($id_pelanggan)->result_array()[0];
        $data['detail_pesanan'] = $this->M_Transaksi->getDetailPesanan($idPesanan)->result();

        $this->load->view('user/invoice',$data);
    }

    function uploadBukti(){
        $id_pesanan = $this->input->post('id_pesanan');
        $foto = $_FILES['bukti_bayar'];

        //print_r($id_pesanan);
        $this->M_Transaksi->saveBukti($id_pesanan,$foto);
    }

    function updateFoto(){
        $id_pelanggan   = $this->userSession['id'];
        $foto = $_FILES['foto_profil'];

        $this->M_User->updateFoto($id_pelanggan,$foto);
    }

    function tesLastPesanan(){
        $tes = $this->M_Transaksi->getLastIDRowPesanan()->result_array()[0];

        print_r($tes['id_pesanan']);
    }

    function logout(){
        session_destroy();
        redirect(base_url());
    }

}