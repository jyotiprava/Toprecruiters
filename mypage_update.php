<?php
include_once("function.php");
if(isset($_POST['submit'])){
$hidden=$_POST['hd_id'];
$hd_picture=$_POST['hd_picture'];
$hd_cv=$_POST['hd_cv'];
$hdslno=$_POST['hd_slno'];
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
$hd_slnoval=$_POST['hd_slno'];
$spokenval=$_POST['spoken'];
$writtenval=$_POST['written'];
$relevantval=$_POST['relevant'];
foreach($languageval as $key=>$lngval)
{
$hd_slnoo=$hd_slnoval[$key];
$spoken=$spokenval[$key];
$written=$writtenval[$key];
$relevant=$relevantval[$key];
//echo "select * from `language_details` where `slno`='$hd_slnoo'";
$sqll=mysql_query("select * from `language_details` where `slno`='$hd_slnoo'");
$num=mysql_num_rows($sqll);
if($num==0)
{
//echo "insert into `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant'";
mysql_query("insert into `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant',`user_id`='$_SESSION[useridval]'");
}
else
{
//echo "update `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant' where `slno`='$hd_slnoo'";
mysql_query("update `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant' where `slno`='$hd_slnoo'");
}
//mysql_query("insert into `language_details` set `language`='$lngval',`spoken`='$spoken',`written`='$written',`relevant`='$relevant'");
}

$upload=$_FILES['upload']['name'];
if($upload!=''){
$ext1=end(explode(".", $_FILES["upload"]["name"]));
	if($ext1=="doc" || $ext1=="docx" || $ext1=="rtf" || $ext1=="pdf")
                                               {
                                                $folder="admin/upload/";
                                                $filename = $folder .time(). $upload ;
                                                $copied = copy($_FILES['upload']['tmp_name'], $filename);
						}
				}
				else{
				$filename=$hd_cv;
				}

$image=$_FILES['img']['name'];
if($image!=''){
$ext2=end(explode(".", $_FILES["img"]["name"]));
	if($ext2=="jpg" || $ext2=="jpeg" || $ext2=="png" || $ext2=="gif")

                                               {
                                                $folder="admin/upload/";
                                                $filename1 = $folder .time(). $image;
                                                $copied = copy($_FILES['img']['tmp_name'], $filename1);
						}
						}
						else{
				$filename1=$hd_picture;
				}

	//echo "update `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`citizen`='$citizen',`contact`='$contact',`email`='$email',`address`='$address',`country`='$country',`postal`='$postal',`experience`='$experience',`age`='$age',`expected_salary`='$salary',`education`='$education',`positon`='$position',`jobtype`='$jobtype',`industry`='$industry',`jobfunction`='$jobfunction',`location`='$location',`preferd_location`='$val',`cv`='$filename',`picture`='$filename1'  where `slno`='$hidden'";
    mysql_query("update `cv_detail` set `user_id`='$_SESSION[useridval]',`prefix`='$prefix',`first_name`='$fname',`last_name`='$lname',`citizen`='$citizen',`contact`='$contact',`email`='$email',`address`='$address',`gender`='$gender',`country`='$country',`postal`='$postal',`experience`='$experience',`exp_description`='$expdesc',`age`='$age',`nationality`='$nationality',`expected_salary`='$expsalary',`education`='$education',`last_course`='$course',`current_position`='$cposition',`previous_position`='$pposition',`vancancy`='$jobtype',`industry`='$industry',`jobfunction`='$jobfunction',`location`='$location',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`preferd_location`='$val',`cv`='$filename',`picture`='$filename1',`other_info`='$other' where `slno`='$hidden'")or die(mysql_error());
	//mysql_query("");
	$_SESSION['id']=$email;
    $_SESSION['pass']=$password;
	$msg="Profile Successfully added";

	$msg="Succesfully Updated";
	
	
}
header("location:mypage.php?msg=$msg");
?>
