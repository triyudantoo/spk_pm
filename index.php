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
<title>.:: Beranda ::.</title>
<link rel="shortcut icon" href="img/favicon.png">
<link href="icon/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/global.css" /></link>

<div id="header">
	<img src="img/pm_header.png">
</div>
<?php include_once "sidebar.php"; ?>
</head>

<body>
	<?php include_once "body.php"; ?>
</body>

</html>
