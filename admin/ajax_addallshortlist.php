<?php
include_once("../function.php");
$allid=$_GET['id'];
$ids=explode(',',$allid );
//echo $ids;
foreach($ids as $value){
    if($value != ""){
        //echo $value;
        //echo "update `user_detail` set `shortlisted`='1' where `slno`='$value'";
     mysql_query("update `user_detail` set `shortlisted`='1' where `slno`='$value'")or die(mysql_error());
     $qwe=mysql_query("select * from `user_detail` where `slno`='$value' ")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    $mail=$res['emailid'].'<br />';
    $contact=$res['contact'].'<br />';
    echo $mail.'|'.$contact;
    }
  
}
?>