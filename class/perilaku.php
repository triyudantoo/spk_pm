<?php

class perilaku {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_perilaku, pm_pegawai where pm_perilaku.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
				<td width="5%">No.</td>
				<td width="20%">Nama Pegawai</td>
				<td width="15%">Dominance</td>
				<td width="15%">Influences</td>
				<td width="15%">Steadiness</td>
				<td width="15%">Compliance</td>
				<td width="10%">Edit</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
					<tr>
						<td style="text-align: center">'.$no.'</td>
						<td>'.$row[namapegawai].'</td>
						<td style="text-align: center">'.$row[nilai_dm].'</td>
						<td style="text-align: center">'.$row[nilai_if].'</td>
						<td style="text-align: center">'.$row[nilai_std].'</td>
						<td style="text-align: center">'.$row[nilai_cp].'</td>
						<td style="text-align: center"><a href="editnilai_pr.php?kdnilai3='.$row['kdnilai3'].'">
						<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>
					</tr>';
				$no++;
				$target_dm  = $row[target_dm];
				$target_if  = $row[target_if];
				$target_std = $row[target_std];
				$target_cp  = $row[target_cp];
			}
					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">'.$target_dm.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_if.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_std.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_cp.'</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input($kdpegawai, $nilai_dm, $target_dm, $selisih_dm, $nilai_bobot_dm,
								 $nilai_if, $target_if, $selisih_if, $nilai_bobot_if,
								 $nilai_std, $target_std, $selisih_std, $nilai_bobot_std,
								 $nilai_cp, $target_cp, $selisih_cp, $nilai_bobot_cp,
								 $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_perilaku (kdpegawai, nilai_dm, target_dm, selisih_dm, nilai_bobot_dm,
																			 nilai_if, target_if, selisih_if, nilai_bobot_if,
																			 nilai_std, target_std, selisih_std, nilai_bobot_std,
																			 nilai_cp, target_cp, selisih_cp, nilai_bobot_cp,
																			 nilai_cf_A3, nilai_sf_A3, nilai_tot_A3)
							VALUES ('$kdpegawai', '$nilai_dm', '$target_dm', '$selisih_dm', '$nilai_bobot_dm',
											'$nilai_if', '$target_if', '$selisih_if', '$nilai_bobot_if',
											'$nilai_std', '$target_std', '$selisih_std', '$nilai_bobot_std',
											'$nilai_cp', '$target_cp', '$selisih_cp', '$nilai_bobot_cp',
											'$nilai_cf_A3', '$nilai_sf_A3', '$nilai_tot_A3')";

		$qcek = $kon->query("select * from pm_perilaku where kdnilai3='$kdnilai3'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data Sudah Ada'); window.location='inputnilai_pr.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_pr.php';</script>";
			}
			else {
				echo"<script>alert('GAGAL Menambahkan Data'); window.location='inputnilai_pr.php';</script>";
				}
		}
	}

	function selisih($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_perilaku, pm_pegawai where pm_perilaku.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="27%">Nama Pegawai</td>
					<td width="20%">Dominance</td>
					<td width="20%">Influences</td>
					<td width="15%">Steadiness</td>
					<td width="30%">Compliance</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[selisih_dm].'</td>
							<td style="text-align: center">'.$row[selisih_if].'</td>
							<td style="text-align: center">'.$row[selisih_std].'</td>
							<td style="text-align: center">'.$row[selisih_cp].'</td>
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

  $query = $kon->query("SELECT * FROM pm_perilaku, pm_pegawai where pm_perilaku.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="18%">Nama Pegawai</td>
					<td width="8%">Dominance</td>
					<td width="12%">Influences</td>
					<td width="5%">Steadiness</td>
					<td width="8%">Compliance</td>
					<td width="7%">Nilai CF</td>
					<td width="7%">Nilai SF</td>
					<td width="7%">Nilai Total</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_dm].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_if].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_std].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_cp].'</td>
							<td style="text-align: center">'.round($row[nilai_cf_A3],2).'</td>
							<td style="text-align: center">'.round($row[nilai_sf_A3],2).'</td>
							<td style="text-align: center">'.round($row[nilai_tot_A3],2).'</td>
						</tr>';
					$no++;
				}

				$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'DM' or kdkriteria = 'IF'");
				$dtcore = $qkriteria_core->fetch_array();
				$jenis_core = $dtcore['jenis'];

				$qkriteria_secon = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'STD' or kdkriteria = 'CP'");
				$dtsecon = $qkriteria_secon->fetch_array();
				$jenis_secon = $dtsecon['jenis'];

					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_secon.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_secon.'</td>
						</tr>
					</thead>
				</table>
				';
	}

	function update($kdnilai3, $kdpegawai, $nilai_dm, $target_dm, $selisih_dm,
									$nilai_bobot_dm, $nilai_if, $target_if, $selisih_if,
									$nilai_bobot_if, $nilai_std, $target_std, $selisih_std,
									$nilai_bobot_std, $nilai_cp, $target_cp, $selisih_cp,
									$nilai_bobot_cp, $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_perilaku SET kdpegawai='$kdpegawai', nilai_dm='$nilai_dm',
							target_dm='$target_dm', selisih_dm='$selisih_dm', nilai_bobot_dm='$nilai_bobot_dm',
							nilai_if='$nilai_if', target_if='$target_if', selisih_if='$selisih_if', nilai_bobot_if='$nilai_bobot_if',
							nilai_std='$nilai_std', target_std='$target_std', selisih_std='$selisih_std', nilai_bobot_std='$nilai_bobot_std',
							nilai_cp='$nilai_cp', target_cp='$target_cp', selisih_cp='$selisih_cp', nilai_bobot_cp='$nilai_bobot_cp',
							nilai_cf_A3='$nilai_cf_A3', nilai_sf_A3='$nilai_sf_A3', nilai_tot_A3='$nilai_tot_A3'
							WHERE kdnilai3 = '$kdnilai3'";
		$update = $kon->query("$query");

		if($update) {
			echo"<script>alert('Data Berhasil Diperbarui'); window.location='hasil_pr.php';</script>";
		}
			else {
				echo"<script>alert('Gagal Memperbarui Data'); window.location='hasil_pr.php';</script>";
			}
		}
}
?>
