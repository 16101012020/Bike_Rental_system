<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "two_wheel";

    session_start();
    //$_SESSION gets the userId after successful login of user
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn) {
    $id=$_SESSION['mobile'];
    header('Content-Type: application/json; charset=utf-8');
    $sql = "SELECT user_id FROM user where mobile_num='$id'";
    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['user_id'];

        $_SESSION['userId'] = $userId;
        echo 1;
    } 
}
else{
    echo "Connection Failed";
}
?>