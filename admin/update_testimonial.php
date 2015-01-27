<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$pname=htmlentities($_POST['pname'],ENT_QUOTES);
$cname=htmlentities($_POST['cname'],ENT_QUOTES);
$desig=htmlentities($_POST['desig'],ENT_QUOTES);
$sdesc=htmlentities($_POST['sdesc'],ENT_QUOTES);
$nimage=$_FILES['timg']['name'];
if($nimage=='')
{
 $qwe=mysql_query("update `admin_testimonial` set  `personal_name`='$pname',`company_name`='$cname' , `designation`='$desig' , `short_description`='$sdesc' where `slno`='$id' ")or die(mysql_error());
$msg="Updated successfully.";
 }
else
{
$ext1=end(explode(".", $_FILES["timg"]["name"]));
if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")
         {
                                    $folder="upload/";
                                    $folder1="upload/";
                                    $filename = $folder.time().$nimage;
                                    $filename1 = $folder1.time().$nimage;           
                                    $copied = copy($_FILES['timg']['tmp_name'], $filename); 
        }
$qwe=mysql_query("update `admin_testimonial` set `personal_name`='$pname',`company_name`='$cname',`designation`='$desig',`image`='$filename',`short_description`='$sdesc' where `slno`='$id'")or die(mysql_error());
$msg="Updated successfully.";
}
}
header("location:add_testimonial.php?msg=$msg");
?>