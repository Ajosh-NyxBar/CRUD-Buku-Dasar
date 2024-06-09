<?php
include 'function.php';

if(isset($_POST['submit'])){
    register($_POST);
    if(mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Register Berhasil');window.location.assign('login.php');</script>";
    }else{
        echo "<script>alert('Register Gagal');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container vh-100 justify-content-center align-items-center d-flex">
        <div class="row w-50">
            <form action="" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <label for="User">Username</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="form-group"></div>
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50" name="submit">Register</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>