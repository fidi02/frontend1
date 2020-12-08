<?php
  
session_start();
ob_start();
date_default_timezone_set('Europe/Amsterdam');

$servername = "remotemysql.com";
$username = "TsdTZsj8K5";
$password = "uEYbf8ggLg";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn, "TsdTZsj8K5");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function UserData($sname)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE username = '$sname'";
    $mysqli = mysqli_query($conn, $sql);
    $num = mysqli_fetch_assoc($mysqli);

    return $num;
}

// function ConfigData()
// {
//     global $conn;

//     $sql = "SELECT * FROM config";
//     $mysqli = mysqli_query($conn, $sql);
//     $num = mysqli_fetch_assoc($mysqli);

//     return $num;
// }

// $ssl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';

// $url = $ssl.$_SERVER['HTTP_HOST'].'/posta';
