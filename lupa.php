<?php
require_once 'konek.php';

$email = dekripsi($_GET['key']);

$data = query("SELECT * FROM user WHERE email = '$email'")[0];

if (isset($_POST['submit'])) {
  $iduser = $_POST['iduser'];
  $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
  $password2 = mysqli_real_escape_string($koneksi, $_POST["password2"]);

  if ($password !== $password2) {
    $error = true;
  } else {
    $password = password_hash($password2, PASSWORD_DEFAULT);

    $query = "UPDATE user SET 
                      password = '$password'
                    WHERE iduser = '$iduser'
                  ";
    mysqli_query($koneksi, $query);

    echo "
            <script>
                alert('Password berhasil diubah, silahkan login');
                document.location.href='login.php';
            </script>
          ";
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <div class="main-container d-flex">

    <div class="container">
      <div class="head">
        <div class="text-center">
          <h1 style="margin-top: 25px; color: white; padding: 30px 35px;">SELAMAT DATANG DI SISTEM PAKAR DIAGNOSA
            PENYAKIT MATA</h1>
        </div>
        <div class="row">
          <div class="col-6 mt-1 ms-5">
            <img src="img/mtt.png" style="width: 450px; height: 320px" alt="">
          </div>
          <div class="col-6 login mt-3">
            <form action="" method="post">
              <h5 style="color: white; text-align: center; margin-top: 6">Ubah Password</h5>
              <input type="hidden" name="iduser" value="<?= $data['iduser']; ?>">
              <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                  Password tidak sesuai
                </div>
              <?php endif; ?>
              <input type="text" class="form-control mb-4" id="" value="<?= $data['nama']; ?>" disabled>
              <label class="form-label" style="color: white">New Password</label>
              <input placeholder="Password" type="password" class="form-control" name="password">
              <label class="form-label" style="color: white">Konfirmasi Password</label>
              <input placeholder="Konfirmasi Password" type="password" class="form-control mb-4" name="password2">

              <button type="submit" name="submit" class="btn btn-primary lg mb-3">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</body>

</html>