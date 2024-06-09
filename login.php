<?php
include 'function.php';
if(isset($_POST['submit'])){
    login($_POST);
    if(mysqli_affected_rows($koneksi) > 0){
        session_start();
        $_SESSION['username'] = $_POST['username'];
        echo "<script>alert('Login Berhasil');window.location.assign('index.php');</script>";
    }else{
        echo "<script>alert('Login Gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>