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
        <img class="text-center" src="../img/propil.png"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel">USER</h5>
      </div>
      <ul>
        <li class=""> <a href="index.php">Dashboard</a></li>
        <li class="active"><a href="tes.php">Tes Diagnosa</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profile.php">Profile</a></li>
        <li class=""> <a href="../keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="content text-center" style="width: 100%;">
      <div class="container" style="margin-top: 25px; color: white; padding: 30px 35px; tex-align-center;">
        <h1>HASIL DIAGNOSA</h1>
        <div class="tabel mt-4 text-dark">
          <h6 class="pt-3">Ira (19 thn)</h6>
          <h6 class="pb-3">Diagnosa Penyakit Mata Anda Yaitu:</h6>
          <div class="row" style="padding: 0 122px;">
            <div class="col-6  pb-3 text-white" style="width: 350px">
              <div class="tabel py-3" style="background: rgb(51, 107, 135)">
                <h5>Certainty Factor</h5>
                <h4>MIOPI 67,5%</h4>
                <h4>MIOPI 67,5%</h4>
                <h4>MIOPI 67,5%</h4>
              </div>
            </div>
            <div class="col-6  pb-3 text-white" style="width: 350px">
              <div class="tabel py-3" style="background: rgb(51, 107, 135)">
                <h5>Naive Bayes</h5>
                <h4>MIOPI 40,7%</h4>
                <h4>MIOPI 40,7%</h4>
                <h4>MIOPI 40,7%</h4>
              </div>
            </div>
            <h6 class="pb-3 text-start">Deskripsi</h6>
            <h6 class="pb-3 text-start">Solusi</h6>
          </div>
        </div>
        <div class="text-end pt-3">
          <a class="text-decoration-none" href="#">
            <button type="submit" class="btn btn-primary" style="width: 100px">Cetak</button>
          </a>
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