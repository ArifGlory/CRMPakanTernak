<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Admin extends CI_Controller
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

        $this->userSession = $this->session->userdata();

        $hakAkses   = $this->userSession['hak_akses'];
        $level      = $this->userSession['level'];
        if($hakAkses != "") {

            if ($level != "admin"){
                redirect("Utama");
            }

        }else {
            redirect("Login");
        }
    }

    function index(){
        $data['pelanggan']      = $this->The_Model->getPelanggan(5)->result();
        $data['jml_pelanggan']  = $this->The_Model->getPelanggan(0)->num_rows();
        $data['jml_produk']     = $this->M_Produk->getProduk()->num_rows();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('part_admin/footer');
    }

    function pelanggan(){
        $data['pelanggan']      = $this->The_Model->getPelanggan(0)->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/data_pelanggan',$data);
        $this->load->view('part_admin/footer');
    }

}