<?php
include("konek.php");

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];
$data_jawaban = query("SELECT * FROM jawaban");

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <div class="main-container d-flex">
    <div class="sidebar px-3 pt-3">
      <div class="header pb-3">
        <img class="text-center" src="img/propil.png"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel"><?= $user['nama'];?> </h5>
      </div>
      <ul>
        <li class=""> <a href="admin.php">Dashboard</a></li>
        <li class=""><a href="pengguna.php">Data Pengguna</a></li>
        <li class="active"> <a href="pertanyaan.php">Data Jawaban</a></li>
        <li class=""><a href="gejala.php">Data Gejala</a></li>
        <li class=""><a href="penyakit.php">Penyakit dan Solusi</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profil.php">Profile</a></li>
        <li class=""> <a href="profil.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">DATA PERTANYAAN DAN JAWABAN
        </h1>

        <div class="row mt-3">
          <div class="col-6">
            <div class="input" style="margin-bottom: 23px; margin-top: 15px;">
              <a href="inputjawaban.php">
                <button class="btn btn-success" type="submit">INPUT JAWABAN</button>
              </a>
            </div>
          </div>
        </div>
        <div class="row align-items-start text-center">
          <table class="table" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jawaban</th>
                <th scope="col">Bobot</th>
                <th scope="col">Kode Jawaban</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $j = 1;
              foreach ($data_jawaban as $jb):
                ?>
                <tr>
                  <th>
                    <?php echo $j; ?>
                  </th>
                  <td>
                    <?= $jb['jawaban']; ?>
                  </td>
                  <td>
                    <?= $jb['bobot']; ?>
                  </td>
                  <td>
                    <?= $jb['kode_jawaban']; ?>
                  </td>
                  <td>
                    <a style="text-decoration: none;" href="editjawaban.php?id=<?= $jb['idjawaban']; ?> ">Edit </a>
                    |
                    <a style="text-decoration: none;" href="delete_jawaban.php?idjawaban=<?= $jb['idjawaban']; ?>"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a>
                  </td>
                </tr>
                <?php
                $j++;
              endforeach
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
      $("#example").DataTable();
    });
  </script>
</body>

</html>