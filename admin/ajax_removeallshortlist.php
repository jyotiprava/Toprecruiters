<?php
include_once("../function.php");
$allid=$_GET['id'];
$ids=explode(',',$allid );
foreach($ids as $value){
    if($value != ""){
       // echo "update `user_detail` set `shortlisted`='0' where `slno`='$value'";
     mysql_query("update `user_detail` set `shortlisted`='0' where `slno`='$value'")or die(mysql_error());     
    }
}
?>