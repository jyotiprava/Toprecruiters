<?php
include_once("../function.php");
$value=htmlentities($_POST['indexcon'],ENT_QUOTES);

$filename=$_POST['pagename'];
$qwery=mysql_query("select * from `pagemanagement` where `pagename`='$filename'");
if(mysql_num_rows($qwery)==0)
{
mysql_query("insert into `pagemanagement` set `pagename`='$filename',`value`='$value',`wstatus`='1'")or die(mysql_error());
}
else
{
mysql_query("update `pagemanagement` set `value`='$value',`wstatus`='1' where `pagename`='$filename'")or die(mysql_error());	
}
header("location:test.php");
?>