<?php
include_once("../function.php");
$bimage =$_FILES['bimg']['name'];
$title=htmlentities($_POST['title'],ENT_QUOTES);
$description=htmlentities($_POST['descp'],ENT_QUOTES);
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
					 echo "select * from `bottomimage` where  `title`='$title' and `description`='$description'";
$sql=mysql_query("select * from `bottomimage` where `title`='$title' and `description`='$description'");	
$num=mysql_num_rows($sql);
if($num==0){			 
mysql_query("insert into `bottomimage` set `image`='$bannerimage',`title`='$title',`description`='$description'")or die(mysql_error());
$msg="Successfully Added.";
}
else{
 $msg="Already Exist.";
}
header("location:add_banner1.php?msg=$msg");
?>