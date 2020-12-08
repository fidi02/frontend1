<?php 
include '../config/db.php';
include '../encrypt.php';
$userDetails = UserData($_SESSION['sname']);
if(isset($_POST['password'])){
    $pass = $_POST['password'];
    $profile_id = $userDetails['id'];

}
if (!empty($pass)) {
        $password = dec_enc('encrypt', $pass);
       
        $query = "UPDATE users SET password = '$password' WHERE id = '$profile_id'";

        $mysql = mysqli_query($conn, $query);
        header('location:profile.php?success=true');
        exit;
    } else {
        //
    }
?>