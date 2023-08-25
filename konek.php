<?php

function hitung($data)
{
    global $koneksi;

    $data_penyakit = query("SELECT * FROM diagnosa");
    $gejala = query("SELECT DISTINCT nama_gejala FROM gejala");

    // Ambil CF User
    foreach ($gejala as $gej) {
        $parameter = str_replace(" ", "_", $gej['nama_gejala']);
        $nama_gejala[] = $parameter;

        $jawaban = $data[$parameter];

        $nilai = query("SELECT bobot FROM jawaban WHERE kode_jawaban = '$jawaban'")[0];

        $nilai_cf_user[] = $nilai['bobot'];

        echo "Nilai CF untuk " . $parameter . " adalah " . $nilai['bobot'] . "<br>";
    }
    // Ambil CF User Selesai
    foreach ($data_penyakit as $dp) {
        $idpenyakit = $dp['iddiagnosa'];
        $data_gejala = query("SELECT * FROM gejala WHERE iddiagnosa = $idpenyakit");

        var_dump($data_gejala);
    }
}
$koneksi = mysqli_connect("localhost", "root", "", "mata");
if (mysqli_connect_errno()) {
    echo "Gagal Menyambungkan" . mysqli_connect_error();
}

function get_kode_gejala()
{
    global $koneksi;

    $query = "SELECT * FROM gejala";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "G1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM gejala WHERE kode_gejala = 'G{$i}'";
            $result = mysqli_query($koneksi, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "G{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "G{$angka}";
            }
        }
        ;
    }

    return $kode;
}

