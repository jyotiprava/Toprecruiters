<?php
include_once("function.php");
is_employe();
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

<link href="style.css" type="text/css" rel="stylesheet"  />
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
<link rel="stylesheet" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
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
 <!--autocomplete end-->
 <style>
    .button6{ width:100px; height:auto; float:left; padding:4px; text-align:center; color:#fff; background-image: -o-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -moz-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -webkit-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -ms-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: linear-gradient(to bottom, #00A3BC 0%, #017B8E 100%); border:1px solid #027b8c; border-radius:4px 4px;}
 </style>
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
						
                		<div id="content2_leftbox">
                        		<div class="left_listbox">
                                		<div class="left_listimg">
                                        		<!--<img src="images/img4.jpg" style="width:100%;"/>-->
												<img src="<?php echo $resdetail['picture'];?>" style="width:100%;" />
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">MYR <?php echo $resdetail['expected_salary'];?></span>
						</div>
                                        <div class="left_listcontent">
					    <h3 class="head4">
                                                		1.<!-- Lew Shu Chi -->
														<?php echo $resdetail['first_name']." ".$resdetail['last_name'];?>
														<span class="date" style="width:auto;float: right;">
														Last Updated: <!--20 June 2011-->
														<?php
														$date=$resdetail['updated_date'];
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
														</span>
														<br/>
								<span style="font-size:14px;font-weight: normal;">
								<?php echo $resdetail['current_position'];?>
								<!--Head Of IT at Axis Technologies Solutions (M) Sdn. Bhd.-->
								</span>
					    </h3>
					    
					    <div class="leftlist_textbox1">
						<table class="table3">
						    <tr>
							<td>Experience</td>
							<?php
							      $exptype=$resdetail['experience_type'];
							      if($exptype=="no"){
							       $exp="0 Year";
							      }
							      elseif($exptype=="yes"){
							      $exprnc=$resdetail['experience_date'];
							       $exp1=explode('-',$exprnc);
							       $exp=$exp1[0].'Years'.$exp1[1].'Months';
							       }
							?>
							<td><?php echo $exp; ?></td>
						    </tr>
						    <tr style="display: none">
							<td>Previous</td>
							<td>
							<?php echo $resdetail['previous_position'];?>
							   <!-- Project Manager<br/>
							    Games Xtreme(M)Sdn.Bhd.-->
							</td>
						    </tr>
						    <tr>
						     
							<td>Education</td>
							<td>
							    University Putra Malaysia <br/>
							    <br/>
							    <?php echo $resdetail['last_course'];?>
							</td>
						    </tr>
						    <tr>
							<td>Nationality</td>
							<td><?php echo $resdetail['nationality'];?></td>
						    </tr>
						   <!-- <tr>
							<td>PR</td>
							<td>
							<?php echo $resdetail['nationality'];?>
							</td>
						    </tr>-->
						</table>
					    </div>
					    <div class="leftlist_textbox2">
                                        	<ul class="left_contectlist1">
                                                	<li><i><img src="images/i1.jpg" style="margin-top: -5px;"/></i> <span>+<?php echo $resdetail['mobile_contact'].','.$resdetail['home_contact'];?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> <span>
														<?php 
														$emll=$resdetail['email'];
														$xx=substr($emll,0,20)."<br/>";
														echo $xx;
														$lenn=strlen($emll);
														$restt=$lenn-20;
														$yy=substr($emll,20,$restt);
														echo $yy;
														?></span></li>
                                                        <li><i><img src="images/i3.jpg"/></i> <span><?php echo $resdetail['age'];?> yrs old</span></li>
							<?php $con=mysql_query("select * from   `country`  where `id`='country'");
							      $rescon=mysql_fetch_array($con);
							?>
                                                        <li><i><img src="images/i4.jpg"/></i> <span><?php echo html_entity_decode($resdetail['current_address']).",".$rescon['country'];?></span></li>
                                                </ul>
                                            </div>
					    
					</div>
					
				</div>
					
				<div class="leftlist_desc">
					<table class="table4">
					    <tr>
						<th colspan="2">Experience</th>
					    </tr>
					    <?php
					    //echo "select * from `experience` where `user_id`='$slno'";
					    $expd=mysql_query("select * from `experience` where `user_id`='$slno'")or die(mysql_error());
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
						    <?php $jobfun=mysql_query("select * from `job_function` where `slno`='$resdetail[jobcategory]'") or die(mysql_error());
						     $jobres=mysql_fetch_array($jobfun);
						     ?><br/>
						    Job Category:<?php echo $jobres['jobfunction']; ?><br/>
						    <?php $plev=mysql_query("select * from `position_level` where `slno`='$resdetail[position]'")or die(mysql_error());
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
					     <?php $edu=mysql_query("select * from `education` where `user_id`='$slno'")or die(mysql_error());
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
						<?php echo html_entity_decode($resdetail['education']);?>
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
						   $advskill=$resdetail['advanced'];
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
						   $interskill=$resdetail['intermediate'];
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
						   $basicskill=$resdetail['basic'];
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
						 $sqllang=mysql_query("select * from `language_details` where `user_id`='$resdetail[user_id]'");
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
						  <td>MYR <?php echo $resdetail['expected_salary'];?></td>  
						 </tr>
					    <tr>
						
						 <td>Preferred Work Location</td>  	

						  <td>
							<?php 
												$ploc=$resdetail['preferd_location'];
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

						  <td><?php echo html_entity_decode($resdetail['other_info']);?></td>  
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
 
						  <td><?php echo $resdetail['gender'];?></td>  
					    </tr>
					    <tr>
						
						 <td>Telephone Number</td> 	
 	

						  <td>+<?php echo $resdetail['mobile_contact'];?> </td>  
					    </tr>
					    <tr>
						
						<td>Address</td> 	
	   
   
						<td><?php echo html_entity_decode($resdetail['current_address']);?></td>  
					    </tr>
					    <tr>
						<td colspan="2">
						<?php
						$qwerys=mysql_query("select * from `candidateshortlist` where `emplerid`='$_SESSION[employer_idval]' and `emplyeid`='$resdetail[user_id]' and `shortlist`='1'")or die(mysql_query());
						if(mysql_num_rows($qwerys)>0)
						{
						    ?>
						    <input type="button" name="" value="Shortlisted" class="button6" style="float: right;" onclick="return getshrtlist(<?=$slno;?>,<?=$resdetail['user_id'];?>);"/>
						    <?php
						}
						else
						{
						    ?>
						    <input type="button" name="" value="Add to Shortlist" class="button6" style="float: right;" onclick="return getshrtlist(<?=$slno;?>,<?=$resdetail['user_id'];?>);"/>
						    <?php
						}
						?>
						</td>
					    </tr>
					</table>    
				</div>	
				</div>
                               
                     
                </div>
                <div id="content2_right">
                		<h3 class="head3">Database Search </h3>
						<form name="f" action="request.php" method="post">
				<table class="table2">
				    <tr>
					<th colspan="2">Keyword Search</th>
				    </tr>
				    <tr>
					<td>Keyskill</td>
					<td>
					<input type="text" class="input3 keyskl" placeholder="for example:network administration" name="keywrd" id="keywrdid" autocomplete="off"/>
					<input type="hidden" name="hidden_keyskill" id="hdval" class="hdvall" />
					<!--<span style="">More Option</span>--></td>
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
					<td></td>
					<td>
					
					    <input type="submit" value="Search" class="button" name="search" />
					   <!-- <input type="submit" value="Clear" class="button" onclick="return getclear();"/>-->
					   <!-- <input type="submit" value="More Search" class="button" style="width:120px;" onclick="showhide()"/>-->
					</td>
				    </tr>
				</table>
				</form>
						
					
				<h3 class="head3">All Testimonials</h3>
				 <table class="table2">
				   <tr>
				     <th>Personal Name</th>
				     <th>Company Name</th>
				     <th>Designation</th>
				     <th>Testimonial Image</th>
				     <th>Short Description</th>
				   </tr>
				   
				   <?php
				   $test=mysql_query("select * from `testimonial` where `addto`='$resdetail[user_detail]'")or die(mysql_error());
					 while($testres=mysql_fetch_array($test)){
				   ?>
				   <tr>
				     <td><?php echo $testres['personal_name']; ?></td>
				     <td><?php echo $testres['company_name']; ?></td>
				     <td><img src="<?php echo $testres['designation']; ?>" width=100px; height="100px;"></td>
				     <td><?php echo $testres['testimonialimage']; ?></td>
				     <td><?php echo $testres['shortdescription']; ?></td>
				   </tr>
				   <?php } ?>
				 </table>
					
						
						
				<div id="newpost" style="display:none;">
				<table class="table2">
				    <tr>
					<th colspan="4">Work Experience</th>
				    </tr>
				    <tr>
					<td>Position Title</td>
					<td colspan="4"><input type="text" class="input3" value="for example:Software Developer Engineer" /><br/> <br/>
					    <input type="radio" name="type" />Current
					    <input type="radio" name="type"/>Previous
					    <input type="radio" name="type" />Any
					
					</td>
				    </tr>
				    <tr >
					<td>Years of Experience</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td></td>
				    </tr>
				    <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">
					   
					</td>
				    </tr>
				    <tr >
					<td>Expected Month Salary</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td>Currency
					    <select class="input3select">
						<option >-</option>
					    </select>
					</td>
				    </tr>
				    <tr >
					<td>Current Month Salary</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td>Currency
					    <select class="input3select">
						<option value="">-</option>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">&nbsp;
					   
					</td>
				    </tr>
				    <tr>
					<td>Current Position Level</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Senior Manager<br/>
						<input type="checkbox" />Manager<br/>
						<input type="checkbox" />Senior Executive<br/>
						<input type="checkbox" />Junior Executive<br/>
						<input type="checkbox" />Fresh/Entry Level
						
					    </div>
					   <span>[clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>Company Name</td>
					<td colspan="3"><input type="text" class="input3" value="for example:jobstreet.com " /><br/><br/>
					    <input type="radio" name="type" />Current
					    <input type="radio" name="type" />Previous
					    <input type="radio" name="type" />Any
					</td>
				    </tr>
				     <tr>
					<td colspan="4" style="border-top:1px solid #dedede;">&nbsp;
					   
					</td>
				    </tr>
				     <tr>
					<td>Specialization</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Actuarial Science/Statistics<br/>
						<input type="checkbox" />Advertising/Media Planning<br/>
						<input type="checkbox" />Agriculture/Forestry/Fsheries<br/>
						<input type="checkbox" />Architecture/Interior/Design<br/>
						<input type="checkbox" />Arts/Creative
						
					    </div>
					   <span>[clear]</span>
					   <input type="radio" name="type" />Current
					    <input type="radio" name="type"/>Previous
					    <input type="radio" name="type" />Any
					</td>
					<td>Industry</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Accounting/Audit/tax Services<br/>
						<input type="checkbox" />Advertising/Marketing/Promotion/PR<br/>
						<input type="checkbox" />Aerospace/Aviation/Airline<br/>
						
						
					    </div>
					   <span>[clear]</span>
					   <input type="radio" name="type" />Current
					    <input type="radio" name="type"/>Previous
					    <input type="radio" name="type"/>Any
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
						<input type="checkbox" />Senior Manager<br/>
						<input type="checkbox" />Manager<br/>
						<input type="checkbox" />Senior Executive<br/>
						<input type="checkbox" />Junior Executive<br/>
						<input type="checkbox" />Fresh/Entry Level
						
					    </div>
					   <span>[clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td colspan="4">Field Of Study</td>
					
				    </tr>
				    
				     <tr>
					<td>Engineering</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Actuarial Science/Statistics<br/>
						<input type="checkbox" />Advertising/Media Planning<br/>
						<input type="checkbox" />Agriculture/Forestry/Fsheries<br/>
						<input type="checkbox" />Architecture/Interior/Design<br/>
						<input type="checkbox" />Arts/Creative
						
					    </div>
					   <span>[All | clear]</span>
					  
					</td>
					<td>Business</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Accounting/Audit/tax Services<br/>
						<input type="checkbox" />Advertising/Marketing/Promotion/PR<br/>
						<input type="checkbox" />Aerospace/Aviation/Airline<br/>
						
						
					    </div>
					    <span>[All | clear]</span>
					</td>
				    </tr>
				    <tr>
					<td>Sciences</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Actuarial Science/Statistics<br/>
						<input type="checkbox" />Advertising/Media Planning<br/>
						<input type="checkbox" />Agriculture/Forestry/Fsheries<br/>
						<input type="checkbox" />Architecture/Interior/Design<br/>
						<input type="checkbox" />Arts/Creative
						
					    </div>
					   <span>[All | clear]</span>
					  
					</td>
					<td>Services</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Accounting/Audit/tax Services<br/>
						<input type="checkbox" />Advertising/Marketing/Promotion/PR<br/>
						<input type="checkbox" />Aerospace/Aviation/Airline<br/>
						
						
					    </div>
					    <span>[All | clear]</span>
					</td>
				    </tr>
				    <tr>
					<td>Media</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Actuarial Science/Statistics<br/>
						<input type="checkbox" />Advertising/Media Planning<br/>
						<input type="checkbox" />Agriculture/Forestry/Fsheries<br/>
						<input type="checkbox" />Architecture/Interior/Design<br/>
						<input type="checkbox" />Arts/Creative
						
					    </div>
					   <span>[All | clear]</span>
					  
					</td>
					<td>Medicine</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Accounting/Audit/tax Services<br/>
						<input type="checkbox" />Advertising/Marketing/Promotion/PR<br/>
						<input type="checkbox" />Aerospace/Aviation/Airline<br/>
						
						
					    </div>
					    <span>[All | clear]</span>
					</td>
				    </tr>
				    <tr>
					<td>Others</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Senior Manager<br/>
						<input type="checkbox" />Manager<br/>
						<input type="checkbox" />Senior Executive<br/>
						<input type="checkbox" />Junior Executive<br/>
						<input type="checkbox" />Fresh/Entry Level
						
					    </div>
					   <span>[clear]</span> 
					</td>
				    </tr>
				     <tr>
					<td>Grade/CGPA</td>
					<td><input type="checkbox" />Grade A/1st Class</td>
					<td><input type="checkbox" />Grade B/2nd Class Upper</td>
					<td><input type="checkbox" />Grade C/2nd Class Lower</td>
				     </tr>
				     <tr>
					<td></td>
					<td>Or Specify CGPA Range:</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" value="" style="width:20px;float: left;"/> %</td>
					<td><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" value="" style="width:20px;float: left;"/> %</td>
				     </tr>
				    <tr>
					<td>Country Of Graduation</td>
					<td colspan="3">
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" />Australia<br/>
						<input type="checkbox" />Bangladesh<br/>
						<input type="checkbox" />Canada<br/>
						<input type="checkbox" />China<br/>
						<input type="checkbox" />France
						
					    </div>
					   <span>[All | clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>College Name</td>
					<td colspan="4"><input type="text" class="input3" value="for example:abc college" /><br/><br/>
					<input type="radio" value="edutype" />Highest Education
					<input type="radio" value="edutype"/>Any Education
					</td>
				    </tr>
				    <tr>
					<td>Retrieve Candidates who graduated in the last</td>
					<td colspan="3">
					    <select class="input3select">
						<option>All Candidates</option>
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
						<input type="checkbox" />Australia<br/>
						<input type="checkbox" />Bangladesh<br/>
						<input type="checkbox" />Canada<br/>
						<input type="checkbox" />China<br/>
						<input type="checkbox" />France
						
					    </div>
					   <span>[All | clear]</span> 
					</td>
					<td>Residing In</td>
					<td>
					    <div style="width:100%; height: 120px; float: left; border:1px solid #dedede; overflow: auto;">
						<input type="checkbox" style="font-weight: bold;" />Any Malayasia State<br/>
						<input type="checkbox" />Bangladesh<br/>
						<input type="checkbox" />Canada<br/>
						<input type="checkbox" />China<br/>
						<input type="checkbox" />France
						
					    </div>
					   <span>[All | clear]</span> 
					</td>
				    </tr>
				    <tr>
					<td>City</td>
					<td colspan="3"><input type="text" class="input3"  /></td>
				    </tr>
				</table>
				<table class="table2">
				    <tr>
					<th colspan="4">Personal Data/Others</th>
				    </tr>
				    <tr>
					<td>Age</td>
					<td><span style="float: left; color: #333;">Min</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					<td colspan="2"><span style="float: left;  color: #333;">Max</span><input type="text" class="input3" value="" style="width:60px;float: left;"/></td>
					
				    </tr>
				    <tr>
					<td>Gender</td>
					<td colspan="2">
					    <select class="input3select">
						<option>Any</option>
						<option>Male</option>
						<option>Female</option>
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Language</td>
					<td>
					    <select class="input3select">
						<option>Select A Language</option>
						
					    </select>
					</td>
					<td>
					    <select class="input3select">
						<option>Or</option>
						
					    </select>
					</td>
					<td>
					    <select class="input3select">
						<option>Select A Language</option>
						
					    </select>
					</td>
				    </tr>
				    <tr>
					<td>Candidates who joined on these dates</td>
					<td>
					    <select class="input3select">
						<option>1</option>
						<option>2</option>
						<option>3</option>
					    </select>
					    <select class="input3select">
						<option>1</option>
						
					    </select>
					    <select class="input3select">
						<option>2008</option>
						
					    </select>
					</td>
					<td style="text-align: center;">to</td>
					<td>
					    <select class="input3select">
						<option>1</option>
						<option>2</option>
						<option>3</option>
					    </select>
					    <select class="input3select">
						<option>1</option>
						
					    </select>
					    <select class="input3select">
						<option>2008</option>
						
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
					    <input type="submit" class="button" value="Search" /><input type="submit" class="button" value="Clear" />
					</td>
					
				    </tr>
				</table>
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
