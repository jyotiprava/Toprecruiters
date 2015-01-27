<?php
include_once("../function.php");
is_admin();
$slno=$_GET['slno'];
$sqldetail=mysql_query("select * from `cv_detail` where `slno`='$slno'");
$resdetail=mysql_fetch_array($sqldetail);
$sqlcount=mysql_query("select * from `country` where `slno`='$resdetail[country]'");
$rescount=mysql_fetch_array($sqlcount);
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
<html>
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

 <script>
    function showhide()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
	 function getclear()
	{
	document.getElementById('keywrdid').value="";
	}
	
	
	
	function getshrtlist(slno,empid)
	{
	    $.ajax({url:"ajax_shlist.php?slno="+slno+"&empid="+empid,
		   success:function(results)
		   {
		    if (results.trim()=='OK') {
			location.reload();
		    }
		   }
	    });
	}
  </script>
  <!--autocomplete start-->
<link rel="stylesheet" href="../css/jquery-ui.css">
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function(){
	// jQuery.noConflict();
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
</script>
 <script src="../js/jquery.form.js"></script> 
 <script>
 $(function () {
 $('#myajax').on('submit', function (e)
 { 
 e.preventDefault();
 $.ajax({ type: 'post', url: 'search1.php', data: $('form').serialize(),
 success: function (result) {
$('#leftid').html(result);
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
	.brd
	{
	width: 475px;
height: auto;
float: left;
border-bottom: 2px solid #8ba264;
padding-bottom: 5px;
margin-bottom: 10px;
	}
                    </style>
 <!--autocomplete end-->
 <!--<style>
    .button6{ width:100px; height:auto; float:left; padding:4px; text-align:center; color:#fff; background-image: -o-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -moz-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -webkit-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -ms-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: linear-gradient(to bottom, #00A3BC 0%, #017B8E 100%); border:1px solid #027b8c; border-radius:4px 4px;}
 </style>-->
  <script>  
  function addshort(val){
    $.ajax({
	url:"shortlist_add.php?add_id="+val,async: false,
	success:function(result){
	alert(result);
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
	alert(results);
	alert('Successfully removed');
	$('#remvid'+vals).html(results);
	       }
    });
    }	
 </script>
</head>
<body>
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
                        		<li><a href="#" style="padding-left:0px; color:#0000FF;">Request Page</a></li>
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
                		<div id="pg_box">
                        		<!--<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;">118 Candidates found. Pg 1 of 100</h2>-->
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
						
                		<div id="leftid">
                		<div id="content2_leftbox" style="margin-top:50px;">
						
						<?php
						if(isset($_POST['search']))
						{
						$keywords=$_POST['hidden_keyskill'];
						$sql1 = "SELECT * FROM `cv_detail` where `advanced` like '%$keywords%'";
						$res11 = mysql_query($sql1);
						$total_pages=mysql_num_rows($res11);
						if($total_pages==0)
						{
						?>
						<span style="font-family:arial; font-size:14px;">There are no records.</span>
												
						<?php
						}
						else{
						?>
						<?php
						while($reskeyskill=mysql_fetch_array($res11)){
						 $slno=$reskeyskill['slno'];
						 $pic1=$reskeyskill['picture'];
						 echo $pic1."pic1";
					    $picval1=explode('/',$pic1);
						?>
						<div class="left_listbox">
                                		<div class="left_listimg">
                          
												<?php
												if($pic1=="images/default.jpg"){
												?>
												<img src="../images/default.jpg" style="width:100%;"/>
												<?php
												}
												else if($pic1==""){
												?>
												<img src="../images/default.jpg" style="width:100%;"/>
												<?php
												}
												else{
												?>
												<img src="<?php echo $picval1[1]."/".$picval1[2];?>" style="width:100%;" />
												<?php
												}
												?>
												
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">
												<?php
												$sqlcurrency1=mysql_query("select * from `currency` where `slno`='$reskeyskill[expected_currency]'");
												$rescurrency1=mysql_fetch_array($sqlcurrency1);
												echo $rescurrency1['symbol']." ".$reskeyskill['expected_salary'];
												?>
												</span>
						
                                        </div>	
									    <div class="leftlist_textbox1">
                                        		<h3 class="head4">
                                                		
														1.<?php echo $reskeyskill['first_name']." ".$reskeyskill['last_name'];?>
												</h3>
                                                <p class="text4">
                                                Exp:
												<?php
												$expr=$reskeyskill['experience_date'];
												$split=explode('-',$expr);
												$spiltyear=$split[0];
												$spiltmonth=$split[1];
												echo $spiltyear." yrs";
												
												?>
                                                <br />
                                                Edu: 
												<?php echo htmlspecialchars_decode($reskeyskill['last_course']);?>
												</p>
												<p class="text4">
                                                
                                                Current Position: 
												<?php
												$sqlexp=mysql_query("select * from `experience` where `user_id`='$reskeyskill[user_id]' and `type`='current'");
												$resexp=mysql_fetch_array($sqlexp);
												echo html_entity_decode($resexp['title']);
												
												?>
											 
												<br/>
												<br/>
                                                Pref Location:
												<?php 
												$ploc=$reskeyskill['preferd_location'];
												$lc=explode(',',$ploc);
												$cont='';
												foreach($lc as $lc1)
												{
												if($lc1!=''){
												$sqlloc=mysql_query("select * from `location` where `slno`='$lc1'");
												$rowloc=mysql_fetch_array($sqlloc);
												$plocation=$rowloc['location'];
												$cont.=$plocation.",";
												}
												}
												echo $cont;
												?>
												<br/>
											Language: 
											<?php
												$contt="";
												$sqllng1=mysql_query("select * from `language_details` where `user_id`='$reskeyskill[user_id]'");
												while($rowlngg1=mysql_fetch_array($sqllng1)){
												$langg1=$rowlngg1['language'];
												$langname1=mysql_query("select * from `language` where `slno`='$langg1'");
												$rowname1=mysql_fetch_array($langname1);
												$contt=$contt.",".$rowname1['language'];
												}
												$lngname1=ltrim($contt,",");
												echo $lngname1;
												
											?>
											
                                                </p>
                                        </div>
										 <div class="leftlist_textbox2">
                                        		<ul class="left_contectlist">
                                                		<li><i><img src="images/i1.jpg"/></i> <span>+<?php echo $reskeyskill['mobile_contact'];?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> <span>
														
														<?php 
														$emll=$reskeyskill['email'];
														$xx=substr($emll,0,20)."<br/>";
														echo $xx;
														$lenn=strlen($emll);
														$restt=$lenn-20;
														$yy=substr($emll,20,$restt);
														echo $yy;
														?>
														</span></li>
                                                        <li><i><img src="images/i3.jpg"/></i> <span><?php echo $reskeyskill['age'];?> yrs old</span></li>
                                                        <li><i><img src="images/i4.jpg"/></i> <span>
														<?php 
														$crntaddress=$reskeyskill['current_address'];
														$ext=explode('/',$crntaddress);
														$address=$ext[0].",".$ext[1];
														echo html_entity_decode($address);
														?>
														</span></li>
							
							
							
                                                </ul>
                                        </div>
                                        <div class="date">
                                        		Last Updated: 
												<?php
												$date=$reskeyskill['updated_date'];
												if($date!='0000-00-00 00:00:00'){
												$getday=date('d', strtotime($date));	
												echo $getday." ";	
$getmonth=date('m', strtotime($date));		
$monthName = date('F', mktime(0, 0, 0, $getmonth, 10));	
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
						}
						}else{
						$sql = "SELECT * FROM `cv_detail` where `slno`='$slno'";
						$res1 = mysql_query($sql);
						
				    $no=0;
				    /*while($resdetails=mysql_fetch_array($res1))
				    { */
					$resdetails=mysql_fetch_array($res1);
					$no++;
					$userid=$resdetails['user_id'];
					$pic=$resdetails['picture'];
					$picval=explode('/',$pic);
					
				    ?>
                        	    <div class="left_listbox" style="border-bottom:none;">
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
						<div style="width:90px; float: left;text-align: center;">
						<ul class="left_contectlist1" style="text-align: center;">
						<li style=" line-height: 1.2;">
						<?php
						if($resdetail['shortlisted']==0)
						{
						?>
						<span style="text-align: center;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return addshort(<?php echo $resdetails['slno']; ?>);" id="addid<?php echo $resdetails['slno']; ?>">Add to shortlist</span>
						<?php
						}else{
						?>
						<span style="text-align: center;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return removeshort(<?php echo $resdetails['slno']; ?>);" id="remvid<?php echo $resdetails['slno']; ?>">Remove from Shortlist</span>
						<?php
						}
						?>
						</li>
							<li style=" line-height: 1.2;"><span style="text-align: center;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">Edit Resume</span></li>
							<li style=" line-height: 1.2;"><span style="text-align: center;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">Deposited Resume</span></li>
						</ul>
						</div>
                                        </div>
										
										
					<div class="left_listcontent">
					    <h3 class="head4">
                                                		<?php echo $no;?>.<?php echo $resdetails['first_name']." ".$resdetails['last_name']; ?>
														<span class="date" style="width:auto;float: right;">
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
														</span><br/>
								<span style="font-size:14px;font-weight: normal;">
								<?php
						$fetchexperience=mysql_query("select * from `experience` where `user_id`='$userid' and `type`='current'");
						$resexperience=mysql_fetch_array($fetchexperience);
						echo $resexperience['title'];
					    ?>
								
								</span>
					    </h3>
					    
					    <div class="leftlist_textbox1">
						<table class="table3">
						    <tr>
							<td>Experience</td>
							<td>
							<?php
												if($expr!=''){
												$expr=$resdetails['experience_date'];
												$split=explode('-',$expr);
												$spiltyear=$split[0];
												$spiltmonth=$split[1];
												echo $spiltyear." yrs";
												}
												else
												{
												echo "0yrs";
												}
							?>
							</td>
						    </tr>
						    <tr>
							<td>Previous</td>
							<td>
						<?php
						$fetchexperience1=mysql_query("select * from `experience` where `user_id`='$userid' and `type`!=''");
						$resexperience1=mysql_fetch_array($fetchexperience1);
						echo $resexperience1['title']."<br/>".$resexperience1['company'];
					    ?>
							</td>
						    </tr>
						    <tr>
							<td>Education</td>
							<td>
							    <?php
												$sqlcouse=mysql_query("select * from `education` where `user_id`='$userid' and `education_type`='Highest'");
												$rescourse=mysql_fetch_array($sqlcouse);
												$sqldegree=mysql_query("select `qualification` from `qualification` where `id`='$rescourse[degree]'");
												$resdegree=mysql_fetch_array($sqldegree);
												$sqlfield=mysql_query("select `field`,`trade` from `fieldofstudy` where `id`='$rescourse[field]'");
												$resfield=mysql_fetch_array($sqlfield);
												echo $resdegree['qualification']." in ".$resfield['field']."(".$resfield['trade']."),".$rescourse['country']."(".$rescourse['year'].")";
								?>	 
							</td>
						    </tr>
						    <tr>
							<td>Nationality</td>
							<td>
							<?php
							$sqlnationality=mysql_query("select * from `cv_detail` where `user_id`='$userid'");
							$resnationality=mysql_fetch_array($sqlnationality);
							echo $resnationality['nationality'];
							?>					
							</td>
						    </tr>
						    <tr>
							<td>PR</td>
							<td>
							<?php
						$preferd_location=$resdetails['preferd_location'];
						$arr=explode(',',$preferd_location);
						foreach ($arr as & $value)
						{
						$floc=mysql_query("select * from `location` where `slno`='$value'");
						$rloc=mysql_fetch_array($floc);
						if($rloc['location']!=""){
						echo $rloc['location'].",";}
						}
						?>
							</td>
						    </tr>
						</table>
					    </div>
					    <div class="leftlist_textbox2">
                                        	<ul class="left_contectlist1">
                                                	<li><i><img src="images/i1.jpg" style="margin-top: -5px;"/></i> <span>+<?php echo $resdetails['mobile_contact']; ?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> <span>
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
                                                        <li><i><img src="images/i3.jpg"/></i> <span><?php echo $resdetails['age']; ?> yrs old</span></li>
                                                        <li><i><img src="images/i4.jpg"/></i> <span>
														<?php 
														$crntaddress=$resdetails['current_address'];
														$ext=explode('/',$crntaddress);
														$address=$ext[0].",".$ext[1];
														echo html_entity_decode($address);
														?>
														</span></li>
							<li style=" line-height: 1.2;"><span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">No SMS notification</span></li>
							<li style=" line-height: 1.2;"><span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">No EMAIL notification</span></li>
                                                </ul>
                                            </div>
					    
					</div>
														
						<div class="brd"></div>				
				<div class="leftlist_desc">
					<table class="table4">
					    <tr>
						<th colspan="2">Experience</th>
					    </tr>
					    <?php
					    $expd=mysql_query("select * from `experience` where `user_id`='$userid'")or die(mysql_error());
					    while($expdres=mysql_fetch_array($expd)){
					    ?>
					    <tr>
						<td><?php
						if($expdres['type']=="current"){
						 echo $expdres['from'].'&nbsp; to &nbsp;Current';
						}
						else
						echo $expdres['from'].'&nbsp; to &nbsp;'.$expdres['to'];
						 ?><br/>
						<?php
						$frm=$expdres['from'];
						$expfrm=explode('-',$frm);
						$fromonth=$expfrm[0];
						$fromyear=$expfrm[1];
						$monthName = date('M', mktime(0, 0, 0, $fromonth, 10));
						//echo $monthName; 
						$to=$expdres['to'];
						$expto=explode('-',$to);
						$tomonth=$expto[0];
						$toyear=$expto[1];
						$monthName1 = date('M', mktime(0, 0, 0, $tomonth, 10));
						//echo $monthName1; 
						$datetime1 = new DateTime($monthName.$fromyear);
						$datetime2 = new DateTime($monthName1.$toyear);
						$interval = $datetime1->diff($datetime2);
						echo $interval->format('%y years %m months and %d days');
						
						?>
						</td>
						<td>
						    <h3 class="head4"><?php echo $expdres['company'];?></h3>
						    <?php
							$jobfun=mysql_query("select * from `job_function` where `slno`='$expdres[jobcategory]'") or die(mysql_error());
						     $jobres=mysql_fetch_array($jobfun);
						     ?><br/>
						    Job Category:<?php echo $jobres['jobfunction']; ?><br/>
						    <?php 
							$plev=mysql_query("select * from `position_level` where `slno`='$expdres[position]'")or die(mysql_error());
						      $resplev=mysql_fetch_array($plev);
						    ?>
						  Position:<?=$resplev['position']?><br/>
						  <p><?php echo $expdres['description'];?></p>
						</td>
					    </tr>
					    <?php } ?>
					</table>
				</div>
				<div class="leftlist_desc">
				    <table class="table4">
					     <tr>
						<th colspan="2">Education</th>
					    </tr>
					     <?php $edu=mysql_query("select * from `education` where `user_id`='$userid'")or die(mysql_error());
						  while( $resedu=mysql_fetch_array($edu)){
					      ?>						
					    <tr>
						<td><?=$resedu['year']?> </td>
						<td>
						    <?php $qau=mysql_query("select * from `qualification` where `id`='$resedu[degree]'")or die(mysql_error());
							$resqau=mysql_fetch_array($qau);
						    ?>
						    <h3 class="head4"><?=$resqau['qualification']?></h3>
						   <?=$resedu['institute']?><br/>
						   <?php $fld=mysql_query("select * from `fieldofstudy`  where `id`='$resedu[field]'")or die(mysql_error());
							$resfld=mysql_fetch_array($fld);
						   ?>
						   Major &nbsp;  &nbsp;   <?=$resfld['field'].','.$resfld['trade']?><br/>
						   Grade &nbsp; &nbsp;   <?=$resedu['grade']?>
						</td>
					    </tr>
					    <?php } ?>
						<tr>
						<td colspan="2">
						<?php echo html_entity_decode($resdetails['education']);?>
						</td>
						</tr>
				    </table>
				</div>
				<div class="leftlist_desc">
				    <table class="table4">
					    <tr>
						
						<th colspan="2">Skill</th>
					    </tr>
					    
					    <tr>
						<td>Advanced </td>
						<td>
						
						   <!-- Web Development, Database Administration, Windows Server 2003-->
						   <?php 
						   $cont='';
						   $advskill=$resdetails['advanced'];
						   $expl=explode(',',$advskill);
						   foreach($expl as $advval)
						   {
						  // echo $advval;
						  $sqlskill=mysql_query("select * from `skill` where `slno`='$advval'");
						  $resskill=mysql_fetch_array($sqlskill);
						  $skill=$resskill['skill'];
						  $cont.=$skill.",";
						   }
						   $rtrm=rtrim($cont,',');
						   echo $rtrm;
						   ?>
						    
						</td>
					    </tr>
					    <tr>
						<td>Intermediate</td>
						<td><!--XML, Visual Basic-->
						<?php 
						$cont1='';
						   $interskill=$resdetails['intermediate'];
						   $expl1=explode(',',$interskill);
						   foreach($expl1 as $interval)
						   {
						  $sqlskill1=mysql_query("select * from `skill` where `slno`='$interval'");
						  $resskill1=mysql_fetch_array($sqlskill1);
						  $skill1=$resskill1['skill'];
						  $cont1.=$skill1.",";
						   }
						   $rtrm1=rtrim($cont1,',');
						   echo $rtrm1;
						?>
						    
						</td>
					    </tr>
					    <tr>
						<td>Basic</td>
						<td>
						   <!-- VB.Net-->
						   <?php 
						   $cont2='';
						   $basicskill=$resdetails['basic'];
						   $expl2=explode(',',$basicskill);
						   foreach($expl2 as $basicval)
						   {
						  $sqlskill2=mysql_query("select * from `skill` where `slno`='$basicval'");
						  $resskill2=mysql_fetch_array($sqlskill2);
						  $skill2=$resskill2['skill'];
						  $cont2.=$skill2.",";
						   }
						   $rtrm2=rtrim($cont2,',');
						   echo $rtrm2;
						   ?>
						    
						</td>
					    </tr>
					    
				     </table>
				</div>
				<div class="leftlist_desc">
				    <table class="table4">
					    <tr>
						<th colspan="2">Languages</th>
					    </tr>
					    
					    <tr>
						<td>Proficiency level:0-poor,10-Excellent</td>
						<td></td>
						 <td> </td>  
						  <td></td>  
						 </tr>
						
						 <tr>
						    <td>Language</td>
						    <td>Read</td>
						    <td>Write</td>
						    <td>Spoken</td>
						    <td>Relevant Certificates</td>  
						 </tr>
						<?php
						 $sqllang=mysql_query("select * from `language_details` where `user_id`='$resdetails[user_id]'");
						 while($reslang=mysql_fetch_array($sqllang))
						 {
						 $langname=mysql_query("select * from `language` where `slno`='$reslang[language]'");
						 $rowname=mysql_fetch_array($langname);
						 ?>
						 <tr>
						 <td><?php echo $rowname['language'];?></td>
						 <td><?php echo $reslang['spoken'];?></td>
						 <td><?php echo $reslang['written'];?></td>
						 <td>
						 <?php
						 $rel=$reslang['relevant'];
						 if($rel==0)
						 {
						 echo "-";
						 }
						 else
						 {
						 echo $rel;
						 }
						 ?>
						 </td>
						 </tr>
						 <?php
						 }
						 ?>
                     </table>
				</div>
				<div class="leftlist_desc">
				    <table class="table4">
					    <tr>
						<th colspan="2">Additional Info</th>
					    </tr>
					    
					    <tr>
						
						 <td>  Expected Salary</td>  
						  <td>MYR <?php echo $resdetails['expected_salary'];?></td>  
						 </tr>
					    <tr>
						
						 <td>Preferred Work Location</td>  	

						  <td>
							<?php 
												$ploc=$resdetails['preferd_location'];
												$lc=explode(',',$ploc);
												$cont='';
												foreach($lc as $lc1)
												{
												if($lc1!=''){
												$sqlloc=mysql_query("select * from `location` where `slno`='$lc1'");
												$rowloc=mysql_fetch_array($sqlloc);
												$plocation=$rowloc['location'];
												$cont.=$plocation.",";
												}
												}
												echo $cont;
							?>
						  </td>  
						 </tr>
						 
						  <tr>
						
						 <td> Other information</td>  	

						  <td><?php echo html_entity_decode($resdetails['other_info']);?></td>  
						 </tr>
						 <!-- <tr>
						
						 <td> WORKING OBJECTIVES</td>  	

						  <td></td>  
						 </tr>
						  <tr>
						
						 <td> To gain further exposure and experience in information Technology and networking</td>  	

						    
						 </tr>
						  <tr>
						
						 <td> STRENGTHS</td>  	

						   
						 </tr>
						  <tr>
						
						 <td>
						 <p> -Willing to Learn</p>

                         <p>-Able to work independently</p>

                         <p>-Excellence troubleshooting problem</p>

                          <p>-Hardworking</p>

                            <p>-Able to compete under pressure</p>

                             <p>Deliverable and dedicated</p>
</td>  	

						  <td>
						  </td>  
						 </tr>
						  <tr>
						
						 <td> ADDITIONAL PERSONAL SKILLS</td>  	

						   
						 </tr>
						 <tr>
						
						 <td> Business minded, able to plan and implement, excellent solution thinker</td>  	

						   
						 </tr>-->
						 <?php //echo html_entity_decode($resdetail['other_info']);?>
						 
					</table>    
				</div>	
				<div class="leftlist_desc">
				    <table class="table4">
						    
					    <tr>
						<th colspan="2">About Me</th>
					    </tr>
					    
					    <tr>
						
						 <td> Gender</td> 
 
						  <td><?php echo $resdetails['gender'];?></td>  
					    </tr>
					    <tr>
						
						 <td>Telephone Number</td> 	
 	

						  <td>+<?php echo $resdetails['mobile_contact'];?> </td>  
					    </tr>
					    <tr>
						
						<td>Address</td> 	
	   
   
						<td><?php echo html_entity_decode($resdetails['current_address']);?></td>  
					    </tr>
					
					</table>
				</div>	
										  
				    </div>
				    <?php 
					//}
					}
					?>
                                
                                
                        </div>	
						</div>
                </div>
                <div id="content2_right">
                		<h3 class="head3">Database Search </h3>
			<form name="frm" action="candidate1.php" method="post">
				<table class="table2">
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
				   <!-- <tr>
					<td>Search In</td>
					<td>
					    <select class="input3select">
						<option value="">
						    Skills,Position Title,College Name
						</option>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Resume Active in the last</td>
					<td>
					    <select class="input3select">
						<option value="">
						    6 months
						</option>
						<option value="">
						    4 months
						</option>
					    </select>
					</td>
				    </tr>-->
				    <tr>
					<td colspan="2">
					    <input type="submit" value="Search" class="button1" name="search"/>
					    <input type="button" value="Clear" class="button1" onclick="return getclear();"/>
					   
					</td>
				    </tr>
				</table>
			</form>		
				<div id="newpost" >
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
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:60px;float: left;" name="minexp"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3"  style="width:60px;float: left;" name="maxexp"/></td>
					<td></td>
				    </tr>
				    <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">
					   
					</td>
				    </tr>
				    <tr >
					<td>Expected Month Salary</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:60px;float: left;" name="min_expsalry"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3"  style="width:60px;float: left;" name="max_expsalry"/></td>
					<td>Currency
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
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3"  style="width:60px;float: left;" name="min_crntsalry"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" style="width:60px;float: left;" name="max_crntsalry"/></td>
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
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
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
					<td>Specialization</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$fspecialization=mysql_query("select * from `job_function`");
					while($rspecialization=mysql_fetch_array($fspecialization))
					{?>
						<input type="checkbox" name="chkspecialization[]" value="<?php echo $rspecialization['slno']; ?>" class="specializationcheckbox"/><?php echo $rspecialization['jobfunction']; ?><br/>
						<?php }?>
						
					    </div>
					   <span onclick="return removespecialcheck();">[clear]</span>
					   <input type="radio" name="sp_type" value="current" class="specrad"/>Current
					    <input type="radio" name="sp_type" value="previous" class="specrad"/>Previous
					    <input type="radio" name="sp_type" value="any" class="specrad"/>Any
					</td>
					<td>Industry</td>
					<td>
					    
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$findustry=mysql_query("select * from `industry`");
					while($rindustry=mysql_fetch_array($findustry))
					{?>
						<input type="checkbox" name="chkindustry[]" value="<?php echo $rindustry['slno']; ?>" class="industrycheckbox"/><?php echo $rindustry['industry']; ?><br/>
						<?php }?>
					    </div>
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
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$fqualification=mysql_query("select * from `qualification`");
					while($rqualification=mysql_fetch_array($fqualification))
					{ ?>
						<input type="checkbox" name="chkqualification[]" value="<?php echo $rqualification['id']; ?>" class="educationcheckbox"/><?php echo $rqualification['qualification']; ?><br/>
						<?php }?>
					    </div>
					   <span onclick="return removeeducationcheck();">[clear]</span> 
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
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
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
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$fcountry=mysql_query("select * from `education` group by `country`");
					while($rcountry=mysql_fetch_array($fcountry))
					{ ?>
						<input type="checkbox" name="graduate_country[]" value="<?php echo $rcountry['country'];?>" class="graduatecheckbox"/><?php echo $rcountry['country'];?><br/>
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
					    <select class="input3select" name="candidate">
						<option value="">All Candidates</option>
						<?php
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
						?>
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
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$fcountry1=mysql_query("select * from `country`");
					while($rcountry1=mysql_fetch_array($fcountry1))
					{ ?>
						<input type="checkbox" name="chkcountry[]" value="<?php echo $rcountry1['slno'];?>" class="countrycheckbox"/><?php echo $rcountry1['country'];?><br/>
						<?php }?>
					    </div>
					   <span onclick="return addcountry();" style="cursor: pointer;">[All </span>
					   <span onclick="return removecountry();" style="cursor: pointer;"> | clear]</span> 
					</td>
					<td>Residing In</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<?php
					$flocation=mysql_query("select * from `location`");
					while($rlocation=mysql_fetch_array($flocation))
					{ ?>
						<input type="checkbox" style="font-weight: bold;" name="chklocation[]" value="<?php echo $rlocation['slno']; ?>" class="locationcheckbox"/><?php echo $rlocation['location']; ?><br/>
						<?php }?>
						
					    </div>
					   <span onclick="return addlocation();" style="cursor: pointer;">[All </span>
					   <span onclick="return removelocation();" style="cursor: pointer;"> | clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>City</td>
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
					    <select class="input3select">
						<option>Yes</option>
						<option>No</option>
						
					    </select>
					</td>
					<td colspan="2">Email
					    <select class="input3select">
						<option>Yes</option>
						<option>No</option>
						
					    </select>
					</td>
					
				    </tr>
				    <tr>
					<td colspan="4">
					    <input type="submit" class="button1" value="Search" id="btn"/><input type="submit" class="button1" value="Clear" />
					</td>
					
				    </tr>
				</table>
				</form>
				</div>
				
		</div>
		</div>
</div>


<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php 
include_once("footer.php");
?>

<!--------------------------footer bar end----------------------->
</body>
</html>
