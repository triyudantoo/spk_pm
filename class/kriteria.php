<?php

class kriteria {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_kriteria, pm_aspek where pm_kriteria.id_aspek=pm_aspek.id_aspek and pm_kriteria.nmkriteria like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="2%" style="text-align: center">No.</td>
					<td width="2%" style="text-align: center">Kode Kriteria</td>
					<td width="10%" style="text-align: center">Aspek</td>
					<td width="15%" style="text-align: center">Kriteria</td>
					<td width="2%" style="text-align: center">Jenis <br>Factor</td>
					<td width="2%" style="text-align: center">Nilai Target</td>
					<td colspan="2" width="5%" style="text-align: center">Aksi</td>
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
							<td>'.$row[kdkriteria].'</td>
							<td>'.$row[namaaspek].'</td>
							<td>'.$row[nmkriteria].'</td>
							<td>'.$row[jenis].'</td>
							<td style="text-align: center">'.$row[target].'</td>

							<td style="text-align: center"><a href="editkriteria.php?kdkriteria='.$row['kdkriteria'].'">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapuskriteria.php?kdkriteria='.$row['kdkriteria'].'"
								onclick="return confirm("Anda yakin ingin menghapus Data Kriteria?");">
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

	function input($idaspek, $kdkriteria, $nmkriteria, $jenis, $target)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_kriteria (id_aspek,kdkriteria,nmkriteria,jenis,target) VALUES ('$idaspek','$kdkriteria','$nmkriteria','$jenis','$target')";
		$qcek = $kon->query("select * from pm_kriteria where kdkriteria='$kdkriteria'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data Sudah Ada'); window.location='inputkriteria.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='datakriteria.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='datakriteria.php';</script>";
				}
		}
	}

	function update($idaspek, $kdkriteria, $nmkriteria, $jenis, $target) {

			require_once "database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE pm_kriteria set id_aspek='$idaspek', kdkriteria='$kdkriteria', nmkriteria='$nmkriteria', jenis='$jenis', target='$target' WHERE kdkriteria='$kdkriteria'";
			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data Berhasil Diperbarui'); window.location='datakriteria.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='datakriteria.php';</script>";
				}
    }

	function hapus($kdkriteria) {

				require_once "database.php";
				$db  = new database();
				$kon = $db->connect();

				$hapus = $kon->query("DELETE FROM pm_kriteria WHERE kdkriteria = '$kdkriteria'");

				if($hapus) {
						echo"<script>alert('Data Berhasil Dihapus'); window.location='datakriteria.php';</script>";
				}
				else {
						echo"<script>alert('GAGAL Menghapus Data'); window.location='datakriteria.php';</script>";
				}
    }
}
?>
