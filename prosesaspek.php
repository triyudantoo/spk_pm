<?php
    require "database.php";
    $db = new database();
    require_once "class/aspek.php";

    $aspek = new aspek($db);

    if (isset($_POST['simpan'])) {

      $idaspek    = $_POST[id_aspek];
      $namaaspek  = $_POST[namaaspek];
      $persentase = $_POST[persentase];
      $bobotcore  = $_POST[bobot_core];
      $bobotsecondary  = $_POST[bobot_secondary];

      $aspek->input($idaspek, $namaaspek, $persentase, $bobotcore, $bobotsecondary);
    }

    if (isset($_POST['update'])) {

      $idaspek    = $_POST[id_aspek];
      $namaaspek  = $_POST[namaaspek];
      $persentase = $_POST[persentase];
      $bobotcore  = $_POST[bobotcore];
      $bobotsecondary  = $_POST[bobotsecondary];

      $aspek->update($idaspek, $namaaspek, $persentase, $bobotcore, $bobotsecondary);
    }

    if (isset($_POST['hapus'])) {

    	$aspek->hapus();
    	header("location: dataaspek.php");
    }
?>
