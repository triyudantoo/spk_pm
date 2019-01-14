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
  require_once "class/pengguna.php";
  $pengguna = new pengguna();
?>

<html>
<head>
  <title>Data Pengguna</title>

  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header">
    <img src="img/pm_header.png">
  </div>

  <?php include_once "sidebar.php" ?>
</head>

<body>
  <div class="content">
      <i class="fa fa-edit" style="font-size: 28px;">
        <span style="padding-left: 15px;">Data Pengguna</span></i>
    <div id="box">
      <div class="box-top"><i>Menampilkan Pengguna Sistem</i></div>
      <div class="box-panel">
        <table width=100%;>
          <?php
            $pengguna->tampil($cari);
          ?>
      </div>
    </div>
  </div>
  </body>
  </html>
