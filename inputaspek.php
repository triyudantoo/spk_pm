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
  <title>Input Aspek</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header">
		<img src="img/pm_header.png">
	</div>

  <?php include_once "sidebar.php"; ?>
</head>

<body>
  <div class="content">
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Aspek</i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Aspek</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesaspek.php">
					<table class="table">
						<tr>
							<td style="text-align: right">ID Aspek</td>
							<td><input type="text" name="id_aspek"></td>
						</tr>
						<tr>
							<td style="text-align: right">Aspek</td>
							<td><input type="text" name="namaaspek"></td>
						</tr>
            <tr>
							<td style="text-align: right">Persentase (%)</td>
							<td><input type="text" name="persentase"></td>
						</tr>
            <tr>
							<td style="text-align: right">Bobot Core (%)</td>
							<td><input type="text" name="bobot_core"></td>
						</tr>
            <tr>
							<td style="text-align: right">Bobot Secondary (%)</td>
							<td><input type="text" name="bobot_secondary"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
									<span style="padding-left: 20px"><a href="dataaspek.php" class="btn-default">
										<i class="fa fa-close" style="font-size:16px">
										<span style="padding-left: 5px">Batal</i></a>
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
