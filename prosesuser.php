<?php
    require "database.php";
    $db = new database();
    require_once "class/pengguna.php";

    $pengguna = new pengguna($db);

    if (isset($_POST['simpan']))
    {
      $nama     = $_POST[nama];
      $email    = $_POST[email];
      $password = md5($_POST[password]);
      
    	$pengguna->input($nama, $email, $password);
    }

    if (isset($_POST['update']))
    {
      $id       = $_POST[id];
      $nama     = $_POST[nama];
      $email    = $_POST[email];
      $password = md5($_POST[password]);

      $pengguna->update($id,$nama,$email,$password);
    }
