<?php
    require "database.php";
    $db = new database();
    require_once "class/sikap.php";

    $sikap = new sikap($db);

    if (isset($_POST['simpan'])) {
      $kdpegawai      = $_POST[kdpegawai];

      $nilai_ep        = $_POST[nilai_ep];
      $target_ep       = $_POST[target_ep];
      $selisih_ep      = $_POST[selisih_ep];
      $nilai_bobot_ep  = $_POST[nilai_bobot_ep];
      $nilai_ktj       = $_POST[nilai_ktj];
      $target_ktj      = $_POST[target_ktj];
      $selisih_ktj     = $_POST[selisih_ktj];
      $nilai_bobot_ktj = $_POST[nilai_bobot_ktj];
    	$nilai_kh        = $_POST[nilai_kh];
      $target_kh       = $_POST[target_kh];
      $selisih_kh      = $_POST[selisih_kh];
      $nilai_bobot_kh  = $_POST[nilai_bobot_kh];
      $nilai_db        = $_POST[nilai_db];
      $target_db       = $_POST[target_db];
      $selisih_db      = $_POST[selisih_db];
      $nilai_bobot_db  = $_POST[nilai_bobot_db];

      $nilai_cf_A2    = $_POST[nilai_cf_A2];
      $nilai_sf_A2    = $_POST[nilai_sf_A2];
      $nilai_tot_A2   = $_POST[nilai_tot_A2];

      $sikap->input($kdpegawai, $nilai_ep, $target_ep, $selisih_ep, $nilai_bobot_ep, $nilai_ktj, $target_ktj, $selisih_ktj, $nilai_bobot_ktj, $nilai_kh, $target_kh, $selisih_kh, $nilai_bobot_kh, $nilai_db, $target_db, $selisih_db, $nilai_bobot_db, $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2);
   }

   if (isset($_POST['update'])) {
     $kdpegawai       = $_POST[kdpegawai];
     $nilai_ep        = $_POST[nilai_ep];
     $target_ep       = $_POST[target_ep];
     $selisih_ep      = $_POST[selisih_ep];
     $nilai_bobot_ep  = $_POST[nilai_bobot_ep];
     $nilai_ktj       = $_POST[nilai_ktj];
     $target_ktj      = $_POST[target_ktj];
     $selisih_ktj     = $_POST[selisih_ktj];
     $nilai_bobot_ktj = $_POST[nilai_bobot_ktj];
     $nilai_kh        = $_POST[nilai_kh];
     $target_kh       = $_POST[target_kh];
     $selisih_kh      = $_POST[selisih_kh];
     $nilai_bobot_kh  = $_POST[nilai_bobot_kh];
     $nilai_db        = $_POST[nilai_db];
     $target_db       = $_POST[target_db];
     $selisih_db      = $_POST[selisih_db];
     $nilai_bobot_db  = $_POST[nilai_bobot_db];
     $nilai_cf_A2     = $_POST[nilai_cf_A2];
     $nilai_sf_A2     = $_POST[nilai_sf_A2];
     $nilai_tot_A2    = $_POST[nilai_tot_A2];

     $sikap->update($kdpegawai, $nilai_ep, $target_ep, $selisih_ep, $nilai_bobot_ep, $nilai_ktj, $target_ktj, $selisih_ktj, $nilai_bobot_ktj, $nilai_kh, $target_kh, $selisih_kh, $nilai_bobot_kh, $nilai_db, $target_db, $selisih_db, $nilai_bobot_db, $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2);
   }
?>
