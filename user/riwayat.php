<?php
require_once '../konek.php';

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$data = query("SELECT * FROM hasil_diagnosa WHERE iduser = $id");


?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
        <li class="active"> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profile.php">Profile</a></li>
        <li class=""> <a href="../keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">RIWAYAT TES</h1>

        <div class="row align-items-start text-center" style="margin-top: 17px">
          <table class="table" id="example2">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Waktu</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($data as $d):
                $waktu_tes = strftime('%H:%M:%S / %d %B %Y', strtotime($d['tanggal']));
                $iduser = $d['iduser'];
                $nama = query("SELECT nama FROM user WHERE iduser = $iduser")[0];
                ?>
                <tr>
                  <th scope="row">
                    <?= $i; ?>
                  </th>
                  <td>
                    <?= $waktu_tes; ?>
                  </td>
                  <td><a style="text-decoration: none;" href="../delete_pengguna.php?idhasil=<?= $d['idhasil']; ?>"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a> | <a
                      style="text-decoration: none;" href="../print.php?idhasil=<?= $d['idhasil']; ?>"
                      target="_blank">Cetak</a></td>
                </tr>
                <?php
                $i++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#example2").DataTable();
    });
  </script>
</body>

</html>