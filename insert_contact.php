<?php
include_once("function.php");
if(isset($_POST['submit'])){
$title=htmlentities($_POST['title'],ENT_QUOTES);
$name=htmlentities($_POST['name'],ENT_QUOTES);
$company=htmlentities($_POST['company'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$contact=htmlentities($_POST['contact'],ENT_QUOTES);
$sub=htmlentities($_POST['subject'],ENT_QUOTES);
//$hear_from=htmlentities($_POST['chk'],ENT_QUOTES);
$value='';
foreach($_POST['chk'] as $val)
{
$value.=$val.',';
}
$other=htmlentities($_POST['other'],ENT_QUOTES);
$message1=htmlentities($_POST['message'],ENT_QUOTES);
//echo "insert into  `enquiry_info` set `title`='$title',`name`='$name',`company_name`='$company',`email`='$email',`contact`='$contact',`subject`='$sub',`hear_from`='$value',`other`='$other',`message`='$message'";
mysql_query("insert into  `enquiry_info` set `title`='$title',`name`='$name',`company_name`='$company',`email`='$email',`contact`='$contact',`subject`='$sub',`hear_from`='$value',`other`='$other',`message`='$message'")or die(mysql_error());
    $msg="Details hes been sent...";
    $to0 = $email; 
    $subject0 = "Thank You";
    $message0 = 'We got your mail and we will contact you soon...';
    $from0 = "info@toprecruiters.com.my";
    $headers0 = "From:" . $from;
    mail($to0,$subject0,$message0,$headers0);
    echo "Mail Sent.";
    
    
    $to = "info@toprecruiters.com.my";
    $subject = "Enquiry Details.";
    $message =" <html>
                <head>
                </head>
                <body>
                <table width='100%'>
                <tr>
                <td>Name:$name</td>
                <tr/>
                <tr>
                <td>Company:$company</td>
                <tr/>
                <tr>
                <td>Contact:$contact</td>
                <tr/>
                <tr>
                <td>Subject:$sub</td>
                <tr/>
                <tr>
                <td>Other:$other</td>
                <tr/>
                <tr>
                <td>Message:$message1</td>
                <tr/>
                </table>
                </body>
                </html>
                ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers.= "From:" .$from. "\r\n";
    $from = $email;
    mail($to,$subject,$message,$headers);
    echo "Mail Sent.";	
}
header("location:index.php?msg=$msg");
?>
