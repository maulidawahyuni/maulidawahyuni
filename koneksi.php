<?php

class database{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop";
    var $koneksi = "";

    function __construct(){
        session_start();
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function login($username,$password){
        $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($data);
        if($cek > 0){
            $_SESSION['status'] = "login";
            return true;
        } else {
            return false;
        }
    }

    function cek_login(){
        if($_SESSION['status'] != "login"){
            header("location:login.php");
        }
    }

    function logout(){
        session_destroy();
        header("location:login.php");
    }

    function tampil_data(){
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_data($nama_barang,$stok,$harga_beli,$harga_jual){
    mysqli_query($this->koneksi, 
        "INSERT INTO tb_barang (nama_barang,stok,harga_beli,harga_jual)
         VALUES ('$nama_barang','$stok','$harga_beli','$harga_jual')");
         }

    function tampil_edit_data($id_barang){
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$id_barang'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function edit_data($id_barang,$nama_barang,$stok,$harga_beli,$harga_jual){
        mysqli_query($this->koneksi, "update tb_barang set nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' where id_barang='$id_barang'");
    }

    function delete_data($id_barang){
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }

    function cari_data($nama_barang){
        $data = mysqli_query($this->koneksi, "select * from tb_barang where nama_barang LIKE '%$nama_barang%'");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
}

?>

