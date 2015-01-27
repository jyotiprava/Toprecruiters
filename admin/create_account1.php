<?php
include_once("../function.php");
is_admin();
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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="../style.css" type="text/css" rel="stylesheet"  />
<link href="../font.css" type="text/css" rel="stylesheet" media="screen"  />
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
<style type="text/css">
                    
                    h1 {font-size: 3em; margin: 20px 0;}
                    .container {width: 500px; margin: 10px auto;}
                    ul.tabs {
                        margin: 0;
                        padding: 0;
                        float: left;
                        list-style: none;
                        height: 32px;
                        border-bottom: 1px solid #999;
                        border-left: 1px solid #999;
                        width: 100%;
                    }
                    ul.tabs li {
                        float: left;
                        margin: 0;
                        padding: 0;
                        height: 31px;
                        line-height: 31px;
                        border: 1px solid #999;
                        border-left: none;
                        margin-bottom: -1px;
                        background: #e0e0e0;
                        overflow: hidden;
                        position: relative;
                    }
                    ul.tabs li a {
                        text-decoration: none;
                        color: #000;
                        display: block;
                        font-size: 1.2em;
                        padding: 0 20px;
                        border: 1px solid #fff;
                        outline: none;
                    }
                    ul.tabs li a:hover {
                        background: #ccc;
                    }	
                    html ul.tabs li.active, html ul.tabs li.active a:hover  {
                        background: #fff;
                        border-bottom: 1px solid #fff;
                    }
                    .tab_container {
                        border: 1px solid #999;
                        border-top: none;
                        clear: both;
                        float: left; 
                        width: 100%;
                        background: #fff;
                        -moz-border-radius-bottomright: 5px;
                        -khtml-border-radius-bottomright: 5px;
                        -webkit-border-bottom-right-radius: 5px;
                        -moz-border-radius-bottomleft: 5px;
                        -khtml-border-radius-bottomleft: 5px;
                        -webkit-border-bottom-left-radius: 5px;
                    }
                    .tab_content {
                        padding: 20px;
                        font-size: 1.2em;
                    }
                    .tab_content h2 {
                        font-weight: normal;
                        padding-bottom: 10px;
                        border-bottom: 1px dashed #ddd;
                        font-size: 1.8em;
                    }
                    .tab_content h3 a{
                        color: #254588;
                    }
                    .tab_content img {
                        float: left;
                        margin: 0 20px 20px 0;
                        border: 1px solid #ddd;
                        padding: 5px;
                    }
		    
div.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
	.new5{
	   color:#0221e6;
	   text-decoration: underline;
	}
                    </style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script  type='text/javascript'>
