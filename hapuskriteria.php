<?php
  $id = $_GET['kdkriteria'];
  require_once "class/kriteria.php";
  $kriteria = new kriteria();
  $kriteria->hapus($id);
?>
