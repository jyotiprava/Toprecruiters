<?php include_once("function.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
#content_left p{ font-size:16px; margin-bottom:0px; margin-top:10px; color:#3b3a3a;}
.searchbox{
       width:250px; height: 350px; float: left; margin-left: 10px; position: absolute; z-index:999;background: #4778bd;
  background-image: -moz-linear-gradient(left top,#4778bb 0%,#1c304b 100%);
  background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#4778bb),color-stop(1,#1c304b));
  background: -webkit-linear-gradient(left top,#4778bb 0%,#1c304b 100%);
  background: -o-linear-gradient(left top,#4778bb 0%,#1c304b 100%);
  background: -ms-linear-gradient(left top,#4778bb 0%,#1c304b 100%);
  background: linear-gradient(left top,#4778bb 0%,#1c304b 100%);
  -pie-background: linear-gradient(#4778bb,#1c304b);-webkit-box-shadow: 22px 8px 2px -9px rgba(0,0,0,0.3);
  -moz-box-shadow: 22px 8px 2px -9px rgba(0,0,0,0.3);
  box-shadow: 22px 8px 2px -9px rgba(0,0,0,0.3);
}
.search{
       background: #d68400;
  background: -webkit-gradient(linear,left top,left 100%,from(#f29707),to(#d68400));
  background: -webkit-linear-gradient(top,#f29707 0,#d68400 100%);
  background: -moz-linear-gradient(top,#f29707 0,#d68400 100%);
  background: -ms-linear-gradient(top,#f29707 0,#d68400 100%);
  background: -o-linear-gradient(top,#f29707 0,#d68400 100%);
  background: linear-gradient(top,#f29707 0,#d68400 100%);
   color: #fff !important;
  cursor: pointer;
  padding: 7px;
  border: 3px solid #f7ac34;
  font-size: 12px;
  -webkit-box-shadow: 0 0 0 #595454;
  -moz-box-shadow: 0 0 0 #595454;
  box-shadow: 0 0 0 #595454;
  border-radius:4px;
  -moz-border-radius:4px;
}
.cvheading {
  font-weight: 400;
  font-size: 15px !important;
  color: #fff;
  background-color: #30588e;
  padding: 7px 38px 7px 20px;
  margin-bottom: 10px;
  display: block;
  width: 200px;
  box-shadow: 1px 2px 2px rgba(50,50,50,0.75);
  position: relative;
  margin-top: 15px;
  z-index: 1001;
}
.cvheading:before {
  font-weight: 400;
  font-size: 15px !important;
  padding-right: 5px;
}
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
</script><!-- Skitter Styles -->
	<link href="css/skitter.styles.css" media="all" rel="stylesheet" type="text/css" /><script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script><script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script><!-- Init Skitter --><script type="text/javascript" language="javascript">
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
	</script>
	<!----------facebook share button-------->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
 <!----------facebook share button--------> 
 
 <!----------google plus share button-------->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<!----------google plus  share button-------->
<style>
	    .request{
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
<div id="top_textbar">
<div id="top_textbox">
<div class="top_text">
<div class="top_text2">
<div class="top_text2left">
<h2 class="head3" style="font-size:36px;">Whatever you're looking for, we've got it.</h2>
</div>

<div class="top_text2right">
<div class="but1"><a href="index1.php" style="text-decoration: none;color: #fff;"><img src="images/l1.png" style="float:left; margin-top:5px;" /> Submit Request<br />
For Employees </a></div>

<div class="but2" style="margin-left:15px;"><a href="signup.php" style="text-decoration: none;color: #fff;"><img src="images/l2.png" style="float:left; margin-top:5px;" /> Sign Up<br />
For Jobs </a></div>
</div>

<div style="width:100%; height:auto; float:left;">
<p class="text" style="width:100%; margin-top:10px; margin-bottom:15px;">At the heart of our service is our talent bank of over 200,000 candidates. Selected from over numerous applicants, these individuals represent a diverse and highly experienced resource for companies facing a need for talent. Our permanent recruitment service delivers senior managers and office executives (RM2k to RM10k monthly income positions) &ndash; selected for their specific experience and skills, in virtually every functional and professional discipline. </p>
</div>
</div>
</div>
</div>
</div>
<?php include_once('bannersearch.php')?><!--------------------------content bar----------------------->

<div id="content_bar" style="margin-top:20px;">
<div id="content_box">
<div class="left_menu">
<div class="left_menu1">
<div class="left_menuhead2"><img src="images/img.png" style="float:left; margin-top:0px; margin-right:5px;" /> Request a callback<img src="images/list3.png" style="float:right; margin-top:3px;" /></div>

<div class="left_menuhead2"><img src="images/imgg.png" style="float:left; margin-top:0px; margin-right:5px;" />Submit Request<img src="images/list3.png" style="float:right; margin-top:3px;" /></div>

<div class="left_menuhead" style="margin-top:10px;">Employers</div>

<div class="left_menu2">
<ul>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Staffing Solutions</a></li>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Industrial Specialisation</a></li>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Process of Selecting a Candidate</a></li>
</ul>
</div>

<div class="left_menuhead2"><img src="images/note.jpg" style="float:left; margin-top:0px; margin-right:5px;" />Average Salary Report 2014<img src="images/list3.png" style="float:right; margin-top:3px;" /></div>
</div>

<div class="left_menu1" style="margin-top:5px;">
<div class="left_menuhead" style="border-radius:0px 0px 0px 0px;">Jobseekers</div>

<div class="left_menu2">
<ul>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Featured Jobs</a></li>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Receive Notifications on Jobs</a></li>
	<li><i><img src="images/listicon1.png" width="13" /></i> <a href="#">Join Us</a></li>
</ul>
</div>

<div class="left_menuhead2"><img src="images/edit.png" style="float:left; margin-top:2px; margin-right:5px;" /> Sign Up for Jobs <img src="images/list3.png" style="float:right; margin-top:3px;" /></div>
</div>
</div>

<div style="width:730px; height:auto; float:left; margin-left:20px;">
<p class="text2" style="margin-top:10px; color:#5c5c5c;">
<span class="head10" style="float:left;margin-right:65px; margin-top:10px;">No. 1 in Providing Staffing Solutions </span>
	<span style="float:right;"> 
	<!--<img src="images/sh2.jpg" style="float:right;" />
	<img src="images/sh.jpg" style="float:right;" />
	<img src="images/s.jpg" style="float:right;" /> -->
	<div class="fb-share-button" data-href="https://www.facebook.com/lovetoprecruiters" data-layout="button_count"></div>
		<div class="g-plus" data-action="share" data-annotation="bubble" data-href="https://plus.google.com/u/0/b/104644828667335538524/104644828667335538524/about/p/pub"></div>
		 <img src="images/sh.jpg" />
		<img src="images/sh2.jpg" />
	   
	</span> 

</p>

<p><span style="color:#696969;">The company services corporate clients across diverse industries by tapping on our main strength, Talent Acquisition expertise. To stay the best in today&rsquo;s competitive world, we need to hire the best. Leveraging on our experience and extensive network, we continue to improve with repeated ingenuity to find the best talent to move your business forward, helping you to stay ahead. </span></p>

<p><span style="color:#696969;">With over 200,000 strong and updated talent bank of pre-screened office executive jobseekers and a well designed database search, we are confident in providing our clients with the most suitable candidate on short notice, a plus for companies facing urgent business priorities. Our candidates had proved to demonstrate impressive track records of achievement and results in corporate positions, and often, interim and freelance roles. </span></p>

<p><span style="color:#696969;">Top Recruiters is different from other recruitment agencies, we know key industries and critical job functions first hand because we have worked in them. Top Recruiters are equipped with at least five years of work experience within their given industry. Our well experienced professionals work with clients to assess their true needs and deliver customised staffing solutions, the way only an insider can. Experienced candidates work with us because we can provide them with rewarding employment opportunities and guidance at every stage of their careers.</span></p>

<p><span style="color:#696969;">With our well-designed database search system, process, and high touch candidate and client service levels, Top Recruiters is constantly and consistently able to provide a unique mix of search and selection techniques to build a reliable talent pipeline for our clients' current and future talent needs.</span></p>

<p><span style="color: rgb(92, 92, 92);" class="head10">Our Specialties </span></p>

<p class="text2" style="margin-top:10px; color:#5c5c5c;">Our recruiters focus on delivering exceptional quality service to candidates and clients with specialists in the following areas:</p>

<ul class="text_list1">
	<li>Engineering</li>
	<li>Information Technology (IT)</li>
	<li>Sales & Marketing</li>
	<li>Customer Service</li>
	<li>Finance & Accounting</li>
	<li>HR & Administration</li>
	<li>Top Management & Corporate Strategy</li>
</ul>

<p><span class="head10">Why Choose Us?</span><br />
<br />
 </p>
 <img src="images/img1111.jpg" />
</div>
</div>
</div>
<!--------------------------content bar end-----------------------><!--------------------------footer bar-----------------------><?php include_once("footer1.php");?><!--------------------------footer bar end-----------------------></body>
</html>
