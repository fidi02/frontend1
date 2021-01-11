<?php

include "../config/db.php";

$userDetails = UserDataId($_GET['user_id']);

$query = mysqli_query($conn,"SELECT * FROM coins");
while($coin = mysqli_fetch_assoc($query)){
    ${$coin['short']} = $_GET[$coin['short']];
}

$query = mysqli_query($conn,"SELECT * FROM coins");
while($coin = mysqli_fetch_assoc($query)){
    $check = mysqli_query($conn,"SELECT * FROM balance WHERE user_id = '".$userDetails['id']."' AND coin_id = '".$coin['id']."'");
    if(mysqli_num_rows($check) == 0){
        mysqli_query($conn, "INSERT INTO balance(coin_id,user_id) VALUES('".$coin['id']."','".$userDetails['id']."')");
    }
}


$query = mysqli_query($conn,"SELECT * FROM coins");
while($coin = mysqli_fetch_assoc($query)){
    $newVal = ${$coin['short']};
    if(mysqli_query($conn, "UPDATE balance SET balance = '".$newVal."' WHERE user_id = '".$userDetails['id']."' AND coin_id = '".$coin['id']."'")){
        //nice
    } else {
        echo 0;
        break;
    }
}