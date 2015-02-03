<?php
include_once("function.php");

$fname=htmlentities($_POST['fname'],ENT_QUOTES);
$lname=htmlentities($_POST['lname'],ENT_QUOTES);
$dob=htmlentities($_POST['year'],ENT_QUOTES).'-'.htmlentities($_POST['mon'],ENT_QUOTES).'-'.htmlentities($_POST['day'],ENT_QUOTES);
$country=htmlentities($_POST['country'],ENT_QUOTES);
$state=htmlentities($_POST['state'],ENT_QUOTES);
$nationality=htmlentities($_POST['nationality'],ENT_QUOTES);
$contact=htmlentities($_POST['code'],ENT_QUOTES).htmlentities($_POST['contact'],ENT_QUOTES);
$telephone=htmlentities($_POST['areacode'],ENT_QUOTES).htmlentities($_POST['tel'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$password=md5(htmlentities($_POST['password'],ENT_QUOTES));

$gender=$_POST['gender'];
$city=htmlentities($_POST['city'],ENT_QUOTES);
$address=htmlentities($_POST['address'],ENT_QUOTES);

$expcurency=htmlentities($_POST['expcurency'],ENT_QUOTES);
$expsalary=htmlentities($_POST['expsalary'],ENT_QUOTES);

$prefl1=htmlentities($_POST['prefl1'],ENT_QUOTES);
$prefl2=htmlentities($_POST['prefl2'],ENT_QUOTES);
$prefl3=htmlentities($_POST['prefl3'],ENT_QUOTES);
$val=$prefl1.','.$prefl2.','.$prefl3;

$date1=date('Y-m-d h:i:s');

$join_date=date('Y-m-d');
$uniquekey=md5($fname.'--'.$lname.'--'.$email.'--'.$join_date.'--'.time());
$sql=mysql_query("select * from `user_detail` where `emailid`='$email' and `is_employer`='0'")or die(mysql_error());
$num=mysql_num_rows($sql);
if($num==0)
{
    mysql_query("insert into `user_detail` set `first_name`='$fname',`last_name`='$lname',`emailid`='$email',`contact`='$contact',`password`='$password',`join_date`='$join_date',`uniquekey`='$uniquekey',`status`=1")or die(mysql_error());
	
    $idval=mysql_insert_id(); 
$to = $email;
$subject = "Account details for $fname  $lname at Top Recruiters";

$message = "
<html>
<head>
<title>Account details for $fname  $lname at Top Recruiters</title>
</head>
<body>
<p>Dear $fname  $lname,

Thank you for registering for Top Recruiters. You may now log in by clicking this link:

http://23.253.22.203/job/login.php using the username and password that you created during registration.
<br/>
--
<br/>
Top Recruiters team</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@toprecruiters.com.my>' . "\r\n";

mail($to,$subject,$message,$headers);

$advance='';
$intermediate='';
$basic='';
foreach($_POST['skill'] as $sk=>$sv)
{
    $skill=htmlentities($_POST['skill'][$sk],ENT_QUOTES);
    $profi=htmlentities($_POST['profi'][$sk],ENT_QUOTES);
    if($skill!='')
    {
        if($profi=='Advanced')
        {
            $advance.=$skill.',';
        }
        elseif($profi=='Intermediate')
        {
            $intermediate.=$skill.',';
        }
        elseif($profi=='Basic')
        {
            $basic.=$skill.',';
        }
    }
}

$otherinfo=htmlentities($_POST['otherinfo'],ENT_QUOTES);
$workinoversea=htmlentities($_POST['workinoversea'],ENT_QUOTES);
$textmsgnf=htmlentities($_POST['textmsgnf'],ENT_QUOTES);
$emailnf=htmlentities($_POST['emailnf'],ENT_QUOTES);

$upload=$_FILES['upload']['name'];

$ext1=end(explode(".", $_FILES["upload"]["name"]));
	if($ext1=="doc" || $ext1=="docx" || $ext1=="rtf" || $ext1=="pdf" || $ext1=="txt")
                                               {
                                                $folder="admin/upload/";
                                                $filename = $folder .time(). $upload ;
                                                $copied = copy($_FILES['upload']['tmp_name'], $filename);
						}

$image=$_FILES['image']['name'];

$ext1=strtolower(end(explode(".", $_FILES["image"]["name"])));
	if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")
                                               {
                                                $folder="admin/upload/";
                                                $filename2 = $folder .time(). $image ;
                                                $copied = copy($_FILES['image']['tmp_name'], $filename2);
						}
						
						
$explevel=htmlentities($_POST['explevel'],ENT_QUOTES);
$exp=htmlentities($_POST['exp'],ENT_QUOTES);

mysql_query("insert into `cv_detail` set `user_id`='$idval',`first_name`='$fname',`last_name`='$lname',`gender`='$gender',`citizen`='$city',`dob`='$dob',`email`='$email',`nationality`='$nationality',`home_contact`='$telephone',`mobile_contact`='$contact',`country`='$country',`current_address`='$address',`expected_salary`='$expsalary',`expected_currency`='$expcurency',`experience_type`='$explevel',`experience_date`='$exp',`preferd_location`='$val',`advanced`='$advance',`intermediate`='$intermediate',`basic`='$basic',`other_info`='$otherinfo',`workin_oversea`='$workinoversea',`nfbyemail`='$emailnf',`nfbysms`='$textmsgnf',`cv`='$filename',`picture`='$filename2',`join_date`='$join_date',`updated_date`='$date1'")or die(mysql_error());

foreach($_POST['highqualification'] as $key=>$value)
{  
$highqualification=htmlentities($_POST['highqualification'][$key],ENT_QUOTES);
$fstudy=htmlentities($_POST['fstudy'][$key],ENT_QUOTES);
$major=htmlentities($_POST['major'][$key],ENT_QUOTES);
$institute=htmlentities($_POST['institute'][$key],ENT_QUOTES);
$located=htmlentities($_POST['located'][$key],ENT_QUOTES);
$graduation_date=htmlentities($_POST['graduation_date'][$key],ENT_QUOTES);
$hd_high=$_POST['hd_high'];

mysql_query("insert into `education` set `degree`='$highqualification',`field`='$fstudy',`major`='$major',`institute`='$institute',`country`='$located',`year`='$graduation_date',`user_id`='$idval',`education_type`='$hd_high'");
}


foreach($_POST['company'] as $key=>$value)
{
$company=htmlentities($_POST['company'][$key],ENT_QUOTES);
$industry=htmlentities($_POST['industry'][$key],ENT_QUOTES);
$fyear=htmlentities($_POST['fyear'][$key],ENT_QUOTES);
$fmonth=htmlentities($_POST['fmonth'][$key],ENT_QUOTES);
$tyear=htmlentities($_POST['tyear'][$key],ENT_QUOTES);
$tmonth=htmlentities($_POST['tmonth'][$key],ENT_QUOTES);

$from=$fmonth."-".$fyear;
$to=$tmonth."-".$tyear;

$monthName = date('M', mktime(0, 0, 0, $fmonth, 10));
$monthName1 = date('M', mktime(0, 0, 0, $tmonth, 10));
$datetime1 = new DateTime($monthName.$fyear);
$datetime2 = new DateTime($monthName1.$tyear);
$interval = $datetime1->diff($datetime2);
$intervall=$interval->format('%y');

$crntval=$_POST['recent'][$key];
$title=htmlentities($_POST['title'][$key],ENT_QUOTES);
$position=htmlentities($_POST['position'][$key],ENT_QUOTES);
$specialization=htmlentities($_POST['specialization'][$key],ENT_QUOTES);

$workcurency=htmlentities($_POST['workcurency'][$key],ENT_QUOTES);
$worksalary=htmlentities($_POST['worksalary'][$key],ENT_QUOTES);

$role=htmlentities($_POST['role'][$key],ENT_QUOTES);
$location=htmlentities($_POST['location'][$key],ENT_QUOTES);
$statew=htmlentities($_POST['statew'][$key],ENT_QUOTES);
$workexpdesc=htmlentities($_POST['workexpdesc'][$key],ENT_QUOTES);

if($company!='')
{
mysql_query("insert into `experience` set `company`='$company',`industry`='$industry',`from`='$from',`to`='$to',`total_experience`='$intervall',`type`='$crntval',`title`='$title',`position`='$position',`jobcategory`='$specialization',`description`='$workexpdesc',`curency`='$workcurency',`salary`='$worksalary',`role`='$role',`location`='$location',`state`='$statew',`user_id`='$idval'");
}
}




foreach($_POST['laguage'] as $sk=>$sv)
{
    $laguage=htmlentities($_POST['laguage'][$sk],ENT_QUOTES);
    $isprimary=htmlentities($_POST['isprimary'][$sk],ENT_QUOTES);
    $spoken=htmlentities($_POST['spoken'][$sk],ENT_QUOTES);
    $write=htmlentities($_POST['write'][$sk],ENT_QUOTES);
    $certificate=htmlentities($_POST['certificate'][$sk],ENT_QUOTES);
    
    mysql_query("insert into `language_details` set `language`='$laguage',`write`='$write',`is_primary`='$isprimary',`spoken`='$spoken',`certificate`='$certificate',`user_id`='$idval'");
}

    }
    
 $_SESSION['useridval']=$idval;
  $_SESSION['userid']=$email;
  $_SESSION['userpass']=$password;
  $_SESSION['employee_name']=$fname.' '.$lname;
header("location:mypage2.php");
?>