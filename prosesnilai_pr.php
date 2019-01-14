<?php
    require "database.php";
    $db = new database();
    require_once "class/perilaku.php";

    $perilaku = new perilaku($db);

    if (isset($_POST['simpan'])) {
      $kdpegawai    = $_POST[kdpegawai];

      $nilai_dm     = $_POST[nilai_dm];
      $target_dm    = $_POST[target_dm];
      $selisih_dm   = $_POST[selisih_dm];
      $nilai_bobot_dm     = $_POST[bobot_dm];
      $nilai_if     = $_POST[nilai_if];
      $target_if    = $_POST[target_if];
      $selisih_if   = $_POST[selisih_if];
      $nilai_bobot_if     = $_POST[bobot_if];
    	$nilai_std    = $_POST[nilai_std];
      $target_std   = $_POST[target_std];
      $selisih_std  = $_POST[selisih_std];
      $nilai_bobot_std    = $_POST[bobot_std];
      $nilai_cp     = $_POST[nilai_cp];
      $target_cp    = $_POST[target_cp];
      $selisih_cp   = $_POST[selisih_cp];
      $nilai_bobot_cp     = $_POST[bobot_cp];

      $nilai_cf_A3    = $_POST[nilai_cf_A3];
      $nilai_sf_A3    = $_POST[nilai_sf_A3];
      $nilai_tot_A3   = $_POST[nilai_tot_A3];

      $perilaku->input($kdpegawai, $nilai_dm, $target_dm, $selisih_dm, $nilai_bobot_dm, $nilai_if, $target_if, $selisih_if, $nilai_bobot_if, $nilai_std, $target_std, $selisih_std, $nilai_bobot_std, $nilai_cp, $target_cp, $selisih_cp, $nilai_bobot_cp, $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3);
   }

   if (isset($_POST['update'])) {
     $kdpegawai   = $_POST[kdpegawai];
     $nilai_dm    = $_POST[nilai_dm];
     $target_dm   = $_POST[target_dm];
     $selisih_dm  = $_POST[selisih_dm];
     $bobot_dm    = $_POST[bobot_dm];
     $nilai_if    = $_POST[nilai_if];
     $target_if   = $_POST[target_if];
     $selisih_if  = $_POST[selisih_if];
     $bobot_if    = $_POST[bobot_if];
     $nilai_std   = $_POST[nilai_std];
     $target_std  = $_POST[target_std];
     $selisih_std = $_POST[selisih_std];
     $bobot_std   = $_POST[bobot_std];
     $nilai_cp    = $_POST[nilai_cp];
     $target_cp   = $_POST[target_cp];
     $selisih_cp  = $_POST[selisih_cp];
     $bobot_cp    = $_POST[bobot_cp];
     $nilai_cf_A3 = $_POST[nilai_cf_A3];
     $nilai_sf_A3 = $_POST[nilai_sf_A3];
     $nilai_tot_A3= $_POST[nilai_tot_A3];

     $perilaku->update($kdpegawai, $nilai_dm, $target_dm, $selisih_dm, $bobot_dm, $nilai_if, $target_if, $selisih_if, $bobot_if, $nilai_std, $target_std, $selisih_std, $bobot_std, $nilai_cp, $target_cp, $selisih_cp, $bobot_cp, $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3);
   }
?>
