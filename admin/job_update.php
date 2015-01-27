<?php
include_once("../function.php");
$postname=htmlentities($_POST['postname'],ENT_QUOTES);
$id=htmlentities($_POST['hidden_id'],ENT_QUOTES);
$shortdesc=htmlentities($_POST['shortdesc'],ENT_QUOTES);
$desc=htmlentities($_POST['desc'],ENT_QUOTES);
$range1=htmlentities($_POST['range1'],ENT_QUOTES);
$range2=htmlentities($_POST['range2'],ENT_QUOTES);
$experience=htmlentities($_POST['experience'],ENT_QUOTES);
$location=htmlentities($_POST['location'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$oldimage=$_POST['oldimage'];
$newimage=$_FILES['logo']['name'];

if($newimage=='')
{
mysql_query("update `alljob` set `postname`='$postname',`shortdesc`='$shortdesc',`desc`='$desc',`range1`='$range1',`range2`='$range2',`experience`='$experience',`location`='$location',`industry`='$industry',`jobfunction`='$jobfunction' where `id`='$id'");
$msg="successfully updated";
 }
else
{
$ext1=end(explode(".", $_FILES["logo"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")

         {
                                    $folder="upload/";

                                                $filename = $folder .time(). $newimage;
                                               
                                                $copied = copy($_FILES['logo']['tmp_name'], $filename); 
}												
mysql_query("update `alljob` set `postname`='$postname',`shortdesc`='$shortdesc',`desc`='$desc',`range1`='$range1',`range2`='$range2',`experience`='$experience',`location`='$location',`industry`='$industry',`jobfunction`='$jobfunction',`logo`='$filename' where `id`='$id'");
$msg="successfully updated";
}
header("location:addjob.php?msg=$msg");
?>
