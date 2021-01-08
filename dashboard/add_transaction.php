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

if(isset($_GET['coin'],$_GET['from'],$_GET['amount']) AND !empty($_GET['coin']) AND !empty($_GET['from']) AND !empty($_GET['amount'])){
    $coin = mysqli_real_escape_string($conn, strip_tags($_GET['coin']));
    $from = mysqli_real_escape_string($conn, strip_tags($_GET['from']));
    $amount = mysqli_real_escape_string($conn, strip_tags($_GET['amount']));

    if(mysqli_query($conn, "INSERT INTO transactions(user_id,coin_id,address,amount) VALUES(".$userDetails['id'].",".$coin.",".$from.",".$amount.")")){
        echo 1;
    }
}

