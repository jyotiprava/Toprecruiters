<?php
include_once("function.php");
$posttype=htmlentities($_POST['posttype'],ENT_QUOTES);
$postname=htmlentities($_POST['postname'],ENT_QUOTES);
$noofpost=htmlentities($_POST['noofpost'],ENT_QUOTES);
$shortdesc=htmlentities($_POST['shortdesc'],ENT_QUOTES);
$desc=htmlentities($_POST['desc'],ENT_QUOTES);
$range1=htmlentities($_POST['range1'],ENT_QUOTES);
$range2=htmlentities($_POST['range2'],ENT_QUOTES);
$experience=htmlentities($_POST['experience'],ENT_QUOTES);
$location=htmlentities($_POST['location'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$specialize=htmlentities($_POST['specialize'],ENT_QUOTES);
$job_type=htmlentities($_POST['job_type'],ENT_QUOTES);
//$reference=htmlentities($_POST['reference'],ENT_QUOTES);
$reference=uniqid();

$primage =$_FILES['logo']['name'];
    $ext1=end(explode(".", $primage)); 
     if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
                        { 
                            $folder="admin/upload/";
                             $folder1="upload/"; 
                            $prdouctimage = $folder.time().$primage;
                            $prdouctimage1 = $folder1.time().$primage; 
                            $im=$_FILES['logo']['tmp_name']; 
                            $copied = copy($im, $prdouctimage); 
                         }
                         
mysql_query("insert into `alljob` set `postname`='$postname',`noofvaccancy`='$noofpost',`shortdesc`='$shortdesc',`keyskill`='$specialize',`refno`='$reference',`desc`='$desc',`range1`='$range1',`range2`='$range2',`experience`='$experience',`location`='$location',`industry`='$industry',`jobfunction`='$jobfunction',`logo`='$prdouctimage1',`addby`='$_SESSION[employer_idval]',`posttype`='$posttype',`job_type`='$job_type'")or die(mysql_error());

$id=mysql_insert_id();
header("location:suggest.php?id=$id");
?>