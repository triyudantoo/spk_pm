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

<?php
  require_once "class/intelektual.php";
  $intelektual = new intelektual();
?>

<html>
<head>
  <title>Kapasitas Intelektual</title>

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
      <i class="fa fa-check-square-o" style="font-size: 28px;"><span style="padding-left: 15px;">Hasil Akhir <small>&raquo; Kapasitas Intelektual</small></span></i>
        <h3 style="margin-top: 25px; padding-left: 10px">Nilai Profil :</h3>
        <table width=100%;>
          <?php
            $intelektual->tampil($cari);
          ?>
        </table>
      <br><br><h3 style="padding-left: 10px">Pemetaan Gap :</h3>
        <table width=100%;>
            <?php
              $intelektual->selisih($cari);
            ?>
        </table>
      <br><br><h3 style="padding-left: 10px">Pembobotan Nilai Gap dan Perhitungan <i>Factor</i> :</h3>
        <table width=100%;>
          <?php
            $intelektual->factor($cari);
          ?>
        </table>
  </div>
</body>
</html>
