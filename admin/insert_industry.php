<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$indstry_nm=htmlentities($_POST['proname'],ENT_QUOTES);
echo $indstry_nm;
$query=mysql_query("insert into `industry` set `industry`='$indstry_nm'") or die(mysql_error());
$msg="inserted successfully";
header("Location:addspecialization.php?msg=$msg");
}
else{
$message="not inserted";
header("Location:addspecialization.php?msg=$message");

}
?>