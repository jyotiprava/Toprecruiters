<?php
include_once("../function.php");
is_admin();
if(isset($_SESSION['username']))
{
$uerid=$_SESSION['username'];
}
else
{
$uerid=$_SESSION['user'];
}
$status='';
if(isset($_POST['Submit']))
{
	
	if($_POST['newpwd']=="")
	{
	$status="<span style='margin-top:0px; color:red; font-size:14px; margin-left:20px;'>New Password Cannot Be Blank.</span>";
	
	}
	
	else
	{
	$oldpwd=md5(htmlentities($_POST['oldpwd'],ENT_QUOTES));
	$qwery=mysql_query("select * from `admin` where `username`='$uerid' and `password`='$oldpwd' and (`status`='1' or '2')")or die(mysql_error());
	if(mysql_num_rows($qwery)>0)
	{
	$newpwd=md5(htmlentities($_POST['newpwd'],ENT_QUOTES));
	$que=mysql_query("UPDATE `admin` SET `password`='$newpwd' WHERE `username`='$uerid' and (`status`='1' or '2')");
    	if($que)
	{
	$msg="Password Changed Successfully";
	header("location:index.php?mess=$msg");
	//$status="<span style='margin-top:0px; color:#5FBE5F; font-size:14px; margin-left:20px;'>Password Changed Successfully.</span>";
	}
	}
	else
	{
		$status="<span style='margin-top:0px; color:red; font-size:14px; margin-left:20px;'>Current Password is Wrong</span>";
	
	}
	
	
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--menu start-->
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type='text/javascript' src='js1/jquery.cookie.js'></script>
<script type='text/javascript' src='js1/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js1/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript">
$(document).ready(function($){
					$('#accordion-5').dcAccordion({
						eventType: 'hover',
						autoClose: false,
						saveState: true,
						disableLink: true,
						menuClose: true,
						speed: 'fast',
						showCount: true
					});
					
});
</script>
<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
 
 <!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
                                    <?php //include_once('conleft_bar.php');?>
				</div>
				<div id="right_box" >
						<?php include_once("header.php");?>
						<div id="content1">
								<div class="head2">
										Change Password
								</div>
								<div id="content2" style="min-height:350px;">
									
									<form  name="frm" action="#" method="post">
										<table style="width:100%; font-size:15px; font-weight:bold; line-height:2.5;">   
										<tr>
										<td>Emailid</td>
										<td><input type="text" name="username" value="<?php echo $uerid;?>" class="form" readonly/></td>
										</tr>
										 <tr>
											<td>Old Password </td> 
											<td><input type="password" name="oldpwd" class="form"/></td>
										  </tr>   
										  <tr>
											<td>New Password </td> 
											<td><input type="password" name="newpwd" class="form"/></td>
										  </tr>
										  <tr> 
											<td>&nbsp;</td>
											<td ><input type="submit" name="Submit" value="Save Changes"  class="button" style="width:100px;"/></td>
											
										  </tr>
										</table>
									</form>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
</body>
</html>
