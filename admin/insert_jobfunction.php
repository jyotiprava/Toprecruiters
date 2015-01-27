<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$special=htmlentities($_POST['special'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$qwe=mysql_query("insert into `job_function` set `industry_id`='$special',`jobfunction`='$jobfunction'");

if($qwe){
$msg="successfully added";
}
else{
$msg="Please try Again!";
}
}
header("location:add_subspecialization.php?msg=$msg");
?>
