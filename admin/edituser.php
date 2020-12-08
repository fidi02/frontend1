<?php 
if (isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['address'],$_POST['phone'],$_POST['country'],$_POST['city'],$_POST['password'],$_FILES['avatar'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $adress = $_POST['address'];
    $nrtel = $_POST['phone'];
    $shteti = $_POST['country'];
    $qyteti = $_POST['city'];
    $foto = $_FILES['avatar'];
    $password = $_POST['password'];
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
 
    if (!empty($password)) {
        $password = dec_enc('encrypt', $password);
       
        $query = "UPDATE users SET password = '$password' WHERE id = '$profile_id'";

        $mysql = mysqli_query($conn, $query);
    } else {
        //
    }
    if (!empty($fname) and !empty($lname) and !empty($email) and !empty($adress) and !empty($nrtel) and !empty($shteti) and !empty($qyteti)) {
        $query = "UPDATE users SET
        fname = '$fname',lname = '$lname',email = '$email',adresa = '$adress',nrtel = '$nrtel',qyteti = '$qyteti',shteti = '$shteti '
        WHERE id = '$profile_id'";

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


?>