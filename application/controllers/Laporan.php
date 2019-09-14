<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 28/08/2019
 * Time: 14:12
 */
class Laporan extends CI_Controller
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

        $bulan = date('m');
        $tahun = date('Y');
        $data['penjualan']          = $this->M_Transaksi->getLaporanPenjualan($bulan,$tahun)->result();

        $this->load->view('part_admin/header');
        $this->load->view('part_admin/sidebar');
        $this->load->view('admin/laporan',$data);
        $this->load->view('part_admin/footer');
    }

    function penjualan(){

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['penjualan']          = $this->M_Transaksi->getLaporanPenjualan($bulan,$tahun)->result();
        $data['detail_penjualan']   = $this->M_Transaksi->getDetailLaporanPenjualan()->result();
        $data['tanggal']        = date('Y-m-d');

        //print_r($data['detail_penjualan']);
        //$this->load->view('report/report_penjualan',$data);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_penjualan',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function barang(){

        $data['barang']          = $this->M_Produk->getLaporanBarang()->result();
        $data['tanggal']        = date('Y-m-d');

        //$this->load->view('report/report_barang',$data);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_barang',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function kas(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['kas']          = $this->M_Transaksi->getLaporanPenjualan($bulan,$tahun)->result();

        $data['tanggal']        = date('Y-m-d');

       // $this->load->view('report/report_kas',$data);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('report/report_kas',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }



}