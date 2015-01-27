<?php
include_once("function.php");
$degree=$_POST['degree'];
$field=$_POST['field'];
$grade=$_POST['grade'];
$institute=$_POST['institute'];
$country=$_POST['country'];
$gryear=$_POST['gryear'];
$course=htmlentities($_POST['course'],ENT_QUOTES);
$title=$_POST['title'];
$duration=$_POST['duration'];
$objective=$_POST['objective'];
$institutee=$_POST['institutee'];
$hdidd=$_POST['hdidd'];
$hdidvl=$_POST['hdidvl'];
$hd_high=$_POST['hd_high'];
$date1=date('Y-m-d h:i:s');
echo $hd_high;
 $updatee=mysql_query("select date(`updated_date`) as newdt from `cv_detail` where `user_id`='$_SESSION[useridval]'");
$resupdatee=mysql_fetch_array($updatee);

$dt = $resupdatee['newdt'];
$dt1 = date('Y-m-d');

$ts1 = strtotime($dt);
$ts2 = strtotime($dt1);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);


$diff = (($year2 - $year1) * 12) + ($month2 - $month1); 
foreach($degree as $key => $value)
{
$fieldval=$field[$key];
$gradeval=$grade[$key];
$instituteval=$institute[$key];
$countryval=$country[$key];
$gryearval=$gryear[$key];
$hdiddval=$hdidd[$key];

$sql=mysql_query("select * from `education` where `user_id`='$_SESSION[useridval]' and `slno`='$hdiddval'")or die(mysql_error());
$num=mysql_num_rows($sql);
if($num==0)
{
if($key==0){
mysql_query("insert into `education` set `degree`='$value',`field`='$fieldval',`grade`='$gradeval',`institute`='$instituteval',`country`='$countryval',`year`='$gryearval',`user_id`='$_SESSION[useridval]',`education_type`='$hd_high'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
else
{

mysql_query("insert into `education` set `degree`='$value',`field`='$fieldval',`grade`='$gradeval',`institute`='$instituteval',`country`='$countryval',`year`='$gryearval',`user_id`='$_SESSION[useridval]'");
}
}
else
{

mysql_query("update `education` set `degree`='$value',`field`='$fieldval',`grade`='$gradeval',`institute`='$instituteval',`country`='$countryval',`year`='$gryearval' where `slno`='$hdiddval'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
}	
	
foreach($title as $key1 => $value1)
{
$durationval=$duration[$key1];
$objectiveval=$objective[$key1];
$instituteeval=$institutee[$key1];
$hdidvlval=$hdidvl[$key1];
$sql=mysql_query("select * from `education` where `user_id`='$_SESSION[useridval]' and `slno`='$hdidvlval'")or die(mysql_error());
$num=mysql_num_rows($sql);
if($num==0)
{
mysql_query("insert into `training` set `title`='$value1',`duration`='$durationval',`objective`='$objectiveval',`institute`='$instituteeval',`user_id`='$_SESSION[useridval]'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
else{
mysql_query("update `training` set `title`='$value1',`duration`='$durationval',`objective`='$objectiveval',`institute`='$instituteeval' where `slno`='$hdidvlval'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
}	
	
?>
