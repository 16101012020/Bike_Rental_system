<?php
// Generate a random otp of 6 digit
$num = ['1','2','3','4','5','6','7','8','9','0'];
$otp = "";
header('Content-Type: application/json; charset=utf-8');
for ($i = 0; $i < 6; $i++) {
        $otp .= $num[array_rand($num)];
    }
echo ($otp);
?>
