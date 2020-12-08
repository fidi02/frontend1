<?php
  include "../config/db.php";
    $userDetails = UserData($_SESSION['sname']);
if (isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phone'],$_FILES['foto'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $nrtel = $_POST['phone'];
    $foto = $_FILES['foto'];
    $profile_id = $userDetails['id'];

    if (!empty($foto['name'])) {
        $fotoname = $foto['name'];
        $fototmp = $foto['tmp_name'];

        $dir = '../uploads/'.basename($fotoname);

        if (move_uploaded_file($fototmp, $dir)) {
            $query = "UPDATE users SET avatar = '$fotoname' WHERE id = '$profile_id'";

            $mysql = mysqli_query($conn, $query);
        } else {
            header('location:profile.php?error=uploadingimage');
            exit;
        }
    }
 
   
    if (!empty($fname) and !empty($lname) and !empty($email) and !empty($nrtel)) {
        $query = "UPDATE users SET
        emri = '$fname',mbiemri = '$lname',email = '$email', phone = '$nrtel' WHERE id = '$profile_id'";

        $mysql = mysqli_query($conn, $query);

        header('location:profile.php?success=true');
        exit;
    } else {
        header('location:profile.php?error=emptyfields');
        exit;
    }
} else {
    header('location:profile.php');
    exit();
}
