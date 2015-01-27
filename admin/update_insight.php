<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$id=htmlentities($_POST['hid'],ENT_QUOTES);
//echo $id;
$nimage=$_FILES['inimg']['name'];
$title=htmlentities($_POST['heading'],ENT_QUOTES);
$description=htmlentities($_POST['descp'],ENT_QUOTES);
//echo $nimage;
if($nimage=='')
{
 $qwe=mysql_query("update `insight` set `heading`='$title',`description`='$description' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
 }
else
{
$ext1=end(explode(".", $_FILES["inimg"]["name"]));
//echo $ext1;
if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")
         {
                                    $folder="upload/";
                                    $folder1="upload/";
                                    $filename = $folder.time().$nimage;
                                    $filename1 = $folder1.time().$nimage;           
                                    $copied = copy($_FILES['inimg']['tmp_name'], $filename); 
        }
//echo "update `bannerimage` set `bannerimage` = '$filename' where `slno`='$id'";
$qwe=mysql_query("update `insight` set `image` = '$filename',`heading`='$title',`description`='$description' where `slno`='$id'")or die(mysql_error());
$msg="Updated successfully.";
}
}
header("location:add_insight.php?msg=$msg");
?>