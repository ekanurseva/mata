<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
  <div class="main-container d-flex">

      <div class="container">
        <div class="head">
            <div class="text-center">
            <h1 style="margin-top: 25px; color: white; padding: 30px 35px;">SELAMAT DATANG DI SISTEM PAKAR DIAGNOSA PENYAKIT MATAD</h1>
            </div>
            <div class="row">
                <div class="col-6 mt-5 ms-5">
                <img src="img/th (3).jpg" alt=""> 
                </div>
                <div class="col-6 login mt-3">
                <h5 style= "color: white; text-align: center; margin-top: 6">Ubah Password</h5>
                <label class="form-label"  style= "color: white">New Password</label>
            <input type="text" class="form-control">
            <label class="form-label"  style= "color: white">Konfirmasi Password</label>
            <input type="text" class="form-control">
            <a class= "text-decoration-none" href="login.php">
            <button type="submit" class="btn btn-primary lg mb-3">Login</button>
            </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
  $(".sidebar ul li").on ('click', function(){
    $(".sidebar ul li.active").removeClass("active");
    $(this).addClass("active");
  })
</script>

</body>
</html>