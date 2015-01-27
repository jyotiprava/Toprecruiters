<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$special=htmlentities($_POST['special'],ENT_QUOTES);
$job=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$qwe=mysql_query("update `job_function` set `industry_id`='$special',`jobfunction` = '$job' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:add_subspecialization.php?msg=$msg");
?>