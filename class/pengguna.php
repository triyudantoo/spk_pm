<?php

class pengguna {

	function input($nama, $email, $password)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_pengguna (nama_pengguna,email,password) VALUES ('$nama','$email','$password')";
		$qcek	 = $kon->query("SELECT * FROM pm_pengguna where id_pengguna='$id'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='inputuser.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data berhasil Ditambahkan'); window.location='inputuser.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='inputuser.php';</script>";
				}
		}
	}

	function update($id, $nama, $email, $password) {

			require_once "database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE pm_pengguna set nama_pengguna='$nama', email='$email', password='$password' WHERE id_pengguna='$id'";

			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data berhasil Diperbarui'); window.location='edituser.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='edituser.php';</script>";
				}
    }
}
?>
