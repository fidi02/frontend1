<?php

  include "config/db.php";
  include 'encrypt.php';

  if (isset($_SESSION['sname']) and isset($_SESSION['spass'])) {
      header("location: index.php");
      exit();
  }

if (isset($_POST['user'],$_POST['name'],$_POST['email'],$_POST['pass'],$_POST['pass1'])) {
    $uname = mysqli_real_escape_string($conn, strip_tags($_POST['user']));
    $fname = mysqli_real_escape_string($conn, strip_tags($_POST['name']));
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
    $pass1 = mysqli_real_escape_string($conn, strip_tags($_POST['pass']));
    $pass2 = mysqli_real_escape_string($conn, strip_tags($_POST['pass1']));
    
    $ip  = getenv("REMOTE_ADDR");
    $rdate = date("y-m-d H:i:s");
    $lvisi = date('y-m-d');

    if (!empty($uname) and !empty($fname) and !empty($email) 
    and !empty($pass1) and !empty($pass2)) {
        $passstrlen = strlen($pass1);

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='".$uname."'");
        $userexist = mysqli_num_rows($result);

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
        $emailexist = mysqli_num_rows($result);


        if ($userexist == 1 || $uname == "NONE" || $uname == "NULL" || $uname == "SYSTEM" || $uname == "none" || $uname == "system") {
            header('location:register.php?error=userexist');
            exit;
        } elseif ($emailexist == 1) {
            header('location:register.php?error=emailexist');
            exit;
        } elseif ($pass1 != $pass2) {
            header('location:register.php?error=passnotmatch');
            exit;
        } elseif ($passstrlen < 8) {
            header('location:register.php?error=passlength');
            exit;
        } else {
            $password = dec_enc('encrypt', $pass1);
        
            $insert = mysqli_query($conn, "INSERT INTO users (emri,email,username,password,statusi)
            VALUES
            ('$fname','$email','$uname','$password',1)") or die(mysqli_error($conn));
        
            header('location:signin.php?success=register');
            exit;
        }
    } else {
        header('location:register.php?error=emptyfield');
        exit;
    }
} else {
    header('location:index.php');
    exit;
}
mysqli_close($conn);
ob_end_flush();
