<?php
include_once("function.php");
$status='';
//$newpass=md5(htmlentities($_POST['newpwd'],ENT_QUOTES));
if(isset($_POST['Submit']))
{
	
	if($_POST['newpwd']=="")
	{
	$status="<span style='margin-top:0px; color:red; font-size:14px; margin-left:20px;'>New Password Cannot Be Blank.</span>";
	
	}
	
	else
	{
	$oldpwd=md5(htmlentities($_POST['oldpwd'],ENT_QUOTES));
	$qwery=mysql_query("select * from `user_detail` where `emailid`='$_SESSION[employer_id]' and `password`='$oldpwd' and `is_employer`='1'")or die(mysql_error());
	if(mysql_num_rows($qwery)>0)
	{
	$newpwd=md5(htmlentities($_POST['newpwd'],ENT_QUOTES));
	$que=mysql_query("UPDATE `user_detail` SET `password`='$newpwd' WHERE `emailid`='$_SESSION[employer_id]' and `is_employer`='1'");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<link href="style.css" type="text/css" rel="stylesheet"  />
<link href="font.css" type="text/css" rel="stylesheet" media="screen"  />

<script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="formslider.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
<style>
@font-face {
    font-family: 'EstrangeloEdessaRegular';
    src: url('font/estrangeloedessa.eot');
    src: url('font/estrangeloedessa.eot') format('embedded-opentype'),
         url('font/estrangeloedessa.woff2') format('woff2'),
         url('font/estrangeloedessa.woff') format('woff'),
         url('font/estrangeloedessa.ttf') format('truetype'),
         url('font/estrangeloedessa.svg#EstrangeloEdessaRegular') format('svg');
}
</style>

<style>
	    .changepwd{
		color:#797878 !important;
	    }
</style>
</head>
<body>
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->

<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content_bar" >
		<div id="content_box">
        		 <div id="w">	
                        <div id="page" style="padding-bottom:20px;">
                          <div id="content-login">
                            <h2>Change Password</h2>
                            <div class="content">
							<?php echo  $status;?>
                              <form id="login" name="login" action="#" method="post">
								<table style="width:100%; font-size:15px; font-weight:bold; line-height:2.5;">
				
   
<tr>
<td>Emailid</td>
<td><input type="text" name="username" value="<?php echo $_SESSION['employer_id'];?>" class="textbox"/></td>
</tr>
 <tr>
    <td>Old Password </td> 
    <td><input type="password" name="oldpwd" class="textbox"/></td>
  </tr>   
  <tr>
    <td>New Password </td> 
    <td><input type="password" name="newpwd" class="textbox"/></td>
  </tr>
  <tr> 
  	<td>&nbsp;</td>
    <td ><input type="submit" name="Submit" value="Save Changes"  class="button" style="width:100px;"/></td>
    
  </tr>
				</table>
                              </form>
                             
                            </div>
                          </div><!-- /end #content-login -->

                            </div><!-- /end #page -->
                          </div><!-- /end #w -->
        </div>
</div>
<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<div id="footer_bar" >
		<div id="footer_box">
        		<div id="footer_left">
                		<ul class="footer_list">
                        		<li style="font-size:30px; color:#000;">Contact Me</li>
                                <li>Tel: 123-456-7890</li>
                                <li>info@mysite.com</li>
                                <li>&nbsp;</li>
                                <li><img src="images/f.jpg" style="margin-right:5px;"/><img src="images/g.jpg" style=" margin-right:5px;"/><img src="images/in.jpg"  style=" margin-right:5px;" /><img src="images/t.jpg" /></li>
                                <li>&nbsp;</li>
                                <li style="font-size:18px;"> &copy Copyright All Rights Reserved 2014 by Kriti Technology</li>
                        </ul>
                </div>
                <div id="footer_right">
                		<table style="width:100%; font-family: 'SourceSansPro-Regular';">
                        		<tr>
                                		<td><input type="text" name="" value="Name" class="input2"  /></td>
                                        <td rowspan="3"><textarea class="input2" style="height:100px;">Message</textarea></td>
                                </tr>
                                <tr>
                                		<td><input type="text" name="" value="Email" class="input2"  /></td>
                                        
                                </tr>
                                <tr>
                                		<td><input type="text" name="" value="Subject" class="input2"  /></td>

                                </tr>
				<tr>
					<td></td>
					<td style="float: right;"><input type="submit" class="button" value="Send"  /></td>
				</tr>
                        </table>
                </div>
                
        </div>
</div>
<!--------------------------footer bar end----------------------->
</body>
</html>
