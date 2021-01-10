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

if(isset($_GET['action']) AND $_GET['action'] == "approve"){
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = mysqli_real_escape_string($conn, strip_tags($_GET['id']));
        $row = mysqli_query($conn, "SELECT * FROM transactions WHERE id = ".$id."");
        if(mysqli_num_rows($row)){
            $single_row = mysqli_fetch_assoc($row);
        } else {
            header("Location: transactions.php");
        }
        if($single_row['status'] != 0){
            $_SESSION["error"] = "Status already updated!";
            header("Location: transactions.php");
            exit;
        }
        $balance_q = mysqli_query($conn, "SELECT * FROM balance WHERE user_id = ".$single_row['user_id']." AND coin_id = ".$single_row['coin_id']." ");
        $balance = mysqli_fetch_assoc($balance_q);
        if(mysqli_num_rows($balance_q) == 0){
            mysqli_query($conn, "INSERT INTO balance(user_id, coin_id) VALUES (".$single_row['user_id'].",".$single_row['coin_id'].")");
            $balance_q = mysqli_query($conn, "SELECT * FROM balance WHERE user_id = ".$single_row['user_id']." AND coin_id = ".$single_row['coin_id']." ") or die(mysqli_error($conn));
            $balance = mysqli_fetch_assoc($balance_q);
        }
        if($single_row["method"] == "deposit"){
            $new_balance = $balance['balance'] + $single_row['amount'];
        } elseif($single_row["method"] == "withdraw"){
            if($balance['balance'] >= $single_row['amount']){
                $new_balance = $balance['balance'] - $single_row['amount'];
            } else {
                $_SESSION["error"] = "The user doesn't have that much amount!";
                header("Location: transactions.php");
            }
        }
        
        if ($update_balance = mysqli_query($conn, "UPDATE balance SET balance = ".$new_balance." WHERE user_id = ".$single_row['user_id']." AND coin_id = ".$single_row['coin_id']." ")){
            if(mysqli_query($conn, "UPDATE transactions SET status = 1 WHERE id = ".$single_row['id']."") or die(mysqli_error($conn))) {
                header("Location: transactions.php");
            } else {
                $_SESSION["error"] = "Something went wrong";
                header("Location: transactions.php");
            }
        }
        exit;

    }
} elseif(isset($_GET['action']) AND $_GET['action'] == "decline"){
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $id = mysqli_real_escape_string($conn, strip_tags($_GET['id']));
        if(mysqli_query($conn, "UPDATE transactions SET status = 2 WHERE id = ".$id."")){
            header("Location: transactions.php");
        }
    }
}
echo 0;