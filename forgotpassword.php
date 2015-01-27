<?php
include_once("function.php");
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
                            <h2>Forgot Password</h2>
                            <div class="content">
                              <form id="login" name="login" action="mail.php" method="post">
                            <table style="width:100%; font-size:15px; font-weight:bold; line-height:2.5;">
                            		<tr>
                                    		<td>
                                            		Email Address 
                                            </td>
                                     </tr>
                                     <tr>
                                     		<td> <input type="email" name="email" id="email" class="textbox" tabindex="1" autocomplete="off"></td>
                                     </tr>
                                      
                                      <tr>
                                     		<td> <input type="submit" name="loginbtn" id="loginbtn" value="Send" class="btn" tabindex="3" style="margin-top:10px;"></td>
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
<?php
include_once("footer.php");
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
