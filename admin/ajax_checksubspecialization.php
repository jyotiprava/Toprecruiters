<?php
include_once("../function.php");
$sid=$_GET['id'];
$subspecial=mysql_query("select * from `alljob` where `jobfunction`='$sid'")or die(mysql_error());
$res=mysql_num_rows($subspecial);
if($res>0){   
     echo 1; 
}
    else{
        echo 0; 
    }
?>