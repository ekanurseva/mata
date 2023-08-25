<?php
include("konek.php");

if (isset($_POST["submit_user"])) {
  if (register($_POST) > 0) {
    echo "
    <script>
    alert('Registrasi Sukses');
    document.location.href='login.php';
    </script>
    ";
  } else {
    echo "<script>
    alert('Registrasi Gagal');
    </script>";
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
  <div class="main-container d-flex" style="padding: 0 280px">

    <div class="container">
      <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">DAFTAR AKUN</h1>
      <form action="" method="post">
        <div class="mb-3 text-white">
          <label class="form-label">Nama</label>
          <input name="nama" required type="text" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Username</label>
          <input name="username" required type="text" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Jenis Kelamin</label>
          <select name="jk" required class="form-select" aria-label="Default select example">
            <option hidden selected>Open this select menu</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Telepon</label>
          <input name="telepon" required type="text" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Tanggal Lahir</label>
          <input name="tanggal_lahir" required type="date" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Email</label>
          <input name="email" required type="email" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Password</label>
          <input name="password" required type="password" class="form-control">
        </div>
        <div class="mb-3 text-white">
          <label class="form-label">Konfirmasi Password</label>
          <input name="password2" required type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mb-3" name="submit_user">
          Daftar
        </button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</body>

</html>