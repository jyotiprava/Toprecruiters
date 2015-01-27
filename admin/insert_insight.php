<?php
include_once("../function.php");
$bimage =$_FILES['inimg']['name'];
$title=htmlentities($_POST['heading'],ENT_QUOTES);
$description=htmlentities($_POST['descp'],ENT_QUOTES);
$ext1=end(explode(".", $bimage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="upload/";
			$folder1="upload/"; 
                        $bannerimage = $folder.time().$bimage;
			$bannerimage1 = $folder1.time().$bimage;
                        $im=$_FILES['inimg']['tmp_name']; 
                        $copied = copy($im, $bannerimage); 
                     }    
$sql=mysql_query("select * from `insight` where `heading`='$title' and `description`='$description'");	
$num=mysql_num_rows($sql);
if($num==0){			 
mysql_query("insert into  `insight` set `image`='$bannerimage',`heading`='$title',`description`='$description'")or die(mysql_error());
$msg="Successfully Added.";
}
else{
 $msg="Already Exist.";
}
header("location:add_insight.php?msg=$msg");
?>