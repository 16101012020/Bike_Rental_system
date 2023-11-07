<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Create api of wallet table
if ($conn) {
    $sql="SELECT * FROM wallet_transaction";
    $query=mysqli_query($conn,$sql);
    header('Content-Type: application/json; charset=utf-8');
    $result=mysqli_fetch_all($query,MYSQLI_ASSOC);
    
    echo json_encode($result);
}
else
{
   echo "Failed";
}
?>