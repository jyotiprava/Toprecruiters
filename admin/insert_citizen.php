<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$citizen=htmlentities($_POST['citizen'],ENT_QUOTES);
$qwe=mysql_query("insert into `citizenship` set `citizen`='$citizen'");

if($qwe){
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:addcitizen.php?msg=$msg");
?>
