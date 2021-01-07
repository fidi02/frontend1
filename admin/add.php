<?php

  include "../config/db.php";
  include '../encrypt.php';
 

if (isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['eur'],$_POST['btc'],$_POST['eth'])) {
    $fname = mysqli_real_escape_string($conn, strip_tags($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, strip_tags($_POST['lname']));
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
    $eur = mysqli_real_escape_string($conn, strip_tags($_POST['eur']));
    $btc = mysqli_real_escape_string($conn, strip_tags($_POST['btc']));
    $eth = mysqli_real_escape_string($conn, strip_tags($_POST['eth']));
    
    

    if (!empty($fname) and !empty($lname) and !empty($email)  and !empty($eur) and !empty($btc) and !empty($eth)) {
        $query = mysqli_query($conn, "Select * from users where email = $email");
        $row = mysqli_fetch_assoc($query);
        $eurbal = $row['eur'];
        $btcbal = $row['btc'];
        $ethbal = $row['eth'];
        
        $eur1 = $eur + $eurbal;
        $btc1 = $btc + $btcbal;
        $eth1 = $eth +$ethbal;

            $insert = mysqli_query($conn, "INSERT INTO transaction (fname,lname,email,eur,btc,eth)
            VALUES
            ('$fname','$lname','$email','$eur','$btc','$eth')") or die(mysqli_error($conn));

            $sql_update = "UPDATE users
                                 SET
                                  eur ='$eur1',
                                  btc ='$btc1',
                                  eth ='$eth1'
                                 WHERE email = '$email'";

            $res_Insert = mysqli_query($conn, $sql_update);
        
            header('location:transactions.php?success=register');
            exit;
        
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
