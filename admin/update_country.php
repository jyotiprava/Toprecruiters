<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$country=htmlentities($_POST['country'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$countrycode=htmlentities($_POST['countrycode'],ENT_QUOTES);
$qwe=mysql_query("update `country` set `country` = '$country',`countrycode`='$countrycode' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:addcountry.php?msg=$msg");
?>