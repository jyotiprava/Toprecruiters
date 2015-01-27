<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$skill=htmlentities($_POST['skill'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `skill` set `skill` = '$skill' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:add_skill.php?msg=$msg");
?>