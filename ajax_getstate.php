<?php
include_once("function.php");

$country=$_GET['country'];

?>
<td class="righttext">State :</td>
<td>
<select class="input" name="statew[]" required>
<optgroup>
<?php
$sqlcountry=mysql_query("select * from `location` where `countryid`='$country'");
while($rescountry=mysql_fetch_array($sqlcountry))
{
$slno=$rescountry['slno'];
$pos = strpos($rescountry['location'], "Any");
if($pos === false)
{
$loc=$rescountry['location'];
?>
<option value="<?=$slno;?>"><?=$loc;?></option>
<?php
}
else
{
	$loc=$rescountry['location'];
        ?>
</optgroup><optgroup label="<?=$rescountry['location'];?>">
<?php
}
}
?>
</select>
</td>  