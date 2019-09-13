<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 22/11/2018
 * Time: 13:51
 */
class The_Model extends CI_Model
{

    function getPelanggan($limit){
        if ($limit > 0){
            $this->db->limit($limit);
        }
        $data = $this->db->get("tb_pelanggan");
        return $data;
    }

    function signInAdmin($data){
        $username = $data ['username'];
        $password = $data ['password'];
       
        $q = $this->db->query("SELECT * FROM `tb_admin` WHERE `username` = '$username' AND `password` = '$password' ");


        if(count($q->result()) > 0){
           
            $admin = $q->result_array()[0];
            //print_r($admin['nama']);
            if ($admin['level'] == "super"){
                $level = "admin";
            }else{
                $level = $admin['level'];
            }
           
            $user = array(
                'hak_akses' => "true",
                'nama'      => $admin['nama'],
                'id'        => $admin['id_admin'],
                'level'     => $level
            );

            $this->session->set_userdata($user);
            $response['status']     = "success";
            $response['message']    = "Login berhasil";
            $response['redirect']   = "Admin";
            
            $response = json_encode($response);
            echo $response;

        }else{
            $response['status']     = "error";
            $response['message']    = "Login gagal, periksa kembali username / password anda";

            $response = json_encode($response);
            echo $response;
        }
    }


}