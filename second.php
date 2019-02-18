<?php
error_reporting(0);
require "Connection/cont.php";
session_start();
$mob = $_SESSION['mob'];
$amount = $_POST['A'];
$dis =  $_POST['D'];
$ActuBal;
$result = $db->query("select * from user where mobile = $mob");
 if($result->num_rows){
                  $rows = $result->fetch_assoc();
                  $id = $rows['user_id'];
                  $ActuBal = $rows['CurBal'];   
                  $CurBal = $ActuBal;
}
else
{
        
}


if(true){
	if(!empty($dis) && !empty($amount)){
       $result = $db->prepare("insert into detail (user_id,Des,Am,Date) values(? , ? , ?,now())");
       $result->bind_param('isi',$id,$dis,$amount);
     //  echo "hello";
       if($result->execute()){
       //echo "In Insert";
       	header("Location:second.php");
       		exit();
   }
   else{
   	echo "Error occur";

        }
   }
   else
   {
}
   }
   else{
   	echo "isset not ";
   }


        if($db){
            $result = $db->query("select * from detail where user_id = $id");
            if($result->num_rows){
                  $rows = $result->fetch_all(MYSQLI_ASSOC);
            }    
           
        }
        else{
        	echo "We having some error ";
        }






?>

<html>
<body>
	<form action="" method="post" name="myform">
		<label for="txtAmo">Amount : </label>
		<input type="txtAmo" name="A">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
	    <label for="txtDis" >Discription : </label>
	
         <input type="text" name="D" id="txtDis" size="50">
		 <input type="submit" value="Insert">
	</form>

	

    <br><br>
	<hr>
	<table border="1" cellspacing="0" cellpadding="0" width="500">
<?php
		if($result->num_rows){
?>
		<tr>
			<th>No.</th>
			<th>Amount</th>
			<th>Discription</th>
			<th>Date</th>
			<th>Total Expense</th>
		</tr>
		<?php
                          $count = 0;$total=0;
                  foreach ($rows as $row) {
                         
                          $total +=$row['Am'] ;

                  
				?>
					<tr>
		
				<td><?php  echo ++$count ?></td>
				<td><?php  echo $row['Am'] ?></td>
				<td><?php  echo $row['Des']?></td>
                <td><?php  echo $row['Date']?></td>	
                <td><?php  echo $total ?></td>
                </tr>
		
                <?php
                     $CurBal -= $row['Am'];
                     //$update = $db->query("update  user set CurBal = $CurBal where user_id = $id");
		
                   }
                ?>
                <?php

	}
?>
	</table>

	<form action="update.php" method="post" id="myform2">
		<br><br><br>
		 <label for="bala" >Current Balance In Your Pocket : </label> 
    	 <input type="button" value = "<?php echo $CurBal ?>" id="bala" name="numBal"><br><br>
    	<label for="newBAL">Add Money : </label>
    	 <input type="number" value="" name="newBal" id="newBAL">
	     <input type="submit" value="UPDATE BALANCE" >
	     <br><br><br>
	     <p id="info"></p>
	</form>
	<script src="jqueryDev.js"></script>
	<script>
		$(function(){
			$_POST($("#myform2").attr("action"),$("#myform2 : input").serializeArray(),function(info){

			});
		});
	</script>


</body>
</html>