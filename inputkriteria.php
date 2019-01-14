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
  <title>Input Kriteria</title>
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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Data Kriteria</i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Kriteria</i></div>
        <div class="box-panel">
					<form method="POST" action="proseskriteria.php">
					<table class="table">
            <tr>
							<td style="text-align: right">Aspek</td>
							<td>
                <select style="width: 250px" class="form-control" name="id_aspek" required>
                  <option value=""></option>
                  <?php
                    require_once "database.php";
                    $db  = new database();
                    $kon = $db->connect();
                    $qcek = $kon->query("select * from pm_aspek");
                    while ($row = $qcek->fetch_array()) {
                      echo"<option value='".$row['id_aspek']."'>".$row['namaaspek']."</option>";
                    }
                  ?>
        				</select>
              </td>
						</tr>
            <tr>
							<td style="text-align: right">Kode Kriteria</td>
							<td><input type="text" name="kdkriteria" required></td>
						</tr>
						<tr>
							<td style="text-align: right">Kriteria</td>
							<td><input type="text" name="nmkriteria" required></td>
						</tr>
            <tr>
							<td style="text-align: right">Jenis Factor</td>
							<td>
                <select class="form-control" style="width: 250px" name="jenis" required>
                  <option value="Core">Core</option>
                  <option value="Secondary">Secondary</option>
                </select>
              </td>
						</tr>
            <tr>
              <td style="text-align: right">Nilai Target</td>
              <td><input type="text" name="target" required></td>
            </tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
									<span style="padding-left: 20px"><a href="datakriteria.php" class="btn-default">
										<span style="padding-left: 5px">Batal</a>
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
