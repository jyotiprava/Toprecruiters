<?php
include_once("function.php");
$cn=$_GET['cn'];
$qstate=mysql_query("select * from `states` where `country`='$cn'")or die(mysql_error());
?>
<select class="input" name="state" style="width:310px;">
<?php
while($rstate=mysql_fetch_array($qstate))
{
?>
<option value="<?=$rstate['state'];?>"><?=$rstate['state'];?></option>
<?php
}
?>
</select>