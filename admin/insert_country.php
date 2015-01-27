<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$country=htmlentities($_POST['country'],ENT_QUOTES);
$countrycode=htmlentities($_POST['countrycode'],ENT_QUOTES);
$qwe=mysql_query("insert into `country` set `country`='$country', `countrycode`='$countrycode'")or die(mysql_error());

if($qwe){
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:addcountry.php?msg=$msg");
?>
