<?php
include_once("function.php");
$id=$_GET['id'];
$qdesc=mysql_query("select a.*,l.`location` from `alljob` a,`location` l where a.`id`='$id' and a.`location`=l.`slno`")or die(mysql_error());
$rdesc=mysql_fetch_array($qdesc);

$qin=mysql_query("select `industry` from `industry` where `slno`='$rdesc[industry]'");
$rin=mysql_fetch_array($qin);

$qj=mysql_query("select `jobfunction` from `job_function` where `slno`='$rdesc[jobfunction]'");
$rj=mysql_fetch_array($qj);
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

<style>
#top_textbar{width:100%; height:auto; float:left;}
#top_textbox{width:1000px; margin:auto;}
.top_text{width:100%; height:auto; float:left; margin-top:20px;}
.top_text2{width:100%; height:auto; float:left;}
.top_text2left{ width:660px; height:auto; float:left;}
.top_text2right{ width:310px; height:auto; float:right;}
.but1{ width:130px; height:auto; float:left; padding:8px; background:#486dbe; text-align:center; font-size:15px; color:#fff; font-family: 'Conv_estre'; border-radius:6px;}
.but2{ width:130px; height:auto; float:left; padding:8px; background:#89be48; text-align:center; color:#fff; font-size:15px; font-family: 'Conv_estre'; border-radius:6px;}

#banner_bar{ width:100%; height:auto; float:left;}
#banner_box{ width:1000px; margin:auto;}
#banner_box1{ width:980px; height:auto; padding:10px; box-shadow:0px 0px 2px 2px #868484; background:#fff;}
#content4_bar{ width:100%; height:auto; float:left;}
#content4_box{ width:1000px; margin:auto;}
.content4box1{ width:310px; height:auto; float:left; border:5px solid #f0f0f0; margin-left:20px;}
.content4_imgbox{ width:100%; height:240px; float:left; background:#d6e1e7;}
.content4_headtext{ width:310px; height:40px; float:left; padding-top:10px; text-align:center; color:#fff; font-family: 'Conv_estre'; font-size:18px; background:url(images/5.png) center no-repeat;}
.content4_text{ width:300px; height:auto; float:left; padding:10px;}

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
.text_joblist h2{
    font-weight:normal;
}
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
	</script>
</head>
<body>
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
                                		<h2 class="head3" style="font-size:34px;">
                                        Whatever You'rs Looking for,we've got it.
                                        </h2>
                                </div>
                                <div class="top_text2right">
                                	<a href="index1.php" style="text-decoration: none;"><div class="but1">
                                        		<img src="images/l1.png" style="float:left; margin-top:5px;"  /> 
                                                Submit Request
                                                <br />
                                                For Employees
                                        </div></a>
                                        <a href="login.php" style="text-decoration: none;"><div class="but2" style="margin-left:15px;">
                                                <img src="images/l2.png" style="float:left; margin-top:5px;"  />
                                                Sign Up
                                                <br />
                                                For Jobs
                                        </div></a>
                                </div>	
                               <div style="width:100%; height:auto; float:left;">
                               		 <p class="text"  style="width:100%; margin-top:10px;">
                                		Employers, are you looking to recruit or improve your talent strategy? Please fill out the form below to schedule a conversation about your recruiting or talent management goals. Alternatively you can find a Hudson contact to speak to directly. Employers, are you looking to recruit or improve your talent strategy? Please fill out the form below to schedule a conversation about your recruiting or talent management goals. Alternatively you can find a Hudson contact to speak to directly. 
                                </p>
                               </div>
                        </div>
                </div>
        </div>
</div>

<?php include_once('bannersearch.php');?>

<!--------------------------content bar----------------------->
<div id="content_bar">
		<div id="content_box">
        		
                <div id="content2_right" style="width:600px;margin-left: 0px;">
                    <h3 class="head3" style="margin-top:20px;">
                 <span style="float:left;">Job Description</span>
                		<span style="float:right;">
                                     <div class="fb-share-button" data-href="https://www.facebook.com/lovetoprecruiters" data-layout="button_count"></div>
					<div class="g-plus" data-action="share" data-annotation="bubble" data-href="https://plus.google.com/u/0/b/104644828667335538524/104644828667335538524/about/p/pub"></div>
					 <img src="images/sh.jpg" />
				    <img src="images/sh2.jpg" />
    
                                </span>
                </h3>
                       <div id="content2_rightbox">
                        	<h2 style="background:#06C; margin:0px; padding:0px; color: #fff; font-weight:normal; text-align: right; text-decoration: underline; padding-right: 10px;height:25px;font-size:16px;padding-top:10px;cursor: pointer;">
					<?php
		if(isset($_SESSION['userid']))
					{
					    ?>
					<a href="rvwmyshortlist.php" style="color:#ffffff;text-decoration: none;">Review My Shortlist</a>
					<?php
					}
					?>
				</h2>
				<h3 style="padding: 10px;color: #666; font-size:16px;  font-family: 'Conv_estre'; font-weight:normal;"><?=$rdesc['postname'];?>(Ref No.<?=$rdesc['refno'];?>) <span style="float:  right;">Posting Date:<?=date('d M Y',strtotime($rdesc['date']));?></span></h3>
				
				<?php
					if(isset($_SESSION['userid']))
					{
					    $qweryc=mysql_query("select * from `job_shortlist` where `employeeid`='$_SESSION[useridval]' and `jobid`='$id'")or die(mysql_error());
					    $resc=mysql_fetch_array($qweryc);
					    if($resc['shortlist']==0)
					    {
					    ?>
					<input type="button" value="Add to Shortlist" class="button6" onclick="return getshlist(<?=$id;?>);" style="float: right;margin-right: 10px;"/>
					<?php
					    }
					    else
					    {
						?>
						<input type="button" value="Shortlisted" class="button6" onclick="return getshlist(<?=$id;?>);" style="float: right;margin-right: 10px;"/>
						<?php
					    }
					
					}
					else
					{
				          $msg="Please login to shortlist this job.";
					?>
					<input type="button" value="Add to Shortlist" class="button6" onclick="window.location.href='login.php?msg=<?=$msg;?>'" style="float: right;margin-right: 10px;"/>
					<?php
					}
					?>
					
			    <div class="rightbox" style="font-family: 'Conv_estre'; color: #666; font-size:14px;">
				<?=htmlspecialchars_decode($rdesc['desc']);?>
			    </div>
			      <div class="rightbox" style="border:none; font-family: 'Conv_estre'; color: #666; font-size:14px;">
                            	<table class="table" align="center" style="width:70%;;border: 1px solid #666;">
                                  
                                  <tr>
                                    <td>Job Specialisation</td>
				    <td width="30">:</td>
                                    <td><?=$rin['industry'];?></td>
                                  </tr>
                                  <tr>
                                    <td>Sub Specialisation</td>
				    <td>:</td>
                                    <td><?=$rj['jobfunction'];?></td>
                                  </tr>
                                  <tr>
                                    <td>Work Type</td>
				    <td>:</td>
                                    <td><?=$rdesc['job_type'];?></td>
                                  </tr>
                                  <tr>
                                    <td>Minimum Experience</td>
				    <td>:</td>
                                    <td><?=$rdesc['experience'];?></td>
                                  </tr>
                                  <tr>
                                    <td>Location</td>
				    <td>:</td>
                                    <td><?=$rdesc['location'];?></td>
                                  </tr>
				  
                                </table>
				<table align="center">
				    <tr>
				    <td></td>
				    <td><input type="button" class="button" value="Apply" onclick="window.location.href='jobdescription1.php?id=<?=$id;?>'" style="background: #907491; color: #fff;cursor: pointer;">
				    <input type="button" class="button" value="Back" onclick="window.location.href='index.php'" style="background: #907491; color: #fff;cursor: pointer;"></td>
				  </tr>
				</table>

                            	
			     </div>
        </div>
</div>
		<div style="width:358px; height: 450px; float: left; margin-left:40px; margin-top:10px; ">
		    <img src="images/staff.jpg" />
		    <div class="rightbox" style="border:none; font-size:22px; color: #888;font-family: 'DaunPenhRegular';">
			  <h3 style="font-family: 'Conv_estre'; font-size:22px;color: #333; font-weight:normal;"> > Permanent Recruitment</strong></h3><br/>
			  <span style="font-size:36px;">"</span>Provide a high quality ,professional recruitment service in all markets where we specialise.<span style="font-size:36px;">"</span>
			  
			  <br/><br/>
			  <h3 style="font-family: 'Conv_estre'; font-size:22px;color: #333; font-weight:normal;"> > Contract Administration</strong></h3><br/>
			  <span style="font-size:36px;">"</span>Manages and addministers projects on behalf of companies that require persnnel short term contracts of 3 month to 2 year contract term<span style="font-size:36px;">"</span>
			  <br/><br/>
			  
			   <h3 style="font-family: 'Conv_estre'; font-size:22px;color: #333; font-weight:normal;"> > Temporary Staffing</strong></h3><br/>
			  <span style="font-size:36px;">"</span>Effectively replace a staff member's absence from the workplace<span style="font-size:36px;">"</span>
		    </div>
		</div>
		
		</div>
</div>


<!--------------------------footer bar----------------------->
<?php include_once('footer1.php') ?>
<!--------------------------footer bar end----------------------->
</body>
</html>
