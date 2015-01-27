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
												
												$datee=$resuser['dob'];
												$expdt=explode('-',$datee);
												$yval=$expdt[0];
												$mval=$expdt[1];
												$dval=$expdt[2];
												
		$sqlprefix=mysql_query("select * from `prefix` where `slno`='$resuser[prefix]'");
		$resprefix=mysql_fetch_array($sqlprefix);	
		
		$sqlnationality=mysql_query("select * from `citizenship` where `slno`='$resuser[nationality]'");
		$resnationality=mysql_fetch_array($sqlnationality);			
		
		$sqlcountry=mysql_query("select * from `country` where `slno`='$crntaddrs1'");
		$rescountry=mysql_fetch_array($sqlcountry);	
		
		$sqlcountryy=mysql_query("select * from `country` where `slno`='$permntaddrs1'");
		$rescountryy=mysql_fetch_array($sqlcountryy);
		
		$sqlcurrency=mysql_query("select * from `currency` where `slno`='$resuser[expected_currency]'");
		$rescurrency=mysql_fetch_array($sqlcurrency);	
		
		$sqlcurrencyy=mysql_query("select * from `currency` where `slno`='$resuser[current_currency]'");
		$rescurrencyy=mysql_fetch_array($sqlcurrencyy);
		
		$sqlindustry=mysql_query("select * from `industry` where `slno`='$resuser[industry]'");
		$resindustry=mysql_fetch_array($sqlindustry);
		
												
