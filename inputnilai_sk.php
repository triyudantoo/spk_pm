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
  <title>Input Nilai Sikap Kerja</title>
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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Sikap Kerja</small></i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Nilai Sikap Kerja</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesnilai_sk.php">
					<table class="table">
            <tr>
							<td style="text-align: right">Nama Pegawai</td>
							<td>
                <select class="form-control" style="width: 150px" name="kdpegawai" required>
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
  							<td style="text-align: right">Energi Psikis</td>
                <td>
                  <select class="form-control" name="nilai_ep" id="nilai_ep" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_ep" style="width: 50px" oninput="setGapEp()" id="target_ep" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_ep" id="selisih_ep" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_ep" id="nilai_bobot_ep" readonly>
                </td>
						</tr>
						<tr>
  							<td style="text-align: right">Ketelitian dan<br>Tanggung Jawab</td>
                <td>
                  <select class="form-control" name="nilai_ktj" id="nilai_ktj" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_ktj" style="width: 50px" oninput="setGapKtj()" id="target_ktj" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_ktj" id="selisih_ktj" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_ktj" id="nilai_bobot_ktj" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Kehati-hatian</td>
  							<td>
                  <select class="form-control" name="nilai_kh" id="nilai_kh" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_kh" style="width: 50px" oninput="setGapKh()" id="target_kh" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_kh" id="selisih_kh" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_kh" id="nilai_bobot_kh" readonly>
                </td>
						</tr>
            <tr>
  							<td style="text-align: right">Dorongan Berprestasi</td>
  							<td>
                  <select class="form-control" name="nilai_db" id="nilai_db" required>
                    <option value="1">1 - Sangat Kurang</option>
                    <option value="2">2 - Kurang</option>
                    <option value="3">3 - Cukup</option>
                    <option value="4">4 - Baik</option>
                    <option value="5">5 - Sangat Baik</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_db" style="width: 50px" oninput="setGapDb()" id="target_db" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <!-- <input type="text" style="width: 50px" name="target_db" oninput="setGapDb()" id="target_db" required> -->
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_db" id="selisih_db" readonly>
                </td>
                <td style="padding-left: 20px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_db" id="nilai_bobot_db" readonly>
                </td>
						</tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td style="text-align: right">Nilai Core Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_cf_A2" id="nilai_cf_A2" required>
              </td>

              <td style="padding-left: 30px; text-align: right">Nilai Secondary<br> Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_sf_A2" id="nilai_sf_A2" required>
              </td>

              <td style="padding-left: 30px; text-align: right">Nilai Total</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_tot_A2" id="nilai_tot_A2" required>
              </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td></td>
              <td colspan="2"><button type="submit" class="btn" name="simpan">
								<i class="fa fa-save" style="font-size:16px"><span style="padding-left: 5px">Simpan</i></button>
                  <span style="padding-left: 50px"><a href="inputnilai_sk.php" class="btn-default">
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
    function setGapEp(){
  		var n = document.getElementById("nilai_ep").value;
  		var t = document.getElementById("target_ep").value;
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
  		document.getElementById("selisih_ep").value = s;
  		document.getElementById("nilai_bobot_ep").value = nb;
  	}

    function setGapKtj(){
  		var n = document.getElementById("nilai_ktj").value;
  		var t = document.getElementById("target_ktj").value;
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
  		document.getElementById("selisih_ktj").value = s;
  		document.getElementById("nilai_bobot_ktj").value = nb;
  	}

    function setGapKh(){
  		var n = document.getElementById("nilai_kh").value;
  		var t = document.getElementById("target_kh").value;
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
  		document.getElementById("selisih_kh").value = s;
  		document.getElementById("nilai_bobot_kh").value = nb;
  	}

    function setGapDb(){
  		var n = document.getElementById("nilai_db").value;
  		var t = document.getElementById("target_db").value;
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
  		document.getElementById("selisih_db").value = s;
  		document.getElementById("nilai_bobot_db").value = nb;

      var ep  = document.getElementById("nilai_bobot_ep").value;
    	var ktj = document.getElementById("nilai_bobot_ktj").value;
      var kh  = document.getElementById("nilai_bobot_kh").value;
      var dr  = document.getElementById("nilai_bobot_db").value;
      var cf  = (parseInt(ep) + parseInt(ktj)) / 2;
      var sf  = (parseFloat(kh) + parseFloat(dr)) / 2;
      var nt  = (cf * 0.6) + (sf * 0.4);

    	document.getElementById("nilai_cf_A2").value  = cf;
      document.getElementById("nilai_sf_A2").value  = sf;
    	document.getElementById("nilai_tot_A2").value = nt;
  	}
  </script>

  </body>
  </html>
