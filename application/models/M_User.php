<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 31/08/2019
 * Time: 10:31
 */
class M_User extends CI_Model
{

    function saveUser($data){
        $query =  $this->db->insert('tb_pelanggan',$data);
        $redirect       =  base_url()."Utama/loginPelanggan";

        if($query){
            $response['status']     = "success";
            $response['message']    = "Pendaftaran berhasil ! , Silahkan Login";
            $response['redirect']   = $redirect;

            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Gagal menyimpan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function signInUser($data){
        $email = $data ['email'];
        $password = $data ['password'];

        $q = $this->db->query("SELECT * FROM `tb_pelanggan` WHERE `email` = '$email' AND `password` = '$password' ");


        if(count($q->result()) > 0){

            $user = $q->result_array()[0];
            //print_r($admin['nama']);

            $user = array(
                'hak_akses' => "true",
                'nama'      => $user['nama_pelanggan'],
                'id'        => $user['id_pelanggan'],
                'level'        => "pelanggan"
            );

            $this->session->set_userdata($user);
            $response['status']     = "success";
            $response['message']    = "Login berhasil";
            $response['redirect']   = base_url()."Utama/produk";

            $response = json_encode($response);
            echo $response;

        }else{
            $response['status']     = "error";
            $response['message']    = "Login gagal, periksa kembali email / password anda";

            $response = json_encode($response);
            echo $response;
        }
    }

    function saveKeranjang($data){
        $query =  $this->db->insert('tb_keranjang',$data);
        $redirect       =  base_url()."User/keranjang";

        if($query){
            $response['status']     = "success";
            $response['message']    = "Berhasil dimasukkan ke keranjang";
            $response['redirect']   = $redirect;

            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Gagal menyimpan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function getDataKeranjang($idPelanggan){
        $q = $this->db->query("SELECT * FROM tb_keranjang 
        INNER JOIN tb_produk 
            ON (tb_keranjang.id_produk = tb_produk.id_produk)
            WHERE tb_keranjang.id_pelanggan = $idPelanggan
            ORDER BY tb_produk.id_produk DESC");

        return $q;
    }
}