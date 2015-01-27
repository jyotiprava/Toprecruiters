<?php
include_once("function.php");
if(isset($_POST['submit'])){
$name=htmlentities($_POST['name'],ENT_QUOTES);
$nationality=htmlentities($_POST['nationality'],ENT_QUOTES);
$contact=htmlentities($_POST['hpno'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$message=htmlentities($_POST['message'],ENT_QUOTES);
$jobid=htmlentities($_POST['jobid'],ENT_QUOTES);

$upload=$_FILES['doc']['name'];

$ext1=end(explode(".", $_FILES["doc"]["name"]));
	if($ext1=="doc" || $ext1=="docx" || $ext1=="rtf" || $ext1=="pdf")
                                               {
                                                $folder="admin/upload/";
                                                $filename = $folder .time(). $upload ;
                                                $copied = copy($_FILES['doc']['tmp_name'], $filename);
						}
                                                
                                                
$enq=mysql_query("select * from `job_apply` where `postid`='$jobid' and `email`='$email'")or die(mysql_error());
//$res=mysql_fetch_array($enq);
$rows=mysql_num_rows($enq);
if($rows==0){
  $qwe=mysql_query("insert into  `user_detail` set `first_name`='$name',`contact`='$contact',`emailid`='$email'")or die(mysql_error());
$id=mysql_insert_id();
$applyjob=mysql_query("insert into `job_apply` set `fname`='$name',`email`='$email',`contactno`='$contact',`employee_id`='$id',`postid`='$jobid',`message`='$message'")or die(mysql_error());
$cvdetail=mysql_query("insert into `cv_detail` set `first_name`='$name',`nationality`='$nationality',`mobile_contact`='$contact',`email`='$email',`cv`='$filename',`user_id`='$id'")or die(mysql_error());
$msg="Successfully Applied.";


$to = "$email";
$subject = "You are successfully apllied.";
$txt =  "Thank you for applying.";
$headers = "From:hr@singtact.com" . "\r\n" .
"CC: webmaster@example.com";

mail($to,$subject,$txt,$headers);
  
}
else{
    $msg="This Email Id already exist. ";
}
}
header("location:jobdescription1.php?msg=$msg");
?>