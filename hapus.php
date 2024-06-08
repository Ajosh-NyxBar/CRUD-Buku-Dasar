<?php
include 'function.php';

if(delete_buku($_GET['id']) > 0){
    echo "<script>alert('Data Berhasil Dihapus');window.location.assign('index.php');</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.assign('index.php');</script>";
}
?>

