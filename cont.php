<?php
        $host = 'localhost';
        $user = 'root';
        $password = '';

       if($db = new mysqli($host,$user,$password,'dailymoney')){
   //echo "connection pass";
       }
       else {
       	echo "We have some problem .... ";
       }


        ?>