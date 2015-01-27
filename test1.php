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

h3{ margin-bottom:0px; margin-top:0px;}
#content_left .text2{ font-size:15px;}
#content_left p{ font-size:16px; margin-bottom:0px; margin-top:10px; color:#3b3a3a;}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
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
	if(isset($_GET['mess']))
	{
		?>
		alert('<?=$_GET['mess'];?>');
		<?php
	}
	?>
</script>
<style>
.pagination{ width:400px; height:auto; float:left; margin-left:10px;}
.pagination a{ text-decoration:none; color:#2075e2;}
</style>
<!-- Skitter Styles -->
	<link href="css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>
	
	<!-- Init Skitter -->
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers:false,
				progressbar: false,
				width_skitter: 980,

				dots: false, 
				preview: true
			});
		});
		
		
		function getshlist(jobid)
		{
		    $.ajax({url:"ajax_jobshlist.php?jobid="+jobid,
			   success:function(results)
			   {
			    if (results.trim()=='OK') {
			    alert('Successfully Updated');
			    location.reload();
			    }
			   }
		    });
		}
		function getsubjob(jobval)
		{
		 $.ajax({url:"sub_specialize.php?jobidval="+jobval,
			   success:function(results)
			   {
			    $('#subid').html(results);
			    }
			   });
		}
	</script>
</head>
<body>
<!--------------------------header-----------------------> <!--?php include_once("topbar.php");?--> <!--------------------------header end-----------------------> <!--------------------------menu bar-----------------------> <!--?php include_once("menubar.php");?--> <!--------------------------menu bar end----------------------->
<div id="top_textbar">
<div id="top_textbox">
<div class="top_text">
<div class="top_text2">
<div class="top_text2left">
<h2 class="head3" style="font-size: 36px;">Whatever you're looking for,we've got it. its working</h2>
</div>
<div class="top_text2right">
<div class="but1"><img style="float: left; margin-top: 5px;" src="images/l1.png" alt="" /> Submit Request <br /> For Employees</div>
<div class="but2" style="margin-left: 15px;"><img style="float: left; margin-top: 5px;" src="images/l2.png" alt="" /> Sign Up <br /> For Jobs</div>
</div>
<div style="width: 100%; height: auto; float: left;">
<p class="text" style="width: 100%; margin-top: 10px; color: #333; font-size: 30px;">At the heart of our service is our talent bank of over 200,000 candidates . Selected from over numerous applicants,these individuals represents a diverse and highly exprienced resource for companies facing a need for talent. Our permanent requirement service delivers senior managers and office exacutive(S$1k to $10K monthly incomposition)- selected for their specific experience and skills, in virtually every functional and professional discipline.</p>
</div>
</div>
</div>
</div>
</div>
<!---------------------banner-------------> <!--?php include_once("bannersearch.php");?--> <!----------------------banner------------> <!--------------------------content bar-----------------------> <!--?php include_once("homepagination.php");?-->
<div id="content_bar">
<div id="content_box">
<div id="content_left" style="width: 690px; margin-top: 20px; font-family: 'Conv_estre'; font-size: 20px;">
<div style="width: 100%; height: auto; float: left;">
<div style="width: 100%; height: auto; float: left;">
<h2 class="head3" style="font-family: 'DaunPenhRegular'; margin-top: 0px; margin-bottom: 0px; font-size: 40px;"><span style="float: left;">Featured Jobs</span> <span style="float: right;"> <img style="float: right;" src="images/sh2.jpg" alt="" /><img style="float: right;" src="images/sh.jpg" alt="" /><img style="float: right;" src="images/s.jpg" alt="" /> </span></h2>
</div>
<div style="width: 350px; height: auto; float: left;"> </div>
</div>
<!--?php 
		if(isset($_SESSION['userid']))
					{
					    ?-->
<div class="text2" style="width: 100%; height: auto; float: left; font-size: 20px; text-align: right; margin-top: 0px; margin-bottom: 8px;"><a style="color: #594aed;" href="rvwmyshortlist.php">Review My Shortlist</a></div>
<!--?php 
					}
					?-->
