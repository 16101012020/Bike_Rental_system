<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    $mobile=$_POST['mobile'];
    $flag=$_POST['sign'];
    header('Content-Type: application/json; charset=utf-8');
    if($flag==0){
    $sql = "SELECT * FROM user where mobile_num='$mobile'";
    $result=mysqli_query($conn,$sql);
    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['mobile']=$mobile;
        echo 1; // User exists
    } else {
        echo 0; // User does not exist
    }
}   
}
else
{
    echo "failed";
}
?>