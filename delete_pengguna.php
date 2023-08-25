<?php 
    require_once 'konek.php';
    if(isset($_GET['id'])) {
        $iduser = $_GET['id'];

        if(hapus_pengguna($iduser) > 0) {
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
    }
?>