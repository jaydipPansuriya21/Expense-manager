<?php  
error_reporting(0);
require "Connection/cont.php";
require "Cicurity/check.php";
session_start();
$mob;
$mob = $_POST['txtMob'];
$pwd = $_POST['txtPwd'];
if(!empty($mob) && !empty($pwd)){
	$result = $db->query("select * from user where mobile = $mob and password = $pwd");
 if($result->num_rows){
                 
                  $_SESSION['mob'] = $mob;
		
        echo '<script>window.location.href = "http://localhost/ExpenseManager/second.php"</script>';

                         
}
else{
	echo " Enter correct detail , Go back";
}
	}
	 




?>

