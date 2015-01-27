<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$prefix=htmlentities($_POST['prefix'],ENT_QUOTES);
$qwe=mysql_query("insert into `prefix` set `prefix`='$prefix'");

if($qwe){
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:addprefix.php?msg=$msg");
?>
