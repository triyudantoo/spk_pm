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
  <title>Input Nilai Perilaku</title>
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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Perilaku</small></i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Nilai Perilaku</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesnilai_pr.php">
					<table class="table">
            <tr>

							<td style="text-align: right">Nama Pegawai</td>
							<td>
                <select class="form-control" name="kdpegawai" required>
                  <option value=""></option>
                  <?php
                    require_once "database.php";
                    $db  = new database();
                    $kon = $db->connect();
                    $qcek = $kon->query("select * from pm_pegawai");
                    while ($row = $qcek->fetch_array()) {
                      echo"<option value='".$row['kdpegawai']."'>".$row['namapegawai']."</option>";
                    }
                  ?>
        				</select>
              </td>
						</tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
            <tr>
  							<td style="text-align: right">Dominance (Kekuasaan)</td>
                <td>
                  <select class="form-control" name="nilai_dm" id="nilai_dm" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_dm" style="width: 50px" oninput="setGapDm()" id="target_dm" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <!-- <input type="text" style="width: 80px" name="target_dm" oninput="setGapDm()" id="target_dm" required> -->
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_dm" id="selisih_dm" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="bobot_dm" id="bobot_dm" readonly>
                </td>
						</tr>
						<tr>
  							<td style="text-align: right">Influences (Pengaruh)</td>
                <td>
                  <select class="form-control" name="nilai_if" id="nilai_if" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_if" style="width: 50px" oninput="setGapIf()" id="target_if" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_if" id="selisih_if" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="bobot_if" id="bobot_if" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Steadiness<br> (Keteguhan Hati)</td>
  							<td>
                  <select class="form-control" name="nilai_std" id="nilai_std" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_std" style="width: 50px" oninput="setGapStd()" id="target_std" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_std" id="selisih_std" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="bobot_std" id="bobot_std" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Compliance (Pemenuhan)</td>
  							<td>
                  <select class="form-control" name="nilai_cp" id="nilai_cp" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_cp" style="width: 50px" oninput="setGapCp()" id="target_cp" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_cp" id="selisih_cp" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="bobot_cp" id="bobot_cp" readonly>
                </td>
						</tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td style="text-align: right">Nilai Core Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_cf_A3" id="nilai_cf_A3" readonly>
              </td>

              <td style="text-align: right; padding-left: 40px">Nilai Secondary<br> Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_sf_A3" id="nilai_sf_A3" readonly>
              </td>

              <td style="text-align: right; padding-left: 20px">Nilai Total</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_tot_A3" id="nilai_tot_A3" readonly>
              </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td></td>
              <td colspan="2"><button type="submit" class="btn" name="simpan">
								<i class="fa fa-save" style="font-size:16px"><span style="padding-left: 5px">Simpan</i></button>
                  <span style="padding-left: 50px"><a href="inputnilai_pr.php" class="btn-default">
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

  <script>
    function setGapDm(){
  		var n = document.getElementById("nilai_dm").value;
  		var t = document.getElementById("target_dm").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_dm").value = s;
  		document.getElementById("bobot_dm").value = nb;
  	}

    function setGapIf(){
  		var n = document.getElementById("nilai_if").value;
  		var t = document.getElementById("target_if").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_if").value = s;
  		document.getElementById("bobot_if").value = nb;
  	}

    function setGapStd(){
  		var n = document.getElementById("nilai_std").value;
  		var t = document.getElementById("target_std").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_std").value = s;
  		document.getElementById("bobot_std").value = nb;
  	}

    function setGapCp(){
  		var n = document.getElementById("nilai_cp").value;
  		var t = document.getElementById("target_cp").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_cp").value = s;
  		document.getElementById("bobot_cp").value = nb;

      var dm  = document.getElementById("bobot_dm").value;
    	var inf = document.getElementById("bobot_if").value;
      var std = document.getElementById("bobot_std").value;
      var cp  = document.getElementById("bobot_cp").value;
      var cf  = (parseFloat(dm)  + parseFloat(inf)) / 2;
      var sf  = (parseFloat(std) + parseFloat(cp)) / 2;
      var nt  = (cf * 0.6) + (sf * 0.4);

    	document.getElementById("nilai_cf_A3").value  = cf;
      document.getElementById("nilai_sf_A3").value  = sf;
    	document.getElementById("nilai_tot_A3").value = nt;
  	}
  </script>

  </body>
  </html>
