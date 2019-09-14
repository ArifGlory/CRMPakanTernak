<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 22/11/2018
 * Time: 13:51
 */
class Utama extends CI_Controller
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
     
    }

    function index(){
       
      redirect('Utama/dashboard');
    }

    function dashboard(){
       
        $data['tanggal']    = date('d-F-Y');
        $data['nama_hari']  = $this->getHariIni();

        $this->load->view('parts/header');
        $this->load->view('home');
        $this->load->view('parts/footer');
    }

    function produk(){
        $data['produk'] = $this->M_Produk->getProduk()->result();
        $this->load->view('parts/header');
        $this->load->view('produk',$data);
        $this->load->view('parts/footer');
    }

    function detailProduk($idProduk){

        $session = $this->session->userdata();
        if (isset($session['foto'])){
            $foto_pelanggan = $session['foto'];
        }else{
            $foto_pelanggan = base_url()."foto/pelanggan/ava2.png";
        }


        $data['produk'] = $this->M_Produk->getSingleProduk($idProduk)->result_array()[0];
        $data['gambar'] = $this->M_Produk->getGambarProduk($idProduk)->result();
        $data['ulasan'] = $this->M_Produk->getUlasan($idProduk)->result();
        $data['all_ulasan'] = $this->M_Produk->getAllUlasan($idProduk)->result();
        $data['foto_pelanggan']   = $foto_pelanggan;

        $this->load->view('parts/header');
        $this->load->view('detail_produk',$data);
        $this->load->view('parts/footer');
    }


    function daftar(){
        $this->load->view('parts/header');
        $this->load->view('user/daftar');
        $this->load->view('parts/footer');
    }

    function tentang(){
        $this->load->view('parts/header');
        $this->load->view('tentang');
        $this->load->view('parts/footer');
    }

    function simpanUser(){
        $data = $this->input->post();

        $this->M_User->saveUser($data);
    }

    function signInUser(){
        $data = $this->input->post();
        $this->M_User->signInUser($data);
    }

    function tes(){
       
        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('parts/blank_content');
        $this->load->view('parts/footer');
    }

    function loginPelanggan(){
        $this->load->view('parts/header');
        $this->load->view('user/login_user');
        $this->load->view('parts/footer');
    }

    function getHariIni(){
        $hari = date ("D");
     
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
            case 'Mon':			
                $hari_ini = "Senin";
            break;
            case 'Tue':
                $hari_ini = "Selasa";
            break;
            case 'Wed':
                $hari_ini = "Rabu";
            break;
            case 'Thu':
                $hari_ini = "Kamis";
            break;
            case 'Fri':
                $hari_ini = "Jumat";
            break;
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
     
        return "" . $hari_ini . "";
    }

  
}