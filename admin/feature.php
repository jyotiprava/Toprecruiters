<?php
include_once("../function.php");
is_admin();
//$qwery=mysql_query("select * from `alljob`") or die(mysql_error());
?>
<!-- Pegination Start --->
<?php
	$tbl_name="alljob";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$qwery = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($qwery));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "feature.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$result = mysql_query($sql);
	
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
			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
		else
			$pagination.= "<span class=\"disabled\"> << previous</span>";	
		
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
			$pagination.= "<a href=\"$targetpage?page=$next\">next >> </a>";
		else
			$pagination.= "<span class=\"disabled\">next >> </span>";
		$pagination.= "</div>\n";		
	}
?>
<!-- Pegination End --->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<link href="../style.css" type="text/css" rel="stylesheet"  />
<link href="style.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
  function  myfun(){
     $.ajax({
	url:"ajax_jobdescription.php?id="+1,
	success:function(result){
	//alert(result);
	  var r=result.split('|');
	  $('#short').html(r[0]);
	  $('#long').html(r[1]);
	  $('#head').html(r[2]);
	  $('#rfno').html(r[3]);
	  $('#pdate').html(r[4]);
	}
    });
  }

  function  jobDetail(val) {
    $.ajax({
	url:"ajax_jobdescription.php?id="+val,
	success:function(result){
	 //alert(result);
	  var r=result.split('|');
	  $('#short').html(r[0]);
	  $('#long').html(r[1]);
	  $('#head').html(r[2]);
	  $('#rfno').html(r[3]);
	  $('#pdate').html(r[4]);
	}
    });
  }
</script>
<style type="text/css">
                    
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
<style>
	.new7{
	   color:#0221e6;
	   text-decoration: underline;
	}
</style>

</head>
<body onload="return myfun()">
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->
<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->

<!--------------------------menu bar----------------------->
<div id="menu_bar2" style="display: none;">
		<div id="menu_content2">
        		<div id="menu_box2">
                		<ul>
                        		<li><a href="#" style="padding-left:0px;">Request Page</a></li>
                                <li><a href="#">Search Resume</a></li>
                                <li><a href="#">Shortlisted Candidates</a></li>
                                <li><a href="#">Shortlisted Clients </a></li>
                                <li><a href="#">Create New Acc </a></li>
                                <li><a href="#">Mass Email/SMS</a></li>
                        </ul>
                </div>
        </div>
</div>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left">
                		<div id="pg_box" >
                        	   
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
                		<div id="content2_leftbox" style="padding: 0px; width:495px;border:none;">
					<h2 class="head3" style="font-size:22px; color: #333; text-decoration: underline; font-weight:normal; margin-top:0px;">All Featured Jobs<span style="float: right;"> <?=$pagination?></span></h2>
                        	<table class="table5">
					
                            	<tr>
                            	    <th width="80">Posting Date</th>
                                    <th>Job title</th>
                                    <th width="110">Job Specialisation</th>
                                    <th>Location</th>
                                    <th>Ref. No.</th>
                                </tr>
                               <?php while($detail=mysql_fetch_array($result)) {
                                $dt=$detail['date'];
				$date=date("d-m-Y",strtotime($dt));
                                ?>
                                <tr>
                                    
                                    <td><?php echo $date; ?> </td>
                                    <td style="color:#C60;"><a herf="#" style="cursor: pointer;" onclick="return jobDetail(<?=$detail['id'];  ?>)"><?=$detail['postname']?></a> </td>
                                    <?php
                                    $loc=mysql_query("select * from `location`  where `slno`='$detail[location]'")or die(mysql_error());
                                    $resloc=mysql_fetch_array($loc);
                                    $fun=mysql_query("select * from `job_function`  where `slno`='$detail[jobfunction]'")or die(mysql_error());
                                    $resfun=mysql_fetch_array($fun);
                                    ?>
                                    <td><?=$resfun['jobfunction']?></td>
                                    <td><?=$resloc['location']?></td>
                                    <td><?=$detail['refno']?></td>
                                </tr>
                                <?php } ?>
                            </table>	
                                
                               
                        </div>	
                </div>
                <div id="content2_right">
                		<h2 class="head3" style="font-weight:normal;color: #333;  text-decoration: underline; margin-bottom: 7px;">Job Description</h2>
                        <div id="content2_rightbox" style="margin-top: 0px;">
                        	<h2 style="background:#06C; height: 40px; margin:0px; padding:0px; color: #fff; font-weight: normal;" ></h2>
				<div class="rightbox" style="float: left;">
				<span  id="head" style="float: left; width: 150px;"></span><span style="float: left; width: 100px;" id="rfno"></span><span style="float: right; width:150px;" id="pdate"></span>  
			</div>
				<div style="width: 100%; height: auto; float:left;">
					<div id="short">
                         
			  </div>
				</div>
			  <div class="rightbox" style="float: left;">
                            </div>
                             <div class="rightbox" style="border:none;" >
                            <!--<strong>Requirements:</strong>-->
			    <div id="long">
					
			    </div>
                            	<table class="table" align="center" style="width:80%;height: 150px; border: 1px solid #dedede; margin-bottom:20px; margin-left: 10%; line-height: normal;">
                                  
                                  <tr>
                                    <td style="text-align:right">Job Specialisation:</td>
                                    <td><select class="input3select" ><option>--SELECT--</option></select></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:right">Sub Specialisation:</td>
                                    <td><select class="input3select" ><option>--SELECT--</option></select></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:right">Work Type:</td>
                                    <td><select class="input3select"><option>--SELECT--</option></select></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:right">Minimum Experience:</td>
                                    <td><input type="text" class="input4" /></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:right">Work Location:</td>
                                    <td><input type="text" class="input4"/></td>
                                  </tr>
                                </table>

                            	
                        	</div>
                		</div>
                        
				</div>
                
                
		</div>
</div>

<!--------------------------content bar end----------------------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
 <!--------------footer end---------> 
</body>
</html>