<?php
include_once("../function.php");
if(isset($_POST['submit'])){
    $con=htmlentities($_POST['indexcon'],ENT_QUOTES);
	$heading=htmlentities($_POST['indexheading'],ENT_QUOTES);         
    $qwe=mysql_query("select * from `page`")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    $result=mysql_num_rows($qwe);
 if($result==1){
        mysql_query("update `page` set `content`='$con',`heading`='$heading'")or die(mysql_error());
        $msg="Updated Successfully"; 
    }   
   else{
                      
    mysql_query("insert into `page` set `content`='$con',`heading`='$heading'")or die(mysql_error());
    $msg="Content added Successfully"; 
    } 
    
 
}
header("location:add_indexcontent.php?msg=$msg");
?>