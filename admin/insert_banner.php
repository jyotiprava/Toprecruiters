<?php
include_once("../function.php");
$bimage =$_FILES['bimg']['name'];
$title=htmlentities($_POST['title'],ENT_QUOTES);
$ext1=end(explode(".", $bimage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="upload/";
			$folder1="upload/"; 
                        $bannerimage = $folder.time().$bimage;
			$bannerimage1 = $folder1.time().$bimage;
                        $im=$_FILES['bimg']['tmp_name']; 
                        $copied = copy($im, $bannerimage); 
                     }
                     
mysql_query("insert into `bannerimage` set `bannerimage`='$bannerimage',`title`='$title'")or die(mysql_error());
$msg="Banner image Successfully inserted.";
header("location:add_banner.php?msg=$msg");
?>