<?php
include 'koneksi.php';


function tampil_data($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_buku($data)
{
    global $koneksi;
    $gambar = upload();
    $nama_buku = $_POST['nama_buku'];
    $isbn = $_POST['isbn'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO buku (nama_buku, isbn, penulis, penerbit, gambar) VALUES('$nama_buku', '$isbn', '$penulis', '$tahun_terbit', '$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function cari_buku($keyword)
{
    global $koneksi;
    $query = "SELECT * FROM buku WHERE nama_buku LIKE '%$keyword%' OR isbn LIKE '%$keyword%' OR penulis LIKE '%$keyword%' OR penerbit LIKE '%$keyword%'";
    return tampil_data($query);
}

function update_buku($data)
{
    global $koneksi;
    $id_buku = $data['id'];
    $nama_buku = $data['nama_buku'];
    $isbn = $data['isbn'];
    $penulis = $data['penulis'];
    $tahun_terbit = $data['tahun_terbit'];
    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE buku SET nama_buku = '$nama_buku', isbn = '$isbn', penulis = '$penulis', penerbit = '$tahun_terbit', gambar = '$gambar' WHERE id = '$id_buku'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function delete_Buku($id)
{
    global $koneksi;
    $query = "DELETE FROM buku WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload()
{
    global $koneksi;
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $dir = "gambar/";
    $path = $dir . $nama_file;

    if ($error == 4) {
        echo "<script>alert('Pilih Gambar Terlebih Dahulu');</script>";
        return false;
    }
    $eksGambarValid = ['jpeg', 'png', 'jpg'];
    $eksGambar = explode('.', $nama_file);
    $eksGambar = strtolower(end($eksGambar));
    if (!in_array($eksGambar, $eksGambarValid)) {
        echo "<script>alert('Format Gambar Tidak Valid');</script>";
        return false;
    }

    if ($ukuran_file > 2000000) {
        echo "<script>alert('Ukuran Gambar Tidak Boleh Lebih Dari 2 MB');</script>";
        return false;
    }
    $new = uniqid() . '_' . $nama_file;
    $path = $dir . $new;
    move_uploaded_file($tmp_file, $path);
    return $path;
}

function register($data)
{
    global $koneksi;
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function login($data)
{
    global $koneksi;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    return mysqli_query($koneksi, $query);
}

?>