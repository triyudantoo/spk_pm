<?php
    require "database.php";
    $db = new database();
    require_once "class/kriteria.php";

    $kriteria = new kriteria($db);

    if (isset($_POST['simpan'])) {
      //echo "sampe";
      $idaspek    = $_POST[id_aspek];
      $kdkriteria = $_POST[kdkriteria];
      $nmkriteria = $_POST[nmkriteria];
      $jenis      = $_POST[jenis];
      $target     = $_POST[target];

      $kriteria->input($idaspek, $kdkriteria, $nmkriteria, $jenis, $target);
    }

    if (isset($_POST['update'])) {

      $idaspek    = $_POST[id_aspek];
      $kdkriteria = $_POST[kdkriteria];
      $nmkriteria = $_POST[nmkriteria];
      $jenis      = $_POST[jenis];
      $target     = $_POST[target];

      $kriteria->update($idaspek, $kdkriteria, $nmkriteria, $jenis, $target);
    }

    if (isset($_POST['hapus'])) {

    	$aspek->hapus();
    	header("location: datakriteria.php");
    }
?>
