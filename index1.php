<?php include_once("function.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></body>
</html>
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
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

h3{ margin-bottom:0px; margin-top:0px;}
#content_left .text2{ font-size:15px;}
#content_left p{ font-size:16px; margin-bottom:0px; margin-top:10px; color: #666;}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script><script type="text/javascript">
	function getstate(cn)
	{
		$('#loading').show();
		$.ajax({url:"fetch_detail.php?cn="+cn,
		       success:function(result){
				$('#state').html(result);
				$('#loading').hide();
		       }
		       });
	}
	<?php
	if(isset($_GET['msg']))
	{
		?>
		alert('<?=$_GET['msg'];?>');
		<?php
	}
	?>
</script><!--------------------------header-----------------------><?php include_once("topbar.php");?><!--------------------------header end-----------------------><!--------------------------menu bar-----------------------><?php include_once("menubar.php");?><!--------------------------menu bar end-----------------------><!--------------------------content bar----------------------->
<div id="content_bar">
<div id="content_box">
<div id="content_left" style="margin-top:20px; font-family: 'Conv_estre'; font-size:20px;">
<h2 class="head3" style="margin-top:0px; margin-bottom:0px; color: #222;">Let us Provide a Solution to your Human Resource Challenges</h2>
<?php
                                                
                                 if(isset($_GET['msg']))
                                {
                                $mess=$_GET['msg'];
                                  echo "<span style='font-family:arial; color:red; margin-left:20px;'-->".$mess.""; } ?>

				  
<p class="head3" style="color: #666;margin-top:20px; font-size:15px; font-weight:normal; margin-top:0px;">Employers, are you looking to recruit or improve your talent strategy? Please fill out the form below to schedule a conversation about your recruiting or talent management goals. Alternatively you can find a Top Recruiters contact to speak to directly.</p>

<p class="head3" style="color: #666;margin-top:20px; font-size:15px; font-weight:normal; margin-top:0px;"><br />
If you are a candidate, please have a look through our jobs or find a Top Recruiters contact to get in touch with.</p>

<p class="head3" style="color: #666;margin-top:20px; font-size:15px; font-weight:normal; margin-top:0px;"> </p>

<h3 class="head3" style="margin-bottom:0px; color: #222; margin-top:8px;">Staff Request</h3>

<form action="staff_request.php" method="post">
<table class="table1" style="color: #666;">
	<tbody>
		<tr>
			<td colspan="2" style="color:#c50000;">* Indicates required field</td>
		</tr>
		<tr>
			<td>Name <span>*</span></td>
			<td><input class="input" name="name" required="required" type="text" /></td>
		</tr>
		<tr>
			<td>Designation <span>*</span></td>
			<td><input class="input" name="description" required="required" type="text" /></td>
		</tr>
		<tr>
			<td>Company <span>*</span></td>
			<td><input class="input" name="company" required="required" type="text" /></td>
		</tr>
		<tr>
			<td>Office No <span>*</span></td>
			<td><input class="input" name="officeno" required="required" type="text" /></td>
		</tr>
		<tr>
			<td>Mobile No</td>
			<td><input class="input" name="mobile" type="text" /></td>
		</tr>
		<tr>
			<td>Email <span>*</span></td>
			<td><input class="input" name="email" required="required" type="email" /></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input class="input" name="address" type="text" /></td>
		</tr>
		<tr>
			<td>Country <span>*</span></td>
			<td><select class="input" name="country" onchange="return getstate(this.value);" required="required" style="width:310px;"><option>Select</option><option value="Malaysia">Malaysia</option><option value="Singapore">Singapore</option> </select></td>
		</tr>
		<tr>
			<td>State <span>*</span> <img id="loading" src="images/ajax-loader.gif" style="display: none;" /></td>
			<td id="state"> </td>
		</tr>
		<tr>
			<td>City</td>
			<td><input class="input" name="city" type="text" /></td>
		</tr>
		<tr>
			<td>Company Website</td>
			<td><input class="input" name="company_website" type="text" /></td>
		</tr>
		<tr>
			<td>Company Industry</td>
			<td><input class="input" name="company_industry" type="text" /></td>
		</tr>
		<tr>
			<td>Position Title</td>
			<td><input class="input" name="position_title" style="width:260px; float:left; margin-left:60px;" /> <input name="" style="float:right;" type="button" value="+" /></td>
		</tr>
		<tr>
			<td>Position Description</td>
			<td><textarea class="input" name="position_desc" style="height: 100px; margin: 0px; width: 342px;"></textarea></td>
		</tr>
		<tr>
			<td>How do you hear about us?</td>
			<td> </td>
		</tr>
		<tr>
			<td>Choose one</td>
			<td><select class="input" name="hear_about" style="width:310px;"><option value="">--Select--</option><option value="Google">Google</option><option value="Yahoo!">Yahoo!</option><option value="ACHIEVE Website">ACHIEVE Website</option><option value="JCG Website">JCG Website</option><option value="JobsDB">JobsDB</option><option value="JobStreet">JobStreet</option><option value="Monster">Monster</option><option value="Yellowpages.com.sg">Yellowpages.com.sg</option><option value="Kompass.com">Kompass.com</option><option value="Social Media">Social Media</option><option value="Newspaper">Newspaper</option><option value="Magazines">Magazines</option><option value="Events">Events</option><option value="Word of Mouth">Word of Mouth</option><option value="News">News</option><option value="Others">Others</option> </select></td>
		</tr>
		<tr>
			<td>Remarks</td>
			<td><textarea class="input" name="remark" style="height: 100px; margin-left: 0px; margin-right: 0px; width: 342px;"></textarea></td>
		</tr>
		<tr>
			<td> </td>
			<td align="right"><input class="button3" style="margin-left:58px;" type="submit" value="submit" /></td>
		</tr>
	</tbody>
</table>
</form>
</div>

<div id="content_right">
<div id="right_box1">
<div id="right_box2"><?php
                        $qwery=mysql_query("select * from `rightbox_content`")or die(mysql_error());
                        $res=mysql_fetch_array($qwery);
                        echo htmlspecialchars_decode($res[content]);
                        ?></div>
</div>

<div id="testimonials" style="display: none;">Testimonials <img src="images/icon1.png" width="15" /></div>

<div class="right_textbox" style="display: none;"><?php
						 $sqltest=mysql_query("select * from `testimonial`");
						 while($restest=mysql_fetch_array($sqltest)){
						 ?>
<div class="right_text"><!--"We are thankful for your prompt and effective service in sourcing for a suitable project manager for us."--><?php echo html_entity_decode($restest['shortdescription']);?><br />
<span><!--Dennis Lim, CEO, PDM International--> <?php echo $restest['personal_name'].",".$restest['designation'].",".$restest['company_name'];?> </span></div>
<?php
						}
						?></div>

<div id="featured">Featured Employers <img src="images/icon1.png" width="15" /></div>

<div class="right_textbox2" ><?php
						 $sqllogo=mysql_query("select * from `feautred_emplyer`");
						 while($reslogo=mysql_fetch_array($sqllogo)){
						 ?>
<div class="right_img"><img src="admin/<?=$reslogo['image'];?>" style="width: 170px;height: auto;"/></div>
<?php
						}
						?><!--<div class="right_img">
                                		<img src="images/img1.jpg"  />
                                </div>
                                <div class="right_img">
                                		<img src="images/img2.jpg"  />
                                </div>
                                <div class="right_img">
                                		<img src="images/img3.jpg"  />
                                </div>--></div>
</div>
</div>
</div>
<!--------------------------content bar end-----------------------><!--------------------------footer bar-----------------------><?php 
include_once("footer1.php");
?><!--------------------------footer bar end----------------------->