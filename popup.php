<?php 
include_once("function.php");
$mail=$_GET['eval'];
?>
<!-- Popup-->
<div id="myModal" class="reveal-modal" style="background:#f3f3f3; top:120px;">
<div style="background:#fff; width:97%; float:left; padding:5px;">

<div class="popup">

<form name="myform" method="post" action="send_msg.php" >

<table>
<tr>
<td>Email:</td>
<td><input type="text" name="email" class="form rad"  style="width: 200px" id="email" value="<?php echo $mail; ?>"/></td>
</tr>
<tr>
<td>Message:</td>
<td><textarea name="message" class="form rad" style="width: 200px;" id="cont"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="post" value="SEND" class="button2" style="width:70px;"/></td>
</tr>
</table>
</form>

</div>

</div>

</div>
<!-- /Popup-->