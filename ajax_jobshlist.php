<?php
include_once("function.php");
$jobid=$_GET['jobid'];

$qwery=mysql_query("select * from `job_shortlist` where `employeeid`='$_SESSION[useridval]' and `jobid`='$jobid'")or die(mysql_error());
if(mysql_num_rows($qwery)>0)
{
    $res=mysql_fetch_array($qwery);
    if($res['shortlist']==1)
    {
        mysql_query("update `job_shortlist` set `shortlist`='0' where `employeeid`='$_SESSION[useridval]' and `jobid`='$jobid'")or die(mysql_error());
    }
    else
    {
        mysql_query("update `job_shortlist` set `shortlist`='1' where `employeeid`='$_SESSION[useridval]' and `jobid`='$jobid'")or die(mysql_error());
    }
}
else
{
    mysql_query("insert into `job_shortlist` set `shortlist`='1',`employeeid`='$_SESSION[useridval]',`jobid`='$jobid'")or die(mysql_error());
}

echo "OK";
?>