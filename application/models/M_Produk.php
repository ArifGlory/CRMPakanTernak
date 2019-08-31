<?php

/**
 * Created by PhpStorm.
 * User: Glory
 * Date: 29/08/2019
 * Time: 6:03
 */
class M_Produk extends CI_Model
{

    function getKategori(){
        $data = $this->db->get("tb_kategori");
        return $data;
    }

    function getProduk(){
        $q = $this->db->query("SELECT * FROM tb_produk 
        INNER JOIN tb_kategori 
            ON (tb_produk.id_kategori = tb_kategori.id_kategori)
            WHERE tb_produk.id_kategori = tb_kategori.id_kategori
            ORDER BY tb_produk.id_kategori DESC");

        return $q;
    }

    function saveProduk($data,$foto){
        $target_dir = "foto/produk/";
        $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
        $nmfile     = "file_".time() . "." . $imgType;
        $targetFile = $target_dir . $nmfile;
        $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile);

        $data['foto_utama']   = $nmfile;
        $redirect       =  base_url()."Produk";

        if($uploaded){
            $query =  $this->db->insert('tb_produk',$data);

            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil disimpan";
                $response['redirect']   = $redirect;

                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }

        }else{
            $response['status']     = "error";
            $response['message']    = "Upload gagal, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function saveGambar($id_produk,$foto){
        $target_dir = "foto/produk/";
        $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
        $nmfile     = $id_produk."file_".time() . "." . $imgType;
        $targetFile = $target_dir . $nmfile;
        $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile);
        $redirect       =  base_url()."Produk/moreGambar/".$id_produk;

        $data = array(
          'nama_gambar'=>$nmfile,
            'id_produk'=>$id_produk
        );

        if($uploaded){
            $query =  $this->db->insert('gambar_produk',$data);

            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil disimpan";
                $response['redirect']   = $redirect;

                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }
        }else{
            $response['status']     = "error";
            $response['message']    = "Upload gagal, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }


    }

    function updateProduk($data,$foto){
        $redirect       =  base_url()."Produk";

        if($foto['name'] == null || $foto['name'] == ""){
            if(isset($data['foto_utama'])){
                unset($data['foto_utama']);
            }

            $id_produk = $data['id_produk'];
            $this->db->where('id_produk',$id_produk);
            $query =  $this->db->update("tb_produk",$data);
            if($query){
                $response['status']     = "success";
                $response['message']    = "Data berhasil diubah";
                $response['redirect']   = $redirect;

                $response = json_encode($response);
                echo $response;
            }else{
                $response['status']     = "error";
                $response['message']    = "Gagal menyimpan, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }
        }else{
            $target_dir = "foto/produk/";
            $imgType    = substr($foto['type'],strpos( $foto['type'],"/") + 1);
            $nmfile     = "file_".time() . "." . $imgType;
            $targetFile = $target_dir . $nmfile;
            $uploaded   = move_uploaded_file($foto['tmp_name'],$targetFile);

            $data['foto_utama']   = $nmfile;
            $id_produk = $data['id_produk'];

            if($uploaded){
                $this->db->where('id_produk',$id_produk);
                $query =  $this->db->update("tb_produk",$data);

                if($query){
                    $response['status']     = "success";
                    $response['message']    = "Data berhasil diubah";
                    $response['redirect']   = $redirect;

                    $response = json_encode($response);
                    echo $response;
                }else{
                    $response['status']     = "error";
                    $response['message']    = "Gagal menyimpan, coba lagi nanti";

                    $response = json_encode($response);
                    echo $response;
                }
            }else{
                $response['status']     = "error";
                $response['message']    = "Upload gagal, coba lagi nanti";

                $response = json_encode($response);
                echo $response;
            }
        }
    }

    function deleteProduk($id){
        $this->db->where('id_produk',$id);
        $query = $this->db->delete('tb_produk');
        $redirect =  base_url()."Produk";

        if($query){
            $response['status']     = "success";
            $response['message']    = "Data berhasil dihapus";
            $response['redirect']   = $redirect;

            $response = json_encode($response);
            echo $response;
        }else{
            $response['status']     = "error";
            $response['message']    = "Terjadi kesalahan, coba lagi nanti";

            $response = json_encode($response);
            echo $response;
        }
    }

    function deleteGambar($idGambar){
        $gambar = $this->getSingleGambar($idGambar)->result_array()[0];
        $idProduk = $gambar['id_produk'];
        $namaGambar = $gambar['nama_gambar'];
        $redirect =  base_url()."Produk/moreGambar/".$idProduk;
        $target_dir = "foto/produk/";


        $hapus = unlink($target_dir.$namaGambar);

        if ($hapus){
            $this->db->where('id_gambar',$idGambar);
            $query = $this->db->delete('gambar_produk');
            if($query){
                redirect($redirect);
            }else{
                echo "<script>alert('Gambar gagagal didelete dari database');</script>";
            }
        }else{
            echo "<script>alert('Gambar gagagal dihapus');</script>";
        }


    }

    function getSingleProduk($id){
        $q = $this->db->query("SELECT * FROM tb_produk 
        INNER JOIN tb_kategori 
            ON (tb_produk.id_kategori = tb_kategori.id_kategori)
            WHERE tb_produk.id_kategori = tb_kategori.id_kategori
            AND tb_produk.id_produk = $id");

        return $q;

      /*  $this->db->from("tb_produk");
        $this->db->where('id_produk',$id);
        $query = $this->db->get();
        return $query;*/
    }

    function getSingleGambar($idGambar){
        $q = $this->db->query("SELECT * FROM `gambar_produk` WHERE `id_gambar` = $idGambar");
      /*  $this->db->from("gambar_produk");
        $this->db->where('id_gambar',$idGambar);
        $query = $this->db->get();*/
        return $q;
    }

    function getGambarProduk($id_produk){
        $this->db->from("gambar_produk");
        $this->db->where('id_produk',$id_produk);
        $query = $this->db->get();
        return $query;
    }
}