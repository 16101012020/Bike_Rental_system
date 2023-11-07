<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$userEmail=$_POST['email'];
$userId=$_POST['id'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $query = "UPDATE `user` SET user_email='{$userEmail}' where user_id='{$userId}'";
    $data=mysqli_query($conn,$query);
    header('Content-Type: application/json; charset=utf-8');
    //Email updated
    if($data)
    {
        echo 1;
    }
    //Email updation failed
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