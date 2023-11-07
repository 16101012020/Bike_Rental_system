<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn)
{
    echo "Connected";
    header('Content-Type: application/json; charset=utf-8');
}
else
{
    echo "Failed";
}
?>