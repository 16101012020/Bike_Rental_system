<?php

session_start();
$sign=$_POST['flag'];
if($sign==1)
{
session_unset();
session_destroy();
}

?>