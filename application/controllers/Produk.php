<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:39
 */
class Produk extends CI_Controller
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

        $hakAkses = $this->userSession['hak_akses'];
        if($hakAkses != "") {

        }else {
            redirect("Login");
        }
    }

    function index(){
        $data['produk'] = $this->M_Produk->getProduk()->result();
        $data['kategori'] = $this->M_Produk->getKategori()->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/data_produk',$data);
        $this->load->view('part_admin/footer');
    }

    function simpanProduk(){
        $data = $this->input->post();
        $foto = $_FILES['foto_utama'];

        $this->M_Produk->saveProduk($data,$foto);
    }

    function ubahProduk(){
        $data = $this->input->post();
        $foto = $_FILES['foto_utama'];

        $this->M_Produk->updateProduk($data,$foto);
    }

    function hapusProduk(){
        $id =  $this->input->post('id_produk');

        $this->M_Produk->deleteProduk($id);
    }

    function moreGambar($id_produk){
        $data['produk'] = $this->M_Produk->getSingleProduk($id_produk)->result_array()[0];
        $data['gambar'] = $this->M_Produk->getGambarProduk($id_produk)->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/gambar_produk',$data);
        $this->load->view('part_admin/footer');
    }

    function uploadGambar(){
        $foto = $_FILES['file'];
        $id_produk = $this->input->post('id_produk');

        $this->M_Produk->saveGambar($id_produk,$foto);
    }

    function hapusGambar($idGambar){

        $this->M_Produk->deleteGambar($idGambar);
    }

    function detailGambar($idGambar){
        $data['gambar'] = $this->M_Produk->getSingleGambar($idGambar)->result();

        print_r($data['gambar']);
    }

    function detailProduk($idProduk){
        $produk = $this->M_Produk->getSingleProduk($idProduk)->result();
        print_r($produk);
    }

}