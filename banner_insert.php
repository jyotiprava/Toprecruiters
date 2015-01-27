<?php
include_once("../function.php");
$bannername=htmlentities($_POST['bannername'],ENT_QUOTES);

$brimage =$_FILES['img']['name']; 
$ext1=end(explode(".", $brimage)); 
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif") 
		    { 
                        $folder="admin/upload/";
			$folder1="upload/"; 
                        $bannerimage = $folder.time().$brimage;
			$bannerimage1 = $folder1.time().$brimage;
                        $im=$_FILES['img']['tmp_name']; 
                        $copied = copy($im, $bannerimage); 
                     }
                     
$brlogo =$_FILES['imgl']['name']; 
$ext2=end(explode(".", $brlogo)); 
 if($ext2=="jpg" || $ext2=="jpeg" || $ext2=="png" || $ext2=="gif") 
		    { 
                        $folder="admin/upload/";
			 $folder1="upload/"; 
                        $bannerlogo = $folder.time().$brlogo;
			$bannerlogo1 = $folder1.time().$brlogo;
                        $im=$_FILES['imgl']['tmp_name']; 
                        $copied = copy($im, $bannerlogo); 
                     }
                     
mysql_query("insert into `banner` set `brname`='$bannername',`employerid`='".$_SESSION['employer_idval']."',`brimage`='$bannerimage1',`brlogo`='$bannerlogo1'")or die(mysql_error());
$msg="Banner Successfully inserted.";
header("location:banner.php?msg=$msg");
?>