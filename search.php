<?php
include_once("function.php");

$location = '';
$shift=$_POST['location'];

if ($shift)
{
    foreach ($shift as $value)
    {
        $location.=$value.",";
    }
}

$location=rtrim($location,",");

$keyword=htmlentities($_POST['keyword'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$worktype=htmlentities($_POST['worktype'],ENT_QUOTES);

//echo $location;

$variable='';
if($keyword!=''){
	$variable.="`postname` like '%$keyword%' and ";
	}
	if($location!=''){
	$variable.="`location` in ($location) and ";
	}
	if($industry!=''){
	$variable.="`industry` = '$industry' and ";
	}
	if($jobfunction!=''){
	$variable.="`jobfunction` = '$jobfunction' and ";
	}
	if($worktype!='')
	{
	$variable.="`job_type`='$worktype' and";
	}
$variable.='`status`=0';


	

	$tbl_name="alljob";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where $variable";
	//echo $query;
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "search.php"; //your file name  (the name of this file)
	$limit = 8; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select * from `alljob` where $variable LIMIT $start, $limit";
	//echo $sql;
	$qwe = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\"><<</a>";
		else
			$pagination.= "<span class=\"disabled\"><<</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\"> >></a>";
		else
			$pagination.= "<span class=\"disabled\"> >></span>";
		$pagination.= "</div>\n";		
	}
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
<style>
                   
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
                        font-size: 14px;
                    }
                    .tab_content h2 {
                        font-weight: normal;
                        padding-bottom: 10px;
                        border-bottom: 1px dashed #ddd;
                        font-size: 18px;
                        
                        color: #333;
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
		    .text_joblist{
                        color: #666;
                        font-weight:normal;
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
		    <script type="text/javascript">
			function myfunction(slno,nm){				
				$.ajax({url:"ajax_jobs.php?id="+slno+"&name="+nm,
					success:function(result){
					$('#jobs').html(result);							
					}
				});	
			}
			
		    </script>
<style>
	    .apply{
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

<!--------------------------content bar----------------------->
<div id="content_bar">
		<div id="content_box">
        		<div id="content_left">
<!------------------Tab start ---------------------->
					
                    
 <div class="container" style="width:100%">

	
    <ul class="tabs">
        <li><a href="#tab1">Job Specialization</a></li>
        <li><a href="#tab2">Job Subspecialization</a></li>
        <li><a href="#tab3">Location</a></li>
    </ul>
    <div class="tab_container" >
        <div id="tab1" class="tab_content" style="height: 300px;overflow: auto;">
            <h2>Job Specializations</h2>
            <?php $qwery=mysql_query("select * from `industry`")or die(mysql_error());
			 while($res=mysql_fetch_array($qwery))
            {?>
            <ul>
            	<li style="list-style-type:none; list-style-image:url(images/list2.png); border-bottom: 1px dashed #DDD; height:20px;width:300px; "><a href="#" onclick="return myfunction(<?=$res["slno"];?>,'industry');" style="text-decoration: none; color: #666;"><?php echo $res["industry"];?></a></li>
            </ul>
           <?php } ?>
        </div>
        <div id="tab2" class="tab_content" style="height: 300px;overflow: auto;">
            <h2>Job Subspecializations</h2>
             <?php $qwery=mysql_query("select * from `job_function`")or die(mysql_error());
			 while($res=mysql_fetch_array($qwery))
            {?>
            <ul>
            	<li style="list-style-type:none; list-style-image:url(images/list2.png); border-bottom: 1px dashed #DDD; height:20px; width:300px;"><a href="#" onclick="return myfunction(<?php echo $res["slno"];?>,'jobfunction');" style="text-decoration: none; color: #666;"><?php echo $res["jobfunction"];?></a></li>
            </ul>
           <?php } ?>
        </div>
        <div id="tab3" class="tab_content" style="height: 300px;overflow: auto;">
            <h2>Location</h2>
          	 <?php $qwery=mysql_query("select * from `location`")or die(mysql_error());
			 while($res=mysql_fetch_array($qwery))
            {?>
            <ul>
            	<li style="list-style-type:none; list-style-image:url(images/list2.png); border-bottom: 1px dashed #DDD; height:20px; width:300px;"><a href="#" onclick="return myfunction(<?php echo $res["slno"];?>,'location');" style="text-decoration: none; color: #666;"><?php echo $res["location"];?></a></li>
            </ul>
           <?php } ?>
       </div>
        
    </div>
</div>


                
<!----------------------------Tab end ------------------------------->
              
                		<table width="100%" style="font-family:arial; font-size:15px; border-collapse:collapse;" cellspacing="0" >
                        <tr>
				<td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                         <tr bgcolor="#666666" style=" line-height:40px;">
                         	<th colspan="2" style="padding-left:20px; float:left; color:#FFF; border-collapse:collapse;">SHOWING&nbsp; 8 <select style="width:40px;display: none;"><option></option></select> result per page</th>
                            <th><?=$pagination?></th>
                         </tr>
						<tr>
                        	<td></td>
                            <td></td>
                        </tr>
						<tbody id="jobs">
					
                        <?php
										
							if(isset($_GET['msg']))
							{
							$mess=$_GET['msg'];
							echo "<script>alert('".$mess."')</script>";
							}						
						
							while($result=mysql_fetch_array($qwe)){
								$id=$result['id'];
								$post=$result['postname'];
								$vac=$result['noofvaccancy'];
								$loc=$result['location'];
								$ind=$result['industry'];
								$jobfun=$result['jobfunction'];
								$salfrm=$result['range1'];
								$salto=$result['range2'];
								$exp=$result['experience'];
								$shtdes=$result['shortdesc'];
								$date=$result['date'];
								$logo=$result['logo'];
							
						 ?>
                         <tr style="background:#fff; border:1px solid #ccc; border-collapse:collapse;">
                         	
                         	<td style=" padding:20px;">
                           
                            	<span>
                                <a href="job_details.php?id=<?=$id;?>" style="text-decoration:none; color: #900; font-size:18px; ">
								<?php echo  $post; ?></a>
                                </span>
                                 <div style=" width:300px; height:auto; background:#f4ecec; border-radius:4px; border:1px solid #ccc; padding:10px; margin-top:10px;">
                                <span style="font-size:13px; line-height:2.0;">
                            	<span style="font-weight:bold; color:#000;">Job Specialization : </span><?php
									$qry=mysql_query("select * from `industry` where `slno`='$ind'");
									$rs=mysql_fetch_array($qry);
									echo $rs['industry'];
								 ?> <br />
                                 <span style="font-weight:bold; color:#000;">Job Subspecialization : </span><?php
									$qry=mysql_query("select * from `job_function` where `slno`='$jobfun'");
									$rs=mysql_fetch_array($qry);
									echo $rs['jobfunction'];
								 ?> <br />
								<span style="font-weight:bold; color:#000;">No. of Vaccancy: </span>
                 				<?php echo $vac;?>
                                <br />			 
                            	<span style="font-weight:bold; color:#000;">Location : </span>
								<?php
									$qry=mysql_query("select * from `location` where `slno`='$loc'");
									$rs=mysql_fetch_array($qry);
									echo $rs['location'];
								 ?> <br />
                                <span style="font-weight:bold; color:#000;">Salary : </span> <?php echo $salfrm; ?> - <?php echo $salto; ?>
                               <br />
                                <span style="font-weight:bold; color:#000;">Experience : </span> <?php echo $exp; ?><br />
                               <span style="font-weight:bold; color:#000;"> Description : </span><?php echo htmlspecialchars_decode($shtdes); ?><br />
                              </span> 
                             </div>  
                           </td>
                          
                         
                            <td valign="middle" style="line-height:0.7; text-align:center;">
                            <span style="font-weight:bold; color:#000;">Date Posted :</span> <?php echo $date; ?>
                            <br />
                            <br />
							<?php echo "<img src=admin/". $logo. ">";?>
                            <br/>
                            <br/>
			    <?php
			    if($result['posttype']==1)
			    {
				?>
				<img src="images/featured.png" style="width: 120px;"/>
				<br/>
                            <br/>
				<?php
			    }
			    ?>
			    
                            <input type="button" value="Apply" class="button3" onclick="window.location.href='job_details.php?id=<?=$id;?>'" style="margin-left:50px; width:180px; padding:7px; font-size:18px;"/>
			    			</td>
                         </tr>
                        <tr>
                          	<td colspan="2">&nbsp;</td>
                          </tr>
                          <?php } ?>
			  </tbody>			  
                		</table>
                      
                        
                </div>
                <div id="content_right">
                		<?php //include_once("searchjob.php");?>
                                
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
                         		<?php
						 $sqltest=mysql_query("select * from `testimonial`");
						 while($restest=mysql_fetch_array($sqltest)){
						 ?>
								<div class="right_text">
										<?php echo html_entity_decode($restest['shortdescription']);?>
                                        <br />
                                        <span>
										<?php echo $restest['personal_name'].",".$restest['designation'].",".$restest['company_name'];?>
										</span>
                                </div>
						<?php
						}
						?>	
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
include_once("footer1.php");
?>


<!--------------------------footer bar end----------------------->
</body>
</html>
