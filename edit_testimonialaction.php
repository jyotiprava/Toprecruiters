<?php
include_once("function.php");
if(isset($_POST['submit']))
{
$pname=htmlentities($_POST['pname'],ENT_QUOTES);
$cname=htmlentities($_POST['cname'],ENT_QUOTES);
$desgn=htmlentities($_POST['desgn'],ENT_QUOTES);
$description=htmlentities($_POST['area'],ENT_QUOTES);
$id=htmlentities($_POST['hid'],ENT_QUOTES);
$nimage=$_FILES['nimage']['name'];

//echo $nimage;
if($nimage=='')
{
//echo "update `testimonial` set `personal_name` = '$pname',`company_name` = '$cname',`designation` = '$desgn',`shortdescription` = '$description' where `slno`='$id'";

mysql_query("update `testimonial` set `personal_name` = '$pname',`company_name` = '$cname',`designation` = '$desgn',`shortdescription` = '$description' where `slno`='$id'")or die(mysql_error());
$msg="Updated successfully.";
 }
else
{
$ext1=end(explode(".", $_FILES["nimage"]["name"]));

if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")

         {
                                    $folder="upload/";
                                    $folder1="upload/";
                                    $filename = $folder .time(). $nimage;
                                    $filename1 = $folder1 .time(). $nimage;           
                                    $copied = copy($_FILES['nimage']['tmp_name'], $filename); 
        }
//echo "update `testimonial` set `personal_name` = '$pname',`company_name` = '$cname',`designation` = '$desgn',`testimonialimage` = '$nimage',`shortdescription` = '$description' where `slno`='$id' ";

$qwe=mysql_query("update `testimonial` set `personal_name` = '$pname',`company_name` = '$cname',`designation` = '$desgn',`testimonialimage` = '$filename',`shortdescription` = '$description' where `slno`='$id' ")or die(mysql_error());
$msg="Successfully Testimonial Is Updated.";
}
}
if(isset($_SESSION['useridval']))
    {
header("location:search.php?msg=$msg");
}
else
{
header("location:request.php?msg=$msg");
}
?>