function validate()
{
 var fname=document.getElementById('empl_fname').value;
var emailid=document.getElementById('empl_email').value;
var password=document.getElementById('empl_password1').value;
var retypepassword=document.getElementById('empl_password2').value;
	if(fname==""){

		alert("Please Enter Your first Name");
		document.getElementById('empl_fname').focus();
		return false;
		

	}
	else if(emailid==""){

		alert("Please Enter Your emailaddress");
		document.getElementById('empl_email').focus();
		return false;

	}
	
	else if(password==""){

		alert("Please Enter Your password");
		document.getElementById('empl_password1').focus();
		return false;

	}
	else if(retypepassword!=password){

		alert("Password and Confirmpassword are mismatched");
		document.getElementById('empl_password2').focus();
		return false;

	}
	else
	{
	return true;
	}
}
</script>
<script  type='text/javascript'>
function validate1()
{
 var fnamee=document.getElementById('emplr_fname').value;
var emailidd=document.getElementById('emplr_email').value;
var passwordd=document.getElementById('emplr_password1').value;
var retypepasswordd=document.getElementById('emplr_password2').value;
	if(fnamee==""){

		alert("Please Enter Your first Name");
		document.getElementById('emplr_fname').focus();
		return false;
		

	}
	else if(emailidd==""){

		alert("Please Enter Your emailaddress");
		document.getElementById('emplr_email').focus();
		return false;

	}
	
	else if(passwordd==""){

		alert("Please Enter Your password");
		document.getElementById('emplr_password1').focus();
		return false;

	}
	else if(retypepasswordd!=passwordd){

		alert("Password and Confirmpassword are mismatched");
		document.getElementById('emplr_password2').focus();
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
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left" style="margin-top: 30px;">
				<h2 class="head3" style=" font-weight:normal; margin-top:0px; margin-bottom: 0px;">Create Employee</h2>
						<div id="remove_box" style="margin-top: 10px; height: auto;width:470px;">
                                <div class="removebox1" style="width:470px;">
								<?php
								if(isset($_GET['msg']))
								{
								if($_GET['msg']==""){
								}
								else{
								echo "<script>alert('".$_GET['msg']."')</script>";
								}
								}
								?>
							<form  name="registerform" action="insert_employee.php" method="post" onsubmit="return validate();">
                          
                            <table style="width:100%; height:auto; float:left; line-height:2.5; font-size:15px; font-weight:bold; margin-left:10px;">
						
                            		<tr>
                                    		<td>First Name</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="text" name="empl_fname" id="empl_fname" class="textbox"  autocomplete="off"/></td>
                                    </tr>
                             		<tr>
                                    		<td>Last Name</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="text" name="empl_lname" id="empl_lname" class="textbox"  autocomplete="off" /></td>
                                    </tr>
                             		<tr>
                                    		<td>Email Address</td>
                                    </tr>
                                    <tr>
                                    		<td> <input type="email" name="empl_email" id="empl_email" class="textbox"  autocomplete="off" /></td>
                                    </tr>
                             		<tr>
                                    		<td>Password</td>
                                    </tr>
                              		<tr>
                                    		<td> <input type="password" name="empl_password1" id="empl_password1" class="textbox"  autocomplete="off" maxlength="6" /></td>
                                    </tr>
                              		<tr>
                                    		<td>Confirm Password</td>
                                    </tr>
                              		<tr>
                                    		<td><input type="password" name="empl_password2" id="empl_password2" class="textbox"  autocomplete="off" maxlength="6" /></td>
                                    </tr>
                                    <tr>
                                    		<td><input type="submit" name="registerbtn"  value="Sign Up" class="btn"  style="margin-top:10px; margin-bottom:10px;" /></td>
                                    </tr>
									
                           </table>
                            
                           
							</form>
                                </div>
                        </div>
						                  
                </div>
                <div id="content2_right" style="margin-top: 30px;">
				<h2 class="head3" style=" font-weight:normal; margin-top:0px; margin-bottom: 0px;">Create Employer</h2>
                		<div id="remove_box" style="margin-top: 10px; height: auto; width:470px;">
                                <div class="removebox1" style="width:470px;">
									
									<form  name="registerform1" action="insert_employer.php" method="post" onsubmit="return validate1();">
								  
											<table style="width:100%; height:auto; float:left; line-height:2.5; font-size:15px; font-weight:bold; margin-left:10px;">
										
													<tr>
															<td>First Name</td>
													</tr>
													<tr>
															<td> <input type="text" name="emplr_fname" id="emplr_fname" class="textbox"  autocomplete="off" /></td>
													</tr>
													<tr>
															<td>Last Name</td>
													</tr>
													<tr>
															<td> <input type="text" name="emplr_lname" id="emplr_lname" class="textbox"  autocomplete="off" /></td>
													</tr>
													<tr>
															<td>Email Address</td>
													</tr>
													<tr>
															<td> <input type="email" name="emplr_email" id="emplr_email" class="textbox"  autocomplete="off" /></td>
													</tr>
													<tr>
															<td>Password</td>
													</tr>
													<tr>
															<td> <input type="password" name="emplr_password1" id="emplr_password1" class="textbox"  autocomplete="off" maxlength="6" /></td>
													</tr>
													<tr>
															<td>Confirm Password</td>
													</tr>
													<tr>
															<td><input type="password" name="emplr_password2" id="emplr_password2" class="textbox"  autocomplete="off" maxlength="6" /></td>
													</tr>
													<tr>
															<td><input type="submit" name="registerbtn1"  value="Sign Up" class="btn"  style="margin-top:10px; margin-bottom:10px;" /></td>
													</tr>
													
										   </table>
									</form>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!--------------------------content bar end----------------------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
</body>
</html>
