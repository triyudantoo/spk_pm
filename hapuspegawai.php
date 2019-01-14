<?php
  $id = $_GET['kdpegawai'];
  require_once "class/pegawai.php";
  $pegawai = new pegawai();
  $pegawai->hapus($id);
?>
