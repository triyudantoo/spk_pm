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

      <table class="table table-bordered" style="margin-top: 50px"  >
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
                <td style="background: #fff; color: #282828"><div id='persen'>'.$persen.' %</div></td>
                <td style="background: #fff; color: #282828"><div id='persen2'>'.$persen2.' %</div></td>
                <td style="background: #fff; color: #282828"><div id='persen3'>'.$persen3.' %</div></td>
                <td colspan="2" style="background: #fff"></td>
              </tr>
              ';
           ?>
  			</thead>

  			<tbody>
          <?php
            $query = "select * from pm_pegawai order by kdpegawai";
            $hasil = $kon->query("$query");

            $no = 1;
            while ($row = $hasil->fetch_array()) {
            $kdpegawai    = $row[kdpegawai];
            $namapegawai  = $row[namapegawai];
            //$niltot       = $row[niltot];
            //$rank         = $row[rank];
            //$dtpersen, $dtpersen2, $dtpersen3 = $row[persentase];

          echo'
          <tr>
						<td style="text-align: center">'.$no.'</td>
						<td>'.$namapegawai.'</td>
            ';
            $query1 = "SELECT nilai_tot_A1 FROM pm_intelektual WHERE kdpegawai = '$kdpegawai' ORDER BY kdpegawai";
            $hasil1 = $kon->query("$query1");
            while ($row1 = $hasil1->fetch_array()) {
              $nilaitot1 = $row1[nilai_tot_A1];
              echo '<td style="text-align: center">'.$nilaitot1.'</td>';
            }

            $query2 = "SELECT nilai_tot_A2 FROM pm_sikap WHERE kdpegawai = '$kdpegawai' ORDER BY kdpegawai";
            $hasil2 = $kon->query("$query2");
            while ($row2 = $hasil2->fetch_array()) {
              $nilaitot2 = $row2[nilai_tot_A2];
              echo '<td style="text-align: center">'.$nilaitot2.'</td>';
            }

            $query3 = "SELECT nilai_tot_A3 FROM pm_perilaku WHERE kdpegawai = '$kdpegawai' ORDER BY kdpegawai";
            $hasil3 = $kon->query("$query3");
            while ($row3 = $hasil3->fetch_array()) {
            $nilaitot3 = $row3[nilai_tot_A3];
              echo '<td style="text-align: center">'.$nilaitot3.'</td>';
            }
/*
            $query4 = (parseFloat($nilaitot1) * $dtpersen) + (parseFloat($nilaitot2) * $dtpersen2) + (parseFloat($nilaitot3) * $dtpersen3);
            $hasil4 = $kon->query("$query4");
            while ($row4 = $hasil4->fetch_array()) {
            $total  = $row4[niltot];
              echo '<td style="text-align: center"><div id='niltot'>'.$niltot.'</div></td>';
            }
*/
            echo '
						<td style="text-align: center"></td>
				   </tr>
          ';
          $no++;
        }

          ?>
        </tbody>
      </table>
  </div>
</body>
</html>
