<?php
include("konek.php");
$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$data_user = query("SELECT * FROM user");
if (isset($_POST["submit"])) {
  // register($_POST);
  if (register_pengguna($_POST) > 0) {
    echo "
    <script>
      alert('Register Berhasil');
      document.location.href='pengguna.php';
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
  <div class="main-container d-flex">
    <div class="sidebar px-3 pt-3">
      <div class="header pb-3">
        <img class="text-center" src="img/<?php echo $user['foto']; ?>"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel"><?php echo $user['nama']; ?></h5>
      </div>
      <ul>
        <li class=""> <a href="admin.php">Dashboard</a></li>
        <li class="active"><a href="pengguna.php">Data Pengguna</a></li>
        <li class=""> <a href="pertanyaan.php">Data Jawaban</a></li>
        <li class=""><a href="gejala.php">Data Gejala</a></li>
        <li class=""><a href="penyakit.php">Penyakit dan Solusi</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profil.php">Profile</a></li>
        <li class=""> <a href="keluar.php">Keluar</a></li>
      </ul>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">INPUT DATA PENGGUNA</h1>
        <form action="" method="post">
          <div class="mb-3 text-white">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jk" aria-label="Default select example">
              <option hidden selected>Jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password2" class="form-control">
          </div>

          <div class="level text-white mb-2">
            <label for="">Level</label>
          </div>

          <div class="form-check form-check-inline text-white">
            <input class="form-check-input" type="radio" name="level" id="user" value="user">
            <label class="form-check-label" for="user">User</label>
          </div>
          <div class="form-check form-check-inline text-white">
            <input class="form-check-input" type="radio" name="level" id="admin" value="admin">
            <label class="form-check-label" for="admin">Admin</label>
          </div>

          <div class="mt-4">
            <button type="submit" name="submit" class="btn btn-primary mb-3">Simpan</button>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script>
      $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      })
    </script>

</body>

</html>