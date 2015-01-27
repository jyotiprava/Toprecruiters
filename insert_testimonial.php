<?php
include_once("function.php");
if(isset($_POST['submit']))
{
    if(isset($_SESSION['useridval']))
    {
    $addby=$_SESSION['useridval'];
	$addto=$_POST['hdval'];
    }
    else
    {
    $addby=$_SESSION['employer_idval'];
	$addto=$_POST['hdval'];
    }
//echo $addby;
$prsnl_nm=htmlentities($_POST['pname'],ENT_QUOTES);
$cmpy_nm=htmlentities($_POST['cname'],ENT_QUOTES);
$dsgn=htmlentities($_POST['desgn'],ENT_QUOTES);

$brimage =$_FILES['img']['name'];
//echo $brimage;
$ext1=end(explode(".", $brimage));
 if($ext1=="jpg" || $ext1=="jpeg" || $ext1=="png" || $ext1=="gif")
            {  
            $folder1="upload/";
            $bannerimage1 = $folder1.time().$brimage;
                        $im=$_FILES['img']['tmp_name'];
                        $copied = copy($im, $bannerimage1);
                     }
$textarea=htmlentities($_POST['area'],ENT_QUOTES);
//echo $indstry_nm;
$query=mysql_query("insert into `testimonial` set `addby`='$addby',`addto`='$addto',`personal_name`='$prsnl_nm',`company_name`='$cmpy_nm',`designation`='$dsgn',`testimonialimage`='$bannerimage1',`shortdescription`='$textarea'") or die(mysql_error());
$msg="Successfully Testimonial Is Added";
if(isset($_SESSION['useridval']))
    {
header("location:search.php?msg=$msg");
}
else
{
header("location:request.php?msg=$msg");
}
}
else{
$message="not inserted";
header("Location:testimonial.php?msg=$message");
}
?>