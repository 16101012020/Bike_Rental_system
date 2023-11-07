<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

//Create api of booking table
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $sql="SELECT * FROM booking";
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