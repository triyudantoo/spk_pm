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
  <title>Tambah Pengguna</title>
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
    <i class="fa fa-plus-square" style="font-size: 28px; padding-top: 25px"><span style="padding-left: 15px">Form Input Pengguna</i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Pengguna</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesuser.php">
					<table class="table">
						<tr>
							<td style="text-align: right">Nama Pengguna</td>
							<td><input type="text" name="nama"></td>
						</tr>
						<tr>
							<td style="text-align: right">Email Pengguna</td>
							<td><input type="text" name="email"></td>
						</tr>
            <tr>
              <td style="text-align: right">Password</td>
              <td><input type="password" name="password" style="width: 250px"></td>
            </tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
							</td>
						</tr>
					</table>
					</form>
        </div>
      </div>
    </div>
  </div>

  </body>
  </html>
