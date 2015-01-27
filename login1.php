<?php
include_once("function.php");
if(isset($_POST['loginbtn'])){
$user=htmlentities($_POST['email'],ENT_QUOTES);
$pwd=md5(htmlentities($_POST['password'],ENT_QUOTES));
$res=mysql_query("select * from `user_detail` where `emailid`='$user' and `password`='$pwd' and `is_employer`='1'");
$no=mysql_num_rows($res);
if($no>0){
 $fetch=mysql_fetch_array($res);
 if($fetch['status']==1)
 {
  $_SESSION['employer_idval']=$fetch['slno'];
  $_SESSION['employer_id']=$user;
  $_SESSION['employer_pass']=$pwd;
  $_SESSION['employer_name']=$fetch['first_name'].' '.$fetch['last_name'];

header("location:alljob.php");
 }
 else
 {
    $msg="Please verify your account";
header("location:login1.php?mess=$msg");
 }
}
else{
$msg="wrong username or password";
header("location:login1.php?mess=$msg");
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
<script  type='text/javascript'>
function validate()
{
 var fname=document.getElementById('fname').value;
var emailid=document.getElementById('newemail').value;
var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
var password=document.getElementById('password1').value;
var retypepassword=document.getElementById('password2').value;
	if(fname==""){

		alert("Please Enter Your first Name");
		document.getElementById('fname').focus();
		return false;
		

	}
	else if(emailid==""){

		alert("Please Enter Your emailaddress");
		document.getElementById('newemail').focus();
		return false;

	}
	
	else if(!emailid.match(format))

	{

	alert("You have entered an wrong email address!"); 
	document.getElementById('newemail').focus();
	return false;
    

	}
	else if(password==""){

		alert("Please Enter Your password");
		document.getElementById('password1').focus();
		return false;

	}
	else if(retypepassword!=password){

		alert("Password and Confirmpassword are mismatched");
		document.getElementById('password2').focus();
		return false;

	}
	else
	{
	return true;
	}
}
</script>
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
                            <h2>Employer Login</h2>
                            <div class="content">
							<?php
							if(isset($_GET['mess']))
							{
							$messg=$_GET['mess'];
							echo "<h3 style='margin-top:0px; color:#5FBE5F;'>".$messg."</h3>";
							}
							if(isset($_GET['msg']))
							{
							    echo "<h3 style='color:red;'>".$_GET['msg']."</span>";
							}
							?>
                              <a href="#" class="slidelink" id="showregister">Don't Have An Account? &rarr;</a>
                              <form id="login" name="login" action="#" method="post">
                            <table style="width:100%; font-size:15px; font-weight:bold; line-height:2.5;">
                            		<tr>
                                    		<td>
                                            		Email Address
                                            </td>
                                     </tr>
                                     <tr>
                                     		<td> <input type="email" name="email" id="email" class="textbox" tabindex="1" autocomplete="off" required></td>
                                     </tr>
				     
                                      <tr>
                                     		<td> Password</td>
                                     </tr>
                                     <tr>
                                     		<td> <input type="password" name="password" id="password" class="textbox" tabindex="2" autocomplete="off" required maxlength="6"></td>
                                     </tr>
                                      <tr>
                                     		<td> <!--<a href="requestpage1.htm" >--><input type="submit" name="loginbtn" id="loginbtn" value="Login" class="btn" tabindex="3" style="margin-top:10px;"><!-- </a>-->
										<a href="forgotpassword.php" class="slidelink" id="showregister" style="font-size:12px;">Forgot Password</a></td>
                                     </tr>
                                     
                                </table>
                              </form>
                             
                            </div>
                          </div><!-- /end #content-login -->
                          
                          
                          <div id="content-register">
                            <h2>Register a New Account</h2>
							
								<form  name="registerform" action="insert_register1.php" method="post" onsubmit="return validate();">
                            <div class="content">
                            <a href="#" class="leftsidelink" id="showlogin">&larr; Already Have an Account? Login Now!</a>
                            
                            <table style="width:100%; height:auto; float:left; line-height:2.5; font-size:15px; font-weight:bold;">
						
                            		<tr>
                                    		<td>First Name</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="text" name="fname" id="fname" class="textbox"  autocomplete="off" /></td>
                                    </tr>
                             		<tr>
                                    		<td>Last Name</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="text" name="lname" id="lname" class="textbox"  autocomplete="off" /></td>
                                    </tr>
                             		<tr>
                                    		<td>Email Address</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="email" name="newemail" id="newemail" class="textbox"  autocomplete="off" /></td>
                                    </tr>
				    <tr>
                                    		<td>
                                            	     Contact Number
                                            </td>
                                     </tr>
                                     <tr>
                                     		<td> <input type="text" name="contact" id="contact" class="textbox" tabindex="1" autocomplete="off" required></td>
                                     </tr>
                             		<tr>
                                    		<td>Password</td>
                                    </tr>
                              		<tr>
                                    		<td> <input type="password" name="password1" id="password1" class="textbox"  autocomplete="off" maxlength="6"/></td>
                                    </tr>
                              		<tr>
                                    		<td>Confirm Password</td>
                                    </tr>
                              		<tr>
                                    		<td><input type="password" name="password2" id="password2" class="textbox"  autocomplete="off" maxlength="6"/></td>
                                    </tr>
                                    <tr>
                                    		<td><input type="submit" name="registerbtn"  value="Sign Up" class="btn"  style="margin-top:10px; margin-bottom:10px;" /></td>
                                    </tr>
									
                           </table>
                            
                            </div>
							</form>
                          </div><!-- /end #content-register -->
                        </div><!-- /end #page -->
                      </div><!-- /end #w -->
        </div>
</div>
<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php
include_once("footer.php");
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
