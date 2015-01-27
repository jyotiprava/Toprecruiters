<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$con=htmlentities($_POST['indexcon'],ENT_QUOTES);
$heading=htmlentities($_POST['indexheading'],ENT_QUOTES);
mysql_query("update `page` set `content`='$con',`heading`='$heading' where `slno`='$id'")or die(mysql_error());
$msg="Updated Successfully.";
}
header("location:add_indexcontent.php?msg=$msg");
?>