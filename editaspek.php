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
  <title>Edit Aspek</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header">
		<img src="img/pm_header.png">
	</div>
</head>

<body>
  <?php include_once "sidebar.php"; ?>

  <div class="content">
    <i class="fa fa-edit" style="font-size: 26px;"><span style="padding-left: 15px;">Form Edit Aspek</i>

<?php
  $id = $_GET['id_aspek'];

  require_once "database.php";
  $db = new database();
  $kon = $db->connect();
  $query = $kon->query("SELECT * FROM pm_aspek where id_aspek='$id'");
  while ($row = $query->fetch_array()) {
    $idaspek    = $row['id_aspek'];
    $namaaspek  = $row['namaaspek'];
    $persentase = $row['persentase'];
    $bobotcore  = $row['bobot_core'];
    $bobotsecondary = $row['bobot_secondary'];
  }
?>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Aspek</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesaspek.php">
					<table class="table">
						<tr>
							<td>ID Aspek</td>
							<td><input type="text" name="id_aspek" readonly value="<?=$idaspek;?>"></td>
						</tr>
						<tr>
							<td>Aspek</td>
							<td><input type="text" name="namaaspek" value="<?=$namaaspek;?>"></td>
						</tr>
            <tr>
              <td>Persentase</td>
              <td><input type="text" name="persentase" value="<?=$persentase;?>"></td>
            </tr>
            <tr>
              <td>Bobot Core (%)</td>
              <td><input type="text" name="bobotcore" value="<?=$bobotcore;?>"></td>
            </tr>
            <tr>
              <td>Bobot Secondary (%)</td>
              <td><input type="text" name="bobotsecondary" value="<?=$bobotsecondary;?>"></td>
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
