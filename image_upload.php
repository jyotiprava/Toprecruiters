<?php
include_once("function.php");
$image=$_FILES['image']['name'];
$ext2=end(explode(".", $_FILES["image"]["name"]));
	if($ext2=="jpg" || $ext2=="jpeg" || $ext2=="png" || $ext2=="gif")

                                               {
                                                $folder="admin/upload/";
                                                $filename1 = $folder .time(). $image;
                                                $copied = copy($_FILES['image']['tmp_name'], $filename1);
						}
if($image!='')
{
mysql_query("update `cv_detail` set `picture`='$filename1' where `user_id`='$_SESSION[useridval]'")or die(mysql_error());
}

$msg="Successfully Image Upload";
header("location:mypage2.php?msg=$msg");
?>