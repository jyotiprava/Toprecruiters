<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$ind=htmlentities($_POST['proname'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `industry` set `industry` = '$ind' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:addspecialization.php?msg=$msg");
?>