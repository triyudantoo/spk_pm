<?php

class sikap {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_sikap, pm_pegawai where pm_sikap.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="20%">Nama Pegawai</td>
					<td width="15%">Energi Psikis</td>
					<td width="15%">Ketelitian dan <br>Tanggung Jawab</td>
					<td width="15%">Kehati-hatian</td>
					<td width="15%">Dorongan Berprestasi</td>
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
							<td style="text-align: center">'.$row[nilai_ep].'</td>
							<td style="text-align: center">'.$row[nilai_ktj].'</td>
							<td style="text-align: center">'.$row[nilai_kh].'</td>
							<td style="text-align: center">'.$row[nilai_db].'</td>
							<td style="text-align: center"><a href="editnilai_sk.php?kdnilai2='.$row['kdnilai2'].'">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>
						</tr>';
				$no++;
				$target_ep  = $row[target_ep];
				$target_ktj = $row[target_ktj];
				$target_kh  = $row[target_kh];
				$target_db  = $row[target_db];
			}
					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">'.$target_ep.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_ktj.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_kh.'</td>
							<td style="color: #282828; background-color: #fff">'.$target_db.'</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input($kdpegawai, $nilai_ep, $target_ep, $selisih_ep, $nilai_bobot_ep,
								 $nilai_ktj, $target_ktj, $selisih_ktj, $nilai_bobot_ktj,
								 $nilai_kh, $target_kh, $selisih_kh, $nilai_bobot_kh,
								 $nilai_db, $target_db, $selisih_db, $nilai_bobot_db,
								 $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_sikap (kdpegawai, nilai_ep, target_ep, selisih_ep, nilai_bobot_ep,
																		nilai_ktj, target_ktj, selisih_ktj, nilai_bobot_ktj,
						 												nilai_kh, target_kh, selisih_kh, nilai_bobot_kh,
																		nilai_db, target_db, selisih_db, nilai_bobot_db,
																		nilai_cf_A2, nilai_sf_A2, nilai_tot_A2)
						 VALUES ('$kdpegawai', '$nilai_ep', '$target_ep', '$selisih_ep','$nilai_bobot_ep',
							 			 '$nilai_ktj', '$target_ktj', '$selisih_ktj', '$nilai_bobot_ktj',
							 		 	 '$nilai_kh', '$target_kh', '$selisih_kh', '$nilai_bobot_kh',
							 		 	 '$nilai_db', '$target_db', '$selisih_db', '$nilai_bobot_db',
									 	 '$nilai_cf_A2', '$nilai_sf_A2', '$nilai_tot_A2')";
		$qcek = $kon->query("select * from pm_sikap where kdnilai2='$kdnilai2'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data Sudah Ada'); window.location='inputnilai_sk.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_sk.php';</script>";
			}
			else {
				echo"<script>alert('GAGAL Menambahkan Data'); window.location='inputnilai_sk.php';</script>";
				}
		}
	}

	function selisih($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_sikap, pm_pegawai where pm_sikap.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="20%">Nama Pegawai</td>
					<td width="15%">Energi Psikis</td>
					<td width="20%">Ketelitian dan <br>Tanggung Jawab</td>
					<td width="15%">Kehati-hatian</td>
					<td width="20%">Dorongan Berprestasi</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[selisih_ep].'</td>
							<td style="text-align: center">'.$row[selisih_ktj].'</td>
							<td style="text-align: center">'.$row[selisih_kh].'</td>
							<td style="text-align: center">'.$row[selisih_db].'</td>
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

  $query = $kon->query("SELECT * FROM pm_sikap, pm_pegawai where pm_sikap.kdpegawai=pm_pegawai.kdpegawai and pm_pegawai.namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="18%">Nama Pegawai</td>
					<td width="8%">Energi Psikis</td>
					<td width="12%">Ketelitian dan Tanggung Jawab</td>
					<td width="5%">Kehati-hatian</td>
					<td width="8%">Dorongan Berprestasi</td>
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
							<td style="text-align: center">'.$row[nilai_bobot_ep].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_ktj].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_kh].'</td>
							<td style="text-align: center">'.$row[nilai_bobot_db].'</td>
							<td style="text-align: center">'.round($row[nilai_cf_A2],2).'</td>
							<td style="text-align: center">'.round($row[nilai_sf_A2],2).'</td>
							<td style="text-align: center">'.round($row[nilai_tot_A2],2).'</td>
						</tr>';
					$no++;
				}
				$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'EP' or kdkriteria = 'KTJ'");
				$dtcore = $qkriteria_core->fetch_array();
				$jenis_core = $dtcore['jenis'];

				$qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'LP' or kdkriteria = 'DB'");
				$dtsec = $qkriteria_sec->fetch_array();
				$jenis_sec = $dtsec['jenis'];

					echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_core.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_sec.'</td>
							<td style="color: #282828; background-color: #fff">'.$jenis_sec.'</td>
						</tr>
					</thead>
				</table>
				';
	}

	function update($kdnilai2, $kdpegawai, $nilai_ep, $target_ep, $selisih_ep,
									$nilai_bobot_ep, $nilai_ktj, $target_ktj, $selisih_ktj,
									$nilai_bobot_ktj, $nilai_kh, $target_kh, $selisih_kh,
									$nilai_bobot_kh, $nilai_db, $target_db, $selisih_db,
									$nilai_bobot_db, $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_sikap SET kdpegawai='$kdpegawai', nilai_ep='$nilai_ep',
							target_ep='$target_ep', selisih_ep='$selisih_ep', nilai_bobot_ep='$nilai_bobot_ep',
							nilai_ktj='$nilai_ktj', target_ktj='$target_ktj', selisih_ktj='$selisih_ktj', nilai_bobot_ktj='$nilai_bobot_ktj',
							nilai_kh='$nilai_kh', target_kh='$target_kh', selisih_kh='$selisih_kh', nilai_bobot_kh='$nilai_bobot_kh',
							nilai_db='$nilai_db', target_db='$target_db', selisih_db='$selisih_db', nilai_bobot_db='$nilai_bobot_db',
							nilai_cf_A2='$nilai_cf_A2', nilai_sf_A2='$nilai_sf_A2', nilai_tot_A2='$nilai_tot_A2'
							WHERE kdnilai2 = '$kdnilai2'";
		$update = $kon->query("$query");

		if($update) {
			echo"<script>alert('Data Berhasil Diperbarui'); window.location='hasil_sk.php';</script>";
		}
			else {
				echo"<script>alert('Gagal Memperbarui Data'); window.location='hasil_sk.php';</script>";
			}
		}
}
?>
