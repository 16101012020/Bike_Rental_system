<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$userId=$_POST['u_id'];
$bikeId=$_POST['b_id'];
$total=$_POST['amount'];
$totalDays=$_POST['days'];
$pdate=$_POST['pick_date'];
$rdate=$_POST['return_date'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $query ="INSERT INTO `booking`(`user_id`,`bike_id`,`pickup_date`,`return_date`,`total_days`,`total_amount`)
     VALUES ('$userId','$bikeId','$pdate','$rdate','$totalDays','$total')";
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