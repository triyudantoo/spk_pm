<?php
  $id = $_GET['id_aspek'];
  require_once "class/aspek.php";
  $aspek = new aspek();
  $aspek->hapus($id);
?>
