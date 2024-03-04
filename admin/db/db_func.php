<?php
require_once('config.php');
function excute($sql)
{   
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $res = mysqli_query($conn, $sql);
    
    mysqli_close($conn);
    return $res;
}

function excuteResult($sql)
{
    $conn = mysqli_connect(LOCALHOST, DB_USER, DB_PASSWORD, DB_DBNAME);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    return $result;
}
function reloadSession(){
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id = '$uid' AND deleted ='0'";
    $res = excuteResult($sql);
    if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count > 0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['address'] = $row['address'];
        }
    }
}
