<?php
include_once("../function.php");
$check=$_POST['check'];

foreach($check as $chval)
{
$chk=$chval;
$expl=explode('_',$chk);
$employe_email=$expl[0];
$industry=$expl[1];
$jobfunction=$expl[2];
$n='';
$sqlemployer=mysql_query("select * from `alljob` where `industry`='$industry' and `jobfunction`='$jobfunction'")or die(mysql_error());
//echo "select * from `alljob` where `industry`='$industry' and `jobfunction`='$jobfunction'";
$num=mysql_num_rows($sqlemployer);
if($num==0)
{
$msg="There are no records";
}
else{
while($resemployer=mysql_fetch_array($sqlemployer)){
$post=$resemployer['postname'];
$vacancy=$resemployer['noofvaccancy'];
$keyskill=$resemployer['keyskill'];
$range1=$resemployer['range1'];
$range2=$resemployer['range2'];
$experience=$resemployer['experience'];
$location=$resemployer['location'];
$sqlloc=mysql_query("select `location` from `location` where `slno`='$location'");
$resloc=mysql_fetch_array($sqlloc);
$keyexl=explode(',',$keyskill);
$n1='';
foreach($keyexl as $keyexlval)
{
$sqlskill=mysql_query("select * from `skill` where `slno`='$keyexlval'");
$resskill=mysql_fetch_array($sqlskill);
$skill=$resskill['skill'];
if($skill!=''){
$n1=$n1.",".$skill;
}
else{}
}
//echo $n1;
$trm=$n1;
$ltrm=ltrim($trm,',');
$dt="<table style='margin-bottom:10px;'><tr><td>Postname :</td><td>".$post."</td></tr><tr><td>No of Vacancy :</td><td>".$vacancy."</td></tr><tr><td>Keyskill :</td><td>".$ltrm."</td></tr><tr><td>Salary :</td><td>".$range1."-".$range2."</td></tr><tr><td>Experience :</td><td>".$experience."</td></tr><tr><td>Location :</td><td>".$resloc['location']."</td></tr></table>";
echo $dt;
//$dt="<table><tr><th>Postname</th><th>No of Vacancy</th><th>Keyskill</th><th>Salary</th><th>Experience</th><th>Location</th></tr><tr><td>".$post."</td></tr><tr><td>".$vacancy."</td><td>".$keyskill."</td><td>".$range1.$range2."</td><td>".$experience."</td><td>".$location."</td></tr></table>";
$n=$n." ".$dt;
}
$msg="Succesfully send";
}
$subject="Employers detail";
$message=$n;
 $to=$employe_email.",";
 //echo $to;
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@mysite.com>' . "\r\n";
mail($to,$subject,$message,$headers);

}

header("location:suggest_jobseeker.php?mess=$msg");
?>