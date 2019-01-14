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
  <title>Hasil Akhir</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header"><img src="img/pm_header.png"></div>
  <?php include_once "sidebar.php"; ?>

  <script type="text/javascript">
  function lihatNilai(x)
  {
    if(x=="A001")
    {
      window.location='hasil_ki.php';
    } else {
      if(x=="A002")
    {
      window.location='hasil_sk.php';
    } else {
      if(x=="A003")
    {
      window.location='hasil_pr.php';
    } else {
      alert('Kriteria tidak tersedia');
      }
    }
    }
  }
</script>
</head>

<body>
  <div class="content">
    <i class="fa fa-check-square-o" style="font-size: 28px;"><span style="padding-left: 15px;">Hasil Akhir</span></i>

    <div id="box">
      <div class="box-top"><i>Hasil Akhir Penilaian</i></div>
        <div class="box-panel">
          <span style="font-size: 16px">Silakan pilih <strong>Aspek Penilaian</strong> yang ingin dilihat hasilnya:<br>
            <table style="margin-top: 20px">
              <tr>
                <td>1. Pilih Aspek</td>
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
                          <option value='"<?=$row['id_aspek']?>"' onclick="lihatNilai('<?=$row['id_aspek']?>')"><?=$row['namaaspek']?></option>;
                          <!-- echo"<option value='".$row['id_aspek']."'>".$row['namaaspek']."</option>"; -->
                          <?php
                            }
                          ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  2. <a href="final_result.php">Nilai Ranking</a>
                </td>
              </tr>
            </table>
        </div>
      </div>
  </div>

  <div style="text-align: center" class="box-bottom">&copy; <strong>2018</strong> - All Rights Reserved
    <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
    Developed by: <strong>Randi Triyudanto</strong>
  </div>
</body>
</html>
