<?php
include_once("function.php");
if(isset($_POST['submit'])){
$prefix=htmlentities($_POST['prefix'],ENT_QUOTES);
$fname=htmlentities($_POST['fname'],ENT_QUOTES);
$lname=htmlentities($_POST['lname'],ENT_QUOTES);
$citizen=htmlentities($_POST['citizen'],ENT_QUOTES);
$contact=htmlentities($_POST['contact'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$country=htmlentities($_POST['country'],ENT_QUOTES);
$postal=htmlentities($_POST['postal'],ENT_QUOTES);
$age=htmlentities($_POST['age'],ENT_QUOTES);
$nationality=htmlentities($_POST['nationality'],ENT_QUOTES);
$address=htmlentities($_POST['address'],ENT_QUOTES);
$gender=htmlentities($_POST['gen'],ENT_QUOTES);
$experience=htmlentities($_POST['exp'],ENT_QUOTES);
$expdesc=htmlentities($_POST['expdesc'],ENT_QUOTES);
$advance=htmlentities($_POST['advance'],ENT_QUOTES);
$intermediate=htmlentities($_POST['intermediate'],ENT_QUOTES);
$basic=htmlentities($_POST['basic'],ENT_QUOTES);
$education=htmlentities($_POST['education'],ENT_QUOTES);
$course=htmlentities($_POST['course'],ENT_QUOTES);
$jobtype=htmlentities($_POST['jobtype'],ENT_QUOTES);
$cposition=htmlentities($_POST['cposition'],ENT_QUOTES);
$pposition=htmlentities($_POST['pposition'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$location=htmlentities($_POST['location'],ENT_QUOTES);
$expsalary=htmlentities($_POST['expsalary'],ENT_QUOTES);
$other=htmlentities($_POST['other'],ENT_QUOTES);

$checkval=$_POST['chk'];
$val='';
foreach($checkval as $locval)
{
$val.=$locval.",";
}

$languageval=$_POST['language'];
$spokenval=$_POST['spoken'];
$writtenval=$_POST['written'];
$relevantval=$_POST['relevant'];
foreach($languageval as $key=>$lngval)
{
$spoken=$spokenval[$key];
$written=$writtenval[$key];
$relevant=$relevantval[$key];
//echo "insert into `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant',`user_id`='$_SESSION[useridval]'";
mysql_query("insert into `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant',`user_id`='$_SESSION[useridval]'")or die(mysql_error());
}

$upload=$_FILES['upload']['name'];


$ext1=end(explode(".", $_FILES["upload"]["name"]));
	if($ext1=="doc" || $ext1=="docx" || $ext1=="rtf" || $ext1=="pdf")
                                               {
                                                $folder="admin/upload/";
                                                $filename = $folder .time(). $upload ;
                                                $copied = copy($_FILES['upload']['tmp_name'], $filename);
						}
	

$image=$_FILES['img']['name'];
if($image=="")
{
$filename1 ="images/default.jpg" ;
}
else{
$ext2=end(explode(".", $_FILES["img"]["name"]));
	if($ext2=="jpg" || $ext2=="jpeg" || $ext2=="png" || $ext2=="gif")

                                               {
                                                $folder="admin/upload/";
                                                $filename1 = $folder .time(). $image;
                                                $copied = copy($_FILES['img']['tmp_name'], $filename1);
						}
	}					

	$sql=mysql_query("select * from `cv_detail` where `user_id`='$_SESSION[useridval]' and `prefix`='$prefix' and `first_name`='$fname' and `last_name`='$lname' and `citizen`='$citizen' and `contact`='$contact' and `email`='$email' and `address`='$address' and `gender`='$gender' and `country`='$country' and `postal`='$postal' and `experience`='$experience' and `exp_description`='$expdesc' and `age`='$age' and `nationality`='$nationality' and `expected_salary`='$expsalary' and `education`='$education' and `last_course`='$course' and `current_position`='$cposition' and `previous_position`='$pposition' and `vancancy`='$jobtype' and `industry`='$industry' and `jobfunction`='$jobfunction' and `location`='$location' and `advanced`='$advance' and `intermediate`='$intermediate' and `basic`='$basic' and `preferd_location`='$val' and `cv`='$filename' and `picture`='$filename1' and `other_info`='$other'")or die(mysql_error());
    $num=mysql_num_rows($sql);
    if($num==0)
    {
	//echo "insert into `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`citizen`='$citizen',`contact`='$contact',`email`='$email',`address`='$address',`country`='$country',`postal`='$postal',`experience`='$experience',`age`='$age',`expected_salary`='$salary',`education`='$education',`positon`='$position',`jobtype`='$jobtype',`industry`='$industry',`jobfunction`='$jobfunction',`location`='$location',`preferd_location`='$val',`cv`='$filename',`picture`='$filename1'";
    mysql_query("insert into `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`citizen`='$citizen',`contact`='$contact',`email`='$email',`address`='$address',`gender`='$gender',`country`='$country',`postal`='$postal',`experience`='$experience',`exp_description`='$expdesc',`age`='$age',`nationality`='$nationality',`expected_salary`='$expsalary',`education`='$education',`last_course`='$course',`current_position`='$cposition',`previous_position`='$pposition',`vancancy`='$jobtype',`industry`='$industry',`jobfunction`='$jobfunction',`location`='$location',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`preferd_location`='$val',`cv`='$filename',`picture`='$filename1',`other_info`='$other'")or die(mysql_error());
	
	$_SESSION['id']=$email;
    $_SESSION['pass']=$password;
	$msg="Profile Successfully added";
	}
	else{
	$msg="this is already exist";
	}
	
}
header("location:mypage.php?msg=$msg");
?>
