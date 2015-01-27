<?php
include_once("../function.php");
$check=$_POST['check'];

foreach($check as $chval)
{
$chk=$chval;
$expl=explode('_',$chk);
$employer_email=$expl[0];
$industry=$expl[1];
$jobfunction=$expl[2];
$n='';
$sqlemployee=mysql_query("select * from `cv_detail` where `industry`='$industry' and `jobfunction`='$jobfunction'")or die(mysql_error());
$num=mysql_num_rows($sqlemployee);
if($num==0)
{
$msg="There are no records";
}
else{
while($resemployee=mysql_fetch_array($sqlemployee)){
$firstname=$resemployee['first_name'];
$eml=$resemployee['email'];
$cvv=$resemployee['cv'];
$e=explode('/',$cvv);
$e1=$e[0];
$e2=$e[1];
$e3=$e[2];

$name=$resemployee['first_name']." ".$resemployee['last_name'];
$cv="<a href='http://23.253.22.203/job/admin/pdf_server.php?file=upload/$e3'>".$firstname.".cv</a>";
$dt="<table style='margin-bottom:10px;'><tr><td>Name:</td><td>".$name."</td></tr><tr><td>Emailid:</td><td>".$eml."</td></tr><tr><td>Cv:</td><td>".$cv."</td></tr></table>";
$n=$n." ".$dt;
}
$msg="Succesfully send";
}
$subject="job seeker details";
$message=$n;
 $to=$employer_email.",";
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <info@mysite.com>' . "\r\n";
 mail($to,$subject,$message,$headers);

}

header("location:suggest_employer.php?mess=$msg");
?>