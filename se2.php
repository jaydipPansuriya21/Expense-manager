<?php  
error_reporting(0);
require "Connection/cont.php";
//echo "Successes";
session_start();
$id;
$unam = $_POST['txtUaNA'];
$pwd = $_POST['txtPwd'];
if(!empty($unam) && !empty($pwd)){
	$result = $db->prepare("select user_id from user where user_name = ? and password = ?");
	$result->bind_param('ss',$unam,$pwd);
	$result->execute();
	$result->bind_result($id);
	echo  $unam , "  " , $pwd;
	if($result->fetch()){
		echo "Login Successfully id  = $id";
		$_SESSION['id'] = $id;
		//header("Location:second.php");
		//exit();
        echo '<script>window.location.href = "second.php"</script>';
	}
	
	else  	echo "Your are not exists... $id";
	} 




?>

<html>
	

	<body>
		<form action="" method="post">
		<input type="text" size="20" placeholder="UserName" name="txtUaNA"><br><br>
		<input type="password" size="20" placeholder="Password" name="txtPwd">
		<input type="submit" value="Login">
        </form>
	</body>
</html>