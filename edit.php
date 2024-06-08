<?php
include 'function.php';

$id = $_GET['id'];
$buku = tampil_data("SELECT * FROM buku WHERE id = $id")[0];

if(isset($_POST['tambah'])){
    if(update_buku($_POST) > 0){
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
                <input type="hidden" name="gambarLama" value="<?php echo $buku['gambar']; ?>">
                <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
                <div class="form-group">
                    <label for="">Nama BUKU</label>
                    <input type="text" class="form-control" name="nama_buku" value="<?php echo $buku['nama_buku']; ?>">
                </div>
                <div class="form-group">
                    <label for="">ISBN</label>
                    <input type="text" class="form-control" name="isbn" value="<?php echo $buku['isbn']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Penulis</label>
                    <input type="text" class="form-control" name="penulis" value="<?php echo $buku['penulis']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Tahun Terbit</label>
                    <input type="text" class="form-control" name="tahun_terbit" value="<?php echo $buku['penerbit']; ?>">
                </div>
                <div class="form-group">
                    <img src="<?php echo $buku['gambar']; ?>" width="100" class="gambar">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group">
                <div class="form-group mt-3">
                    <button class="btn btn-primary" name="tambah">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>