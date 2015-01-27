<?php
include_once("../function.php");
$sid=$_GET['id'];
$special=mysql_query("select * from `alljob` where `industry`='$sid'")or die(mysql_error());
$res=mysql_num_rows($special);
if($res>0){   
     echo 1; 
}
else{
    $chk=mysql_query("select * from  `job_function` where `industry_id`='$sid'")or die(mysql_error());
    $rows=mysql_num_rows($chk);
    if($rows>0){
       echo 2; 
    }
    else{
        echo 0; 
    }
}
?>