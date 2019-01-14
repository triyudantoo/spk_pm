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
  require_once "class/pegawai.php";
  $pegawai = new pegawai();
?>

<html>
<head>
  <title>Data Pegawai</title>

  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>
</head>

<body>
  <div id="header">
    <!--     <img src="img/header.png"> -->
    <img src="img/pm_header.png">
  </div>

  <?php include_once "sidebar.php"; ?>

  <div class="content">
      <i class="fa fa-users" style="font-size: 28px;"><span style="padding-left: 15px;">Data Pegawai</span></i>
    <div id="box">
      <div class="box-top"><i>Menampilkan Data Pegawai</i></div>
      <div class="box-panel">
        <table width=100%;>
          <tr>
            <td style="width:65%; padding-top:15px;"><a href="inputpegawai.php">
                <button class="btn"><i class="fa fa-plus" style="font-size:16px">
                <span style="padding-left: 5px"> Pegawai</span></i></button></a></span>
            </td>
            <td>
          <form method="post" action="datapegawai.php">
          <?php
          $cari = $_POST['caripegawai'];

          if($_POST['caripegawai'])
          {
            echo'
              <a href="datapegawai.php" style="font-size:12px;">Reset Pencarian</>
              <input type="text" name="caripegawai" placeholder="Cari Pegawai" value='.$cari.'>';
          }else{
            echo'<input type="text" name="caripegawai" placeholder="Cari Pegawai">';
          }
          ?>
          <button type="submit" class="btn">
            <i class="fa fa-search" style="font-size:16px;"></i>
          </button>
          </form>
      </td>
    </tr>

      <?php
        $pegawai->tampil($cari);
      ?>
        <div class="box-bottom">&copy; <strong>2018</strong> - All Rights Reserved
          <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
          Developed by: <strong>Randi Triyudanto</strong>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
