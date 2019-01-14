<?php

class pegawai {

	function tampil($cari) {

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pm_pegawai where namapegawai like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="2%" style="text-align: center">No.</td>
					<td width="5%" style="text-align: center">Kode Pegawai</td>
					<td width="15%" style="text-align: center">Nama Pegawai</td>
					<td width="5%" style="text-align: center">Tahun Masuk</td>
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
							<td style="text-align: center">'.$row[kdpegawai].'</td>
							<td>'.$row[namapegawai].'</td>
							<td style="text-align: center">'.$row[thn_masuk].'</td>

							<td style="text-align: center"><a href="editpegawai.php?kdpegawai='.$row['kdpegawai'].'">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapuspegawai.php?kdpegawai='.$row['kdpegawai'].'"
								onclick="return confirm("Anda yakin ingin menghapus Data Pegawai?");">
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

	function input($kdpegawai, $namapegawai, $thn_masuk)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_pegawai (kdpegawai,namapegawai,thn_masuk) VALUES ('$kdpegawai','$namapegawai','$thn_masuk')";
		$qcek = $kon->query("select * from pegawai where kdpegawai='$kdpegawai'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='inputpegawai.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data Berhasil Ditambahkan'); window.location='datapegawai.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='datapegawai.php';</script>";
				}
		}
	}

	function update($kdpegawai, $namapegawai, $thn_masuk) {

			require_once "database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE pm_pegawai set kdpegawai='$kdpegawai', namapegawai='$namapegawai', thn_masuk='$thn_masuk' where kdpegawai='$kdpegawai'";

			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data Berhasil Diperbarui'); window.location='datapegawai.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='datapegawai.php';</script>";
				}
    }

	function hapus($kdpegawai) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$hapus = $kon->query("DELETE FROM pm_pegawai WHERE kdpegawai = '$kdpegawai'");

		if($hapus) {
			echo"<script>alert('Data berhasil Dihapus'); window.location='datapegawai.php';</script>";
		} else {
			echo"<script>alert('Data gagal dihapus'); window.location='datapegawai.php';</script>";
		}
	}
}
?>
