<?php
include_once("../function.php");
$bimage =$_FILES['img']['name'];
$ext1=end(explode(".", $bimage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="upload/";
                        $bannerimage = $folder.time().$bimage;
                        $im=$_FILES['img']['tmp_name']; 
                        $copied = copy($im, $bannerimage); 
                     }
                     
mysql_query("insert into `feautred_emplyer` set `image`='$bannerimage'")or die(mysql_error());
$msg="Successfully inserted.";
header("location:add_fetrempl.php?msg=$msg");
?>