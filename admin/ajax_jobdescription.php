<?php
include_once("../function.php");
$id=$_GET['id'];
$des=mysql_query("select * from `alljob` where `id`='$id'")or die(mysql_error());
$resdes=mysql_fetch_array($des);
$short=htmlspecialchars_decode($resdes['shortdesc']);
$long=htmlspecialchars_decode($resdes['desc']);
$head=$resdes['postname'];
$refno='(Ref No:'.$resdes['refno'].')';
$pdate=$resdes['date'];
$dte=date("d-m-Y",strtotime($pdate));
$date='Posting Date:'.$dte;
echo $short.'|'.$long.'|'.$head.'|'.$refno.'|'.$date;
?>