<div style="width: 100%; height: auto; float: left; padding-top: 7px; padding-bottom: 5px; border-top: 1px dotted #ccc; border-bottom: 1px dotted #ccc;"><span class="text" style="padding-bottom: 0px; font-size: 14px; font-family: Arial, Helvetica, sans-serif; float: left;">Result Page</span></div>
<div id="content_right" style="width: 300px;"><!--?php //include_once("searchjob.php");?-->
<div id="right_box1" style="display: none;"> </div>
<div id="testimonials" style="width: 280px; margin-top: 20px;">Insight <img src="images/icon1.png" alt="" width="15" /></div>
<div class="right_textbox" style="height: 650px; width: 290px;">
<h1 class="head3" style="color: #1e81c5; font-size: 40px; text-align: right; line-height: 0.7;"><img src="images/img4.png" alt="" /> <br /> Salary Report</h1>
<!--?php 
						 $sqltest=mysql_query("select * from `testimonial`");
						 while($restest=mysql_fetch_array($sqltest)){
						 ?-->
<div class="right_text" style="color: #828282; padding-top: 0px;">
<p class="text" style="text-align: right; color: #5a5a5a; margin-top: 10px; margin-bottom: 0px; font-size: 25px; font-weight: bold;">JobStreet Salary Report 2014</p>
<!--"We are thankful for your prompt and effective service in sourcing for a suitable project manager for us."--> <!--?php echo html_entity_decode($restest['shortdescription']);?--> <br /> <img src="images/icon10.png" alt="" /></div>
<!--?php 
						}
						?--></div>
<div id="featured" style="display: none;">Featured Employers <img src="images/icon1.png" alt="" width="15" /></div>
<div class="right_textbox2" style="display: none;"><!--?php 
						 $sqllogo=mysql_query("select * from `alljob`");
						 while($reslogo=mysql_fetch_array($sqllogo)){
						 ?-->
<div class="right_img"><img src="admin/<?php echo $reslogo['logo'];?>" alt="" /></div>
<!--?php 
						}
						?--></div>
</div>
</div>
</div>
<div id="content4_bar" style="margin-top: 20px;">
<div id="content4_box">
<div class="content4box1" style="margin-left: 0px;">
<div class="content4_imgbox"><img style="width: 100%; margin-top: -50px;" src="images/jobimg1.png" alt="" /></div>
<div class="content4_headtext">#1 in Providing Staffing Solution</div>
<div class="content4_text">
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Permanent Recruitment</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Provide a high-quality,professional recruitment service in all markets where we specialise</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Contract Administration</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Manages and administers projects on behalf of companies that require personnel for short term contracts of 3 months to a 2 year contract term.</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Temporary Staffing</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Effectively replace a staff member's absence from the work place.</div>
</div>
</div>
<div class="content4box1">
<div class="content4_imgbox" style="background: none;"><img style="width: 100%;" src="images/why.jpg" alt="" /></div>
<div class="content4_headtext">Why Choose Us?</div>
<div class="content4_text">
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Permanent Recruitment</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Provide a high-quality,professional recruitment service in all markets where we specialise</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Contract Administration</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Manages and administers projects on behalf of companies that require personnel for short term contracts of 3 months to a 2 year contract term.</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Temporary Staffing</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Effectively replace a staff member's absence from the work place.</div>
</div>
</div>
<div class="content4box1">
<div class="content4_imgbox" style="background: none;"><img style="width: 100%;" src="images/staffing.jpeg" alt="" /></div>
<div class="content4_headtext">#1 in Providing Staffing Solution</div>
<div class="content4_text">
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Permanent Recruitment</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Provide a high-quality,professional recruitment service in all markets where we specialise</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Contract Administration</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Manages and administers projects on behalf of companies that require personnel for short term contracts of 3 months to a 2 year contract term.</div>
<p class="text" style="margin-bottom: 0px;"><span style="font-size: 28px; color: #444; font-weight: bold;"> - Temporary Staffing</span></p>
<div class="text" style="padding-left: 15px; font-size: 25px; color: #666; height: auto;">Effectively replace a staff member's absence from the work place.</div>
</div>
</div>
</div>
</div>
<!--------------------------content bar end-----------------------> <!--?php include_once("footer1.php");?--></div>
</body>
</html>