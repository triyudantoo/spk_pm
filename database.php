<?php

class database {

	private $dbHost     = "localhost";
	private $dbUser     = "root";
	private $dbPassword = "507";
	private $dbName     = "db_dss";

	public function connect() {
		// koneksi ke server MySQL
		$mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

		// cek koneksi tersambung atau tidak
		if ($mysqli->connect_error){
			echo "Gagal terkoneksi ke database : (".$mysqli->connect_error.")";
		}

		// nilai kembalian bila koneksi berhasil
		return $mysqli;
	}
}
?>
