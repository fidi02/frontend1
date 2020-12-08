<?php
 
  include "config/db.php";
  include 'encrypt.php';
  

  if (isset($_SESSION['sname']) and isset($_SESSION['spass'])) {
      header("location: dashboard/index.php");
      exit();
  }
  if (isset($_POST['user'],$_POST['pass'])) {
      # code...
  } else {
      header('location:index.html');
      exit();
  }
  $username = mysqli_real_escape_string($conn, strip_tags($_POST['user']));
  $passnotc = mysqli_real_escape_string($conn, strip_tags($_POST['pass']));
  $userpass = dec_enc('encrypt', $passnotc);
  $lvisi = date('Y-m-d');
  $finder = mysqli_query($conn, "SELECT * FROM users WHERE username='".strtolower($username)."' AND password='".$userpass."'") or die("mysqli error");
  if (mysqli_num_rows($finder) != 0) {
      $row = mysqli_fetch_assoc($finder);
      if ($row['statusi'] == 1) {
          $_SESSION['sname'] = $username;
          $_SESSION['spass'] = $userpass;
          $_SESSION['type'] = 'biznes';
          header('location:dashboard/index.php');
          exit;
      } elseif ($row['statusi'] == 2) {
          $_SESSION['sname'] = $username;
          $_SESSION['spass'] = $userpass;
          $_SESSION['type'] = 'admin';

          if (isset($_SESSION['redirect'])) {
              header('location:admin/index.php');
              exit;
          } else {
              header('location:admin/index.php');
              exit;
          }
      } else {
          header('location:index.php?error=accountProcessing');
          exit;
      }
  } else {
      header('location:index.php?error=details');
      exit();
  }
