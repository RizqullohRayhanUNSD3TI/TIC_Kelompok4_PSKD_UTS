<?php
error_reporting(0);
session_start();
?>
<html>
    <head>
        <title>MD5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body {
                background: url(bg.jpg) no-repeat center center fixed;
                background-size: cover;
            } 
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="p-3 bg-dark text-white">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="caesar.php" class="nav-link px-2 text-white">Caesar</a></li>
                    <li><a href="vigenere.php" class="nav-link px-2 text-white">Vigenere</a></li>
                    <li><a href="aes.php" class="nav-link px-2 text-white">AES</a></li>
                    <li><a href="rsa.php" class="nav-link px-2 text-white">RSA</a></li>
                    <li><a href="md5.php" class="nav-link px-2 text-secondary">MD5</a></li>
                </ul>

                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    Kelompok 4
                </div>

                <div class="text-end">
                    <a href="../SKD/Login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="../SKD/Registrasi.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>
            </div>
            </div>
        </header>
        <br><br>
        <div class="container alert alert-success col-md-6">
            <div class="row">
                <div class="col-md">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="pesan"><h5>Masukkan Pesan</h5></label><br>
                            <textarea name="pesan" id="pesan" class="form-control"><?=$_SESSION["pesan"]?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn-enkripsi" name="btn-enkripsi">Enkripsi</button>
                            <button type="submit" class="btn btn-primary" id="btn-reset" name="btn-reset">Reset</button>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="hasil"><h5>Hasil</h5></label>
                            <textarea name="hasil" id="hasil" class="form-control"><?=$_SESSION['hasil']?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if (isset($_POST['btn-enkripsi'])) {
    $pesan = $_SESSION['pesan'] = $_POST['pesan'];
    $_SESSION['hasil'] = md5($pesan);
    header("Refresh:0");
} else if (isset($_POST['btn-reset'])){
    session_destroy();
    header("Refresh:0");
}