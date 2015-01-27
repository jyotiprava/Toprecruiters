<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$currency=htmlentities($_POST['currency'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `currency` set `symbol`='$currency' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:add_currency.php?msg=$msg");
?>