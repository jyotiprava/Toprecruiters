<?php
include_once("function.php");
$prefix=htmlentities($_POST['prefix'],ENT_QUOTES);
$fname=htmlentities($_POST['fname'],ENT_QUOTES);
$lname=htmlentities($_POST['lname'],ENT_QUOTES);
$citizen=htmlentities($_POST['citizen'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$day=htmlentities($_POST['day'],ENT_QUOTES);
$month=htmlentities($_POST['month'],ENT_QUOTES);
$year=htmlentities($_POST['year'],ENT_QUOTES);
$birthdate=$year."-".$month."-".$day;
$nationality=htmlentities($_POST['nationality'],ENT_QUOTES);
$home_contact=htmlentities($_POST['home_contact'],ENT_QUOTES);
$mobl_contact=htmlentities($_POST['mobl_contact'],ENT_QUOTES);
$marital_status=htmlentities($_POST['marital_status'],ENT_QUOTES);
$postal=htmlentities($_POST['postal'],ENT_QUOTES);
$age=htmlentities($_POST['age'],ENT_QUOTES);
$gender=htmlentities($_POST['gen'],ENT_QUOTES);
$crnt_address=htmlentities($_POST['crnt_address'],ENT_QUOTES);
$crnt_country=htmlentities($_POST['crnt_country'],ENT_QUOTES);
$current_address=$crnt_address."/".$crnt_country;
$permnt_address=htmlentities($_POST['permnt_address'],ENT_QUOTES);
$permnt_country=htmlentities($_POST['permnt_country'],ENT_QUOTES);
$permanent_address=$permnt_address."/".$permnt_country;
$designation=htmlentities($_POST['designation'],ENT_QUOTES);
$exp_type=htmlentities($_POST['exp_rad'],ENT_QUOTES);
$exp_year=htmlentities($_POST['exp_year'],ENT_QUOTES);
$exp_month=htmlentities($_POST['exp_month'],ENT_QUOTES);
$exp_date=$exp_year."-".$exp_month;
$crnt_salary=htmlentities($_POST['crnt_salary'],ENT_QUOTES);
$crnt_currency=htmlentities($_POST['crnt_currency'],ENT_QUOTES);
$exp_salary=htmlentities($_POST['exp_salary'],ENT_QUOTES);
$exp_currency=htmlentities($_POST['exp_currency'],ENT_QUOTES);
$job_level=htmlentities($_POST['job_level'],ENT_QUOTES);
$job_type=htmlentities($_POST['job_type'],ENT_QUOTES);
$career_objective=htmlentities($_POST['career_objective'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$advance=htmlentities($_POST['advance'],ENT_QUOTES);
$intermediate=htmlentities($_POST['intermediate'],ENT_QUOTES);
$basic=htmlentities($_POST['basic'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$date=date('Y-m-d');
$date1=date('Y-m-d h:i:s');

if($exp_type=="no")
{
$exp_date="";
$exp_year="";
$exp_month="";
$crnt_salary="";
$crnt_currency="";
}

$checkval=$_POST['chk'];
$val='';
foreach($checkval as $locval)
{
$val.=$locval.",";
}
	

$image=$_FILES['img']['name'];
$ext2=end(explode(".", $_FILES["img"]["name"]));
	if($ext2=="jpg" || $ext2=="jpeg" || $ext2=="png" || $ext2=="gif")

                                               {
                                                $folder="admin/upload/";
                                                $filename1 = $folder .time(). $image;
                                                $copied = copy($_FILES['img']['tmp_name'], $filename1);
						}
					


	$sql=mysql_query("select * from `cv_detail` where `user_id`='$_SESSION[useridval]'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
if($image=="")
{
$filename1 ="images/default.jpg" ;
}
else{
 $filename1= $filename1;
}
	//echo "insert into `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`citizen`='$citizen',`email`='$email',`dob`='$birthdate',`nationality`='$nationality',`home_contact`='$home_contact',`mobile_contact`='$mobl_contact',`marital_status`='$marital_status',`postal`='$postal',`age`='$age',`gender`='$gender',`current_address`='$current_address',`permanent_address`='$permanent_address',`picture`='$filename1',`designation`='$designation',`experience_type`='$exp_type',`experience_date`='$exp_date',`experience_year`='$exp_year',`experience_month`='$exp_month',`current_salary`='$crnt_salary',`current_currency`='$crnt_currency',`expected_salary`='$exp_salary',`expected_currency`='$exp_currency',`job_level`='$job_level',`job_type`='$job_type',`preferd_location`='$val',`career_objective`='$career_objective',`jobfunction`='$jobfunction',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`industry`='$industry'";
    mysql_query("insert into `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`email`='$email',`dob`='$birthdate',`nationality`='$nationality',`home_contact`='$home_contact',`mobile_contact`='$mobl_contact',`marital_status`='$marital_status',`postal`='$postal',`age`='$age',`gender`='$gender',`current_address`='$current_address',`permanent_address`='$permanent_address',`picture`='$filename1',`designation`='$designation',`experience_type`='$exp_type',`experience_date`='$exp_date',`current_salary`='$crnt_salary',`current_currency`='$crnt_currency',`expected_salary`='$exp_salary',`expected_currency`='$exp_currency',`job_level`='$job_level',`job_type`='$job_type',`preferd_location`='$val',`career_objective`='$career_objective',`jobfunction`='$jobfunction',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`industry`='$industry',`join_date`='$date',`updated_date`='$date1'")or die(mysql_error());
	}
	else
	{
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

	if($image=="")
	{
	mysql_query("update `cv_detail` set `prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`email`='$email',`dob`='$birthdate',`nationality`='$nationality',`home_contact`='$home_contact',`mobile_contact`='$mobl_contact',`marital_status`='$marital_status',`postal`='$postal',`age`='$age',`gender`='$gender',`current_address`='$current_address',`permanent_address`='$permanent_address',`designation`='$designation',`experience_type`='$exp_type',`experience_date`='$exp_date',`current_salary`='$crnt_salary',`current_currency`='$crnt_currency',`expected_salary`='$exp_salary',`expected_currency`='$exp_currency',`job_level`='$job_level',`job_type`='$job_type',`preferd_location`='$val',`career_objective`='$career_objective',`jobfunction`='$jobfunction',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`industry`='$industry',`updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
	}
	else
	{
	mysql_query("update `cv_detail` set `prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`email`='$email',`dob`='$birthdate',`nationality`='$nationality',`home_contact`='$home_contact',`mobile_contact`='$mobl_contact',`marital_status`='$marital_status',`postal`='$postal',`age`='$age',`gender`='$gender',`current_address`='$current_address',`permanent_address`='$permanent_address',`picture`='$filename1',`designation`='$designation',`experience_type`='$exp_type',`experience_date`='$exp_date',`current_salary`='$crnt_salary',`current_currency`='$crnt_currency',`expected_salary`='$exp_salary',`expected_currency`='$exp_currency',`job_level`='$job_level',`job_type`='$job_type',`preferd_location`='$val',`career_objective`='$career_objective',`jobfunction`='$jobfunction',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`industry`='$industry',`updated_date`='$date1',`datediff`='$diff' where `user_id`='$_SESSION[useridval]'");
	}
}	
		
?>
