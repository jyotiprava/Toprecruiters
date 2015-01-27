<?php
include_once("../function.php");
$idval=$_POST['idval'];
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

if($brimage!='' && $brlogo!='')
{
    mysql_query("update `banner` set `brname`='$bannername',`brimage`='$bannerimage1',`brlogo`='$bannerlogo1' where `id`='$idval'")or die(mysql_error());
}
elseif($brimage!='')
{
     mysql_query("update `banner` set `brname`='$bannername',`brimage`='$bannerimage1' where `id`='$idval'")or die(mysql_error());
}
elseif($brlogo!='')
{
     mysql_query("update `banner` set `brname`='$bannername',`brlogo`='$bannerlogo1' where `id`='$idval'")or die(mysql_error());
}
else
{
    mysql_query("update `banner` set `brname`='$bannername' where `id`='$idval'")or die(mysql_error());
}

$msg="Banner Successfully updated.";
header("location:banner.php?msg=$msg");
?>