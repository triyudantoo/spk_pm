<?php

class Intelektual {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_intelektual, pm_pegawai where pm_intelektual.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="20%">Nama Pegawai</td>
					<td width="14%">Verbalisasi Ide</td>
					<td>Sistematika <br>Berpikir</td>
					<td width="12%">Konsentrasi</td>
					<td width="10%">Logika Praktis</td>
					<td width="12%">Imajinasi Kreatif</td>
					<td>Edit</td>

				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[nilai_vi].'</td>
							<td style="text-align: center">'.$row[nilai_sb].'</td>
							<td style="text-align: center">'.$row[nilai_kn].'</td>
							<td style="text-align: center">'.$row[nilai_lp].'</td>
							<td style="text-align: center">'.$row[nilai_ik].'</td>
							<td style="text-align: center"><a href="editnilai_ki.php?kdnilai1='.$row['kdnilai1'].'">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>

						</tr>';
								$no++;
								$target_vi = $row[target_vi];
								$target_sb = $row[target_sb];
								$target_kn = $row[target_kn];
								$target_lp = $row[target_lp];
								$target_ik = $row[target_ik];
					}
					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">'.$target_vi.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_sb.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_kn.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_lp.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_ik.'</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input($kdpegawai, $nilai_vi, $target_vi, $selisih_vi, $nilai_bobot_vi,
								 $nilai_sb, $target_sb, $selisih_sb, $nilai_bobot_sb,
								 $nilai_kn, $target_kn, $selisih_kn, $nilai_bobot_kn,
								 $nilai_lp, $target_lp, $selisih_lp, $nilai_bobot_lp,
								 $nilai_ik, $target_ik, $selisih_ik, $nilai_bobot_ik,
								 $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_intelektual (kdpegawai, nilai_vi, target_vi, selisih_vi, nilai_bobot_vi,
																										 nilai_sb, target_sb, selisih_sb, nilai_bobot_sb,
																										 nilai_kn, target_kn, selisih_kn, nilai_bobot_kn,
																										 nilai_lp, target_lp, selisih_lp, nilai_bobot_lp,
																										 nilai_ik, target_ik, selisih_ik, nilai_bobot_ik,
																									 	 nilai_cf_A1, nilai_sf_A1, nilai_tot_A1)
						 VALUES ('$kdpegawai','$nilai_vi','$target_vi','$selisih_vi','$nilai_bobot_vi',
																  '$nilai_sb','$target_sb','$selisih_sb','$nilai_bobot_sb',
																  '$nilai_kn','$target_kn','$selisih_kn','$nilai_bobot_kn',
															 	  '$nilai_lp','$target_lp','$selisih_lp','$nilai_bobot_lp',
																	'$nilai_ik','$target_ik','$selisih_ik','$nilai_bobot_ik',
																	'$nilai_cf_A1','$nilai_sf_A1','$nilai_tot_A1')";
		$qcek = $kon->query("select * from pm_intelektual where kdnilai1='$kdnilai1'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data Sudah Ada'); window.location='inputnilai_ki.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_ki.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='inputnilai_ki.php';</script>";
				}
		}
	}

	function update($kdnilai1, $kdpegawai, $nilai_vi, $target_vi, $selisih_vi, $nilai_bobot_vi,
								 $nilai_sb, $target_sb, $selisih_sb, $nilai_bobot_sb,
								 $nilai_kn, $target_kn, $selisih_kn, $nilai_bobot_kn,
								 $nilai_lp, $target_lp, $selisih_lp, $nilai_bobot_lp,
								 $nilai_ik, $target_ik, $selisih_ik, $nilai_bobot_ik,
								 $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_intelektual SET kdpegawai='$kdpegawai',
							nilai_vi='$nilai_vi', target_vi='$target_vi', selisih_vi='$selisih_vi', nilai_bobot_vi='$nilai_bobot_vi',
							nilai_sb='$nilai_sb', target_sb='$target_sb', selisih_sb='$selisih_sb', nilai_bobot_sb='$nilai_bobot_sb',
							nilai_kn='$nilai_kn', target_kn='$target_kn', selisih_kn='$selisih_kn', nilai_bobot_kn='$nilai_bobot_kn',
							nilai_lp='$nilai_lp', target_lp='$target_lp', selisih_lp='$selisih_lp', nilai_bobot_lp='$nilai_bobot_lp',
							nilai_ik='$nilai_ik', target_ik='$target_ik', selisih_ik='$selisih_ik', nilai_bobot_ik='$nilai_bobot_ik',
							nilai_cf_A1='$nilai_cf_A1', nilai_sf_A1='$nilai_sf_A1', nilai_tot_A1='$nilai_tot_A1'
							WHERE kdnilai1 = '$kdnilai1'";
		$update = $kon->query("$query");

		if($update) {
				echo"<script>alert('Data Berhasil Diperbarui'); window.location='hasil_ki.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Memperbarui Data'); window.location='hasil_ki.php';</script>";
			}
	}

	function selisih($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_intelektual, pm_pegawai where pm_intelektual.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
				<td width="10%">No.</td>
				<td width="20%">Nama Pegawai</td>
				<td width="14%">Verbalisasi Ide</td>
				<td>Sistematika <br>Berpikir</td>
				<td>Konsentrasi</td>
				<td width="10%">Logika Praktis</td>
				<td width="15%">Imajinasi Kreatif</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[selisih_vi].'</td>
							<td style="text-align: center">'.$row[selisih_sb].'</td>
							<td style="text-align: center">'.$row[selisih_kn].'</td>
							<td style="text-align: center">'.$row[selisih_lp].'</td>
							<td style="text-align: center">'.$row[selisih_ik].'</td>
						</tr>';
				$no++;
				}
					echo '
					</tbody>
				</table>
				';
	}

	function factor($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_intelektual, pm_pegawai WHERE pm_intelektual.kdpegawai=pm_pegawai.kdpegawai AND pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="17%">Nama Pegawai</td>
					<td>Verbalisasi Ide</td>
					<td>Sistematika <br>Berpikir</td>
					<td>Konsentrasi</td>
					<td>Logika Praktis</td>
					<td>Imajinasi Kreatif</td>
					<td width="8%">Nilai CF</td>
					<td width="8%">Nilai SF</td>
					<td width="8%">Nilai Total</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_vi].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_sb].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_kn].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_lp].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_ik].'</td>
							<td style="text-align: center">'.round($row[nilai_cf_A1],2).'</td>
							<td style="text-align: center">'.round($row[nilai_sf_A1],2).'</td>
							<td style="text-align: center">'.round($row[nilai_tot_A1],2).'</td>
						</tr>';
				$no++;
				}
				$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'VI' or kdkriteria = 'SB' or kdkriteria = 'KN'");
				$dtcore = $qkriteria_core->fetch_array();
				$jenis_core = $dtcore['jenis'];

				$qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'LP' or kdkriteria = 'IK'");
				$dtsec = $qkriteria_sec->fetch_array();
				$jenis_sec = $dtsec['jenis'];

					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_sec.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_sec.'</td>
						</tr>
					</thead>
				</table>
				';

	}

	/* function hapus($kdnilai1) {

				require_once "database.php";
				$db  = new database();
				$kon = $db->connect();

				$hapus = $kon->query("DELETE FROM pm_intelektual WHERE kdnilai1 = '$kdnilai1'");

				if($hapus) {
						echo"<script>alert('Data Berhasil Dihapus'); window.location='hasil_ki.php';</script>";
				}
				else {
						echo"<script>alert('GAGAL Menghapus Data'); window.location='hasil_ki.php';</script>";
				}
    } */
}
?>
