<?php
include_once("../function.php");
if(isset($_POST['submit'])){
$locname=$_POST['locname'];

    $sql=mysql_query("select * from `location` where `location`='$locname'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
    mysql_query("insert into `location` set `location`='$locname'")or die(mysql_error());
	$msg="successfully added";
    }
	else
	{
	$msg="This is already exist";
	}

}
header("location:addlocation.php?msg=$msg");
?>
