<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$nimage=$_FILES['img']['name'];
$ext1=end(explode(".", $_FILES["img"]["name"]));
if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")
         {
                                    $folder="upload/";
                                    $folder1="upload/";
                                    $filename = $folder.time().$nimage;
                                    $filename1 = $folder1.time().$nimage;           
                                    $copied = copy($_FILES['img']['tmp_name'], $filename); 
        }
        //echo "update `feautred_emplyer` set `image` = '$filename' where `id`='$id'";
$qwe=mysql_query("update `feautred_emplyer` set `image` = '$filename' where `id`='$id'")or die(mysql_error());
$msg="Updated successfully.";
}
header("location:add_fetrempl.php?msg=$msg");
?>