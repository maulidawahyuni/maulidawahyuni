
<?php

include('koneksi.php');
$db = new database();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if($action == "login"){
    if($db->login($_POST['username'],$_POST['password'])){
        header("location:index.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
}

else if($action == "delete"){
    $db->delete_data($_GET['id_barang']);
    header("location:index.php");
}

else if($action == "edit"){
    $db->edit_data($_POST['id_barang'],$_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header("location:index.php");
}

else if($action == "delete"){
    $db->delete_data($_GET['id_barang']);
    header("location:index.php");
}

else if($action == "logout"){
    $db->logout();
    exit;
}

else if($action == "add"){
    $db->tambah_data($_POST['nama_barang'],$_POST['stok'],$_POST['harga_beli'],$_POST['harga_jual']);
    header("location:index.php");
}

else {
    header("location:login.php");
    exit;
}
?>

