<?php  
error_reporting(0);
require "Connection/cont.php";
session_start();
$mob;
$mob = $_POST['txtMob'];
$pwd = $_POST['txtPwd'];
if(!empty($mob) && !empty($pwd)){
	$result = $db->query("select * from user where mobile = $mob and password = $pwd");
 if($result->num_rows){
                 
                  $_SESSION['mob'] = $mob;
		 header("Location:second.php");

                         
}
else{
	echo " Enter correct detail";
}
	}
	
	
	else  	echo " Your are not exists...  in our database";
	 




?>

