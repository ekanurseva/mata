<?php
require_once '../konek.php';

$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

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
        <li class="active"> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profile.php">Profile</a></li>
        <li class=""> <a href="../keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content" style="width: 100%;">
      <div class="container ">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">RIWAYAT TES</h1>
        <div class="row">
          <div class="col-6">
            <form class="d-flex" role="search" style="margin-top: 20px">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" style="width: 75px; font-size: 13px" type="submit">Search</button>
            </form>
          </div>
        </div>
        <div class="row align-items-start text-center" style="margin-top: 15px">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Usia</th>
                <th scope="col">Waktu</th>
                <th scope="col">Hasil</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Saputra</td>
                <td>22</td>
                <td>2-07-2023</td>
                <td>Miopi CF 82% Bayes 80%</td>
                <td><a style="text-decoration: none;" href="">Cetak </a> | <a style="text-decoration: none;"
                    href="">Hapus</a></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sasa</td>
                <td>19</td>
                <td>4-06-2023</td>
                <td>Konjungtivitis CF 40% Bayes 50%</td>
                <td><a style="text-decoration: none;" href="">Cetak</a> | <a style="text-decoration: none;"
                    href="">Hapus</a></td>
              </tr>
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

  <script>
    $(".sidebar ul li").on('click', function () {
      $(".sidebar ul li.active").removeClass("active");
      $(this).addClass("active");
    })
  </script>

</body>

</html>