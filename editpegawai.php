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
  <title>Edit Pegawai</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>
</head>

<body>
  <div id="header">
		<img src="img/header.png">
	</div>

  <?php include_once "sidebar.php"; ?>

  <div class="content">
    <i class="fa fa-edit" style="font-size: 26px;"><span style="padding-left: 15px;">Form Edit Pegawai</i>

<?php
  $id = $_GET['kdpegawai'];

	require_once "database.php";
	$db = new database();
	$kon = $db->connect();
  $query = $kon->query("SELECT * FROM pm_pegawai where kdpegawai='$id'");
  while ($row = $query->fetch_array()) {
      $kdpegawai    = $row['kdpegawai'];
      $namapegawai  = $row['namapegawai'];
      $thn_masuk    = $row['thn_masuk'];
  }
?>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Pegawai</i></div>
        <div class="box-panel">
					<form method="POST" action="prosespegawai.php">
					<table class="table">
						<tr>
							<td>Kode Pegawai</td>
							<td><input type="text" name="kdpegawai" readonly value="<?=$kdpegawai;?>"></td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><input type="text" name="namapegawai" value="<?=$namapegawai;?>"></td>
						</tr>
            <tr>
							<td>Tahun Masuk</td>
							<td><input type="text" name="thn_masuk" value="<?=$thn_masuk;?>"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn-default" name="update">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Update</i>
								</button>
							</td>
						</tr>
					</table>
					</form>
        </div>
        <div class="box-bottom">&copy; <strong>2018</strong> - All Rights Reserved
          <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
          Developed by: <strong>Randi Triyudanto</strong>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
