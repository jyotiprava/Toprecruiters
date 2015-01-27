<?php
include_once("function.php");
$sklid=$_GET['id'];
?>
<select class="textbox" onchange="return myfunction1edit(this.value)" >
    <option>--Choose Skill--</option>
    <?php
        echo "select * from `skill` where `slno` not in($sklid)";
	$qskill=mysql_query("select * from `skill` where `slno` not in($sklid)")or die(mysql_error());
	while($rskill=mysql_fetch_array($qskill))
	{
	?>
	<option value="<?=$rskill['slno'];?>"><?=$rskill['skill'];?></option>
    <?php } ?>
</select>