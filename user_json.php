<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//Create api of user table
if ($conn) {
    $sql="SELECT * FROM user";
    $result=mysqli_query($conn,$sql);
    header('Content-Type: application/json; charset=utf-8');
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    echo json_encode($output);
}
else
{
    echo "Connection failed";
}
?>