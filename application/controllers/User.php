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

        $data = array(
            'id_produk' =>$id_produk,
            'id_pelanggan' =>$id_pelanggan,
            'jumlah' => $jumlah
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

    function logout(){
        session_destroy();
        redirect(base_url());
    }

}