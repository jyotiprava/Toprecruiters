<?php
include_once("function.php");
$comapany=$_POST['comapany'];
$industry=$_POST['industry'];
$from_month=$_POST['from_month'];
$from_year=$_POST['from_year'];
$to_month=$_POST['to_month'];
$to_year=$_POST['to_year'];
$crnt=$_POST['crnt'];
$title=$_POST['title'];
$position=$_POST['position'];
$jobfunction=$_POST['jobfunction'];
$description=$_POST['description'];
$hdidd=$_POST['hdidd'];

foreach($comapany as $key => $value)
{
$industryval=$industry[$key];
$from_monthval=$from_month[$key];
$from_yearval=$from_year[$key];
$from=$from_monthval."-".$from_yearval;
$to_monthval=$to_month[$key];
$to_yearval=$to_year[$key];
$to=$to_monthval."-".$to_yearval;
$crntval=$crnt[$key];
$titleval=$title[$key];
$positionval=$position[$key];
$jobfunctionval=$jobfunction[$key];
$descriptionval=$description[$key];
$desc=htmlentities($descriptionval,ENT_QUOTES);
$hdiddval=$hdidd[$key];
$monthName = date('M', mktime(0, 0, 0, $from_monthval, 10));
$monthName1 = date('M', mktime(0, 0, 0, $to_monthval, 10));
$datetime1 = new DateTime($monthName.$from_yearval);
$datetime2 = new DateTime($monthName1.$to_yearval);
$interval = $datetime1->diff($datetime2);
$intervall=$interval->format('%y');

$sql=mysql_query("select * from `experience` where `user_id`='$_SESSION[useridval]' and `slno`='$hdiddval'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
//echo "insert into `experience` set `company`='$value',`industry`='$industryval',`from`='$from',`to`='$to',`total_experience`='$intervall',`type`='$crntval',`title`='$titleval',`position`='$positionval',`jobcategory`='$jobfunctionval',`description`='$desc',`user_id`='$_SESSION[useridval]'";
mysql_query("insert into `experience` set `company`='$value',`industry`='$industryval',`from`='$from',`to`='$to',`total_experience`='$intervall',`type`='$crntval',`title`='$titleval',`position`='$positionval',`jobcategory`='$jobfunctionval',`description`='$desc',`user_id`='$_SESSION[useridval]'");
}
else
{
//echo "update `experience` set `company`='$value',`industry`='$industryval',`from`='$from',`to`='$to',`total_experience`='$intervall',`type`='$crntval',`title`='$titleval',`position`='$positionval',`jobcategory`='$jobfunctionval',`description`='$desc' where `slno`='$hdiddval'";
mysql_query("update `experience` set `company`='$value',`industry`='$industryval',`from`='$from',`to`='$to',`total_experience`='$intervall',`type`='$crntval',`title`='$titleval',`position`='$positionval',`jobcategory`='$jobfunctionval',`description`='$desc' where `slno`='$hdiddval'");

}
}			
?>
