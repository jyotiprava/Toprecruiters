<?php
include_once("../function.php");
$cvid=$_GET['rmv_id'];
mysql_query("update `cv_detail` set `shortlisted`='0' where `slno`='$cvid'") or die(mysql_error());
?>
<span onclick="return addshort(<?php echo $cvid;?>);">Add to Shortlist</span>