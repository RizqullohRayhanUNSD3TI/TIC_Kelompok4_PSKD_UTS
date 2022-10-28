<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login - SKD (Kel 4)</title>
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
            Login
        </div>
        <form class="p-3 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <button class="btn mt-3" name="login" type="submit">Login</button>
        </form>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function (e) {
            e.preventDefault();
        });
    </script>

</body>

</html>
<?php
if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($_POST['password']);
    $pswd = md5($password);
    $q=mysqli_query($koneksi,"SELECT * FROM data WHERE username='$username' and password='$password'");
    if($q)
    {
        $row=mysqli_fetch_array($q);
        if($row['username']==$username && $row['password']==$pswd)
        {
            echo"<script>alert('Login Berhasil !')</script>";
            echo"<meta http-equiv='refresh' content='0'>";
        }
        else
        {
            echo"<script>alert('Data Tidak Ditemukan !')</script>";
            echo"<meta http-equiv='refresh' content='0'>";
        }
    }
}
?>