<?php

class aspek {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_aspek where namaaspek like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="2%">No.</td>
					<td width="3%">ID Aspek</td>
					<td width="10%">Aspek</td>
					<td width="5%">Persentase (%)</td>
					<td width="10%">Bobot CF (%)</td>
					<td width="10%">Bobot SF (%)</td>
					<td colspan="2" width="5%">Aksi</td>
				</tr>
			</thead>

			<tbody>';
			$jmbaris = $query->num_rows;
			if($jmbaris==0)
			{
				echo"
					<tr><td colspan=7 style='text-align: center'><b>Tidak Ada Data !</b></td></tr>
				";
			}
			else
			{
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td style="text-align: center">'.$row[id_aspek].'</td>
							<td>'.$row[namaaspek].'</td>
							<td style="text-align: center">'.$row[persentase].'</td>
							<td style="text-align: center">'.$row[bobot_core].'</td>
							<td style="text-align: center">'.$row[bobot_secondary].'</td>

							<td style="text-align: center"><a href="editaspek.php?id_aspek='.$row['id_aspek'].'">
								<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapusaspek.php?id_aspek='.$row['id_aspek'].'"
								onclick="return confirm("Anda yakin ingin menghapus Data Aspek?");">
								<i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>
							</td>
									 </tr>';
								$no++;
					}
					echo '
					</tbody>
				</table>
				';
			}
	}

	function input($idaspek, $namaaspek, $persentase, $bobotcore, $bobotsecondary)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_aspek (id_aspek,namaaspek,persentase,bobot_core,bobot_secondary) VALUES ('$idaspek','$namaaspek','$persentase','$bobotcore','$bobotsecondary')";
		$qcek = $kon->query("select * from pm_aspek where id_aspek='$idaspek'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='inputaspek.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='dataaspek.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='inputaspek.php';</script>";
				}
		}
	}

	function update($idaspek, $namaaspek, $persentase, $bobotcore, $bobotsecondary) {

			require_once "database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE pm_aspek set id_aspek='$idaspek', namaaspek='$namaaspek', persentase='$persentase',
								bobot_core='$bobotcore', bobot_secondary='$bobotsecondary' where id_aspek='$idaspek'";

			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data Berhasil Diperbarui'); window.location='dataaspek.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='editaspek.php';</script>";
				}
    }

	function hapus($idaspek) {
			require_once "database.php";
			$db  = new database();
			$kon = $db->connect();

			$hapus = $kon->query("DELETE FROM pm_aspek WHERE id_aspek = '$idaspek'");

			if($hapus) {
					echo"<script>alert('Data berhasil Dihapus'); window.location='dataaspek.php';</script>";
			} else {
					echo"<script>alert('Data Gagal Dihapus'); window.location='dataaspek.php';</script>";
			}
    }
}
?>
