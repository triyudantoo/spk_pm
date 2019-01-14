<?php
    require "database.php";
    $db = new database();
    require_once "class/intelektual.php";

    $intelektual = new intelektual($db);

    if (isset($_POST['simpan'])) {
      $kdpegawai      = $_POST[kdpegawai];

      $nilai_vi       = $_POST[nilai_vi];
      $target_vi      = $_POST[target_vi];
      $selisih_vi     = $_POST[selisih_vi];
      $nilai_bobot_vi = $_POST[nilai_bobot_vi];
      $nilai_sb       = $_POST[nilai_sb];
      $target_sb      = $_POST[target_sb];
      $selisih_sb     = $_POST[selisih_sb];
      $nilai_bobot_sb = $_POST[nilai_bobot_sb];
    	$nilai_kn       = $_POST[nilai_kn];
      $target_kn      = $_POST[target_kn];
      $selisih_kn     = $_POST[selisih_kn];
      $nilai_bobot_kn = $_POST[nilai_bobot_kn];
      $nilai_lp       = $_POST[nilai_lp];
      $target_lp      = $_POST[target_lp];
      $selisih_lp     = $_POST[selisih_lp];
      $nilai_bobot_lp = $_POST[nilai_bobot_lp];
    	$nilai_ik       = $_POST[nilai_ik];
      $target_ik      = $_POST[target_ik];
      $selisih_ik     = $_POST[selisih_ik];
      $nilai_bobot_ik = $_POST[nilai_bobot_ik];

      $nilai_cf_A1    = $_POST[nilai_cf_A1];
      $nilai_sf_A1    = $_POST[nilai_sf_A1];
      $nilai_tot_A1   = $_POST[nilai_tot_A1];

      $intelektual->input($kdpegawai, $nilai_vi, $target_vi, $selisih_vi, $nilai_bobot_vi, $nilai_sb, $target_sb, $selisih_sb, $nilai_bobot_sb, $nilai_kn, $target_kn, $selisih_kn, $nilai_bobot_kn, $nilai_lp, $target_lp, $selisih_lp, $nilai_bobot_lp, $nilai_ik, $target_ik, $selisih_ik, $nilai_bobot_ik, $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1);
   }

   if (isset($_POST['update'])) {
     $kdpegawai      = $_POST[kdpegawai];

     $nilai_vi       = $_POST[nilai_vi];
     $target_vi      = $_POST[target_vi];
     $selisih_vi     = $_POST[selisih_vi];
     $nilai_bobot_vi = $_POST[nilai_bobot_vi];
     $nilai_sb       = $_POST[nilai_sb];
     $target_sb      = $_POST[target_sb];
     $selisih_sb     = $_POST[selisih_sb];
     $nilai_bobot_sb = $_POST[nilai_bobot_sb];
     $nilai_kn       = $_POST[nilai_kn];
     $target_kn      = $_POST[target_kn];
     $selisih_kn     = $_POST[selisih_kn];
     $nilai_bobot_kn = $_POST[nilai_bobot_kn];
     $nilai_lp       = $_POST[nilai_lp];
     $target_lp      = $_POST[target_lp];
     $selisih_lp     = $_POST[selisih_lp];
     $nilai_bobot_lp = $_POST[nilai_bobot_lp];
     $nilai_ik       = $_POST[nilai_ik];
     $target_ik      = $_POST[target_ik];
     $selisih_ik     = $_POST[selisih_ik];
     $nilai_bobot_ik = $_POST[nilai_bobot_ik];

     $nilai_cf_A1    = $_POST[nilai_cf_A1];
     $nilai_sf_A1    = $_POST[nilai_sf_A1];
     $nilai_tot_A1   = $_POST[nilai_tot_A1];

     $intelektual->update($kdpegawai, $nilai_vi, $target_vi, $selisih_vi, $nilai_bobot_vi, $nilai_sb, $target_sb, $selisih_sb, $nilai_bobot_sb, $nilai_kn, $target_kn, $selisih_kn, $nilai_bobot_kn, $nilai_lp, $target_lp, $selisih_lp, $nilai_bobot_lp, $nilai_ik, $target_ik, $selisih_ik, $nilai_bobot_ik, $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1);
   }
?>
