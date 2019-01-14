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
  <title>Edit Pengguna</title>
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
    <i class="fa fa-edit" style="font-size: 28px"><span style="padding-left: 15px;">Edit Data Pengguna</i>

<?php
  $id = $_SESSION['nama'];

	require_once "database.php";
	$db    = new database();
	$kon   = $db->connect();
  $query = $kon->query("SELECT * FROM pm_pengguna WHERE nama_pengguna='$id'");
  while ($row = $query->fetch_array())
  {
    $id       = $row['id_pengguna'];
    $nama     = $row['nama_pengguna'];
    $email    = $row['email'];
    $password = $row['password'];
  }
?>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Pengguna</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesuser.php">
            <input type="hidden" value="<?=$password;?>">
					<table class="table">
            <input type="hidden" name="id" value="<?=$id;?>">
						<tr>
							<td style="text-align: right">Nama Pengguna</td>
							<td><input type="text" name="nama" value="<?=$nama;?>"></td>
						</tr>
            <tr>
							<td style="text-align: right">Email Pengguna</td>
							<td><input type="text" name="email" value="<?=$email;?>"></td>
						</tr>
            <tr>
							<td style="text-align: right">Password</td>
							<td><input type="password" style="width: 250px" name="password" value=""></td>
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
