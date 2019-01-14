<div class="sidebar">
  <div style='color:#FFFF00; font-size: 20px; padding-top: 20px; padding-bottom: 20px; text-align: center;'>
    <?php session_start(); echo "Selamat Datang,<br>".$_SESSION['nama']; ?>
  </div>
  <ul id="nav">
    <li><a href="./index.php"><i class="fa fa-home" style="font-size:18px;"><span style="padding-left: 15px">Beranda</span></i></a></li>
    <li><a href="./dataaspek.php"><i class="fa fa-th-large" style="font-size:16px"><span style="padding-left: 15px">Data Aspek</span></i></a></li>
    <li><a href="./datakriteria.php"><i class="fa fa-th" style="font-size:16px"><span style="padding-left: 15px">Data Kriteria</span></i></a></li>
    <li><a href="./datapegawai.php"><i class="fa fa-users" style="font-size:16px"><span style="padding-left: 15px">Alternatif Pegawai</span></i></a></li>
    <li>
      <a href="./inputnilai.php"><i class="fa fa-calculator" style="font-size:16px"><span style="padding-left: 15px">Input Nilai</span></i></a>
    </li>
    <!-- <li><a href="./final_result.php"><i class="fa fa-check-square-o" style="font-size:16px"><span style="padding-left: 15px">Hasil Akhir</span></i></a></li> -->
    <li><a href="./hasil.php"><i class="fa fa-check-square-o" style="font-size:16px"><span style="padding-left: 15px">Hasil Akhir</span></i></a></li>
    <li><a href="./edituser.php"><i class="fa fa-user-secret" style="font-size:16px"><span style="padding-left: 15px">Pengguna</span></i></a></li>
    <li><a href="./logout.php"><i class="fa fa-sign-out" style="font-size:16px"><span style="padding-left: 15px">Keluar</i></a></li>
  </ul>
</div>
