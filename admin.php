<?php
include("konek.php");
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
                <li class="active"> <a href="admin.php">Dashboard</a></li>
                <li class=""><a href="pengguna.php">Data Pengguna</a></li>
                <li class=""> <a href="pertanyaan.php">Data Jawaban</a></li>
                <li class=""><a href="gejala.php">Data Gejala</a></li>
                <li class=""><a href="penyakit.php">Penyakit dan Solusi</a></li>
                <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
                <li class=""> <a href="profil.php">Profile</a></li>
                <li class=""> <a href="keluar.php">Keluar</a></li>
            </ul>
            </ul>
        </div>
        <div style="padding: 0; margin-left: 21.5%;" class="content text-center">
            <div class="container">
                <div class="head">
                    <h1 style="margin-top: 25px; color: white; padding: 30px 35px">WELCOME TO SISTEM DIAGNOSA PENYAKIT
                        MATA</h1>
                    <img src="img/mtt.png" alt="">
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