?>
	<h2><span style="color: #900;">Your personal details & settings</span></h2> 
					
							<table class="tbl" style="width:650px;">
									<tr>
														<td colspan="3">Personal Detail>></td>
														
												</tr>
												<tr>
														<td><span style="color:#FF0000;">*</span> Name:</td>
														<td colspan="2"><?php echo $resprefix['prefix']." ".$resuser['first_name']." ".$resuser['last_name'];?></td>
												</tr>
												<tr>
												<td><span style="color:#FF0000;">*</span>Nationality:</td>
                                                
												<td colspan="2">
													   <?php echo $resnationality['citizen'];?>
												</td>
												</tr>
							
												<tr>
														<td> <span style="color:#FF0000;">*</span>email:
														 
                                                         
                                                         </td>
                                                         <td colspan="2">
                                                         <?php echo $resuser['email'];?>
                                                         </td>
                                                         
												</tr>
												
					
												<tr>
												<td style="width:0px;"><span style="color:#FF0000; width:100px; margin-right:10px;">*</span>dob:</td>
												<td colspan="2">
                                                
                                                <?php echo $resuser['dob'];
												//echo  $dval. "   -  " .$mval. " - "  $yval. " "; ?>
												</td>
                                                </tr>
												
												<tr>
														<td>home phone:
														 <!--<input type="text" name="home_contact" id="home_phone" class="textbox2" value=""/>-->
                                                         </td>
                                                         <td><?php echo $resuser['home_contact'];?></td>
														
												</tr>
												<tr>
														<td>mobile:
														<!--<input type="text" name="mobl_contact" id="mob_phone" class="textbox2" style="margin-left:40px;" value=""/>-->
                                                        </td>
                                                        <td><?php echo $resuser['mobile_contact'];?></td>
														
												</tr>
												<tr>
												  <td style="width:150px;">marital status:</td>
												   <td colspan="2">
                                                       <!-- <input type="radio"  name="marital_status"    value="single" <?php if($resuser['marital_status']=="single"){echo "checked";}?> checked> Single 
                                                        <input type="radio"  name="marital_status"   value="married" <?php if($resuser['marital_status']=="married"){echo "checked";}?>> Married-->
                                                        
                                                        <?php echo $resuser['marital_status'];?>
												   </td>
												</tr>
												<tr>
												<td>Postal Code:</td>
												<td colspan="2">
                                                <?php echo $resuser['postal'];?>
												<!--<input type="text" name="postal" id="post"  class="textbox2"  onKeyPress="return numbersonly(event)" value=""/>-->
												</td>
												</tr>
												<tr>
												<td>Age:</td>
												<td colspan="2">
													   <!--<input type="text" name="age" id="age"  class="textbox2" onKeyPress="return numbersonly(event)" value=""/>-->
                                                       <?php echo $resuser['age'];?>
												</td>
												</tr>
												<tr>
												<td>Gender:</td>
												<td colspan="2">
													   <!-- <input type="radio"  name="gen"   value="male" <?php if($resuser['gender']=="male"){echo "checked";}?> checked> Male -->
                                                        <!--<input type="radio"  name="gen"   value="female" <?php if($resuser['gender']=="female"){echo "checked";}?>> Female-->
                                                        <?php echo $resuser['gender'];?>
												</td>
												</tr>
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>current Address:
                                                        </td>
                                                        <td> 
														<!--<textarea class="textbox2" name="crnt_address" id="crnt_addrs" ></textarea>-->
                                                        <?php echo $crntaddrs;?>
                                                        </td>
                                                        <td>
														<!--<select  class="textbox2" id="crnt_count" name="crnt_country">
																<option value="0">Country</option>-->
                                                                
																<?php echo $rescountry['country']; ?>
														<!--</select>-->
														
                                                        </td>
														
												</tr>
												<tr>
														<td>
                                                        Permanent Address:
                                                        </td>
                                                        <td>
														<!--<textarea class="textbox2" name="permnt_address" id="permnt_addrs"></textarea>-->
                                                        <?php echo $permntaddrs;?>
                                                        </td>
                                                        <td>
                                                        <?php echo $rescountryy['country']; ?>
														
                                                        </td>
														
												</tr>
												<tr>
													<td>
														Upload Picture :
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
														<td> <span style="color:#FF0000;">*</span>Designation:
                                                        
													<!-- <input type="text" name="designation" class="textbox2" id="degnate" value=""/>-->
                                                     </td>
                                                     <td><?php echo $resuser['designation'];?></td>
												</tr>
                                                 <?php if($resuser['experience_type']=="no"){?>
												<tr>
														<td style="width:150px;">
                                                        Experience:
                                                        </td>
														<td>
                                                        
                                                       <?php echo $resuser['experience_type'];?>
														</td>
                                                        </tr>
                                                        
                                                        
                                                        <?php }else{?>
                                                        <tr>
														<td style="width:150px;">
                                                        Experience:
                                                        </td>
                                                        
														<td>
                                                        
                                                       <?php echo $resuser['experience_type'];?>
														</td>
                                                        <td>Experience Date:
                                                        <?php echo  $monthval. "   -  " .$yearval. "    " ?>
                                                        </td>
														</tr>
                                                        <tr>
                                                        <td>
                                                        Present Salary:
                                                        </td>
                                                        <td>
                                                        <?php echo $resuser['current_salary'];?>
                                                        </td>
                                                        
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                        
                                                        
														
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
												<!--<input type="text" name="crnt_salary" class="textbox2" id="crnt_salary" value="" onkeypress="return  isNumber(evt);"/>--> 
                                                <?php echo $resuser['current_salary'];?>       per month
												</td> 
												<td>
												<?php echo $rescurrencyy['symbol'];?>
												</td>
                                                              
                                                </tr> 
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>Expected Salary:
                                                        </td>
                                                        <td>
														 <!--<input type="text" name="exp_salary" class="textbox2" id="exp_salary" value="" onkeypress="return  isNumber(evt);"/>--> 
                                                         <?php echo $resuser['expected_salary'];?>per month
                                                         </td>
														 <td>
															<!--<select class="textbox2" style="width:120px; margin-right:10px;" name="exp_currency" id="exp_currency" >
															<option value="0">--Currency--</option>-->
															<?php echo $rescurrency['symbol'];?>
														<!--	</select>-->
														</td>
												</tr>
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>Looking job level:
                                                        </td>
                                                        <td>
                                                        
                                                        <?php echo $resuser['job_level'];?>
														<!--<select class="textbox2" style="margin-left:20px; width:160px;" name="job_level" id="job_level" >
														<option value="0">select</option>
														<option value="entry" <?php if($resuser['job_level']=="entry"){echo "selected";}?>>Entry</option>
														<option value="mid" <?php if($resuser['job_level']=="mid"){echo "selected";}?>>Mid</option>
														<option value="senior" <?php if($resuser['job_level']=="senior"){echo "selected";}?>>Senior</option>
														<option value="top" <?php if($resuser['job_level']=="top"){echo "selected";}?>>Top</option>
														</select>-->
                                                        </td>
												</tr>
												<tr>
														<td>
                                                        <span style="color:#FF0000;">*</span>Looking job type:
                                                        </td>
                                                        <td>
                                                         <?php echo $resuser['job_type'];?>
														<!--<select class="textbox2" style="margin-left:25px; width:160px;" name="job_type" id="job_type">
														<option value="0">select</option>
														<option value="permanent" <?php if($resuser['job_type']=="permanent"){echo "selected";}?>>Permanent</option>
														<option value="Temporary/Contract" <?php if($resuser['job_type']=="Temporary/Contract"){echo "selected";}?>>Temporary/Contract</option>
														<option value="Contract" <?php if($resuser['job_type']=="Contract"){echo "selected";}?>>Contract</option>
														</select>-->
                                                        </td>
												</tr>
												<tr>
														<td colspan="3">
                                                        Preferred job location:
														
												</tr>
												
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
		<td><input type="checkbox" name="chk[]" value="<?php echo $reslocat['slno'];?>" <?php if(in_array($loct,$expl)){echo "checked=checked";}?> class="chkcls"/></td>
		<td colspan="4"><?php echo $reslocat['location'];?></td>
		</tr>
		<?php
		}
		?>
                                                        
												<tr>
														<td valign="top">
                                                        <span style="color:#FF0000;">*</span>Career Objective:
                                                        </td>
                                                        <td colspan="2">
														<!--<textarea class="textbox2" style="height:50px; width:250px;" name="career_objective" id="career"></textarea>-->
                                                        <?php echo $resuser['career_objective'];?>
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
                                                       <td>
														<?php echo $resindustry['industry'];?>
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
						
		
					
					