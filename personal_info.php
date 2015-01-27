  	<script type="text/javascript">
	$(function(){
    var personaloptions = { 
			target:        'personal_insert.php',   // target element(s) to be updated with server response 
			beforeSubmit:  personalshowRequest,  // pre-submit callback 
			success:       personalshowResponse  // post-submit callback 
		};
   
    $('#personal_box').submit(function() {
	var strpre=$("#prefix option:selected").val();
	var fnameval=$('#fnamee').val();
	var lnameval=$('#lnamee').val();
	var strnation=$("#nation option:selected").val();
	//var strciti=$("#citizen option:selected").val();
	var strday=$("#day option:selected").val();
	var strmonth=$("#month option:selected").val();
	var yearval=$('#year').val();
	//var home_phoneval=$('#home_phone').val();
	var mob_phoneval=$('#mob_phone').val();
	var postval=$('#post').val();
	var ageval=$('#age').val();
	var crnt_addrsval=$('#crnt_addrs').val();
	var strcrnt_count=$("#crnt_count option:selected").val();
	var permnt_addrsval=$('#permnt_addrs').val();
	var strpermnt_count=$("#permnt_count option:selected").val();
	var degnateval=$('#degnate').val();
	var exp_salaryval=$('#exp_salary').val();
	var strexp_currency=$("#exp_currency option:selected").val();
	var strjob_level=$("#job_level option:selected").val();
	var strjob_type=$("#job_type option:selected").val();
	var strindus=$("#indus option:selected").val();
	var stradvance=$("#advance_add").val();
	var strintermediate=$("#intermediate_add").val();
	var strbasic=$("#basic_add").val();
	
	if(strpre==0)
	{
	alert("Choose  prefix");
	return false;
	}
	
	if(fnameval=="")
	{
	alert("Enter Your Firstname");
	return false;
	}
	if(lnameval=="")
	{
	alert("Enter Your Lastname");
	return false;
	}
	if(strnation==0)
	{
	alert("Choose Your Nationality");
	return false;
	}
	/*if(strciti==0)
	{
	alert("Choose  Citizen");
	return false;
	}*/
	if(strday==0)
	{
	alert("Choose day of your date of birth");
	return false;
	}
	if(strmonth==0)
	{
	alert("Choose month of your date of birth");
	return false;
	}
	if(yearval=="")
	{
	alert("Enter year of your date of birth");
	return false;
	}
	
	if(mob_phoneval=="")
	{
	alert("Enter your mobile number");
	return false;
	}
	if(mob_phoneval.length>10)
	{
	alert("Enter 10 digit mobile number");
	return false;
	}
	if(mob_phoneval.length<10)
	{
	alert("Enter 10 digit mobile number");
	return false;
	}
	if(postval=="")
	{
	alert("Enter postalcode");
	return false;
	}
	if(ageval=="")
	{
	alert("Enter your age");
	return false;
	}
	if(crnt_addrsval=="")
	{
	alert("Enter Your Current Address");
	return false;
	}
	if(strcrnt_count==0)
	{
	alert("Choose Your country of Current address");
	return false;
	}
	if(permnt_addrsval=="")
	{
	alert("Enter Your Permanent Address");
	return false;
	}
	if(strpermnt_count==0)
	{
	alert("Choose Your country of Permanent address");
	return false;
	}
	if(degnateval=="")
	{
	alert("Enter Your Designation");
	return false;
	}
	if(exp_salaryval=="")
	{
	alert("Enter Your Expected Salary");
	return false;
	}
	if(strexp_currency==0)
	{
	alert("Choose Currency of Your Expected Salary");
	return false;
	}
	if(strjob_level==0)
	{
	alert("Choose joblevel");
	return false;
	}
	if(strjob_type==0)
	{
	alert("Choose jobtype");
	return false;
	}
	if($('.chkcls').is(":checked")) 
			 {
			 }
			 else{
			 alert("Choose a preferred location");
			 return false;
			 }
	 if(strindus==0)
	{
	alert("Choose Specialization");
	return false;
	}
			 
							if(stradvance=="") 
							    {
							    alert("Enter your advance skill");
							    return false;
							    }
							 if(strintermediate=="") 
							 {
							 alert("Enter your intermediate skill");
							    return false;
							 }	
							 if(strbasic=="") 
							 {
							 alert("Enter your basic skill");
							    return false;
							 }
							 
	
				$(this).ajaxSubmit(personaloptions);
				$(".tabs li a[href='#tab2']").click();
				return false;
				
		});

		
    });
    function personalshowRequest(formData, jqForm, personaloptions) {}

    function personalshowResponse(responseText, statusText)  { 
	
		/*if(responseText=="OK") {
		    $(".tabs li a[href='#tab2']").click();
		} else {
			alert(responseText);
		}*/
		
		//$(".tabs li a[href='#tab2']").click();
	}
	
