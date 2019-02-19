<?php  
error_reporting(0);
require "Connection/cont.php";
require "Cicurity/check.php";
session_start();
$unam = $_POST['txtUaNA'];
$pwd = $_POST['txtPwd'];
$mob = $_POST['txtMob'];


if(!empty($unam) && !empty($pwd) && !empty($mob)){
    
     $exist = $db->query("select user_id from user where mobile = $mob");
     if($exist->num_rows){
         echo "This mobile number is already registered ..... , Go Back and try with different Number";
     }
     else{
   
        

	   $result = $db->prepare("insert into user (user_id,user_name,password,mobile) values(NULL , ? , ?, ?)");
       $result->bind_param('ssi',$unam,$pwd,$mob);
       
     
        if( $result->execute()){
         
         $_SESSION['mob'] = $mob;
         header("Location:second.php");
         exit();
    
                }
       else{
        echo "sorry ,we have some issue   ";
        echo mysqli_errno($db) , mysqli_error($db);

       }
        
    }
   
 }





?>

