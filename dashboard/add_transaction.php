<?php

include "../config/db.php";

if (isset($_SESSION['sname'],$_SESSION['type'])) {
    if ($_SESSION['type'] == 'biznes') {
        // vazhdo
    } elseif ($_SESSION['type'] == 'admin') {
        header('location:../admin/index.php');
        exit;
    } 
} else {
    header('location:logout.php');
    exit;
}
$userDetails = UserData($_SESSION['sname']);
if(isset($_GET['method']) AND $_GET['method'] == "deposit"){
    if(isset($_GET['coin'],$_GET['from'],$_GET['amount']) AND !empty($_GET['coin']) AND !empty($_GET['from']) AND !empty($_GET['amount'])){
        $coin = mysqli_real_escape_string($conn, strip_tags($_GET['coin']));
        $from = mysqli_real_escape_string($conn, strip_tags($_GET['from']));
        $amount = mysqli_real_escape_string($conn, strip_tags($_GET['amount']));
    
        if(mysqli_query($conn, "INSERT INTO transactions(method,user_id,coin_id,address,amount) VALUES('deposit', ".$userDetails['id'].",'".$coin."','".$from."','".$amount."')") or die(mysqli_error($conn))) {
            echo 1;
        } else {
            echo 0;
        }
        exit;

    }
} elseif (isset($_GET['method']) AND $_GET['method'] == "withdraw") {
    if(isset($_GET['coin'],$_GET['address'],$_GET['amount'],$_GET['pay_method']) AND !empty($_GET['coin']) AND !empty($_GET['address']) AND !empty($_GET['amount']) AND !empty($_GET['pay_method'])){
        $coin = mysqli_real_escape_string($conn, strip_tags($_GET['coin']));
        $address = mysqli_real_escape_string($conn, strip_tags($_GET['address']));
        $amount = mysqli_real_escape_string($conn, strip_tags($_GET['amount']));
        $method = mysqli_real_escape_string($conn, strip_tags($_GET['pay_method']));
    
        if(mysqli_query($conn, "INSERT INTO transactions(method,user_id,coin_id,address,amount,payment_method) VALUES('withdraw', ".$userDetails['id'].",'".$coin."','".$address."','".$amount."','".$method."')") or die(mysqli_error($conn)) ){
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }
}
echo 0;