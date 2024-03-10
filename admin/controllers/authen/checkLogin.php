<?php
session_start();

require_once('../../db/db_func.php');

if(isset($_POST['submit'])){
    // Security input data
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    // Get data input
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);

    mysqli_close($conn);

    $sql = "SELECT * from user WHERE email = '$email' AND password='$password'";
    $res = excuteResult($sql);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['role_id'] = $row['role_id'];
        if($_SESSION['role_id'] == 1){
            header("Location: ". SITEURL . "/admin");
        }
        else {
            header("Location: ". SITEURL);
        }
    }
    else{
        header("Location: ". SITEURL . "/login.php");
    }
}
