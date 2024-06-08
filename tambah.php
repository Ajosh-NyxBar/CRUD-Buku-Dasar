<?php
include 'function.php';

if(isset($_POST['tambah'])){
    if(tambah_buku($_POST) > 0){
        echo "<script>alert('Data Berhasil Disimpan');window.location.assign('index.php');</script>";
    }else{
        echo "<script>alert('Data Gagal Disimpan');window.location.assign('index.php');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="row w-50 border border-primary rounded-3 p-3">
            <form action="" class="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama BUKU</label>
                    <input type="text" class="form-control" name="nama_buku">
                </div>
                <div class="form-group">
                    <label for="">ISBN</label>
                    <input type="text" class="form-control" name="isbn">
                </div>
                <div class="form-group">
                    <label for="">Penulis</label>
                    <input type="text" class="form-control" name="penulis">
                </div>
                <div class="form-group">
                    <label for="">Penerbit</label>
                    <input type="text" class="form-control" name="tahun_terbit">
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" name="tambah">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>