<?php
include 'function.php';

$buku = tampil_data('SELECT * FROM buku');

if (isset($_POST['keyword'])) {
    $buku = cari_buku($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div
        class="container vh-100 d-flex flex-column justify-content-center align-items-center border border-primary rounded-4 p-4 mt-5 mb-5">
        <nav class="navbar navbar-expand-lg bg-light justify-content-center mb-5">
            <div class="container-fluid">
                <form action="" class="d-flex" method="post">
                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                    <button class="btn btn-primary ms-3">Search</button>
                </form>
            </div>
        </nav>
        <div class=" w-100 border border-primary rounded-4 p-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($buku as $row) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img src="<?php echo $row['gambar']; ?>" width="100" class="gambar"></td>
                            <td><?php echo $row['nama_buku']; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['penulis']; ?></td>
                            <td><?php echo $row['penerbit']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>"><button
                                        class="btn btn-primary">Edit</button></a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>"><button
                                        class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </thead>
            </table>
            <div class="d-flex justify-content-center">
                <form action="tambah.php" class="d-flex">
                    <button class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>