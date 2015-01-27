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
<style type="text/css">
                    body {
                        background: #f0f0f0;
                        margin: 0;
                        padding: 0;
                        font: 10px normal Verdana, Arial, Helvetica, sans-serif;
                        color: #444;
                    }
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
                    </style>
                    <script type="text/javascript"src="js/jquery.js"></script>
                    <script type="text/javascript">
                    
                    $(document).ready(function() {
                    
                        //Default Action
                        $(".tab_content").hide(); //Hide all content
                        $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                        $(".tab_content:first").show(); //Show first tab content
                        
                        //On Click Event
                        $("ul.tabs li").click(function() {
                            $("ul.tabs li").removeClass("active"); //Remove any "active" class
                            $(this).addClass("active"); //Add "active" class to selected tab
                            $(".tab_content").hide(); //Hide all tab content
                            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                            $(activeTab).fadeIn(); //Fade in the active content
                            return false;
                        });
                    
                    });
                    </script>
					<!-- Load TinyMCE-->
					 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
 <!--<script src="admin/js/jquery-1.6.4.min.js" type="text/javascript"></script>-->
 <script src="js/setup.js" type="text/javascript"></script/>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
	
            setupTinyMCE();

        });
		
    </script>
	
    <!-- /TinyMCE -->
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
<!------------------Tab start ---------------------->
					
                    
 <div class="container" style="width:100%">

	
    <ul class="tabs">
        <li><a href="#tab1">JOB DETAILS</a></li>
        <li><a href="#tab2">APPLY ONLINE</a></li>
        
        

    </ul>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
		<textarea  class="tinymce" name="expdesc" id="expdesc" style="width:50px;"></textarea>
        	<?php $qwery=mysql_query("select * from `alljob` where `id`=$id")or die(mysql_error());
			while($result=mysql_fetch_array($qwery)){
								
								$post=$result['postname'];
								$loc=$result['location'];
								$ind=$result['industry'];
								$jobfun=$result['jobfunction'];
								$vac=$result['noofvaccancy'];
								$salfrm=$result['range1'];
								$salto=$result['range2'];
								$exp=$result['experience'];
								$shtdes=$result['shortdesc'];
								$desc=$result['desc'];
								$date=$result['date'];
		?>
            <h2><span style="color: #900;"><?php echo $post; ?></span>
	    <table width="100%" style="font-family:arial; font-size:12px; boder-bottom:solid 1px black;" cellspacing="0" >
		<tr>
			<td>
				Industry :<?php
									$qry=mysql_query("select * from `industry` where `slno`='$ind'");
									$rs=mysql_fetch_array($qry);
									echo $rs['industry'];
								 ?> <br />
                                 Job Function :<?php
									$qry=mysql_query("select * from `job_function` where `slno`='$jobfun'");
									$rs=mysql_fetch_array($qry);
									echo $rs['jobfunction'];
								 ?> <br />
				No. of Vaccancy: <?php echo $vac;?><br />
                            	Location :<?php
									$qry=mysql_query("select * from `location` where `slno`='$loc'");
									$rs=mysql_fetch_array($qry);
									echo $rs['location'];
								 ?> <br />
                                Salary : <?php echo $salfrm; ?> - <?php echo $salto; ?>
                               <br />
                                Experience : <?php echo $exp; ?><br />
                                Description : <?php echo htmlspecialchars_decode($shtdes); ?><br />
                               
			</td>
			<td valign="top">Date Posted: <?php echo $date; ?></td>
		</tr>
	    </table>	
	   </h2>
		<?php echo htmlspecialchars_decode($desc); ?><br />
            <?php } ?>
	    
	<a href="" target="_blank" ></a><input type="button" value="Apply Now" /></a>
        </div>
	
        <div id="tab2" class="tab_content">
            <h2>Job Functions</h2>
             
           
          
        </div>
    
    </div>
</div>        
<!----------------------------Tab end ------------------------------->
      
                        
                </div>
                <div id="content_right">
                		
                                
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
<div id="footer_bar">
		<div id="footer_box">
        		<div id="footer_left">
                	<ul class="footer_list">
                        	<li style="font-size:30px; color:#000;">Contact Me</li>
                                <li>Tel: 123-456-7890</li>
                                <li>info@mysite.com</li>
                                <li>&nbsp;</li>
                                <li><img src="images/f.jpg" style="float: left;margin-right:5px;"/><img src="images/g.jpg" style="float: left; margin-right:5px;"/><img src="images/in.jpg"  style="float: left; margin-right:5px;" /><img src="images/t.jpg" /></li>
                                <li>&nbsp;</li>
                                <li style="font-size:18px;"> &copy; Copyright All Rights Reserved 2014 by Kriti Technology</li>
                        </ul>
                        </div>
                <div id="footer_right">
                		<table style="width:100%; font-family: 'SourceSansPro-Regular';">
								<tr>
                                		<td><input type="text" name="" value="Name" class="input2"  /></td>
                                        <td rowspan="3"><textarea class="input2" style="height:100px;">Message</textarea></td>
                                </tr>
                                <tr>
                                		<td><input type="text" name="" value="Email" class="input2"  /></td>
                                        
                                </tr>
                                <tr>
                                		<td><input type="text" name="" value="Subject" class="input2"  /></td>

                                </tr>
								<tr>
									<td></td>
									<td style="float: right;"><input type="submit" class="button" value="Send"  /></td>
								</tr>
                        </table>
                </div>
               
        </div>
</div>

<!--------------------------footer bar end----------------------->
</body>
</html>
