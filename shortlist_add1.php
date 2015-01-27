<?php
include_once("function.php");
$id=$_GET['add_id'];
mysql_query("update `cv_detail` set `shortlisted`='1' where `slno`='$id'") or die(mysql_error());
?>
<span onclick="return removeshort(<?php echo $id;?>);">Remove from Shortlist</span>
 