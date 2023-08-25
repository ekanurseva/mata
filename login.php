<?php
include('konek.php');

if (isset($_POST["submit_login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //cek username apakah ada di database atau tidak
  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  // mysqli_num_rows() untuk mengetahui ada berapa baris data yang dikembalikan
  if (mysqli_num_rows($result) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);

    //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
    //parameternya yaitu string yang belum diacak dan string yang sudah diacak
    if (password_verify($password, $row["password"])) {
      $enkripsi = enkripsi($row['iduser']);
      setcookie('mataRara', $enkripsi, time() + 10800);

      if ($row["level"] === "admin") {
        echo "<script>
                  document.location.href='admin.php';
              </script>";
        exit;
      } elseif ($row["level"] === "user") {
        echo "<script>
                  document.location.href='user';
              </script>";
        exit;
      }
    }
  }
  $error = true;
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

    <div class="container">
      <div class="head">
        <div class="text-center">
          <h1 style="margin-top: 25px; color: white; padding: 30px 35px;">SELAMAT DATANG</h1>
        </div>
        <div class="row">
          <div class="col-6 mt-1 ms-5">
            <img src="img/mtt.png" style="width: 450px; height: 320px" alt="">
          </div>
          <div class="col-6 login mt-3">
            <form method="post" action="">
              <h5 style="color: black; text-align: center; margin-top: 6">Sign In To Continue</h5>
              <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                  Username/Password Salah
                </div>
              <?php endif; ?>
              <label class="form-label" style="color: black">Username</label>
              <input type="text" name="username" class="form-control">
              <label class="form-label" style="color: black; margin-top: 6">Password</label>
              <input type="password" name="password" class="form-control">

              <button type="submit" name="submit_login" class="btn btn-primary lg mb-3">Login</button>

              <button class="btn btn-primary lg mb-3">
                <a class="text-decoration-none text-white" href="daftar.php">
                  Daftar
                </a>
              </button>

              <div class="lupa">
                <a href="lupa.php">Lupa password?</a>
              </div>
            </form>
          </div>
        </div>
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