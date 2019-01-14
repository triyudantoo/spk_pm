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
  <title>Input Nilai</title>
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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Kapasitas Intelektual</small></i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Nilai Kapasitas Intelektual</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesnilai_ki.php">
					<table class="table">
            <tr>
							<td style="text-align: right">Nama Pegawai</td>
							<td>
                <select class="form-control" style="width: 140px" name="kdpegawai" required>
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
  							<td style="text-align: right">Verbalisasi Ide</td>
                <td>
                  <select class="form-control" name="nilai_vi" id="nilai_vi" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_vi" style="width: 50px" oninput="setGapVi()" id="target_vi" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_vi" id="selisih_vi" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_vi" id="nilai_bobot_vi" readonly>
                </td>
						</tr>
						<tr>
  							<td style="text-align: right">Sistematika <br>Berpikir</td>
                <td>
                  <select class="form-control" name="nilai_sb" id="nilai_sb" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_sb" style="width: 50px" oninput="setGapSb()" id="target_sb" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_sb" id="selisih_sb" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_sb" id="nilai_bobot_sb" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Konsentrasi</td>
  							<td>
                  <select class="form-control" name="nilai_kn" id="nilai_kn" onclick="setHitungCf" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_kn" style="width: 50px" oninput="setGapKn()" id="target_kn" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_kn" id="selisih_kn" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_kn" id="nilai_bobot_kn" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Logika Praktis</td>
  							<td>
                  <select class="form-control" name="nilai_lp" id="nilai_lp" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_lp" style="width: 50px" oninput="setGapLp()" id="target_lp" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_lp" id="selisih_lp" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_lp" id="nilai_bobot_lp" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Imajinasi Kreatif</td>
  							<td>
                  <select class="form-control" name="nilai_ik" id="nilai_ik" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_ik" style="width: 50px" oninput="setGapIk()" id="target_ik" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_ik" id="selisih_ik" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_ik" id="nilai_bobot_ik" readonly>
                </td>
						</tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td style="text-align: right">Nilai Core Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_cf_A1" id="nilai_cf_A1" readonly>
              </td>

              <td style="padding-left: 40px; text-align: right">Nilai Secondary <br>Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_sf_A1" id="nilai_sf_A1" readonly>
              </td>

              <td style="padding-left: 30px">Nilai Total</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_tot_A1" id="nilai_tot_A1">
              </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td></td>
              <td colspan="2"><button type="submit" class="btn" name="simpan">
								<i class="fa fa-save" style="font-size:16px"><span style="padding-left: 5px">Simpan</i></button>
                  <span style="padding-left: 50px"><a href="inputnilai_ki.php" class="btn-default">
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
    function setGapVi(){
  		var n = document.getElementById("nilai_vi").value;
  		var t = document.getElementById("target_vi").value;
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
  		document.getElementById("selisih_vi").value = s;
  		document.getElementById("nilai_bobot_vi").value = nb;
  	}

    function setGapSb(){
  		var n = document.getElementById("nilai_sb").value;
  		var t = document.getElementById("target_sb").value;
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
  		document.getElementById("selisih_sb").value = s;
  		document.getElementById("nilai_bobot_sb").value = nb;
  	}

    function setGapKn(){
  		var n = document.getElementById("nilai_kn").value;
  		var t = document.getElementById("target_kn").value;
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
  		document.getElementById("selisih_kn").value = s;
  		document.getElementById("nilai_bobot_kn").value = nb;
  	}

    function setGapLp(){
  		var n = document.getElementById("nilai_lp").value;
  		var t = document.getElementById("target_lp").value;
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
  		document.getElementById("selisih_lp").value = s;
  		document.getElementById("nilai_bobot_lp").value = nb;
  	}

    function setGapIk(){
  		var n = document.getElementById("nilai_ik").value;
  		var t = document.getElementById("target_ik").value;
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
  		document.getElementById("selisih_ik").value = s;
  		document.getElementById("nilai_bobot_ik").value = nb;

    	var vi = document.getElementById("nilai_bobot_vi").value;
    	var sb = document.getElementById("nilai_bobot_sb").value;
      var kn = document.getElementById("nilai_bobot_kn").value;
      var lp = document.getElementById("nilai_bobot_lp").value;
      var ik = document.getElementById("nilai_bobot_ik").value;
    	var cf = (parseInt(vi) + parseInt(sb) + parseInt(kn)) / 3;
      var sf = (parseFloat(lp) + parseFloat(ik)) / 2;
      var nt = (cf * 0.6) + (sf * 0.4);

    	document.getElementById("nilai_cf_A1").value  = cf;
      document.getElementById("nilai_sf_A1").value  = sf;
    	document.getElementById("nilai_tot_A1").value = nt;
    }

  </script>
  </body>
  </html>
