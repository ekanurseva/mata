<?php
require_once 'konek.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapus_penyakit($id) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='penyakit.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='penyakit.php';
                </script>
            ";
    }
}
?>