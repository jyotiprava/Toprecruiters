<?php include_once("function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>..::TOP RECRUITERS::..</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
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
p{  margin-bottom: 0px; margin-top:0px;}
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
	<style type="text/css">.pagination{ width:400px; height:auto; float:left; margin-left:10px;}
.pagination a{ text-decoration:none; color:#2075e2;}
	</style>
	<!-- Skitter Styles -->
	<link href="css/skitter.styles.css" media="all" rel="stylesheet" type="text/css" />
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
	<style>
	    .home{
		color:#797878 !important;
	    }
	</style>
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
<h2 class="head3" style="font-size:36px;">Whatever you're looking for, we've got it.</h2>
</div>

<div class="top_text2right">
<div class="but1"><a href="index1.php" style="text-decoration: none;color: #fff;"><img src="images/l1.png" style="float:left; margin-top:5px;" /> Submit Request<br />
For Employees </a></div>

<div class="but2" style="margin-left:15px;"><a href="signup.php" style="text-decoration: none;color: #fff;"><img src="images/l2.png" style="float:left; margin-top:5px;" /> Sign Up<br />
For Jobs </a></div>
</div>

<div style="width:100%; height:auto; float:left;">
<p class="text" style="width:100%; margin-top:10px;color:#333; font-size:30px; margin-bottom:15px;">At the heart of our service is our talent bank of over 200,000 candidates. Selected from over numerous applicants, these individuals represent a diverse and highly experienced resource for companies facing a need for talent. Our permanent recruitment service delivers senior managers and office executives (RM2k to RM10k monthly income positions) &ndash; selected for their specific experience and skills, in virtually every functional and professional discipline. </p>
</div>
</div>
</div>
</div>
</div>
<!---------------------banner------------->
<?php include_once("bannersearch.php");?>
<!----------------------banner------------>
<!--------------------------content bar----------------------->
<?php include_once("homepagination.php");?>

<div id="content_bar">
<div id="content_box">
<div id="content_left" style=" width:690px; margin-top:20px; font-family: 'Conv_estre'; font-size:20px;">
<div style="width:100%; height:auto; float:left;">
<div style="width:100%; height:auto; float:left;">
<h2 class="head3" style="font-family: 'DaunPenhRegular';margin-top:0px; margin-bottom:0px; font-size:40px;">
  <span style="float:left;">Featured Jobs</span>
  <span style="float:right; width:400px;">
  <div class="fb-share-button" data-href="https://www.facebook.com/lovetoprecruiters" data-layout="button_count"></div>
	<div class="g-plus" data-action="share" data-annotation="bubble" data-href="https://plus.google.com/u/0/b/104644828667335538524/104644828667335538524/about/p/pub"></div>
	 <img src="images/sh.jpg" />
    <img src="images/sh2.jpg" />
  </span>
</h2>
</div>

<div style="width:350px; height:auto; float:left;"> </div>
</div>
<?php
		if(isset($_SESSION['userid']))
					{
					    ?>

<div class="text2" style=" width:100%; height:auto; float:left;font-size:20px; text-align:right; margin-top:0px; margin-bottom:8px;"><a href="rvwmyshortlist.php" style="color:#594aed;">Review My Shortlist</a></div>
<?php
					}
					?>

<div style="width:100%; height:auto; float:left; padding-top:7px; padding-bottom:5px; border-top:1px dotted #ccc; border-bottom:1px dotted #ccc;"><span class="text" style=" padding-bottom:0px; font-size:14px; font-family:Arial, Helvetica, sans-serif; float:left;">Result Page</span>
	<span class="text" style="font-size:14px; letter-spacing:8px; color:#2375e1; font-family:Arial, Helvetica, sans-serif; font-weight:bold;"><?=$pagination;?></span>
	<span style="float:right; font-size:14px;margin-right: 5px;">15</span></div>
<?php include_once('featuredjob.php');?></div>

<div id="content_right" style="width:300px;"><?php //include_once("searchjob.php");?>
<div id="right_box1" style="display:none;">
<div id="right_box2"><?php
                        $qwery=mysql_query("select * from `rightbox_content`")or die(mysql_error());
                        $res=mysql_fetch_array($qwery);
                        echo htmlspecialchars_decode($res[content]);
                        ?></div>
</div>

<div id="testimonials" style="width:280px; margin-top: 20px;">Insight <img src="images/icon1.png" width="15" /></div>

<div class="right_textbox" style="height: 650px; width:290px;">
<h1 class="head3" style="color:#1e81c5; font-size:40px; text-align:right; line-height:0.7;"><img src="images/img4.png" /><br />
Salary Report</h1>
<?php
$sqltest=mysql_query("select * from `insight`");
while($restest=mysql_fetch_array($sqltest)){
?>

<div class="right_text" style="color:#828282; padding-top:0px;">
  <?php
  if($restest['image']!='')
  {
    ?>
    <img src="admin/<?=$restest['image'];?>" style="width: 190px;height: 105px;"/>
    <?php
  }
  ?>
<p class="text" style="text-align:right; color:#5a5a5a; text-align:right; margin-top:10px; margin-bottom:0px; font-size:25px; font-weight:bold;"><?=$restest['heading'];?></p>
<?php echo html_entity_decode($restest['description']);?><br />
</div>
<?php
						}
						?></div>

<div id="featured" style="display:none;">Featured Employers <img src="images/icon1.png" width="15" /></div>

<div class="right_textbox2" style="display:none;"><?php
						 $sqllogo=mysql_query("select * from `alljob`");
						 while($reslogo=mysql_fetch_array($sqllogo)){
						 ?>
<div class="right_img"><img src="admin/" /></div>
<?php
						}
						?></div>
</div>
</div>
</div>

<div id="content4_bar" style="margin-top: 20px;">
<div id="content4_box">
<?php
$i=3;
$image=mysql_query("select * from `bottomimage`");
while($resimage=mysql_fetch_array($image)){
$i++;
if($i%4==0){
?>
<div class="content4box1" style=" margin-left:0px;">
<div class="content4_imgbox"><img src="admin/<?php echo $resimage['image'];?>" style="width:100%; height: 200px;" /></div>

<div class="content4_headtext"><?php echo $resimage['title'];?></div>

<div class="content4_text">
<?php echo html_entity_decode($resimage['description']);?>
</div>
</div>
<?php
}
else
{
?>
<div class="content4box1" >
<div class="content4_imgbox"><img src="admin/<?php echo $resimage['image'];?>" style="width:100%; height: 200px;" /></div>

<div class="content4_headtext"><?php echo $resimage['title'];?></div>

<div class="content4_text">
<?php echo html_entity_decode($resimage['description']);?>
</div>
</div>
<?php
}
}
?>
<!--<div class="content4box1" style=" margin-left:0px;">
<div class="content4_imgbox"><img src="images/jobimg1.png" style="width:100%; height: 200px;" /></div>

<div class="content4_headtext">#1 in Providing Staffing Solution</div>

<div class="content4_text">
<p class="text" style="  margin-bottom: 0px; margin-top:0px;"><span style="font-size:28px; color:#444; font-weight:bold;">- Permanent Recruitment</span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Provide a high-quality,professional recruitment service in all markets where we specialise</div>

<p> </p>

<p class="text" style="  margin-bottom: 0px; margin-top:0px;"><span style="font-size:28px; color:#444; font-weight:bold;">- Contract Administration</span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Manages and administers projects on behalf of companies that require personnel for short term contracts of 3 months to a 2 year contract term.</div>

<p> </p>

<p class="text" style="  margin-bottom: 0px;margin-top:0px; "><span style="font-size:28px; color:#444; font-weight:bold;">- Contract-to-Hire Staffing</span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Observe the employee on the job, after the contract period is complete, hire the employee on a permanent basis.</div>

<p> </p>
</div>
</div>

<div class="content4box1">
<div class="content4_imgbox" style="background:none;"><img src="images/why.jpg" style="width:100%;height: 200px; " /></div>

<div class="content4_headtext">Why Choose Us?</div>

<div class="content4_text">
<p class="text" style="  margin-bottom: 0px; margin-top:0px;"><span style="font-size:28px; color:#444; font-weight:bold;">- Effective Database Search Functions</span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Ability to be able to provide client with the best most suitable candidate.</div>

<p> </p>

<p class="text" style="  margin-bottom: 0px;margin-top:0px; "><span style="font-size:28px; color:#444; font-weight:bold;">- Talent Bank of over 200,000 Candidates </span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Pre-screened, qualified candidates from various field that can solve your employment problems.</div>

<p> </p>

<p class="text" style="  margin-bottom: 0px;margin-top:0px; "><span style="font-size:28px; color:#444; font-weight:bold;">- Experience & Creative Consultants</span></p>

<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">Experience consultants who are able to allocate the best candidate to you in the fastest time.</div>

<p> </p>
</div>
</div>-->

<!--<div class="content4box1">
<div class="content4_imgbox" style="background:none;"><img src="images/staffing.jpeg" style="width:100%; height: 200px; " /></div>

<div class="content4_headtext">How it Works?</div>

<div class="content4_text">
<p class="text" style=" font-size:20px; font-weight:bold;margin-bottom: 0px;color:#444; margin-top:0px; line-height: 1.5;">
  1.Work with you to Develop a job Brief <br />
2.Choosing the Best From Our Database of over 200,000 candidates or from job Portals<br />
3.Conduct Interviews & Training <br />
4.Identify the Best Fit Candidates and Forward to Clients <br />
5.Facilitate Interviews between Client(s) & Candidate(s) <br />
6.Work With Client and Candidate Through out the Negotiations, Recommending Any Changes to an offer That will Facilitate Acceptance by the Candidate  <!--<div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">
				
			    </div>
				</p>
				<p class="text" style="  margin-bottom: 0px; ">
                            <span style="font-size:28px; color:#444; font-weight:bold;"> - Contract Administration</span>
                             <div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">
				Manages and administers projects on behalf of 
				companies that require personnel for short 
				term contracts of 3 months to a 2 year contract term.
			     </div>
				</p>
                            <p class="text" style="  margin-bottom: 0px; ">
                            <span style="font-size:28px; color:#444; font-weight:bold;"> - Temporary Staffing</span>
                             <div class="text" style="padding-left: 15px;font-size:25px; color: #666;height: auto;">
                            Effectively replace a staff member's absence
                            from the work place.
			     </div>
                            
                            </p>
                       </div>
                </div></p>-->
</div>
</div>

</div>
<!--------------------------content bar end-----------------------><!--------------------------footer bar-----------------------><?php 
include_once("footer1.php");
?><!--------------------------footer bar end----------------------->
</body>
</html>
