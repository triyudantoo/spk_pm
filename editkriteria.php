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
  <title>Edit Kriteria</title>
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
    <i class="fa fa-edit" style="font-size: 26px;"><span style="padding-left: 15px;">Form Edit Kriteria</i>

<?php
  $id = $_GET['kdkriteria'];

  require_once "database.php";
  $db = new database();
  $kon = $db->connect();
  $query = $kon->query("SELECT * FROM pm_kriteria where kdkriteria='$id'");
  while ($row = $query->fetch_array()) {
    $idaspek    = $row['id_aspek'];
    $kdkriteria = $row['kdkriteria'];
    $nmkriteria = $row['nmkriteria'];
    $jenis      = $row['jenis'];
    $target     = $row['target'];
  }
?>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Kriteria</i></div>
        <div class="box-panel">
					<form method="POST" action="proseskriteria.php">
					<table class="table">
						<tr>
              <td style="text-align: right">Aspek</td>
              <td>
                <select class="form-control" name="id_aspek" required>
                  <option value="<?php echo $idaspek; ?>"><?php echo $idaspek; ?></option>
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
							<td><input type="text" name="kdkriteria" readonly value="<?=$kdkriteria;?>"></td>
						</tr>
						<tr>
							<td style="text-align: right">Kriteria</td>
							<td><input type="text" name="nmkriteria" required value="<?=$nmkriteria;?>"></td>
						</tr>
            <tr>
              <td style="text-align: right">Jenis</td>
              <td>
                <select class="form-control" name="jenis" required>
                  <option value="<?php echo $jenis; ?>"><?php echo $jenis; ?></option>
                  <option value=""></option>
                  <option value="Core">Core</option>
                  <option value="secondary">Secondary</option>
                </select>
              </td>
            </tr>
            <tr>
              <td style="text-align: right">Nilai Target</td>
              <td><input type="text" name="target" value="<?=$target;?>"></td>
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
          Developed by: <strong>RanDeveloper</strong>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