</script>
<script type="text/javascript">
 function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
		    return false;

        return true;
    }    
</script>
<?php
$useremail=mysql_query("select `emailid` from `user_detail` where `slno`='$_SESSION[useridval]'");
$resemail=mysql_fetch_array($useremail);
$userid=mysql_query("select * from `cv_detail` where `user_id`='$_SESSION[useridval]'");
$resuser=mysql_fetch_array($userid);
$dayval=$resuser['dob'];
												$expl=explode('-',$dayval);
												$exyear=$expl[0];
												if($exyear=="0000")
												{
												$exyear="";
												
												}
												else{
												$exyear=$expl[0];
												}
												$exmonth=$expl[1];
												$exday=$expl[2];
												$crntaddress=$resuser['current_address'];
												$excrnt=explode('/',$crntaddress);
												$crntaddrs=$excrnt[0];
												$crntaddrs1=$excrnt[1];
												
												$permntaddress=$resuser['permanent_address'];
												$excrnt1=explode('/',$permntaddress);
												$permntaddrs=$excrnt1[0];
												$permntaddrs1=$excrnt1[1];
												
												$date=$resuser['experience_date'];
												$exdt=explode('-',$date);
												$yearval=$exdt[0];
												$monthval=$exdt[1];
												
?>
	<h2><span style="color: #900;">Your personal details & settings</span></h2> 
					<form  name="f" id="personal_box" action="personal_insert.php" method="post">	
							<table class="tbl" style="width:650px;">
									<tr>
														<td colspan="3">Personal Detail>></td>
														
												</tr>
												<tr>
														<td colspan="3"><span style="color:#FF0000;">*</span> name:
														<select name="prefix" class="textbox2" id="prefix">
															<option value="0">Prefix</option>
															<?php
															$sqlprefix=mysql_query("select * from `prefix`");
															while($resprefix=mysql_fetch_array($sqlprefix)){
															?>
															<option value="<?php echo $resprefix['slno'];?>"<?php if($resuser['prefix']==$resprefix['slno']){echo "selected";}?>><?php echo $resprefix['prefix'];?></option>
															<?php
															}
															?>
														</select>
														<input type="text"  name="fname" id="fnamee"  class="textbox2" style=" margin-left:10px;" placeholder="First Name" value="<?php echo $resuser['first_name'];?>"/>
														<input type="text" name="lname" id="lnamee"  class="textbox2" style=" margin-left:10px;" placeholder="Last Name" value="<?php echo $resuser['last_name'];?>"/></td>
												</tr>
												<tr>
												<td><span style="color:#FF0000;">*</span>Nationality:</td>
												<td colspan="2">
													   <select class="textbox2" name="nationality" id="nation">
														<option value="0">Select</option>
														<?php
														$sqlcitizenship=mysql_query("select * from `citizenship`");
														while($rescitizenship=mysql_fetch_array($sqlcitizenship)){
														?>
														<option value="<?php echo $rescitizenship['slno'];?>" <?php if($resuser['nationality']==$rescitizenship['slno']){echo "selected";}?>><?php echo $rescitizenship['citizen'];?></option>
														<?php
														}
														?>
													</select>
												</td>
												</tr>
							
												<tr>
														<td colspan="3"><span style="color:#FF0000;">*</span>email:
														 <input type="text" name="email" id="email_id" class="textbox2" value="<?php echo $resemail['emailid'];?>" readonly/>
                                                         </td>
												</tr>
												
					
												<tr>
												<td style="width:0px;"><span style="color:#FF0000; width:100px; margin-right:10px;">*</span>dob:</td>
												<td colspan="2">
												<select class="textbox2" style="width:120px; margin-right:10px;" name="day" id="day">
												<option value="0">---Day---</option>
												<?php
												for($i=1;$i<=31;$i++)
												{
												?>
												<option value="<?php echo $i;?>" 
												<?php 
												
												if($exday==$i)
												{echo "selected";}
												?>
												><?php echo $i;?></option>
												<?php
												}
												?>
												</select>
												<select class="textbox2" style="width:120px; margin-right:10px;" name="month" id="month">
												<option value="0">---Month---</option>
												<?php
												for ($i = 1; $i <= 12; $i++)
												{
													
													$monthName = date('M', mktime(0, 0, 0, $i, 10));	
													//echo "<option value=\"" . $i . "\">" . $monthName . "</option>";
												?>
													<option value="<?php echo $i;?>" <?php if($exmonth==$i){echo "selected";}?>><?php echo $monthName;?></option>
												<?php
												}

												?>
												</select>
												<input type="text" class="textbox2" style="width:120px; margin-right:10px;" maxlength="4" onKeyPress="return numbersonly(event)" name="year" placeholder="Year" id="year" value="<?php echo $exyear;?>"/>
												</td>
												</tr>
												
												<tr>
														<td colspan="3">home phone:
														 <input type="text" name="home_contact" id="home_phone" class="textbox2" value="<?php echo $resuser['home_contact'];?>"/>
                                                         </td>
														
												</tr>
												<tr>
														<td colspan="3">mobile:
														<input type="text" name="mobl_contact" id="mob_phone" class="textbox2" style="margin-left:40px;" value="<?php echo $resuser['mobile_contact'];?>"/>
                                                        </td>
														
												</tr>
												<tr>
												  <td style="width:150px;">martial status:</td>
												   <td colspan="2">
                                                        <input type="radio"  name="marital_status"    value="single" <?php if($resuser['marital_status']=="single"){echo "checked";}?> checked> Single 
                                                        <input type="radio"  name="marital_status"   value="married" <?php if($resuser['marital_status']=="married"){echo "checked";}?>> Married
												   </td>
												</tr>
												<tr>
												<td>Postal Code:</td>
												<td colspan="2">
												<input type="text" name="postal" id="post"  class="textbox2"  onKeyPress="return numbersonly(event)" value="<?php echo $resuser['postal'];?>"/>
												</td>
												</tr>
												<tr>
												<td>Age:</td>
												<td colspan="2">
													   <input type="text" name="age" id="age"  class="textbox2" onKeyPress="return numbersonly(event)" value="<?php echo $resuser['age'];?>"/>
												</td>
												</tr>
												<tr>
												<td>Gender:</td>
												<td colspan="2">
													    <input type="radio"  name="gen"   value="male" <?php if($resuser['gender']=="male"){echo "checked";}?> checked> Male 
                                                        <input type="radio"  name="gen"   value="female" <?php if($resuser['gender']=="female"){echo "checked";}?>> Female
												</td>
												</tr>
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>current Address:
                                                        </td>
                                                        <td colspan="2">
														<textarea class="textbox2" name="crnt_address" id="crnt_addrs" ><?php echo $crntaddrs;?></textarea>
														<select  class="textbox2" id="crnt_count" name="crnt_country">
																<option value="0">Country</option>
																<?php
																$sqlcountry=mysql_query("select * from `country`");
																while($rescountry=mysql_fetch_array($sqlcountry)){
																?>
																<option value="<?php echo $rescountry['slno'];?>" <?php if($crntaddrs1==$rescountry['slno']){echo "selected";}?>><?php echo $rescountry['country'];?></option>
																<?php
																}
																?>
														</select>
														
                                                        </td>
														
												</tr>
												<tr>
														<td>
                                                        Permanent Address:
                                                        </td>
                                                        <td colspan="2">
														<textarea class="textbox2" name="permnt_address" id="permnt_addrs"><?php echo $permntaddrs;?></textarea>
														<select  class="textbox2" id="permnt_count" name="permnt_country">
																<option value="0">Country</option>
																<?php
																$sqlcountry=mysql_query("select * from `country`");
																while($rescountry=mysql_fetch_array($sqlcountry)){
																?>
																<option value="<?php echo $rescountry['slno'];?>" <?php if($permntaddrs1==$rescountry['slno']){echo "selected";}?>><?php echo $rescountry['country'];?></option>
																<?php
																}
																?>
														</select>
                                                        </td>
														
												</tr>
												<tr>
													<td>
														Upload Picture :
													</td>
													<td>
														<input type="file" name="img" />
													</td>
													<td>
													<input type="hidden" name="hd_picture" value="<?php echo $resuser['picture']; ?>"/>
													<img src="<?php echo $resuser['picture']; ?>" width="60" height="60"/>
													</td>
												</tr>
												<tr>
														<td >&nbsp;</td>
														<td >&nbsp;</td>
														<td >&nbsp;</td>
														
												</tr>
												<tr>
														<td colspan="3">Career>></td>
														
												</tr>
												<tr>
														<td colspan="3"><span style="color:#FF0000;">*</span>Designation:
													 <input type="text" name="designation" class="textbox2" id="degnate" value="<?php echo $resuser['designation'];?>"/>
                                                     </td>
												</tr>
												<tr>
														<td style="width:150px;">
                                                        Experience:
                                                        </td>
														<td colspan="2">
                                                        <input type="radio"  name="exp_rad"  value="yes" id="yesid" <?php if($resuser['experience_type']=="yes"){echo "checked";}?>>Yes 
														<input type="radio"  name="exp_rad"  value="no" id="noid" <?php if($resuser['experience_type']=="no"){echo "checked";}?>>No
														<span id="exp_sp" style="display:none;">
														 <input type="text" name="exp_year"  class="textbox2" style="width:100px;"  onKeyPress="return numbersonly(event)" value="<?php echo $yearval;?>" /> Year 
														 <input type="text" name="exp_month"   class="textbox2" style="width:100px;"  onKeyPress="return numbersonly(event)" value="<?php echo $monthval;?>" /> Month
														<!--<select class="textbox2" style="width:120px; margin-right:10px;" name="exp_month">
														<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName1 = date('M', mktime(0, 0, 0, $i, 10));	
																	//echo "<option value=\"" . $i . "\">" . $monthName1 . "</option>";
																?>
																	<option value="<?php echo $i;?>" <?php if($monthval==$i){echo "selected";}?>><?php echo $monthName1;?></option>
																<?php
																}

																?>
														</select>-->
														</span>
                                                        </td>
														
												</tr>
												<tr id="psal" style="display:none;">
												<td>Present Salary: </td>
                                                <td> 
												<input type="text" name="crnt_salary" class="textbox2" id="crnt_salary" value="<?php echo $resuser['current_salary'];?>" onkeypress="return  isNumber(evt);"/> per month
												</td> 
												<td>
												<select class="textbox2" style="width:120px; margin-right:10px;" name="crnt_currency">
												<option value="0">--Currency--</option>
												<?php
																$sqlcurrency=mysql_query("select * from `currency`");
																while($rescurrency=mysql_fetch_array($sqlcurrency)){
																?>
																<option value="<?php echo $rescurrency['slno'];?>" <?php if($resuser['current_currency']==$rescurrency['slno']){echo "selected";}?>><?php echo $rescurrency['symbol'];?></option>
																<?php
																}
												?>
												</select>
												</td>
                                                              
                                                </tr> 
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>Expected Salary:
                                                        </td>
                                                        <td>
														 <input type="text" name="exp_salary" class="textbox2" id="exp_salary" value="<?php echo $resuser['expected_salary'];?>" onkeypress="return  isNumber(evt);"/> per month
                                                         </td>
														 <td>
															<select class="textbox2" style="width:120px; margin-right:10px;" name="exp_currency" id="exp_currency" >
															<option value="0">--Currency--</option>
															<?php
																			$sqlcurrency1=mysql_query("select * from `currency`");
																			while($rescurrency1=mysql_fetch_array($sqlcurrency1)){
																			?>
																			<option value="<?php echo $rescurrency1['slno'];?>" <?php if($resuser['expected_currency']==$rescurrency1['slno']){echo "selected";}?>><?php echo $rescurrency1['symbol'];?></option>
																			<?php
																			}
															?>
															</select>
														</td>
												</tr>
												<tr>
														<td colspan="3">
                                                        <span style="color:#FF0000;">*</span>Looking job level:
														<select class="textbox2" style="margin-left:20px; width:160px;" name="job_level" id="job_level" >
														<option value="0">select</option>
														<option value="entry" <?php if($resuser['job_level']=="entry"){echo "selected";}?>>Entry</option>
														<option value="mid" <?php if($resuser['job_level']=="mid"){echo "selected";}?>>Mid</option>
														<option value="senior" <?php if($resuser['job_level']=="senior"){echo "selected";}?>>Senior</option>
														<option value="top" <?php if($resuser['job_level']=="top"){echo "selected";}?>>Top</option>
														</select>
                                                        </td>
												</tr>
												<tr>
														<td colspan="3">
                                                        <span style="color:#FF0000;">*</span>Looking job type:
														<select class="textbox2" style="margin-left:25px; width:160px;" name="job_type" id="job_type">
														<option value="0">select</option>
														<option value="permanent" <?php if($resuser['job_type']=="permanent"){echo "selected";}?>>Permanent</option>
														<option value="Temporary/Contract" <?php if($resuser['job_type']=="Temporary/Contract"){echo "selected";}?>>Temporary/Contract</option>
														<option value="Contract" <?php if($resuser['job_type']=="Contract"){echo "selected";}?>>Contract</option>
														</select>
                                                        </td>
												</tr>
												<tr>
														<td colspan="3">
                                                        Preferred job location:
														
												</tr>
												<tr>
												<td>
												<div style="width:400px; height:300px; float:left; border:1px solid #dedede; overflow:auto;">
													<table style="width:100%;">
													<?php
														/*$sqllocat=mysql_query("select * from `location`");
														while($reslocat=mysql_fetch_array($sqllocat)){
														
														?>
														<tr>
														<td><input type="checkbox" name="chk[]" value="<?php echo $reslocat['slno'];?>" class="chk"/></td>
														<td colspan="2"><?php echo $reslocat['location'];?></td>
														</tr>
														<?php
														}*/
														?>
														<?php
													$prelocation=$resuser['preferd_location'];
		$expl=explode(',',$prelocation);
		$sqllocat=mysql_query("select * from `location`");
		while($reslocat=mysql_fetch_array($sqllocat))
		{
		$loct=$reslocat['slno'];	
		?>
		<tr>
		<td width="150"><input type="checkbox" name="chk[]" value="<?php echo $reslocat['slno'];?>" <?php if(in_array($loct,$expl)){echo "checked=checked";}?> class="chkcls"/></td>
		<td colspan="4"><?php echo $reslocat['location'];?></td>
		</tr>
		<?php
		}
		?>
													</table>
												</div>
												</td>
												</tr>
												
                                                        
												<tr>
														<td valign="top">
                                                        <span style="color:#FF0000;">*</span>Career Objective:
                                                        </td>
                                                        <td colspan="2">
														<textarea class="textbox2" style="height:50px; width:250px;" name="career_objective" id="career"><?php echo $resuser['career_objective'];?></textarea>
                                                        </td>
												</tr>
												<tr>
														<td >&nbsp;</td>
														<td >&nbsp;</td>
														<td >&nbsp;</td>
														
												</tr>
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>Job Specialisation
                                                        </td>
                                                       <td colspan="2">
														<select name="industry" class="textbox2" id="indus" onchange="return getsubspecial(this.value);">
														<option value="0">Select</option>
														<?php
														$sql=mysql_query("select * from `industry`");
														while($res=mysql_fetch_array($sql)){
														?>
														<option value="<?php echo $res['slno'];?>" <?php if($resuser['industry']==$res['slno']){echo "selected";}?>><?php echo $res['industry'];?></option>
														<?php
														}
														?>
														</select>
													   </td>
													
												</tr>
												
												<tr id="subid"></tr>
												<tr>
														<td colspan="2"><span style="color:#FF0000;">*</span>Job Skills
														 <td>
                                                       <!-- <input type="checkbox" name="" value="" >Bank<input type="checkbox" name="" value="" >Airlines-->
													   </td>
													   
												</tr>
													<tr>
													<td><div style="float:left; margin-top:0px;">Advanced:</div>
													<select class="textbox2" onchange="return myfunction(this.value)" style=" float:left; margin-top:10px; margin-left:6px; height:auto;" id="advancee">
															<option value="0">--Choose Skill--</option>
															<?php
															$qskill=mysql_query("select * from `skill`")or die(mysql_error());
															while($rskill=mysql_fetch_array($qskill))
															{
															?>
															<option value="<?=$rskill['slno'];?>"><?=$rskill['skill'];?></option>
															<?php
															}
															?>
													</select>
														
														<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_add">
														
															<?php $advance=explode(",",$resuser['advanced']);
															foreach($advance as $key=>$value)
															{
																		if($value!='')
																		{
																$qskillname=mysql_query("select `skill` from `skill` where `slno`='$value'")or die(mysql_error());
																$rskillname=mysql_fetch_array($qskillname);
															?>
															<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill<?=$value;?>">
																<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskille(<?=$value;?>);">X</span>
																<?php echo $rskillname['skill']; ?>	
															</div>				
															<?php 
															} 
															}
															?>
															
															
														</div>
														<input type="hidden" name="advance" id="advance_add" class="txtarea" value="<?=$resuser['advanced']?>"/>
													</td>
			<td><div style="float:left;">Intermediate:</div>
			<select class="textbox2" onchange="return myfunction1(this.value)" style=" float:left; margin-top:10px; margin-left:6px;" id="intermediatee">
					<option value="0">--Choose Skill--</option>
					<?php
					$qskill=mysql_query("select * from `skill`")or die(mysql_error());
					while($rskill=mysql_fetch_array($qskill))
					{
					?>
					<option value="<?=$rskill['slno'];?>"><?=$rskill['skill'];?></option>
					<?php
					}
					?>
				</select>
			<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_inter">
				<?php $intermediate=explode(",",$resuser['intermediate']);
			foreach($intermediate as $key=>$value1)
			{
						if($value1!='')
						{
				$qskillname=mysql_query("select `skill` from `skill` where `slno`='$value1'")or die(mysql_error());
				$rskillname=mysql_fetch_array($qskillname);
			?>
			
				<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill<?=$value1;?>"><span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskille1(<?=$value1;?>);">X</span><?php echo $rskillname['skill']; ?>	</div>		
						
			<?php
						}
			}
			?>
			
					
				</div>
			<input type="hidden" name="intermediate" id="intermediate_add" class="txtarea" value="<?=$resuser['intermediate']?>"/>
			</td>
			<td><div style="float:left;">Basic:</div>
			<select class="textbox2" onchange="return myfunction2(this.value)" style=" float:left; margin-top:10px; margin-left:6px;" id="basicc">
					<option value="0">--Choose Skill--</option>
					<?php
					$qskill=mysql_query("select * from `skill`")or die(mysql_error());
					while($rskill=mysql_fetch_array($qskill))
					{
					?>
					<option value="<?=$rskill['slno'];?>"><?=$rskill['skill'];?></option>
					<?php
					}
					?>
				</select>
			<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_basic">
				<?php $basic=explode(",",$resuser['basic']);
			foreach($basic as $key=>$value2)
			{
						if($value2!='')
						{
				$qskillname=mysql_query("select `skill` from `skill` where `slno`='$value2'")or die(mysql_error());
				$rskillname=mysql_fetch_array($qskillname);
			?>
			
				<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill<?=$value2;?>"><span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskille2(<?=$value2;?>);">X</span><?php echo $rskillname['skill']; ?>	</div>		
						
			<?php
						}
			}
			?>		
					
				</div>
			<input type="hidden" name="basic" id="basic_add" class="txtarea" value="<?=$resuser['basic'];?>"/>
			</td>
		</tr>
												
												<tr>
														<td colspan="3">
                                                        <p style="color:#000; font-weight:bold; margin-top:50px; text-align:right; margin-right:20px; font-size:13px; cursor:pointer;">
														 <input type="submit" name="submit" value="Continue"/>
														</p>
														
                                                        </td>
                                                       
													
												</tr>
												
							</table>
				</form>			
		
					
					