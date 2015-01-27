<?php
include_once("../function.php");
$postname=htmlentities($_POST['postname'],ENT_QUOTES);
$shortdesc=htmlentities($_POST['shortdesc'],ENT_QUOTES);
$desc=htmlentities($_POST['desc'],ENT_QUOTES);
$range1=htmlentities($_POST['range1'],ENT_QUOTES);
$range2=htmlentities($_POST['range2'],ENT_QUOTES);
$experience=htmlentities($_POST['experience'],ENT_QUOTES);
$location=htmlentities($_POST['location'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);

$primage =$_FILES['logo']['name'];
    $ext1=end(explode(".", $primage)); 
     if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
                        { 
                            $folder="upload/"; 
                            $prdouctimage = $folder.time().$primage; 
                            $im=$_FILES['logo']['tmp_name']; 
                            $copied = copy($im, $prdouctimage); 
                         }
                         
mysql_query("insert into `alljob` set `postname`='$postname',`shortdesc`='$shortdesc',`desc`='$desc',`range1`='$range1',`range2`='$range2',`experience`='$experience',`location`='$location',`industry`='$industry',`jobfunction`='$jobfunction',`logo`='$prdouctimage'")or ide(mysql_error());

$msg="Job added Successfully";
header("location:addjob.php?msg=$msg");
?>