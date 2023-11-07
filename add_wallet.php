<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "two_wheel";


$conn = mysqli_connect($servername, $username, $password, $dbname);  
if($conn)
{ 
$mode=$_POST['mode'];
$amount=$_POST['money'];
$id=$_POST['id'];
$flag=$_POST['type'];
header('Content-Type: application/json; charset=utf-8');
// For flag=1 Money is added to the wallet 
    if($flag==1)
    {
    $sql = "INSERT INTO `wallet_transaction` (`user_id`, `transaction_type`,`transaction_mode`, `amount`, `current_balance`)
    SELECT
      '$id',
      'Credited',
      '$mode',
      '$amount',
      COALESCE((SELECT `current_balance`
                FROM `wallet_transaction`
                WHERE `user_id` = user_wallet.user_id
                ORDER BY `transaction_id` DESC
                LIMIT 1), user_wallet.wallet_balance) + '$amount' AS `current_balance`
    FROM `user` AS user_wallet
    WHERE user_wallet.user_id = '$id'";
    }
// for flag=0 Booking is Done using user's wallet
    else
    {
        $sql = "INSERT INTO `wallet_transaction` (`user_id`, `transaction_type`,`transaction_mode`, `amount`, `current_balance`)
        SELECT
          '$id',
          'Debited',
          '$mode',
          '$amount',
          COALESCE((SELECT `current_balance`
                    FROM `wallet_transaction`
                    WHERE `user_id` = user_wallet.user_id
                    ORDER BY `transaction_id` DESC
                    LIMIT 1), user_wallet.wallet_balance) - '$amount' AS `current_balance`
        FROM `user` AS user_wallet
        WHERE user_wallet.user_id = '$id'";
    }
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
else
{
    echo "Connection Failed";
}
?>