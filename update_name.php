<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$userName=$_POST['name'];
$userId=$_POST['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $query = "UPDATE `user` SET user_name='{$userName}' where user_id='{$userId}'";
    $data=mysqli_query($conn,$query);
    header('Content-Type: application/json; charset=utf-8');
    //Name updated
    if($data)
    {
        echo 1;
    }
    //Name updation failed
    else
    {
        echo 0;
    }
}
else
{
    echo "Connection Failed";
}
?>