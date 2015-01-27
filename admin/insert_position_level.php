<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$position=htmlentities($_POST['position'],ENT_QUOTES);
$query=mysql_query("insert into `position_level` set `position`='$position'") or die(mysql_error());
$msg="inserted successfully";
header("Location:positionlevel.php?msg=$msg");
}
else{
$message="not inserted";
header("Location:positionlevel.php?msg=$message");

}
?>