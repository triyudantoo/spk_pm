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

  <script type="text/javascript">
  function inputNilai(x)
  {
    if(x=="A001")
    {
      window.location='inputnilai_ki.php';
    } else {
      if(x=="A002")
    {
      window.location='inputnilai_sk.php';
    } else {
      if(x=="A003")
    {
      window.location='inputnilai_pr.php';
    } else {
      alert('Kriteria tidak tersedia');
    }
  }
}
}
</script>
  <div id="header"><img src="img/pm_header.png"></div>

  <?php include_once "sidebar.php"; ?>
</head>

<body>
  <div class="content">
    <i class="fa fa-calculator" style="font-size: 28px;"><span style="padding-left: 15px;">Input Penilaian</span></i>

    <div id="box">
      <div class="box-top"><i>Menginput Data Penilaian Kinerja Pegawai</i></div>
        <div class="box-panel">
          <span style="font-size: 16px">Silakan pilih <strong>Aspek Penilaian</strong> yang hendak diinput:<br>
            <table style="margin-top: 20px">
              <tr>
                <td>Nama Aspek</td>
                <td>
                  <select style="width: 180px" class="form-control" name="id_aspek" id="id_aspek" required>
                    <option value="">-- Pilih Aspek --</option>
                      <?php
                        require_once "database.php";
                        $db  = new database();
                        $kon = $db->connect();
                        $qcek = $kon->query("SELECT * from pm_aspek");
                        while ($row = $qcek->fetch_array()) {
                          ?>
                          <option value='"<?=$row['id_aspek']?>"' onclick="inputNilai('<?=$row['id_aspek']?>')"><?=$row['namaaspek']?></option>;
                          <?php
                        }
                      ?>
                  </select>
                </td>
              </tr>
            </table>
            <br>
        </div>
      </div>
  </div>

  <?php
    require_once "database.php";
    $db  = new database();
    $kon = $db->connect();

    $idaspek = $_POST['namaaspek'];
   ?>


  <div style="text-align: center" class="box-bottom">&copy; <strong>2018</strong> - All Rights Reserved
    <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
    Developed by: <strong>Randi Triyudanto</strong>
  </div>
</body>
</html>
