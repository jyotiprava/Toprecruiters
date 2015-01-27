<?php
include_once("../function.php");

$pname=htmlentities($_POST['pname'],ENT_QUOTES);
$cname=htmlentities($_POST['cname'],ENT_QUOTES);
$desig=htmlentities($_POST['desig'],ENT_QUOTES);
$sdesc=htmlentities($_POST['sdesc'],ENT_QUOTES);
$bimage =$_FILES['timg']['name'];
$ext1=end(explode(".", $bimage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="upload/";
			$folder1="upload/"; 
                        $bannerimage = $folder.time().$bimage;
			$bannerimage1 = $folder1.time().$bimage;
                        $im=$_FILES['timg']['tmp_name']; 
                        $copied = copy($im, $bannerimage); 
                     }    
$sql=mysql_query("select * from `admin_testimonial` where `personal_name`='$pname' and `company_name`='$cname' and `designation`='$desig' and `short_description`='$sdesc'");	
$num=mysql_num_rows($sql);
if($num==0){			 
mysql_query("insert into  `admin_testimonial` set `personal_name`='$pname',`company_name`='$cname',`designation`='$desig',`image`='$bannerimage',`short_description`='$sdesc'")or die(mysql_error());
$msg="Successfully Added.";
}
else{
 $msg="Already Exist.";
}
header("location:add_testimonial.php?msg=$msg");
?>