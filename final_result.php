<?php
  session_start();
  if(!isset($_SESSION['nama']))
  {
    echo "
      <script type=text/javascript>
        alert('Silakan login terlebih dahulu !');
        window.location = 'login.php';
      </script>
    ";
    exit;
  }
?>

<html>
<head>
  <title>Hasil Akhir</title>

  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header">
    <img src="img/pm_header.png">
  </div>

  <?php include_once "sidebar.php"; ?>
</head>
  <body>
    <div class="content">
      <i class="fa fa-check-square-o" style="font-size: 28px;"><span style="padding-left: 15px;">Hasil Akhir Penilaian</span></i>

      <?php
        include_once "database.php";
        $db = new database();
        $kon = $db->connect();
      ?>
      <a href="cetak.php" target="_blank"><div style="padding-top: 40px; padding-left: 10px">
        <button class="btn-default"><i class="fa fa-print" style="font-size:16px">
        Cetak</i></button></a></div>

      <table class="table table-bordered">
        <thead style="font-weight: bold">
          <tr>
  					<td width="5%">No</td>
  					<td width="20%">Nama Pegawai</td>
  					<td width="22%">Nilai Total Kapasitas Intelektual</td>
  					<td width="18%">Nilai Total Sikap Kerja</td>
  					<td width="15%">Nilai Total Perilaku</td>
            <td width="10%">Total</td>
  					<td width="15%">Ranking</td>
  				</tr>
          <!-- ambil data persentase -->
          <?php
            $qpersen    = $kon->query("select distinct persentase from pm_aspek where id_aspek = 'A001'");
            $dtpersen   = $qpersen->fetch_array();
            $persen     = $dtpersen['persentase'];

            $qpersen2   = $kon->query("select distinct persentase from pm_aspek where id_aspek = 'A002'");
            $dtpersen2  = $qpersen2->fetch_array();
            $persen2    = $dtpersen2['persentase'];

            $qpersen3   = $kon->query("select distinct persentase from pm_aspek where id_aspek = 'A003'");
            $dtpersen3  = $qpersen3->fetch_array();
            $persen3    = $dtpersen3['persentase'];

          echo '
            <tr>
              <td colspan="2" style="background: #fff; color: #282828">Persentase</td>
              <td style="background: #fff; color: #282828">'.$persen.' %</div></td>
              <td style="background: #fff; color: #282828">'.$persen2.' %</div></td>
              <td style="background: #fff; color: #282828">'.$persen3.' %</div></td>
              <td colspan="2" style="background: #fff"></td>
            </tr>
            ';
          ?>
        </thead>

        <tbody>
          <?php
            $query = "SELECT pm_pegawai.kdpegawai, pm_pegawai.namapegawai,
						pm_intelektual.nilai_tot_A1 as INTE, pm_sikap.nilai_tot_A2 as SK, pm_perilaku.nilai_tot_A3 as PR,
						(((pm_intelektual.nilai_tot_A1*20)/100)+((pm_sikap.nilai_tot_A2*30)/100)+((pm_perilaku.nilai_tot_A3*50)/100)) as Total
						FROM pm_pegawai
						LEFT JOIN pm_intelektual ON pm_pegawai.kdpegawai = pm_intelektual.kdpegawai
						LEFT JOIN pm_sikap ON pm_pegawai.kdpegawai = pm_sikap.kdpegawai
						LEFT JOIN pm_perilaku ON pm_pegawai.kdpegawai = pm_perilaku.kdpegawai
						ORDER BY Total DESC";
            $hasil = $kon->query("$query");

            $no = 1;
            while ($row = $hasil->fetch_array()) {
            $kdpegawai    = $row['kdpegawai'];
            $namapegawai  = $row['namapegawai'];

            echo '
            <tr>
              <td style="text-align: center">'.$no.'</td>
              <td>'.$namapegawai.'</td>
            ';

              echo '<td style="text-align: center">'.$row['INTE'].'</div></td>';
      			  echo '<td style="text-align: center">'.$row['SK'].'</td>';
      			  echo '<td style="text-align: center">'.$row['PR'].'</td>';
      			  echo '<td style="text-align: center">'.number_format((float)$row['Total'], 2, '.', '').'</td>';
      			  echo '<td style="text-align: center">'.$no.'</td>';

            $no++;
          }
          ?>

        </tbody>
      </table>
    </div>

    <div style="text-align: center">&copy; <strong>2018</strong> - All Rights Reserved
      <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
      Developed by: <strong>Randi Triyudanto</strong>
    </div>

  </body>
</html>
