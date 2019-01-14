<?php

include_once('class/login.php');

 $email = $_POST['email'];
 $pass = md5($_POST['password']);

 $login = new login($email,$pass);
 $login->validasi()

?>
