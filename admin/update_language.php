<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$lang=htmlentities($_POST['language'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `language` set `language` = '$lang' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:addlanguage.php?msg=$msg");
?>