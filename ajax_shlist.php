<?php
include_once("function.php");
$slno=$_GET['slno'];
$empid=$_GET['empid'];

$qwery=mysql_query("select * from `candidateshortlist` where `emplerid`='$_SESSION[employer_idval]' and `emplyeid`='$empid' and `cvslno`='$slno'")or die(mysql_query());
if(mysql_num_rows($qwery)>0)
{
    $res=mysql_fetch_array($qwery);
    if($res['shortlist']==1)
    {
        mysql_query("update `candidateshortlist` set `shortlist`='0' where `emplerid`='$_SESSION[employer_idval]' and `emplyeid`='$empid'")or die(mysql_query());
    }
    else
    {
        mysql_query("update `candidateshortlist` set `shortlist`='1' where `emplerid`='$_SESSION[employer_idval]' and `emplyeid`='$empid'")or die(mysql_query());
    }
}
else
{
    mysql_query("insert into `candidateshortlist` set `shortlist`='1',`emplerid`='$_SESSION[employer_idval]',`emplyeid`='$empid',`cvslno`='$slno'")or die(mysql_query());
}

echo "OK";
?>