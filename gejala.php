<?php
include("konek.php");
$id = dekripsi($_COOKIE['mataRara']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

$data = query("SELECT * FROM gejala");
$jumlah_gejala = jumlah_data("SELECT * FROM gejala");
$penyakit = query("SELECT * FROM diagnosa");

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
        <img class="text-center" src="img/<?php echo $user['foto']; ?>"
          style="width: 50px; margin-right: auto; margin-left: auto; display: block;" alt="">
        <h5 class="offcanvas-title fw-bold text-center" style="margin-left: auto; font-size: 20px"
          id="offcanvasDarkLabel"><?php echo $user['nama']; ?></h5>
      </div>
      <ul>
        <li class=""> <a href="admin.php">Dashboard</a></li>
        <li class=""><a href="pengguna.php">Data Pengguna</a></li>
        <li class=""> <a href="pertanyaan.php">Jawaban</a></li>
        <li class="active"><a href="gejala.php">Data Gejala</a></li>
        <li class=""><a href="penyakit.php">Penyakit dan Solusi</a></li>
        <li class=""> <a href="riwayat.php">Riwayat Tes</a></li>
        <li class=""> <a href="profil.php">Profile</a></li>
        <li class=""> <a href="keluar.php">Keluar</a></li>
      </ul>
    </div>
    <div class="container">
    <div class="content" style="width: 100%;">
        <h1 style="text-align:center; margin-top: 30px; color: white; padding: 0px 35px">DATA GEJALA</h1>
        <div class="row">
          <div class="col-6">
            <div class="input" style="margin-top: 20px">
              <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                INPUT GEJALA
              </button>
            </div>
          </div>
        </div>

        <div class="row align-items-start text-center">
          <table class="table" style="margin-top: 15px" id="example">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Gejala</th>
                <th scope="col">Bobot</th>
                <th scope="col">Kode Penyakit</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($data as $g):
                ?>
                <tr>
                  <th>
                    <?php echo $i; ?>
                  </th>
                  <td>
                    <?php echo $g['kode_gejala']; ?>
                  </td>
                  <td>
                    <?php echo $g['nama_gejala']; ?>
                  </td>
                  <td>
                    <?php echo $g['bobot']; ?>
                  </td>

                  <?php
                  $iddiagnosa = $g['iddiagnosa'];
                  $kode_diagnosa = query("SELECT kode_diagnosa FROM diagnosa WHERE iddiagnosa = $iddiagnosa")[0];
                  ?>
                  <td>
                    <?= $kode_diagnosa['kode_diagnosa']; ?>
                  </td>
                  <td>
                    <a style="text-decoration: none;" href="editgejala.php?id= <?= $g['idgejala']; ?>">Edit </a>
                    |
                    <a style="text-decoration: none;" href="delete_gejala.php?id=<?= $g['idgejala']; ?>"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a>
                  </td>
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

  <!-- Modal Penyakit -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Penyakit</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="inputgejala.php" method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="kode_gejala" class="form-label">Pilih penyakit sebelum memasukkan data
                gejala</label>

              <div class="">
                <select class="form-select" id="kode_gejala" aria-label="Default select example" name="diagnosis">
                  <?php foreach ($penyakit as $p): ?>
                    <option value="<?= $p['iddiagnosa']; ?>"><?= $p['nama_diagnosa']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Pilih</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Penyakit Selesai -->

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