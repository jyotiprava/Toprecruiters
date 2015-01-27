<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$skill=htmlentities($_POST['skill'],ENT_QUOTES);
$qwe=mysql_query("insert into `skill` set `skill`='$skill'");

if($qwe){
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:add_skill.php?msg=$msg");
?>
