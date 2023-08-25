<?php
require_once 'konek.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapus_gejala($id) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='gejala.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='gejala.php';
                </script>
            ";
    }
}
?>