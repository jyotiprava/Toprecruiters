<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$language=htmlentities($_POST['language'],ENT_QUOTES);
$result=mysql_query("insert into `language` set `language`='$language'");

if($result)
{
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:addlanguage.php?msg=$msg");
?>