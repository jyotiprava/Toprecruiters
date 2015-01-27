<?php
include_once("function.php");
//is_employe();
$id=$_GET['id'];

$qwery=mysql_query("select c.`slno` from `alljob` a, `cv_detail` c where a.`id`='$id' and a.`jobfunction`=c.`jobfunction`")or die(mysql_error());
while($res=mysql_fetch_array($qwery))
{
    $employee[]=$res['slno'];
}
$count=count($employee);
if($count>20)
{
    $num=20;
}
else
{
    $num=$count;
}
$rand_keys = array_rand($employee, $num);

function getemail($id)
{
    $qwery=mysql_query("select `email` from `cv_detail` where `slno`='$id'")or die(mysql_error());
    $res=mysql_fetch_array($qwery);
    return $res['email'];
}

foreach($rand_keys as $value)
{
    $slno=$employee[$rand_keys[$value]];
    //echo $slno.'<br/>';
    $to = getemail($slno);
   // echo $to.'<br/>';
    $subject = "Suggest Mail";
    $message = "
                <html>
                <head>
                <title>Suggest Mail</title>
                </head>
                <body>
                <p>Congrats,<br/>
                You Have been invited to apply this job.To View the job details please follow the link.<br/>
                <br/>
                <a href='http://23.253.22.203/job/job_details.php?id=$id'>View</a>
                </p>
                </body>
                </html>
                ";
                
                
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <jobportal@example.com>' . "\r\n";

mail($to,$subject,$message,$headers);
}

$msg="Successfully job posted";
header("location:addjob.php?msg=$msg");
?>