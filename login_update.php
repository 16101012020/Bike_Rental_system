<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn){
    //Registration for new user
    $name=$_POST['name'];
    $email=$_POST['email'];
    $identity=$_POST['identity'];
    $mobile=$_POST['mobile'];
    header('Content-Type: application/json; charset=utf-8');
    $sql = "INSERT INTO `user` (`user_name`,`user_email`,`id_num`,`mobile_num`) VALUES ('$name', '$email','$identity','$mobile')";
    $data=mysqli_query($conn,$sql);
    if($data)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
}
else{
    echo "Connection failed";
}

?>