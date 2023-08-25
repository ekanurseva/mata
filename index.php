<?php
include("konek.php");

if (!isset($_COOKIE['mataRara'])) {
  echo "<script>
  document.location.href='login.php';
  </script>";
  exit;
} else {
  echo "<script>
  document.location.href='keluar.php';
  </script>";
  exit;
}
?>