<?php
include_once("function.php");
$sid=$_GET['id'];
$qwe=mysql_query("select * from `skill` where `slno`='$sid'")or die(mysql_error());
$res=mysql_fetch_array($qwe);
$slno=$res['slno'];
$sname=$res['skill'];
echo $slno.','.$sname;
?>