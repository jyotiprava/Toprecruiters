<?php
include_once("../function.php");
is_admin();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!--menu start-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="../style.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript">
function getreqstatus()
{
var checkedVals = $('.request_status:checkbox:checked').map(function() {
    return this.value;
}).get();
var req_status=checkedVals.join(",");
$.ajax({url:"ajax_getrequest.php?req_status="+req_status,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});
}
function getclientcontact()
{
var client_contact=$('#client_contact').val();
$.ajax({url:"ajax_getrequest.php?client_contact="+client_contact,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});
}
function getclientdetail() {
var name_email=$('#name_email').val();
$.ajax({url:"ajax_getrequest.php?name_email="+name_email,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});
}

function requestid(){
var request_id=$('#request_id').val();
$.ajax({url:"ajax_getrequest.php?request_id="+request_id,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});
}
function getpositiontitle(){
var position_title=$('#position_title').val();
$.ajax({url:"ajax_getrequest.php?position_title="+position_title,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});					
}
function getcompanyname(){
var company_name=$('#company_name').val();
$.ajax({url:"ajax_getrequest.php?company_name="+company_name,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});					
}
function getjobdesc(){
var job_description=$('#job_description').val();
$.ajax({url:"ajax_getrequest.php?job_description="+job_description,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});					
}
function getnature(){
var company_industry=$('#company_industry').val();
$.ajax({url:"ajax_getrequest.php?company_industry="+company_industry,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});					
}

function getrequest()
{
	var country=$('#country').val();
	var town=$('#town').val();
	
	var request_form_d=$('#request_form_d').val();
	var request_form_m=$('#request_form_m').val();
	var request_form_y=$('#request_form_y').val();
	var request_to_d=$('#request_to_d').val();
	var request_to_m=$('#request_to_m').val();
	var request_to_y=$('#request_to_y').val();
	
$.ajax({url:"ajax_getrequest.php?country="+country+"&town="+town+"&request_form_d="+request_form_d+"&request_form_m="+request_form_m+"&request_form_y="+request_form_y+"&request_to_d="+request_to_d+"&request_to_m="+request_to_m+"&request_to_y="+request_to_y,
       success:function(results)
       {
		$('#content2_left').html(results);			
       }
});	
	
}

function getsh(id)
{
$.ajax({url:"ajax_shortlist.php?slno="+id,
       success:function(results)
       {
	if(results.trim()=="OK")
	{
		$.ajax({url:"ajax_getrequest.php?request_id="+id,
					success:function(results)
					{
						 $('#content2_left').html(results);			
					}
				 });			
	}
       }
});
}

function getresh(id)
{
$.ajax({url:"ajax_removeshortlist.php?slno="+id,
       success:function(results)
       {
	if(results.trim()=="OK")
	{
		$.ajax({url:"ajax_getrequest.php?request_id="+id,
					success:function(results)
					{
						 $('#content2_left').html(results);			
					}
				 });			
	}
       }
});					
}

function getdetailre(id)
{
$('#loading').show();
	$.ajax({url:"request_detail.php?request_id="+id,
					success:function(results)
					{
						$('#loading').hide();
						 $('#content2_left').html(results);			
					}
				 });				
}


$(function(){
    $('#loading').show();
    <?php
    if(isset($_GET['id']))
{
 ?>
 var reqs=<?=$_GET['id'];?>;
 $.ajax({url:"ajax_getrequest.php?request_id="+reqs,
       success:function(results)
       {
	    $('#loading').hide();
		$('#content2_left').html(results);			
       }
});
 <?php
}else
{
    ?>
    var reqs=0;
    $.ajax({url:"ajax_getrequest.php?req_status="+reqs,
       success:function(results)
       {
	    $('#loading').hide();
		$('#content2_left').html(results);			
       }
});
    <?php
}
?>
					
});


