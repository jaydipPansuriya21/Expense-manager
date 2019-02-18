<?php
require "cont.php";
require "second.php";
session_start();
$mob = $_SESSION['mob'];
$bal = $_POST['newBal'];
echo  "mob = $mob and bal = $bal" ;
$bal += $ActuBal;   
$update = $db->query("update user set CurBal = $bal where mobile = $mob");
 header("Location:second.php");

?>