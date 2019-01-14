<?php
    require "database.php";
    $db = new database();
    require_once "class/pegawai.php";

    $pegawai = new pegawai($db);

    if (isset($_POST['simpan'])) {
      $kdpegawai   = $_POST[kdpegawai];
      $namapegawai = $_POST[namapegawai];
      $thn_masuk   = $_POST[thn_masuk];

    	$pegawai->input($kdpegawai,$namapegawai,$thn_masuk);
    }

    if (isset($_POST['update'])) {
      $kdpegawai   = $_POST[kdpegawai];
      $namapegawai = $_POST[namapegawai];
      $thn_masuk   = $_POST[thn_masuk];

      $pegawai->update($kdpegawai,$namapegawai,$thn_masuk);
    }

    if (isset($_POST['hapus'])) {
    	$pegawai->hapus();
    	header("location: datapegawai.php");
    }
