<?php
include_once("../function.php");
if(isset($_POST['submit'])){
    $con=htmlentities($_POST['indexcon'],ENT_QUOTES);       
    $qwe=mysql_query("select * from `rightbox_content`")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    $result=mysql_num_rows($qwe);
 if($result==1){
        mysql_query("update `rightbox_content` set `content`='$con'")or die(mysql_error());
        $msg="Updated Successfully"; 
    }   
   else{
                      
    mysql_query("insert into `rightbox_content` set `content`='$con'")or die(mysql_error());
    $msg="Content added Successfully"; 
    } 
    
 
}
header("location:add_rightcontent.php?msg=$msg");
?>