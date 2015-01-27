<?php
include_once("function.php");
$id=$_GET['id'];
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

<link href="style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link href="font.css" type="text/css" rel="stylesheet" media="screen"  />
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
<div id="content_bar">
		<div id="content_box">
        		<div id="content_left">
				       <?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
                		<form name="myform"  action="edit_testimonialaction.php" method="post" enctype="multipart/form-data">
                        <table class="table1" style="margin-top:25px;">
						          <?php
							    $fetch=mysql_query("select * from `testimonial` where `slno`='$id'");
							    $res=mysql_fetch_array($fetch);
							?>
                        		
                                <tr>
                                		<td>Personal Name</td>
                                        <td><input type="text" name="pname"  class="input"  value="<?php echo $res['personal_name'];?>"/>
					
					    <input type="hidden" name="hid" value="<?php echo $res['slno']; ?>"></td>
						
						
                                </tr>
								 <tr>
                                		<td>Company Name</td>
                                        <td><input type="text" name="cname" class="input"  value="<?php echo $res['company_name'];?>"/></td>
                                </tr>
                                <tr>
                                		<td>Designation</td>
                                        <td><input type="text" name="desgn"  class="input" value="<?php echo $res['designation'];?>"/></td>
                                </tr>
                                <tr>
                                		<td>Testimonial Current image</td>
                                        <td align="center"><img src="<?php echo $res['testimonialimage'];?>" width="70%" height="100"/>
					<input type="hidden" name="cimage" value="<?php echo $res['testimonialimage'];?>"/>
					</td>
                                </tr>
				<tr>
                                		<td>Testimonial New image</td>
                                        <td align="center"><input type="file" name="nimage" /></td>
                                </tr>
                                <tr>
                                		<td>Short Description</td>
                                        <td><textarea class="input"  name="area" style="height:100px; value=""><?php echo $res['shortdescription'];?></textarea></td>
                                </tr>
                              
								<tr>
                                		<td>&nbsp;</td>
                                        <td><input type="submit" name="submit" value="Update" height="40" width="100" style="margin-left:140px;"/></td>
                                </tr>
                                 
                        </table>
					</form>
						             
                </div>
                <div id="content_right">
                	<?php include_once("searchjob.php");?>
                                
                		<div id="right_box1">
                        		<div id="right_box2">
                                Top Recruiters is ready to help you with your staffing needs! Simply complete this form and a consultant will contact you to confirm your order. 
								<br />
                                <br />
                                Need help in filling up this form? Please contact us below:
								<br />
                                <br />
                                Phone: +60 12 722 5501<br />
                                Email: info@toprecruiters.com.my<br />
                                Add: 
                                </div>
                        </div>
                         <div id="testimonials">
                                		Testimonials <img src="images/icon1.png"  width="15"/>
                         </div>
                         <div class="right_textbox">
                         		<div class="right_text">
                                		"We are thankful for your prompt and effective service in sourcing for a suitable project manager for us."
                                        <br />
                                        <span>Dennis Lim, CEO, PDM International</span>
                                </div>
                                <div class="right_text">
                                		"We are thankful for your prompt and effective service in sourcing for a suitable project manager for us."
                                        <br />
                                        <span>Dennis Lim, CEO, PDM International</span>
                                </div>
                                <div class="right_text">
                                		"We are thankful for your prompt and effective service in sourcing for a suitable project manager for us."
                                        <br />
                                        <span>Dennis Lim, CEO, PDM International</span>
                                </div>
                         </div>
                         <div id="featured">
                                		Featured Employers <img src="images/icon1.png" width="15"  />
                         </div>
                         <div class="right_textbox2">
                         		<div class="right_img">
                                		<img src="images/img1.jpg"  />
                                </div>
                                <div class="right_img">
                                		<img src="images/img2.jpg"  />
                                </div>
                                <div class="right_img">
                                		<img src="images/img3.jpg"  />
                                </div>
                         </div>
                </div>
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
