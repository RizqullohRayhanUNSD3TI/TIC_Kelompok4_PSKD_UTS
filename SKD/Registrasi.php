<!Doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Registration - SKD (Kel 4)</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="style.css">
</head>

<body className='snippet-body'>

    <header class="p-3 bg-dark text-white sticky-top">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../enkripsidekripsi/caesar.php" class="nav-link px-2 text-white">Caesar</a></li>
                <li><a href="../enkripsidekripsi/vigenere.php" class="nav-link px-2 text-white">Vigenere</a></li>
                <li><a href="../enkripsidekripsi/aes.php" class="nav-link px-2 text-white">AES</a></li>
                <li><a href="../enkripsidekripsi/rsa.php" class="nav-link px-2 text-white">RSA</a></li>
                <li><a href="../enkripsidekripsi/md5.php" class="nav-link px-2 text-white">MD5</a></li>
            </ul>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                Kelompok 4
            </div>

            <div class="text-end">
                <a href="Login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                <a href="Registrasi.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
            </div>
        </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="logo">
            <img src=logo.png alt="">
        </div>
        <div class="text-center mt-4 name">
            Registration
        </div>
        <form class="p-3 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nama" id="name" placeholder="Name" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class='fas fa-map-marker-alt'></span>
                <input type="text" name="alamat" id="address" placeholder="Address" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class='fas fa-mobile-alt'></span>
                <input type="number" name="nomor" id="noHp" placeholder="No. HP" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="pass1" name="password" id="pwd" placeholder="Password" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="pass2" name="passwordConfirm" id="passwordConfirm" placeholder="Password Confirm" required>
            </div>
            <button class="btn mt-3" name="registrasi" type="submit">Registration</button>
        </form>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>

</body>

</html>
<?php
require('koneksi.php');
if (isset($_POST['registrasi'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pass1 = mysqli_real_escape_string($koneksi, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($koneksi, $_POST['pass2']);
    $password = md5($pass1);
    
    if($pass1==$pass2){
        $hasil = mysqli_query($koneksi,"INSERT INTO data (nama, alamat, nomor, email, password) 
        VALUES ('$nama', '$alamat', $nomor, '$email', '$password'); "); 
        if($hasil==1){
            echo "<script>alert('Data Berhasil Diinput !')</script>";
            header('Location:Login.php');
        }else{
            echo "<script>alert('Data Gagal Diinput !')</script>";
        }
    }else{
        echo "<script>alert('Konfirmasi Password Salah !')</script>";
    }
}

?>