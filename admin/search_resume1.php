<?php
include_once("../function.php");
is_admin();
$getdrugdet=mysql_query("select * from `skill`")or die(mysql_error());
										  while($resdrugdet=mysql_fetch_array($getdrugdet))
												{
												
												 $getemail[] = array(
																	'value'  =>$resdrugdet['skill'],
																	'idval' => $resdrugdet['slno']
																  
														);
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
#dvLoading
{
   height: 100px;
   width: 100px;
   position: fixed;
   z-index: 1000;
   left: 50%;
   top: 50%;
   margin: -25px 0 0 -25px;
}
</style>
<script>
    function showhidee()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
</script>
<!--autocomplete start-->
<link rel="stylesheet" href="../css/jquery-ui.css">
 <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
        var availabledrugs=<?= json_encode($getemail); ?>;
        $('.keyskl').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrugs,
        select: function( event, ui )
		{
		var valshow=ui.item.value;
        $('.keyskl').val(valshow);
		 $('.hdvall').val(ui.item.idval);
        return false;
		}
        });
});
function getclear()
	{
	document.getElementById('keywrdid').value="";
	}
	
</script>
 <!--autocomplete end-->

                  <script src="../js/jquery.form.js"></script> 
 <!--<script type="text/javascript">
function getajax()
{
var title=$('#title').val();
var typeval=$("input[name=type]:checked").val();
$.ajax({url:"search1.php?title="+title+'&typeval='+typeval,success:function(result){
              // $("#subnm").html(result);
                }});
}
 </script>-->
 <script>
 $(function () {
 $('#myajax').on('submit', function (e)
 { 
 e.preventDefault();
  $('#dvLoading').show();
 $.ajax({ type: 'post', url: 'search1.php', data: $('form').serialize()+'&'+$.param({ 'sub': 'Search' }),
 success: function (result) {
 //alert(result);
$('#leftid').html(result);
 $('#dvLoading').hide();
 }
 });
 }); 
$('#searchajax').on('submit', function (e)
 { 
 e.preventDefault();
  $('#dvLoading').show();
 $.ajax({ type: 'post', url: 'get_skill.php', data: $('form').serialize(),
 success: function (result) {
$('#leftid').html(result);
 $('#dvLoading').hide();
 }
 });
 });
 }); 
 function removecheck()
 {
 $('.positioncheckbox').attr('checked', false); 
 }
 function removespecialcheck()
 {
 $('.specializationcheckbox').attr('checked', false); 
 $('.specrad').attr('checked', false);  
 }
 function removeindustrycheck()
 {
 $('.industrycheckbox').attr('checked', false); 
 $('.indusrad').attr('checked', false);  
 }
 function addeducationcheck()
 {
 $('.educationcheckbox').each(function(){
  
   if (!$(this).prop("checked")) {
    $(this).prop("checked",true);
   }
  }); 
 }
 function removeeducationcheck()
 {
 $('.educationcheckbox').attr('checked', false); 
 }
 function addfield(nval)
 {
 $('.field'+nval).each(function(){
  
   if (!$(this).prop("checked")) {
    $(this).prop("checked",true);
   }
  }); 
 }
  function removefield(nval)
 {
  $('.field'+nval).each(function(){
  
   if ($(this).prop("checked")) {
    $(this).prop("checked",false);
   }
  }); 
 }
 function addgraduate()
 {
 $('.graduatecheckbox').each(function(){
  
   if (!$(this).prop("checked")) {
    $(this).prop("checked",true);
   }
  }); 
 }
 function removegraduate()
 {
$('.graduatecheckbox').each(function(){
  
   if ($(this).prop("checked")) {
    $(this).prop("checked",false);
   }
  }); 
}
 function addcountry()
 {
 $('.countrycheckbox').each(function(){
  
   if (!$(this).prop("checked")) {
    $(this).prop("checked",true);
   }
  });
 }
 function removecountry()
 {
  $('.countrycheckbox').each(function(){
   if ($(this).prop("checked")) {
    $(this).prop("checked",false);
   }
  });
 }
 function addlocation()
 {
  $('.locationcheckbox').each(function(){
  
   if (!$(this).prop("checked")) {
    $(this).prop("checked",true);
   }
  });
 }
 function removelocation()
 {
 $('.locationcheckbox').each(function(){
  
   if ($(this).prop("checked")) {
    $(this).prop("checked",false);
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
	.new2{
	   color:#0221e6;
	   text-decoration: underline;
	}
                    </style>
 <script>
  function addallshort(){
 var hdval=$('#hid_slno').val();
    $.ajax({
	url:"shortlist_addall.php?id="+hdval,async: false,
	success:function(result){
	alert('Successfully Shortlisted all candidates');
	$('#divid').html(result);
	 }
    });
    }
	function removeallshort(){
 var hdval=$('#hid_slno').val();
    $.ajax({
	url:"shortlist_removeall.php?id="+hdval,async: false,
	success:function(result){
	alert('Successfully Removed all candidates');
	$('#divid').html(result);
	 }
    });
    }
  </script>  
  <script>  
  function addshort(val){
    $.ajax({
	url:"shortlist_add.php?add_id="+val,async: false,
	success:function(result){
	alert('Successfully Shortlisted');
	$('#addid'+val).html(result);
	       }
    });
    }
	</script>  
	<script>  
    function removeshort(vals){
    $.ajax({
	url:"shortlist_remove.php?rmv_id="+vals,async: false,
	success:function(results){
	alert('Successfully removed');
	$('#remvid'+vals).html(results);
	       }
    });
    }	
	
 </script>
 <script>
function checkcountry(){
  if($('.countrycheckbox').is(":checked")) {
var checkedVals = $('.countrycheckbox:checkbox:checked').map(function() {
   // return this.value;
   var chkval=this.value;
	 $.ajax({
	url:"getstate.php?contid="+chkval,async: false,
	success:function(results)
	{
	$('#locid').html(results);
	}
    });
}).get();
}
}
 </script>
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
                                <div id="pg_listbox">
                               
                                </div>
                        </div>
						<div id="dvLoading" style="display:none;">
						<img src="../admin/images/loading-small.gif" style="width: 100px;height: auto;"/>
						</div>
						<div id="leftid">
						<!--<div id="searchid">-->
						
						<?php
						include_once("pagination.php");
						echo $pagination;
						$pg=$_GET['page'];	
						$no=0;
						?>
						<h2 class="head3" style="font-size:20px; text-align:center; margin-top:0px;">
						
						<?php
						$new_array=array();
						while($rescvdetails=mysql_fetch_array($res2))
						{ 
						$status=$rescvdetails['shortlisted']; 
						array_push($new_array, $status);
						}
						if (in_array("0", $new_array))
						{
							echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return addallshort();'>Add All to Shortlist</span></div>";
						}
						else
						{
						echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return removeallshort();'>Remove All from shortlist</span></div>";
						}
						?>
							
						
						
								<?php echo $numm;?> Candidates found in Pg <?php echo $pg;?> of <?php echo $lastpage;?>
						</h2>
                		<div id="content2_leftbox">
						<?php
						$cont='';
						while($resdetails=mysql_fetch_array($res1))
						{ 
						$no++;
						$userid=$resdetails['user_id'];
						$pic=$resdetails['picture'];
						$picval=explode('/',$pic);
						$slno=$resdetails['slno']; 
						$cont.=$slno.",";
						?>
                        	    <div class="left_listbox">
                                		<div class="left_listimg">
                                        		
												<?php
												if($pic=="images/default.jpg"){
												?>
												<img src="../images/default.jpg" style="width:100%;"/>
												<?php
												}
												else if($pic==""){
												?>
												<img src="../images/default.jpg" style="width:100%;"/>
												<?php
												}
												else{
												?>
												<img src="<?php echo $picval[1]."/".$picval[2];?>" style="width:100%;"/>
												<?php
												}
												?>
												
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">
												<?php 
												$sqlcurrency=mysql_query("select * from `currency` where `slno`='$resdetails[expected_currency]'");
												$rescurrency=mysql_fetch_array($sqlcurrency);
												echo $rescurrency['symbol']." ".$resdetails['expected_salary'];
												?></span>
                                        </div>
                                        <div class="leftlist_textbox1">
                                        		<h3 class="head4"> 
							
                                                	<a href="candidate1.php?slno=<?php echo $resdetails['slno'];?>" style="text-decoration: none; color: #333;" target="_blank">
							<?php echo $no;?>.<?php echo $resdetails['first_name']." ".$resdetails['last_name']; ?><!--(Malaysian/Singapore, PR)-->
							</a>
							</h3>
                                                <p class="text4">
                                                Exp: 
												<?php
												$expr=$resdetails['experience_date'];
												$split=explode('-',$expr);
												$spiltyear=$split[0];
												$spiltmonth=$split[1];
												echo $spiltyear." yrs";
												
												?>
                                                <br />
                                                Edu: <?php echo $resdetails['last_course']; ?>	 
                                                <br />
                                                <br />
                                                Current Position:
						<?php
						$fetchexperience=mysql_query("select * from `experience` where `user_id`='$userid'");
						$resexperience=mysql_fetch_array($fetchexperience);
						echo $resexperience['title'];
					    ?>
                                                <br />
                                                <br />
						
                                               Pref Location: <?php
						$preferd_location=$resdetails['preferd_location'];
						$arr=explode(',',$preferd_location);
						foreach ($arr as & $value)
						{
						$floc=mysql_query("select * from `location` where `slno`='$value'");
						$rloc=mysql_fetch_array($floc);
						if($rloc['location']!=""){
						echo $rloc['location'].",";}
						}
						?><!--Johor Bahru, Kuala Lumpur, Melaka-->
						</br>Language:
						<?php 
						$contt="";
												$sqllng1=mysql_query("select * from `language_details` where `user_id`='$resdetails[user_id]'");
												//echo "select * from `language_details` where `user_id`='$res[user_id]'";
												while($rowlngg1=mysql_fetch_array($sqllng1)){
												$langg1=$rowlngg1['language'];
												$langname1=mysql_query("select * from `language` where `slno`='$langg1'");
												$rowname1=mysql_fetch_array($langname1);
												$contt=$contt.",".$rowname1['language'];
												}
												$lngname1=ltrim($contt,",");
												echo $lngname1;
						
						?> 
						<br/>
						
                                                </p>
                                        </div>
                                        <div class="leftlist_textbox2">
                                        		<ul class="left_contectlist">
                                                		<li><i><img src="images/i1.jpg"/></i> <span>+<?php echo $resdetails['mobile_contact']; ?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> 
														<span>
														<?php
														
														$emll=$resdetails['email'];
														$xx=substr($emll,0,20)."<br/>";
														echo $xx;
														$lenn=strlen($emll);
														$restt=$lenn-20;
														$yy=substr($emll,20,$restt);
														echo $yy;
														?>
														</span></li>
                                                        <li><i><img src="images/i3.jpg"/></i> <span><?php echo $resdetails['age']; ?></span></li>
                                                        <li><i><img src="images/i4.jpg"/></i> <span>
														<?php 
														$crntaddress=$resdetails['current_address'];
														$ext=explode('/',$crntaddress);
														$address=$ext[0].",".$ext[1];
														echo html_entity_decode($address);
														?></span></li>
							<li style=" line-height: 1.2;"><span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">Deposited Resume</span></li>
							<li style=" line-height: 1.2;"><span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">No SMS notification</span></li>
							<li style=" line-height: 1.2;"><span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">No EMAIL notification</span></li>
                                                </ul>
                                        </div>
                                        <div style="width:430px; float: left;margin-left: 40px;">
					 <?php
					 if($resdetails['shortlisted']==0){
					 ?>
					 <span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return addshort(<?php echo $resdetails['slno']; ?>);" id="addid<?php echo $resdetails['slno']; ?>">Add to Shortlist </span>
					 <?php
					 }
					 else{
					 ?>
						<span style="float: left; margin-left: 10px;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return removeshort(<?php echo $resdetails['slno']; ?>);" id="remvid<?php echo $resdetails['slno']; ?>">Remove from Shortlist</span>
					<?php
					 }
					?>
					</div>
					 
					 <div class="date">
                                        		Last Updated:
												<?php
												$date=$resdetails['updated_date'];
												if($date!='0000-00-00 00:00:00'){
												$getday=date('d', strtotime($date));	
												echo $getday." ";	
$getmonth=date('m', strtotime($date));		
$monthName = date('M', mktime(0, 0, 0, $getmonth, 10));	
echo 	$monthName." ";		
$getyear=date('Y', strtotime($date));
echo 	$getyear;		
}
else{}			
												?>
												
                                        </div>
				    </div>
				    <?php 
					}
					?>
                                <input type='hidden' name='hid' id='hid_slno' value='<?php echo $cont; ?>' />
                                
                       <!-- </div>	-->
						</div>
					</div>	
                </div>
                <div id="content2_right">
                		<h3 class="head3" style="margin-top: 27px;">Database Search </h3>
			<form name="frm" action="get_skill.php" method="post" id="searchajax">
				<table class="table2" style="margin-top: 8px;">
				    <tr>
					<th colspan="2">Keyword Search</th>
				    </tr>
				    <tr>
					<td>Keyskill</td>
					<td>
					<input type="text" class="input3 keyskl" placeholder="for example:network administration" name="keywrd" id="keywrdid" autocomplete="off"/>
					<input type="hidden" name="hidden_keyskill" id="hdval" class="hdvall" />
					<!--<span style="">More Option</span>-->
					</td>
				    </tr>
				    <tr>
					<td>Search In</td>
					<td>
					    <select class="input3select" name="searchin">
					     <option value="">
						    Skills,Position Title,College Name
						</option>
					     <?php
					     $skill=mysql_query("select * from  `skill`")or die(mysql_error());     
					     while($resskill=mysql_fetch_array($skill)){	     
					     ?>
					     <option value="<?=$resskill['slno'].'>'.'skill';?>"><?=$resskill['skill'];?></option>		     
					     <?php
					     } 					    
					     $sptcn=mysql_query("select * from  `education` where `institute`!='' group by `institute` ")or die(mysql_error());
					     while($ressptcn=mysql_fetch_array($sptcn)){
					     ?>
					     <option value="<?=$ressptcn['institute'].'>'.'cname';?>"><?=$ressptcn['institute'];?></option>
					     <?php }
					     $tit=mysql_query("select * from  `experience` where `title`!='' group by `title`")or die(mysql_error());
					     while($restit=mysql_fetch_array($tit)){					     
					     ?>
					     <option value="<?=$restit['title'].'>'.'jpost';?>"><?=$restit['title'];?></option>
					     <?php } ?>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Resume Active in the last</td>
					<td>
					    <select class="input3select" name="active">
					     <option value="6">6 months</option>
					     <option value="5">5 months</option>
					     <option value="4">4 months</option>
					     <option value="3">3 months</option>
					     <option value="2">2 months</option>
					     <option value="1">1 months</option>					    
					    </select>
					</td>
				    </tr>
				    <tr>
					<td colspan="2">
					    <input type="submit" value="Search" class="button1" name="search" style="margin-left: 0px;"/>
					    <input type="button" value="Clear" class="button1" onclick="return getclear();"/>
					
					</td>
				    </tr>
				</table>
			</form>		
				<div id="newpost">
				 <form action="search1.php" method="post" id="myajax">
				<table class="table2">
				    <tr>
					<th colspan="4">Work Experience</th>
				    </tr>
				    <tr>
					<td>Position Title</td>
					<td colspan="4"><input type="text" class="input3" placeholder="for example:Software Developer Engineer" name="title" id="title"/><br/> <br/>
					    <input type="radio" name="type" value="current" />Current
					    <input type="radio" name="type" value="previous"/>Previous
					    <input type="radio" name="type" value="any"/>Any
					
					</td>
				    </tr>
				    <tr >
					<td>Years of Experience</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:40px;float: left;margin-left: 5px;" name="minexp"/></td>
					<td colspan="2"><span style="float: left;  color: #333;">Max</span><input type="text" class="input3"  style="width:40px;float: left;margin-left: 5px;" name="maxexp"/></td>
					
				    </tr>
				    <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">
					   
					</td>
				    </tr>
				    <tr >
					<td>Expected Month Salary</td>
					<td width="100"><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:40px;float: left; margin-left: 5px;" name="min_expsalry"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3"  style="width:40px;float: left;margin-left: 5px;" name="max_expsalry"/></td>
					<td width="120">Currency
					    <select class="input3select" name="expect_currency1">
						<option value="">select</option>
					    <?php
					$fcurrency=mysql_query("select * from `currency`");
					while($rcurrency=mysql_fetch_array($fcurrency))
					{?>
						<option value="<?php echo $rcurrency['slno'];?>"><?php echo $rcurrency['symbol'];?></option>
						<?php }?>
					    </select>
					</td>
				    </tr>
				    <tr >
					<td>Current Month Salary</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:40px;float: left;margin-left: 5px;" name="min_crntsalry"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" style="width:40px;float: left;margin-left: 5px;" name="max_crntsalry"/></td>
					<td>Currency
					    <select class="input3select" name="current_currency1">
						<option value="">select</option>
						<?php
					$fcurrency1=mysql_query("select * from `currency`");
					while($rcurrency1=mysql_fetch_array($fcurrency1))
					{?>
						<option value="<?php echo $rcurrency1['slno'];?>"><?php echo $rcurrency1['symbol'];?></option>
						<?php }?>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">
					   &nbsp;
					</td>
				    </tr>
				    <tr>
					<td>Current Position Level</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$fetchlevel=mysql_query("select * from `position_level`");
					while($reslevel=mysql_fetch_array($fetchlevel))
					{?>
						<input type="checkbox" name="checkbo[]" value="<?php echo $reslevel['slno']; ?>"  class="positioncheckbox"/><?php echo $reslevel['position']; ?><br/>
						<?php }?>
					    </div>
					   <span onclick="return removecheck();">[clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>Company Name</td>
					<td colspan="3"><input type="text" class="input3" placeholder="for example:jobstreet.com" name="company"/><br/><br/>
					    <input type="radio" name="comp_type" value="current"/>Current
					    <input type="radio" name="comp_type" value="previous"/>Previous
					    <input type="radio" name="comp_type" value="any"/>Any
					</td>
				    </tr>
				     <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">
					   &nbsp;
					</td>
				    </tr>
				     <tr>
					<td>Industry</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$fspecialization=mysql_query("select * from `job_function`");
					while($rspecialization=mysql_fetch_array($fspecialization))
					{?>
						<input type="checkbox" name="chkspecialization[]" value="<?php echo $rspecialization['slno']; ?>" class="specializationcheckbox"/><?php echo $rspecialization['jobfunction']; ?><br/>
						<?php }?>
						
					    </div>
					  
					</td>
					<td>Specialization</td>
					<td>
					    
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$findustry=mysql_query("select * from `industry`");
					while($rindustry=mysql_fetch_array($findustry))
					{?>
						<input type="checkbox" name="chkindustry[]" value="<?php echo $rindustry['slno']; ?>" class="industrycheckbox"/><?php echo $rindustry['industry']; ?><br/>
						<?php }?>
					    </div>
					  
					</td>
				    </tr>
				     <tr>
				      <td colspan="2">
				       <span onclick="return removespecialcheck();">[clear]</span>
					   <input type="radio" name="sp_type" value="current" class="specrad"/>Current
					    <input type="radio" name="sp_type" value="previous" class="specrad"/>Previous
					    <input type="radio" name="sp_type" value="any" class="specrad"/>Any
				      </td>
				      <td colspan="2">
					 <span onclick="return removeindustrycheck();">[clear]</span>
					   <input type="radio" name="indus_type" value="current" class="indusrad"/>Current
					    <input type="radio" name="indus_type" value="previous" class="indusrad"/>Previous
					    <input type="radio" name="indus_type" value="any" class="indusrad"/>Any
				      </td>
				     </tr>
				</table>
				
				<table class="table2">
				    <tr>
					<th colspan="4">Education Level</th>
				    </tr>
				   
				    <tr>
					<td>Highest Qualification</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$fqualification=mysql_query("select * from `qualification`");
					while($rqualification=mysql_fetch_array($fqualification))
					{ ?>
						<input type="checkbox" name="chkqualification[]" value="<?php echo $rqualification['id']; ?>" class="educationcheckbox"/><?php echo $rqualification['qualification']; ?><br/>
						<?php }?>
					    </div>
						<span onclick="return addeducationcheck();" style="cursor:pointer;">[All </span>
					   <span onclick="return removeeducationcheck();" style="cursor:pointer;">| clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td colspan="4">Field Of Study</td>
					
				    </tr>
				    
				     <tr>
					<?php
					$n=0;
					$ffieldofstudy=mysql_query("select * from `fieldofstudy` group by `field`");
					while($rfieldofstudy=mysql_fetch_array($ffieldofstudy))
					{ $field=$rfieldofstudy['field'];
					$n++;
					    ?>
					<td <?php if ($n%2==0)
					{
					    echo "style='text-align:right;'";
					    }?>> <?php echo $rfieldofstudy['field']; ?></td>
					
					<td id="<?php echo $n;?>">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$ffieldofstudy1=mysql_query("select * from `fieldofstudy` where `field`='$field'");
					while($rfieldofstudy1=mysql_fetch_array($ffieldofstudy1))
					{ ?>
						<input type="checkbox" value="<?php echo $rfieldofstudy1['id']; ?>" name="field[]" class="field<?php echo $n;?>"/><?php echo $rfieldofstudy1['trade']; ?><br/>	
					<?php
					}
					?>
					    </div>
					   <span onclick="return addfield(<?php echo $n;?>);" style="cursor:pointer;">[All </span>
					   <span onclick="return removefield(<?php echo $n;?>);" style="cursor:pointer;"> | clear]</span>
					  
					</td>
					<?php
					
					if ($n%2==0)
					{
					 echo "</tr><tr>";
					 }
					 }?>
					
				    </tr>
				    <tr>
					<td>Grade/CGPA</td>
				    <td><input type="checkbox" name="grade[]" value="A"/>Grade A/1st Class</td>
					<td><input type="checkbox" name="grade[]" value="B"/>Grade B/2nd Class Upper</td>
					<td><input type="checkbox" name="grade[]" value="C"/>Grade C/2nd Class Lower</td>
				    </tr>
				    <tr>
					<td></td>
					<td>Or Specify CGPA Range:</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" style="width:20px;float: left;" name="min_cgp"/> %</td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3"  style="width:20px;float: left;" name="max_cgp"/> %</td>
				     </tr>
				    <tr>
					<td>Country Of Graduation</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$fcountry=mysql_query("select * from `country`");
					while($rcountry=mysql_fetch_array($fcountry))
					{ ?>
						<input type="checkbox" name="graduate_country[]" value="<?php echo $rcountry['slno'];?>" class="graduatecheckbox"/><?php echo $rcountry['country'];?><br/>
						<?php }?>
					    </div>
					   <span onclick="return addgraduate();" style="cursor:pointer;">[All </span>
					   <span onclick="return removegraduate();" style="cursor:pointer;"> | clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>College Name</td>
					<td colspan="4"><input type="text" class="input3" placeholder="for example:abc college" name="college"/><br/><br/>
					<input type="radio" name="edu_type" value="Highest"/>Highest Education
					<input type="radio" name="edu_type" value="Any"/>Any Education
					</td>
				    </tr>
				    <tr>
					<td>Retrieve Candidates who graduated in the last</td>
					<td colspan="3">
					    <select class="input3select" name="candidate" style="width:250px;">
						<option value="all">All Candidates</option>
						<option value="3">3 Month</option>
						<option value="6">6 Month</option>
						<option value="12">12 Month</option>
						<?/*php
						$sqllast=mysql_query("select * from `education` where `education_type`='Highest'");
						while($reslast=mysql_fetch_array($sqllast)){
						$userid=$reslast['user_id'];
						$sqlname=mysql_query("select `first_name`,`last_name` from `cv_detail` where `user_id`='$userid'");
						while($resname=mysql_fetch_array($sqlname)){
						?>
						<option value="<?php echo $resname['slno'];?>"><?php echo $resname['first_name']." ".$resname['last_name'];?></option>
						<?php
						}
						}
						*/?>
					    </select>
					</td>
				    </tr>
				</table>
				<table class="table2">
				    <tr>
					<th colspan="4">Location</th>
				    </tr>
				    <tr>
					<td>Country<br/>(Citizen Of)</td>
					<td>
					    <div style="width:150px; height: 120px; float: left; border:1px solid #dedede; overflow: auto; word-break: break-all;">
						<?php
					$fcountry1=mysql_query("select * from `country`");
					while($rcountry1=mysql_fetch_array($fcountry1))
					{ ?>
						<input type="checkbox" name="chkcountry[]" value="<?php echo $rcountry1['slno'];?>" class="countrycheckbox" onclick="return checkcountry(<?php echo $rcountry1['slno'];?>);"/><?php echo $rcountry1['country'];?><br/>
						<?php }?>
					    </div>
					  <!-- <span onclick="return addcountry();" style="cursor: pointer;">[All </span>-->
					   <span onclick="return removecountry();" style="cursor: pointer;">[clear]</span> 
					   <input type="checkbox" />Include candidates with PR 
					</td>
					<td>Residing In</td>
					<td>
					<div style="width:180px; height: 120px; float: left; border:1px solid #dedede; overflow: auto;" id="locid">
					     <div style="width: 100%;float: left;margin-left: 0px;">
						<?php
					$flocation=mysql_query("select * from `location`");
					while($rlocation=mysql_fetch_array($flocation))
					{
					 $pos = strpos($rlocation['location'], "Any");
					 if($pos === false)
					 {
					  ?>
					 
					   <span style="width: 100%;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]" value="<?php echo $rlocation['slno']; ?>" class="locationcheckbox"/><?php echo $rlocation['location']; ?></span>
					  <?php
					 }
					 else
					 {
					 ?>
					  </div>
					<span style="width: 100%;font-weight: bold;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]"  class="locationcheckbox"/><?php echo $rlocation['location']; ?></span>
					 <div style="width: 100%;float: left;margin-left: 20px;">
						<?php
					 }
						
						}?>
					    </div> 
					</div>
					   <!-- <div style="width:220px; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
					     <div style="width: 100%;float: left;margin-left: 0px;">
						<?php
					$flocation=mysql_query("select * from `location`");
					while($rlocation=mysql_fetch_array($flocation))
					{
					 $pos = strpos($rlocation['location'], "Any");
					 if($pos === false)
					 {
					  ?>
					 
					   <span style="width: 100%;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]" value="<?php echo $rlocation['slno']; ?>" class="locationcheckbox"/><?php echo $rlocation['location']; ?></span>
					  <?php
					 }
					 else
					 {
					 ?>
					  </div>
					<span style="width: 100%;font-weight: bold;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]"  class="locationcheckbox"/><?php echo $rlocation['location']; ?></span>
					 <div style="width: 100%;float: left;margin-left: 20px;">
						<?php
					 }
						
						}?>
					    </div> 
					    </div>-->
					 <div style="width: 100%;float: left;">
					   <input type="checkbox" />Include candidates with selected above location as their preferred locations
					 </div>
					</td>
				    </tr>
				    <tr>
					<td>City[<span style="float:none;">?</span>]</td>
					<td colspan="3"><input type="text" class="input3"  name="city"/></td>
				    </tr>
				</table>
				<table class="table2">
				    <tr>
					<th colspan="4">Personal Data/Others</th>
				    </tr>
				    <tr>
					<td>Age</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" style="width:60px;float: left;" name="min_age"/></td>
					<td colspan="2"><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" style="width:60px;float: left;" name="max_age"/></td>
					
				    </tr>
				    <tr>
					<td>Gender</td>
					<td colspan="2">
					    <select class="input3select" name="gender">
						<option value="">select</option>
						<option value="any">Any</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Language</td>
					<td>
					    <select class="input3select" name="language">
						<option value="">select</option>
						<?php
					$flanguage=mysql_query("select * from `language`");
					while($rlanguage=mysql_fetch_array($flanguage))
					{ ?>
						<option value="<?php echo $rlanguage['slno'];?>"><?php echo $rlanguage['language'];?></option>
						<?php }?>
					    </select>
					</td>
					<td>
					    <select class="input3select">
						<option>Or</option>
						
					    </select>
					</td>
					<td>
					    <select class="input3select" name="language1">
						<option value="">select</option>
						<?php
					$flanguage1=mysql_query("select * from `language`");
					while($rlanguage1=mysql_fetch_array($flanguage1))
					{ ?>
						<option value="<?php echo $rlanguage1['slno'];?>"><?php echo $rlanguage1['language'];?></option>
						<?php }?>
						
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Candidates who joined on these dates</td>
					<td>
					    <select class="input3select" name="fromday">
						<option value="">select</option>
						<?php
						for($i=1;$i<=31;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
						
					    <select class="input3select" name="frommonth">
						<option value="">select</option>
						<?php
						for($i=1;$i<=12;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
						
					    <select class="input3select" name="fromyear">
						<option value="">select</option>
						<?php
						$date=date('Y');
						for($i=1990;$i<=$date;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
					</td>
					<td style="text-align: center;">to</td>
					<td>
					    <select class="input3select" name="today">
						<option value="">select</option>
						<?php
						for($i=1;$i<=31;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
						
					    <select class="input3select" name="tomonth">
						<option value="">select</option>
						<?php
						for($i=1;$i<=12;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
						
					    <select class="input3select" name="toyear">
						<option value="">select</option>
						<?php
						$date=date('Y');
						for($i=1990;$i<=$date;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
					    </select>
					</td>
					
				    </tr>
				    <tr>
					<td>Result per page</td>
					<td colspan="3"> <select class="input3select">
						<option>10</option>
					    </select></td>
				    </tr>
				    <tr>
					<td>Include candidates who don not wish to receive notification via</td>
					<td>Sms
					    <select class="input3select" name="smsnotice">
						<option value="">select</option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
						
					    </select>
					</td>
					<td colspan="2">Email
					    <select class="input3select" name="emailnotice">
						<option value="">select</option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
						
					    </select>
					</td>
					
				    </tr>
				    <tr>
					<td colspan="4">
					    <input type="submit" class="button1" value="Search" id="btn" name="sub" style="margin-left: 0px;"/>
					    <input type="reset" class="button1" value="Clear" />
					</td>
					
				    </tr>
				</table>
				</form>
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
