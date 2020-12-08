<?php

  include "../config/db.php";
  include '../encrypt.php';

if (isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phone'],$_POST['eur'],$_POST['btc'],$_POST['eth'],$_POST['password'],$_POST['cpassword'])) {
    $fname = mysqli_real_escape_string($conn, strip_tags($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, strip_tags($_POST['lname']));
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
    $phone = mysqli_real_escape_string($conn, strip_tags($_POST['phone']));
    $eur = mysqli_real_escape_string($conn, strip_tags($_POST['eur']));
    $btc = mysqli_real_escape_string($conn, strip_tags($_POST['btc']));
    $eth = mysqli_real_escape_string($conn, strip_tags($_POST['eth']));
    $pass1 = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    $pass2 = mysqli_real_escape_string($conn, strip_tags($_POST['cpassword']));
    
    $ip    = getenv("REMOTE_ADDR");
    $rdate = date("y-m-d H:i:s");
    $lvisi = date('y-m-d');

    if (!empty($fname) and !empty($lname) and !empty($email) and !empty($phone)
    and !empty($eur) and !empty($btc) and !empty($eth) and !empty($pass1) and !empty($pass2)) {
        $passstrlen = strlen($pass1);

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
        $emailexist = mysqli_num_rows($result);


        if ($pass1 != $pass2) {
            header('location:register.php?error=passnotmatch');
            exit;
        } elseif ($passstrlen < 8) {
            header('location:register.php?error=passlength');
            exit;
        } else {
            $password = dec_enc('encrypt', $pass1);
        
            $insert = mysqli_query($conn, "INSERT INTO users (emri,mbiemri,email,password,phone,eur,btc,eth)
            VALUES
            ('$fname','$lname','$email','$password','$phone','$eur','$btc','$eth')") or die(mysqli_error($conn));
        
            header('location:index.php?success=register');
            exit;
        }
    } else {
        header('location:index.php?error=emptyfield');
        exit;
    }
} else {
    header('location:index.php');
    exit;
}


mysqli_close($conn);
ob_end_flush();
