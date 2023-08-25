<?php
include("konek.php");

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$iddiagnosa = $_GET['id'];
$data = query("SELECT * FROM diagnosa WHERE iddiagnosa = $iddiagnosa")[0];

if (isset($_POST['submit_penyakit'])) {
  if (update_penyakit($_POST) > 0) {
    update_field($_POST);
    echo "
          <script>
          alert('Data Berhasil Diubah');
          document.location.href='penyakit.php';
          </script>
      ";
  } else {
    echo "
          <script>
          alert('Data Gagal Diubah');
          document.location.href='penyakit.php';
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
    <div class="sidebar px-3 pt-3">
      <div class="header pb-3">
        <img class="text-center" src="img/<?php echo $user['foto']; ?>"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel"><?php echo $user['nama']; ?></h5>
      </div>
      <ul>
        <li class=""> <a href="admin.php">Dashboard</a></li>
        <li class=""><a href="pengguna.php">Data Pengguna</a></li>
        <li class=""> <a href="pertanyaan.php">Data Jawaban</a></li>
        <li class=""><a href="gejala.php">Data Gejala</a></li>
        <li class="active"><a href="penyakit.php">Penyakit dan Solusi</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profil.php">Profile</a></li>
        <li class=""> <a href="keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">EDIT PENYAKIT</h1>
        <form action="" method="post">
          <input type="hidden" name="iddiagnosa" value="<?= $data['iddiagnosa']; ?>">

          <div class="mb-3 text-white">
            <label class="form-label">Penyakit</label>
            <input type="text" value="<?= $data['nama_diagnosa']; ?>" name="penyakit" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Kode Penyakit</label>
            <input type="text" value="<?= $data['kode_diagnosa']; ?>" name="kode_penyakit" class="form-control">
          </div>
          <div class="mb-3 text-white">
            <label class="form-label">Deskripsi </label>
            <input type="text" value="<?= $data['deskripsi']; ?>" name="deskripsi" class="form-control">
          </div>
          <button type="submit" name="submit_penyakit" class="btn btn-primary mb-3">Simpan</button>
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