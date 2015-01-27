<?php
include_once("function.php");
$name=htmlentities($_POST['name'],ENT_QUOTES);
$description=htmlentities($_POST['description'],ENT_QUOTES);
$company=htmlentities($_POST['company'],ENT_QUOTES);
$officeno=htmlentities($_POST['officeno'],ENT_QUOTES);
$mobile=htmlentities($_POST['mobile'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$address=htmlentities($_POST['address'],ENT_QUOTES);
$country=htmlentities($_POST['country'],ENT_QUOTES);
$state=htmlentities($_POST['state'],ENT_QUOTES);
$city=htmlentities($_POST['city'],ENT_QUOTES);
$company_website=htmlentities($_POST['company_website'],ENT_QUOTES);
$company_industry=htmlentities($_POST['company_industry'],ENT_QUOTES);
$position_title=htmlentities($_POST['position_title'],ENT_QUOTES);
$position_desc=htmlentities($_POST['position_desc'],ENT_QUOTES);
$hear_about=htmlentities($_POST['hear_about'],ENT_QUOTES);
$remark=htmlentities($_POST['remark'],ENT_QUOTES);

$qwery=mysql_query("select `email` from `staff_request` where `email`='$email'")or die(mysql_error());
if(mysql_num_rows($qwery)==0)
{
mysql_query("insert into `staff_request` set `name`='$name',`description`='$description',`company`='$company',`officeno`='$officeno',`mobile`='$mobile',`email`='$email',`address`='$address',`country`='$country',`state`='$state',`city`='$city',`company_website`='$company_website',`company_industry`='$company_industry',`position_title`='$position_title',`position_desc`='$position_desc',`hear_about`='$hear_about',`remark`='$remark'")or die(mysql_error());
$msg="Request Submited Successfully.";
}
else{
    $msg="You Have Allready Sent Request.";
}
header("location:index.php?msg=$msg");
?>