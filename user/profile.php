<?php
require_once('../konek.php');

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];


if ($user['jk'] == "L") {
  $jenis_kelamim = "Laki-Laki";
} else {
  $jenis_kelamim = "Perempuan";
}

if (isset($_POST['submit'])) {
  if (update_datadiri($_POST) > 0) {
    echo "
                  <script>
                  alert('Data Diri Berhasil Diubah');

                  </script>
              ";
  } else {
    echo "
                  <script>
                  alert('Data Diri Gagal Diubah');

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
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>

<body>
  <div class="main-container d-flex">
    <div class="sidebar px-3 pt-3">
      <div class="header pb-3">
        <img class="text-center" src="../img/<?php echo $user['foto']; ?>"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel"><?php echo $user['nama']; ?></h5>
      </div>
      <ul>
        <li class=""> <a href="index.php">Dashboard</a></li>
        <li class=""><a href="tes.php">Tes Diagnosa</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class="active"> <a href="profile.php">Profile</a></li>
        <li class=""> <a href="../keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">PROFILE</h1>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>">
          <input type="hidden" name="oldusername" value="<?= $user['username']; ?>">
          <input type="hidden" name="oldpassword" value="<?= $user['password']; ?>">
          <input type="hidden" name="oldemail" value="<?= $user['email']; ?>">
          <input type="hidden" name="oldfoto" value="<?= $user['foto']; ?>">

          <div class="profil text-center mt-4">
            <img src="../img/<?php echo $user['foto']; ?>" alt="" style="width:100px;">

            <div class="mb-3 mt-2">
              <input style="width: 250px; margin-left: 37%;" name="foto" class="form-control" type="file" id="formFile">
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Nama</label>
            <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Username</label>
            <input type="text" class="form-control" value="<?= $user['username']; ?>" name="username">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" name="jk">
              <option value="<?= $user['jk']; ?>" selected hidden><?= $jenis_kelamim; ?></option>
              <option value="P">Perempuan</option>
              <option value="L">Laki-Laki</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Tanggal Lahir</label>
            <input type="date" value="<?= $user['tanggal_lahir']; ?>" class="form-control" name="tanggal_lahir">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Email</label>
            <input type="email" class="form-control" value="<?= $user['email']; ?>" name="email">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" value="<?= $user['password']; ?>"
              name="password">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Konfirmasi Password</label>
            <input type="password" class="form-control" value="<?= $user['password']; ?>" name="password2">
          </div>

          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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