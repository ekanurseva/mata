<?php
require_once 'konek.php';
// validasi_admin();
if (isset($_GET['id'])) {
    $iduser = $_GET['id'];

    if (hapus_pengguna($iduser) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='pengguna.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='pengguna.php';
                </script>
            ";
    }
} elseif (isset($_GET['idhasil'])) {
    $id_hasil = $_GET['idhasil'];

    if (hapus_hasil($id_hasil) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='riwayat.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='riwayat.php';
                </script>
            ";
    }
}
?>