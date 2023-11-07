<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$userId=$_POST['u_id'];
$bikeId=$_POST['b_id'];
$total=$_POST['money'];
$pmode=$_POST['mode'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $query ="INSERT INTO `payment_table`(`user_id`,`bike_id`,`amount`,`payment_mode`) VALUES ('$userId','$bikeId','$total','$pmode')";
    $result=mysqli_query($conn,$query);
    header('Content-Type: application/json; charset=utf-8');
    if($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}
else{
    echo "Connection Failed";
}
?>