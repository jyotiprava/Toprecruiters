<?php
include_once("function.php");
$lang=$_POST['langg'];
$write=$_POST['write'];
$read=$_POST['read'];
$spoken=$_POST['spoken'];
$otherinfo=htmlentities($_POST['otherinfo'],ENT_QUOTES);
$setting=$_POST['setting'];
$message=$_POST['message'];
$emaill=$_POST['email'];
$hdid=$_POST['hdid'];
$date1=date('Y-m-d h:i:s');

$upload=$_FILES['upload']['name'];

$ext1=end(explode(".", $_FILES["upload"]["name"]));
	if($ext1=="doc" || $ext1=="docx" || $ext1=="rtf" || $ext1=="pdf")
                                               {
                                                $folder="admin/upload/";
                                                $filename = $folder .time(). $upload ;
                                                $copied = copy($_FILES['upload']['tmp_name'], $filename);
						}
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
foreach($lang as $key => $value)
{
$writeval=$write[$key];
$readval=$read[$key];
$spokenval=$spoken[$key];
$hdidval=$hdid[$key];
$sql=mysql_query("select * from `language_details` where `user_id`='$_SESSION[useridval]' and `slno`='$hdidval'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
//echo "insert into `language_details` set `language`='$value',`write`='$writeval',`read`='$readval',`spoken`='$spokenval',`user_id`='$_SESSION[useridval]'";
mysql_query("insert into `language_details` set `language`='$value',`write`='$writeval',`read`='$readval',`spoken`='$spokenval',`user_id`='$_SESSION[useridval]'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
else
{
//echo "update `language_details` set `language`='$value',`write`='$writeval',`read`='$readval',`spoken`='$spokenval' where `slno`='$hdidval'";
mysql_query("update `language_details` set `language`='$value',`write`='$writeval',`read`='$readval',`spoken`='$spokenval' where `slno`='$hdidval'");
mysql_query("update `cv_detail` set `updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
}
}
//echo "update `cv_detail` set `other_info`='$otherinfo',`setting`='$setting',`cv`='$filename' where `user_id`='$_SESSION[useridval]'";	
mysql_query("update `cv_detail` set `other_info`='$otherinfo',`setting`='$setting',`cv`='$filename',`updated_date`='$date1',`datediff`='$diff',`nfbyemail`='$emaill',`nfbysms`='$message' where `user_id`='$_SESSION[useridval]'");		
?>