function get_kode_diagnosa()
{
    global $koneksi;

    $query = "SELECT * FROM diagnosa";
    $kode_penyakit = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode_penyakit = "P1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM diagnosa WHERE kode_diagnosa = 'P{$i}'";
            $result = mysqli_query($koneksi, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode_penyakit = "P{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode_penyakit = "P{$angka}";
            }
        }
        ;
    }

    return $kode_penyakit;
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function jumlah_data($data)
{
    global $koneksi;
    $query = mysqli_query($koneksi, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}

function dekripsi($teks)
{
    $text = $teks;
    $kunci = 'mataRara';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $dekripsi = base64_decode($text);
    $dekripsi = openssl_decrypt($dekripsi, $method, $key, 0, $iv);

    return $dekripsi;
}
function enkripsi($teks)
{
    $text = $teks;
    $kunci = 'mataRara';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $enkripsi = openssl_encrypt($text, $method, $key, 0, $iv);
    $enkripsi = base64_encode($enkripsi);

    return $enkripsi;
}

function validasi()
{
    global $koneksi;
    if (!isset($_COOKIE['mataRara'])) {
        echo "<script>
                document.location.href='../keluar.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['mataRara']);

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../keluar.php';
              </script>";
        exit;
    }
}

function validasi_admin()
{
    global $koneksi;
    if (!isset($_COOKIE['mataRara'])) {
        echo "<script>
                document.location.href='keluar.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['mataRara']);

    $cek = query("SELECT * FROM user WHERE iduser = $id")[0];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='keluar.php';
              </script>";
        exit;
    } elseif ($cek['role'] !== "Admin") {
        echo "<script>
                document.location.href='keluar.php';
              </script>";
        exit;
    }
}


function register($data_user)
{
    global $koneksi;
    $username = strtolower(stripslashes($data_user["username"]));
    $password = mysqli_escape_string($koneksi, $data_user["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data_user["password2"]);
    $nama = $data_user["nama"];
    $jk = $data_user["jk"];
    $tanggal_lahir = $data_user["tanggal_lahir"];
    $email = $data_user["email"];
    $level = "user";
    $foto = "propil.png";

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = 'username'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Digunakan');
        </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai');
        </script>";
        return false;
    }
    $password = password_hash($password2, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$jk', '$tanggal_lahir', '$email', '$level', '$foto')");

    return mysqli_affected_rows($koneksi);
}

function register_pengguna($data_user)
{
    global $koneksi;
    $username = strtolower(stripslashes($data_user["username"]));
    $password = mysqli_escape_string($koneksi, $data_user["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data_user["password2"]);
    $nama = $data_user["nama"];
    $jk = $data_user["jk"];
    $tanggal_lahir = $data_user["tanggal_lahir"];
    $email = $data_user["email"];
    $level = $data_user['level'];
    $foto = "propil.png";

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = 'username'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Digunakan');
        </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai');
        </script>";
        return false;
    }
    $password = password_hash($password2, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$jk', '$tanggal_lahir', '$email', '$level', '$foto')");

    return mysqli_affected_rows($koneksi);
}

// function input_pertanyaan($data_user)
// {
//     global $koneksi;
//     $idgejala = ($data_user['idgejala']);
//     $pertanyaan = strtolower(stripslashes($data_user["pertanyaan"]));
//     $kode_pertanyaan = $data_user["kode_pertanyaan"];

//     $result = mysqli_query($koneksi, "SELECT pertanyaan FROM pertanyaan WHERE pertanyaan = 'pertanyaan'") or die(mysqli_error($koneksi));
//     if (mysqli_fetch_assoc($result)) {
//         echo "<script>
//         alert('Pertanyaan Sudah Ada');
//         </script>";
//         return false;
//     }

//     mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$idgejala', '$kode_pertanyaan', '$pertanyaan')");

//     return mysqli_affected_rows($koneksi);
// }

function input_penyakit($data_user)
{
    global $koneksi;
    $penyakit = $data_user["penyakit"];
    $kode_penyakit = $data_user["kode_penyakit"];
    $deskripsi = $data_user["deskripsi"];

    $result = mysqli_query($koneksi, "SELECT nama_diagnosa FROM diagnosa WHERE nama_diagnosa = 'penyakit'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Nama Penyakit Sudah Digunakan');
        </script>";
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO diagnosa VALUES (NULL, '$kode_penyakit', '$penyakit', '$deskripsi')");

    return mysqli_affected_rows($koneksi);
}

function input_gejala($data)
{
    global $koneksi;
    $iddiagnosa = $data['diagnosis'];
    $kode_gejala = $data['kode_gejala'];
    $nama_gejala = $data['gejala'];
    $bobot = $data['bobot'];

    $result = mysqli_query($koneksi, "SELECT nama_gejala FROM gejala WHERE nama_gejala = 'gejala'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Nama Gejala Sudah Dipakai!');
        </script>";
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT kode_gejala FROM gejala WHERE kode_gejala = 'kode_gejala'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Kode Gejala Sudah Dipakai!');
        </script>";
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO gejala VALUES (NULL, '$iddiagnosa', '$kode_gejala', '$nama_gejala', '$bobot')");

    return mysqli_affected_rows($koneksi);
}

function input_solusi($data)
{
    global $koneksi;
    $iddiagnosa = $data['iddiagnosa'];
    $solusi = $data['solusi'];

    $result = mysqli_query($koneksi, "SELECT solusi FROM solusi WHERE solusi = 'solusi'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Nama Penyakit Sudah Dipakai!');
        </script>";
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO solusi VALUES (NULL, '$iddiagnosa', '$solusi')");

    return mysqli_affected_rows($koneksi);
}

function edit_solusi($data)
{
    global $koneksi;

    $idsolusi = $data['idsolusi'];
    $iddiagnosa = $data['iddiagnosa'];
    $solusi = $data['solusi'];

    $query = "UPDATE solusi SET 
                iddiagnosa = '$iddiagnosa',
                solusi = '$solusi'
              WHERE idsolusi = '$idsolusi'
              ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_solusi($idsolusi)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM solusi WHERE idsolusi = $idsolusi");

    return mysqli_affected_rows($koneksi);
}

function create_jawaban($data)
{
    global $koneksi;
    $jawaban = $data['jawaban'];
    $kode_jawaban = $data['kode_jawaban'];
    $bobot = $data['bobot'];

    $result = mysqli_query($koneksi, "SELECT kode_jawaban FROM jawaban WHERE kode_jawaban = 'kode'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Kode Jawaban Sudah Dipakai!');
        </script>";
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO jawaban VALUES (NULL, '$bobot', '$kode_jawaban', '$jawaban')");

    return mysqli_affected_rows($koneksi);
}

function edit_jawaban($data)
{
    global $koneksi;
    $idjawaban = $data['idjawaban'];
    $oldkode_jawaban = $data['oldkode_jawaban'];
    $oldbobot = $data['oldbobot'];
    $oldjawaban = $data['oldjawaban'];
    $kode_jawaban = $data['kode_jawaban'];
    $jawaban = $data['jawaban'];
    $bobot = $data['bobot'];

    if ($oldkode_jawaban !== $kode_jawaban) {
        $result = mysqli_query($koneksi, "SELECT kode_jawaban FROM jawaban WHERE kode_jawaban = '$kode_jawaban'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Kode sudah digunakan, silahkan pakai kode lain');
            </script>";
            return false;
        }
    }
    if ($oldjawaban !== $jawaban) {
        $result = mysqli_query($koneksi, "SELECT jawaban FROM jawaban WHERE jawaban = '$jawaban'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Jawaban sudah ada, silahkan gunakan jawaban lain');
            </script>";
            return false;
        }
    }
    if ($oldbobot !== $bobot) {
        $result = mysqli_query($koneksi, "SELECT bobot FROM jawaban WHERE bobot = '$bobot'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Bobot sudah dipakai, silahkan gunakan bobot lain');
            </script>";
            return false;
        }
    }

    $query = "UPDATE jawaban SET 
                 jawaban = '$jawaban',
                 bobot = '$bobot',
                 kode_jawaban = '$kode_jawaban'
              WHERE idjawaban = '$idjawaban'
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_jawaban($idgejala)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jawaban WHERE idjawaban = $idgejala");

    return mysqli_affected_rows($koneksi);
}

function update($data)
{
    global $koneksi;

    $id = $data['iduser'];
    $oldusername = $data['oldusername'];
    $oldpassword = $data['oldpassword'];
    $oldemail = $data['oldemail'];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $nama = $data["nama"];
    $jk = $data["jk"];
    $tanggal_lahir = $data["tanggal_lahir"];
    $email = $data["email"];
    $level = $data["level"];

    if (isset($data['oldlevel'])) {
        $level = $data['oldlevel'];
    } else {
        $level = $data['level'];
    }

    if ($username !== $oldusername) {
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username Sudah Dipakai!');
            </script>";
            return false;
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Tidak Sesuai!');
                  </script>";
            return false;
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Email sudah digunakan, silahkan pakai email lain');
                  </script>";
            return false;
        }
    }

    $query = "UPDATE user SET 
        username = '$username',
        password = '$password',
        nama = '$nama',
        jk = '$jk',
        tanggal_lahir = '$tanggal_lahir',
        email = '$email',
        level = '$level'
    WHERE iduser = '$id'
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_penyakit($data)
{
    global $koneksi;

    $iddiagnosa = $data['iddiagnosa'];
    $penyakit = $data["penyakit"];
    $kode_penyakit = $data["kode_penyakit"];
    $deskripsi = $data["deskripsi"];

    mysqli_query($koneksi, "UPDATE diagnosa SET kode_diagnosa = '$kode_penyakit', nama_diagnosa = '$penyakit', deskripsi = '$deskripsi' WHERE iddiagnosa = '$iddiagnosa'");

    return mysqli_affected_rows($koneksi);
}

function update_gejala($data)
{
    var_dump($data);
    global $koneksi;
    $idgejala = $data['idgejala'];
    $nama_gejala = $data['gejala'];
    $bobot = $data['bobot'];

    $query = "UPDATE gejala SET 
                 nama_gejala = '$nama_gejala',
                 bobot = '$bobot'
              WHERE idgejala = '$idgejala'
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_pengguna($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE iduser = $id");

    return mysqli_affected_rows($koneksi);
}

function hapus_penyakit($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM diagnosa WHERE iddiagnosa = $id");

    return mysqli_affected_rows($koneksi);
}

function hapus_gejala($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM gejala WHERE idgejala = $id");

    return mysqli_affected_rows($koneksi);
}

function update_datadiri($data)
{
    global $koneksi;
    $iduser = $data['iduser'];
    $oldusername = $data['oldusername'];
    $oldpassword = $data['oldpassword'];
    $oldfoto = $data['oldfoto'];
    $nama = $data['nama'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $password2 = $data['password2'];
    $tgl_lahir = $data['tanggal_lahir'];
    $jk = $data['jk'];
    $foto = uploadFoto();
    if ($foto == "") {
        $foto = $oldfoto;
    }

    if ($username !== $oldusername) {
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "
                    <script>
                        alert('Username sudah digunakan');
                        document.location.href='datadiri.php';
                    </script>
                ";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                        alert('Password tidak sesuai!');
                        document.location.href='datadiri.php';
                      </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($foto != $oldfoto && $oldfoto != "propil.png") {
        unlink("../img/$oldfoto");
    }

    $query = "UPDATE user SET 
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    jk = '$jk',
                    tanggal_lahir = '$tgl_lahir',
                    email = '$email',
                    foto = '$foto'
                  WHERE iduser = '$iduser'
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function update_datadiri_admin($data)
{
    global $koneksi;
    $iduser = $data['iduser'];
    $oldusername = $data['oldusername'];
    $oldpassword = $data['oldpassword'];
    $oldfoto = $data['oldfoto'];
    $nama = $data['nama'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $password2 = $data['password2'];
    $tgl_lahir = $data['tanggal_lahir'];
    $jk = $data['jk'];
    $foto = uploadFoto_admin();
    if ($foto == "") {
        $foto = $oldfoto;
    }

    if ($username !== $oldusername) {
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "
                    <script>
                        alert('Username sudah digunakan');
                        document.location.href='datadiri.php';
                    </script>
                ";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                        alert('Password tidak sesuai!');
                        document.location.href='datadiri.php';
                      </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($foto != $oldfoto && $oldfoto != "propil.png") {
        unlink("img/$oldfoto");
    }

    $query = "UPDATE user SET 
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    jk = '$jk',
                    tanggal_lahir = '$tgl_lahir',
                    email = '$email',
                    foto = '$foto'
                  WHERE iduser = '$iduser'
                ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// Fungsi Upload Foto
function uploadFoto()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah ada gambar yang diupload atau tidak
    if ($namaFile != "") {
        //cek apakah yang di upload gambar atau bukan
        $validFoto = ['jpg', 'jpeg', 'png'];
        $kesesuaianFoto = explode('.', $namaFile);
        $kesesuaianFoto = strtolower(end($kesesuaianFoto));

        //cek apakah ekstensinya ada atau tidak di dalam array $validFoto
        if (!in_array($kesesuaianFoto, $validFoto)) {
            echo "<script>
                    alert('Periksa Kembali File yang Anda Upload');
                    </script>";
            return false;
        }
    }


    //cek jika ukurannya terlalu besar, ukurannya dalam byte
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, jangan melebihi 5mb');
                </script>";
        return false;
    }

    //generate nama gambar baru
    if ($namaFile != "") {
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $kesesuaianFoto;
        //parameternya file namenya, lalu tujuannya
        move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    } else {
        $namaFileBaru = "";

        return $namaFileBaru;
    }
}
// Fungsi Upload Foto Selesai

function uploadFoto_admin()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah ada gambar yang diupload atau tidak
    if ($namaFile != "") {
        //cek apakah yang di upload gambar atau bukan
        $validFoto = ['jpg', 'jpeg', 'png'];
        $kesesuaianFoto = explode('.', $namaFile);
        $kesesuaianFoto = strtolower(end($kesesuaianFoto));

        //cek apakah ekstensinya ada atau tidak di dalam array $validFoto
        if (!in_array($kesesuaianFoto, $validFoto)) {
            echo "<script>
                    alert('Periksa Kembali File yang Anda Upload');
                    </script>";
            return false;
        }
    }


    //cek jika ukurannya terlalu besar, ukurannya dalam byte
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar, jangan melebihi 5mb');
                </script>";
        return false;
    }

    //generate nama gambar baru
    if ($namaFile != "") {
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $kesesuaianFoto;
        //parameternya file namenya, lalu tujuannya
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    } else {
        $namaFileBaru = "";

        return $namaFileBaru;
    }
}
// Fungsi Upload Foto Selesai
?>