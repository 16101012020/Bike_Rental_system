<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
  header('Content-Type: application/json; charset=utf-8');
    $query = "UPDATE `user` AS u
    JOIN (
      SELECT 
        user_id,
        SUM(CASE WHEN transaction_type = 'Credited' THEN amount ELSE -amount END) AS balance_change
      FROM wallet_transaction
      GROUP BY user_id
    ) AS wb ON u.user_id = wb.user_id
    SET u.wallet_balance =wb.balance_change";
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo  1;
    }
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