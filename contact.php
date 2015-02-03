<?php include_once("function.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></body>
</html>
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="style2.css" media="screen" rel="stylesheet" type="text/css" />
<link href="font.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">@font-face {
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
	    .contact{
		color:#797878 !important;
	    }
</style>
</head>
<body>
<!--------------------------header-----------------------><?php include_once("topbar.php");?><!--------------------------header end-----------------------><!--------------------------menu bar-----------------------><?php include_once("menubar.php");?><!--------------------------menu bar end-----------------------><!--------------------------content bar----------------------->
<div id="content_bar" style="color: #00FF99;">
<div id="content_box" style="color: #996600;">
<div class="content_leftbar" >
<div class="content_left">Contact Us</div>

<div class="content_left1">Agensi Pekerjaan Top Recruiters Sdn Bhd<br />
122 Jalan Permas 10, Bandar Baru Permas Jaya<br />
Johor Bahru Malaysia 81750<br />
<br />
Company Registration No.: 1114348-H<br />
<br />
Email: info@toprecruiters.com.my<br />
<br />
Phone: 017-2288 702<br />
 </div>
</div>

<div class="content_rightbar" >
<div class="content_right">Enquiry Form</div>

<div class="content_right1">*Denotes compulsory fields.
<form name="f" action="insert_contact.php" method="post">
<table>
	<tbody>
		<tr>
			<td>Title*</td>
			<td><input name="title" type="text" class="input"  /></td>
		</tr>
		<tr>
			<td>Name*</td>
			<td><input name="name" type="text" class="input" /></td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input name="company" type="text" class="input"/></td>
		</tr>
		<tr>
			<td>Email<span style="color: rgb(153, 102, 0); ">*</span></td>
			<td><input name="email" type="email" class="input"  /></td>
		</tr>
		<tr>
			<td>Contact no</td>
			<td><input name="contact" type="text" class="input"  /></td>
		</tr>
		<tr>
			<td>Subject<span style="color: rgb(153, 102, 0); ">*</span></td>
			<td><input name="subject"  type="text"  class="input" /></td>
		</tr>
		<tr>
			<td colspan="2">Where did you hear about us?</td>
		</tr>
		<tr>
			<td colspan="2">
			<input name="chk[]" type="checkbox" value="Google" />Google
			<input name="chk[]" type="checkbox" value="Yahoo" /> Yahoo!
			<input name="chk[]" type="checkbox" value="Business" /> Times Business Directory
			<input name="chk[]" type="checkbox" value="Yellow" />Yellow Pages
			</td>
		</tr>
		<tr>
			<td>Others</td>
			<td><input name="other" type="text" class="input" /></td>
		</tr>
		<tr>
			<td>Your Messages*</td>
			<td><textarea class="input" style="height: 100px;" name="message"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td ><input  type="reset" value="Clear" /><input name="submit" type="submit" value="Submit" /></td>
		</tr>
		
	</tbody>
</table>
</form>
</div>
</div>
</div>
</div>
<!--------------------------content bar end-----------------------><!--------------------------footer bar-----------------------><?php 
include_once("footer1.php");
?><!--------------------------footer bar end----------------------->