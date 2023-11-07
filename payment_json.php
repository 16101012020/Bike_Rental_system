<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//Create api of payment table
if ($conn) {
    $sql="SELECT * FROM payment_table";
    $result=mysqli_query($conn,$sql);
    header('Content-Type: application/json; charset=utf-8');
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($output);
}
else
{
    echo "Connection failed";
}
?>