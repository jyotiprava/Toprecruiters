<?php
include_once("../function.php");
$uniquekey=$_GET['uniquekey'];
//echo "select * from `user_detail` where `uniquekey`='$uniquekey'";
$qwery=mysql_query("select * from `user_detail` where `uniquekey`='$uniquekey'")or die(mysql_error());
if(mysql_num_rows($qwery)>0)
{
    $result=mysql_fetch_array($qwery);
    if($result['status']==0)
    {
        mysql_query("update `user_detail` set `status`='1' where `uniquekey`='$uniquekey'")or die(mysql_error());
    }
    else
    {
        $msg="Sorry, you can only use your validation link once for security reasons. Please log in with your username and password instead now.";
    } 
}
else
{
    $msg="Sorry, Wrong Uniquekey";
}
header("location:create_account1.php?msg=$msg");
?>