</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />
<style>
    .new1{
	   color:#0221e6;
	   text-decoration: underline;
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
</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
<!--------------------------content bar----------------------->
<div id="content2_bar">
         <div id="content2_box">
<!--------------------------content barleft----------------------->					
        		<div id="content2_left" style="min-height: 500px;">

			</div>
			<div style="width: 400px;height: auto;float: left;position:absolute;z-index:999;left:60px;top:70px;text-align: center;display: none;" id="loading">
			    <img src="images/loading-small.gif" style="width: 100px;height: auto;"/>
			</div>
<!--------------------------content barleft----------------------->					
					
<!--------------------------content barright----------------------->
			 <div id="content2_right">
			    <h2 class="head3" style="font-size:20px; text-align:left; margin-top:0px;margin-bottom:0px; padding-top: 8px; padding-bottom: 0px;">Requests Search</h2>
                		<div id="remove_box" style="margin-top: 10px;">
                        	<h4 class="head4"><u>Search Requests</u></h4>
                            <h5 class="head4">Request Status</h5>
                            	<table class="table7">
                                	<tr>
                                    	<td>
                                            <input type="checkbox" value="0" class="request_status"/>Pending<br/>
                                            <input type="checkbox" value="2" class="request_status"/>Payment Pending<br/>
                                            <input type="checkbox" value="3" class="request_status"/>Feedback Pending<br/>
                                            <input type="checkbox" value="1" class="request_status"/>Completed<br/>
                                            <input type="button" class="button1" value="Go now" style="padding-top: 0px;" onclick="return getreqstatus();"/><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        Client's Contact Number<br />
                                        <input type="text" class="input4" id="client_contact"/><input type="button"  class="button1" value="search" onclick="return getclientcontact();"/></td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        Client's Name & Email <br />
                                        <input type="text"  class="input4" id="name_email"/> <input type="button" class="button1" value="search" onclick="return getclientdetail();"/></td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        Request ID <br />
                                        <input type="text"  class="input4" id="request_id"/> <input type="button" class="button1" value="search" onclick="return requestid();"/></td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        Position Title<br />
                                         <input type="text" class="input4" id="position_title"/>  <input type="button" class="button1" value="search" onclick="return getpositiontitle();"/>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>Company Name<br />
                                        <input type="text"  class="input4" id="company_name"/> <input type="button" class="button1" value="search" onclick="return getcompanyname();"/></td>
                                    </tr>
                                    <tr>
                                    	<td>Job Description<br />
                                        <input type="text"  class="input4" id="job_description"/><input type="button" class="button1" value="search" onclick="return getjobdesc();"/></td>
                                    </tr>
                                    <tr>
                                    	<td> Nature of Business<br />
                                         <input type="text" class="input4" id="company_industry"/><input type="button" class="button1" value="search" onclick="return getnature();"/></td>
                                    </tr>
                                    <tr>
                                    	<td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    	<td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    	<td>
                                        Country <input type="text" style="width:200px; height:24px;" id="country"/>
                                        </td>
                                    </tr>
									<tr>
                                    	<td>&nbsp;</td>
                                    </tr>
                                     <tr>
                                    	<td>
                                        Town	<input type="text" style="width:200px; height:24px; margin-left:15px;" id="town"/>
                                        </td>
                                    </tr>
									 <tr>
                                    	<td>&nbsp;</td>
                                    </tr>
									 <tr>
                                    	<td>
											Request Date Range
										</td>
                                    </tr>
									<tr>
										<td>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										From
									<select class="input3select" id="request_form_d">
										<?php
										for($i=1;$i<=31;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select" id="request_form_m">
										<?php
										for($i=1;$i<=12;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select" id="request_form_y">
										<?php
										for($i=2014;$i<=2050;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
										to
									<select class="input3select" id="request_to_d">
										<?php
										for($i=1;$i<=31;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select" id="request_to_m">
										<?php
										for($i=1;$i<=12;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select" id="request_to_y">
										<?php
										for($i=2014;$i<=2050;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
										
										</td>
									</tr>
									<tr>
                                    	<td>&nbsp;</td>
                                    </tr>

									<tr>
										<td>
											Terms Signed Date
										</td>
									</tr>
									
									<tr>
										<td>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										From
										<select class="input3select" >
										<?php
										for($i=1;$i<=31;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select">
										<?php
										for($i=1;$i<=12;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select">
										<?php
										for($i=2014;$i<=2050;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
										to
										
					                                 <select class="input3select">
										<?php
										for($i=1;$i<=31;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select">
										<?php
										for($i=1;$i<=12;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
									<select class="input3select">
										<?php
										for($i=2014;$i<=2050;$i++)
										{
										?>
										<option value="<?=$i;?>"><?=$i;?></option>
										<?php
										}
										?>
									</select>
										
										</td>
									</tr>
									<tr>
                                    	<td>&nbsp;</td>
                                    </tr>

									<tr>
										<td>
											<input type="button1" class="button1" value="search" style="margin-left:20px;padding-top: 0px;" onclick="return getrequest();"/>
										</td>
									</tr>
							
                             </table>
							
							
					</div>
<!--------------------------content bar----------------------->
				
				
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
