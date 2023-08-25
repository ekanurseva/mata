<?php
require_once '../konek.php';

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$jumlah_pertanyaan = jumlah_data("SELECT DISTINCT nama_gejala FROM gejala");

$jumper1 = ceil($jumlah_pertanyaan / 2);
$jumper2 = $jumlah_pertanyaan - $jumper1;

$pertanyaan1 = query("SELECT DISTINCT nama_gejala FROM gejala LIMIT $jumper1");
$pertanyaan2 = query("SELECT DISTINCT nama_gejala FROM gejala LIMIT $jumper2 OFFSET $jumper1");

$jawaban = query("SELECT * FROM jawaban");

$tgl_lahir = $user['tanggal_lahir'];
$tahun_lahir = date('Y', strtotime($tgl_lahir));
$tahun_sekarang = date('Y');
$usia = $tahun_sekarang - $tahun_lahir;

if (isset($_POST['submit'])) {
  if (hitung($_POST) > 0) {
    input_usia($_POST);
    // echo "
    //         <script>
    //             document.location.href='hasil.php';
    //         </script>
    //       ";
  } else {
    // echo "
    //         <script>
    //             document.location.href='tes.php';
    //         </script>
    //       ";
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
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
        <li class="active"><a href="tes.php">Tes Diagnosa</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profile.php">Profile</a></li>
        <li class=""> <a href="../keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">TES DIAGNOSA</h1>
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white fw-bold">Nama</label>
            <input type="email" class="form-control" value="<?php echo $user['nama']; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white fw-bold">Usia</label>
            <input type="email" name="usia" class="form-control" value="<?php echo $usia; ?>" readonly>
          </div>
          <h5 class="text-white">Silahkan Pilih Opsi Frekuensi Gejala yang Dialami Di Bawah untuk Mendapatkan Hasil
            Deteksi Penyakit dan
            Solusinya</h5>
          <div class="row">
            <div class="col-6 text-white">
              <?php
              $i = 1;
              foreach ($pertanyaan1 as $p1):
                ?>
                <h6 class="mb-2 mt-4">
                  <?= $i; ?>.
                  <?= $p1['nama_gejala']; ?>
                </h6>
                <?php foreach ($jawaban as $jawab): ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="<?= $jawab['kode_jawaban']; ?>"
                      id="<?= $jawab['kode_jawaban'] . $p1['nama_gejala']; ?>" name="<?= $p1['nama_gejala']; ?>">
                    <label class="form-check-label" for="<?= $jawab['kode_jawaban'] . $p1['nama_gejala']; ?>">
                      <?= $jawab['jawaban']; ?>
                    </label>
                  </div>
                  <?php
                endforeach;
                $i++;
              endforeach;
              ?>
            </div>
            <div class="col-6 text-white">
              <?php foreach ($pertanyaan2 as $p2):
                ?>
                <h6 class="mb-2 mt-4">
                  <?= $i; ?>.
                  <?= $p2['nama_gejala']; ?>
                </h6>
                <?php foreach ($jawaban as $jawab): ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="<?= $jawab['kode_jawaban']; ?>"
                      id="<?= $jawab['kode_jawaban'] . $p2['nama_gejala']; ?>" name="<?= $p2['nama_gejala']; ?>">
                    <label class="form-check-label" for="<?= $jawab['kode_jawaban'] . $p2['nama_gejala']; ?>">
                      <?= $jawab['jawaban']; ?>
                    </label>
                  </div>
                  <?php
                endforeach;
                $i++;
              endforeach;
              ?>
            </div>
          </div>
          <a href="hasil.php">
            <button type="submit" style="margin-left: 80%" class="btn btn-primary mt-5" name="submit">Submit</button>
          </a>

        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</body>

</html>