<?php
include_once("../function.php");
is_admin();


	 $tbl_name="user_detail";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 2;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where `is_employer`='1'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "shortlistclient.php"; //your file name  (the name of this file)
	$limit =5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select * from `$tbl_name` where `is_employer`=1  LIMIT $start, $limit";
	$cdetail = mysql_query($sql);
	
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
			$pagination.= "<span class=\"disabled\"><< previous</span>";	
		
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
			$pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
		else
			$pagination.= "<span class=\"disabled\">next >></span>";

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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="../style.css" type="text/css" rel="stylesheet"  />
<link href="../font.css" type="text/css" rel="stylesheet" media="screen"  />
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
function addallshortlist(){
 var val1=$('#hid').val();
    $.ajax({
	url:"ajax_addallshortlist.php?id="+val1,
	success:function(result){
		alert('Successfully Shortlisted');
		location.reload();
		//$('#mails').html(result);
		
		var r=result.split('|');
		$('#mails').html(r[0]);
		$('#contact').html(r[1]);
	 //$('#rmvshortlist'+val1).show();
	       }
    });
    }
	
 function addshortlist1(val){ 
    $.ajax({
	url:"ajax_addshortlist.php?id="+val,
	success:function(result){
		alert('Successfully Shortlisted');
		location.reload();
		//$('#mails').html(result);
		//$('#mails').append(result);
		var r=result.split('|');
		// alert(r);
		 $('#mails').append(r[0]);
		 $('#contact').append(r[1]);
			}
    });
    }			
</script>
<script type="text/javascript">
function removeallshortlist()
{
 var val1=$('#hid1').val();
    $.ajax({
	url:"ajax_removeallshortlist.php?id="+val1,
	success:function(result){
		alert('Successfully Updated');
		location.reload();
		$('#mails').html(result);
	       }
    });
    }
function removeshortlist(val){
      //alert(1);
    $.ajax({
	url:"ajax_removeshortlisted.php?id="+val,
	success:function(result){
	  
	 alert('Successfully Updated');
		location.reload();
	 
	       }
    });
    }		
</script>
<style>
	.new4{
	   color:#0221e6;
	   text-decoration: underline;
	}
</style>
</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left">
                		<div id="pg_box">
					<?php
					$countrow=mysql_query("select * from `user_detail` where `is_employer`='1'")or die(mysql_error());
					$rows=mysql_num_rows($countrow);
					$tar=$rows/$limit;
					$a = round($tar);
					?>
					 <?=$pagination?> 
                        		<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;">
					 <span  id="" style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;"  onclick="return addallshortlist();"/> Add All to Shortlist</span>
					<?php echo $limit; ?> Candidates found. Pg 1 of <?php echo $a; ?>
					</h2>
                                <div id="pg_listbox">
                               
                                </div>
				</div>
				<div>
				    </div>
					 
					

                		<div id="content2_leftbox" style="height:600px; height:auto;">
						   <?php
						        $var=0;
								//$cdetail=mysql_query("select * from `user_detail` where `is_employer`='1'")or die(mysql_error());
								$no='';
								while($rescvdetail=mysql_fetch_array($cdetail))
								{
								$var++;
							        $slno=$rescvdetail['slno'];   
								$no.=$slno.",";
								$fname=$rescvdetail['first_name'];
								$lname=$rescvdetail['last_name'];
								?>
                                        <div class="left_listbox">		
                                		<div class="left_listimg">
                                        	    <!--<a href="candidate.htm">--><img src="images/img4.jpg" style="width:100%;"/><!--</a>-->
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;"><?php echo $rescvdetail['expected_salary']; ?>
</span>
                                        </div>
                                        <div class="leftlist_textbox1">
                                        		<h3 class="head4">
                                                		<?php echo $var;?>.<?php echo $fname."&nbsp;".$lname; ?>
								
							</h3>				
                                        </div>
                                        <div class="leftlist_textbox2">
                                        		<ul class="left_contectlist">
                                                	<li><i><img src="images/i1.jpg"/></i> <span><?php echo $rescvdetail['contact']; ?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> <span><?php $mail=$rescvdetail['emailid'];echo wordwrap($mail,15,"<br>\n",TRUE); ?></span></li>
                                                        <li style="display: none"><i><img src="images/i3.jpg"/></i> <span><?php //echo $rescvdetail['age']; ?></span></li>
                                                        <li style="display: none"><i><img src="images/i4.jpg"/></i> <span><?php //echo $rescvdetail['current_address']; ?></span></li>
                                                </ul>
                                        </div>
								
                                        <div class="date">
					<?php
					 $isshort=$rescvdetail['shortlisted'];
					if($isshort==0){ ?>
					<span id="addshortlist<?php echo  $rescvdetail['slno']; ?>" style="color: #CC0000;  text-decoration:underline; text-align:left; cursor:pointer;" onclick="return addshortlist1(<?php echo $rescvdetail['slno']; ?>);"/>Add to Shortlist </span>
					<?php }
					else{ ?>
					<span id="rmvshortlist<?php echo  $rescvdetail['slno']; ?>" style="color: #CC0000;  text-decoration:underline; text-align:left; cursor:pointer; margin-left:10px; margin-right:10px;" onclick="return removeshortlist(<?php echo $rescvdetail['slno']; ?>);"/>  Remove from Shortlist </span>
                                       <?php } ?>
					</div>
						             
				    </div>
					<?php } ?>	
				<input type='hidden' name='hid' id='hid' value='<?php echo $no; ?>' />			
                        </div>
						                  
                </div>
                <div id="content2_right" style="margin-top: 30px;">
			<h2 class="head3" style=" font-weight:normal; margin-top:0px; margin-bottom: 0px;">Shortlisted Clients</h2>
                		<div id="remove_box" style="margin-top: 10px; height: auto">
                        		<div class="removebox1">
                                		<input type="button" name="" onclick="return removeallshortlist();" value="Remove all shortlist" class="button1" style="width:200px; color: #333;" />
                                </div>
                                <div class="removebox1">
                                <h2 class="head5" style="font-weight:normal; color: rgb(58, 82, 160); margin-bottom: 0px;">
                                Compiled Clients' Email
                                </h2>
                                <div class="remove_textbox">
				<div id="mails">
				<?php
				$no1='';
				$cons=mysql_query("select * from   `user_detail`  where `shortlisted`='1'")or die(mysql_error());
				while($rescons=mysql_fetch_array($cons)){
				$no1.=$rescons['slno'].",";
				echo $rescons['emailid'].'<br/>';   
			       }
				?>
				<input type='hidden' name='hid' id='hid1' value='<?php echo $no1; ?>' />
				</div>
                                </div>
				<div class="remove_textbox" id="contact">
				<h2 class="head5" style=" margin-top:10px; font-weight:normal; height: auto; margin-bottom: 0px; color: rgb(58, 82, 160);">Compiled Clients' HP No.</h2>
                               <div id="contact">
				<?php
					$con1=mysql_query("select * from `user_detail` where `shortlisted`='1'") or die(mysql_error());
					while($res1=mysql_fetch_array($con1))
					{
					$contact=$res1['contact'];
					echo $contact.'<br />';
				} ?>
				</div>
                                </div>
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
