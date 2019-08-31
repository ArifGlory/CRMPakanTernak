<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * User: Glory
 * Date: 12/07/2019
 * Time: 08:51
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('The_Model');
    }

    function index(){
        $this->load->view('admin/login_admin');
    }
       
    function cekLoginAdmin(){
       
        $data = $_POST;
       
        // $data['username'] = $this->input->post('username');
        // $data['password'] = $this->input->post('password');
        $this->The_Model->signInAdmin($data);
    }

    function logout(){
        session_destroy();
        redirect(base_url());
    }





}