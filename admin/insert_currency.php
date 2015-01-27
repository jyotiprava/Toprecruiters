<?php
include_once("../function.php");
$currency=htmlentities($_POST['currency'],ENT_QUOTES);

$sql=mysql_query("select * from `currency` where `symbol`='$currency'");  
$num=mysql_num_rows($sql);
if($num==0){
mysql_query("insert into `currency` set `symbol`='$currency'")or die(mysql_error());
 $msg="Succesfully Added";
}
else{
$msg="This is already exist";
}
header("location:add_currency.php?msg=$msg");
?>