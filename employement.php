<?php
$indusval='';
$indusval.="<select name='industry[]' class='textbox2' onchange='return getsubspeciall2(this.value,$(this));'><option value='0'>Select</option>";
$sql=mysql_query("select * from `industry`");
while($res=mysql_fetch_array($sql)){
$indusval.="<option value='$res[slno]'>".$res['industry']."</option>";
}
$indusval.="</select>";	
	
$frommonthval='';
$frommonthval.="<select name='from_month[]' class='textbox2' style='width:120px; margin-right:10px;'><option value='0'>---Month---</option>";
for ($i = 1; $i <= 12; $i++)
	{
$monthName = date('M', mktime(0, 0, 0, $i, 10));
$frommonthval.="<option value='$i'>".$monthName."</option>";
}
$frommonthval.="</select>";	

$tomonthval='';
$tomonthval.="<select name='to_month[]' class='textbox2' style='width:120px; margin-right:10px;'><option value='0'>---Month---</option>";
for ($i = 1; $i <= 12; $i++)
	{
$monthName1 = date('M', mktime(0, 0, 0, $i, 10));
$tomonthval.="<option value='$i'>".$monthName1."</option>";
}
$tomonthval.="</select>";	

$positionval='';
$positionval.="<select name='position[]' class='textbox2'><option value='0'>Select</option>";
$sqlpos=mysql_query("select * from `position_level`");
while($respos=mysql_fetch_array($sqlpos)){
$positionval.="<option value='$respos[slno]'>".$respos['position']."</option>";
}
$positionval.="</select>";


$jobfunctionval='';
$jobfunctionval.="<select name='jobfunction[]' class='textbox2'><option value='0'>Select</option>";
$sqljob=mysql_query("select * from `job_function`");
while($resjob=mysql_fetch_array($sqljob)){
$jobfunctionval.="<option value='$resjob[slno]'>".$resjob['jobfunction']."</option>";
}
$jobfunctionval.="</select>";

?>
<script type="text/javascript">
	$(function(){
    var employmentoptions = { 
			target:        'employment_insert.php',   // target element(s) to be updated with server response 
			beforeSubmit:  employmentshowRequest,  // pre-submit callback 
			success:       employmentshowResponse  // post-submit callback 
		};
   
    $('#employment_box').submit(function() {
	var compidval=$('#compid').val();
	var strinduss=$("#induss option:selected").val();
	var strfrommonthid=$("#frommonthid option:selected").val();
	var fromyearidval=$('#fromyearid').val();
	var strtomonthid=$("#tomonthid option:selected").val();
	var toyearidval=$('#toyearid').val();
	var titleval=$('#titlee').val();
	var strpos=$("#pos option:selected").val();
	var strjobb=$("#jobb option:selected").val();
	
	if(compidval=="")
	{
	alert("Enter Your Company name");
	return false;
	}
	if(strinduss==0)
	{
	alert("Choose  Your Industry");
	return false;
	}
	if(strfrommonthid==0)
	{
	alert("Choose starting month");
	return false;
	}
	if(fromyearidval==0)
	{
	alert("Choose  starting year");
	return false;
	}
	if(strtomonthid==0)
	{
	alert("Choose ending duration month");
	return false;
	}
	if(toyearidval==0)
	{
	alert("Choose ending duration year");
	return false;
	}
	if(titleval=="")
	{
	alert("Enter Your Title");
	return false;
	}
	if(strpos==0)
	{
	alert("Choose Position level");
	return false;
	}
	if(strjobb==0)
	{
	alert("Choose job category");
	return false;
	}
	
	
	
				$(this).ajaxSubmit(employmentoptions);
				$(".tabs li a[href='#tab4']").click();
				return false;
				
		});

		
    });
    function employmentshowRequest(formData, jqForm, employmentoptions) {}

    function employmentshowResponse(responseText, statusText)  { 
	
		/*if(responseText=="OK") {
		    $(".tabs li a[href='#tab2']").click();
		} else {
			alert(responseText);
		}*/
		
		//$(".tabs li a[href='#tab2']").click();
	}
	
</script>

<script>
function getsubspeciall2(jobb,obj)
		{
			var tableid=obj.parent().parent().parent().parent().attr("idvalue");
		$.ajax({url:"sub_specialization.php?jobvl="+jobb,
			   success:function(result)
			   {
			   $('#sub_id'+tableid).html(result);
			    }
			   });
		}
		var z=0;
function getdata()
{
z++;
var industryvals="<?php echo $indusval;?>";
var frommonthvals="<?php echo $frommonthval;?>";
var tomonthvals="<?php echo $tomonthval;?>";
var positionvals="<?php echo $positionval;?>";
var jobfunctionvals="<?php echo $jobfunctionval;?>";
			
			$('#expid').append('<table class="tbl" idvalue="'+z+'" style="border-top:1px solid #cdcdcd;"><tr><td>Company Name:</td><td><input type="text" class="textbox6" name="comapany[]"/></td></tr><tr><td><span style="color:#FF0000;">*</span>Job Specialization:</td><td>'+industryvals+'</td></tr><tr id="sub_id'+z+'"></tr><tr><td>Duration:</td><td>'+frommonthvals+'<input type="text" name="from_year[]" class="txtbox" placeholder="Year" onKeyPress="return numbersonly(event)" maxlength="4"/>&nbsp;To: &nbsp;'+tomonthvals+'<input type="text" name="to_year[]" class="txtbox" placeholder="Year" onKeyPress="return numbersonly(event)" maxlength="4"/></td></tr><tr><td>Job title:</td><td><input type="text" class="textbox6" name="title[]"/></td></tr><tr><td><span style="color:#FF0000;">*</span>Position Level:</td><td>'+positionvals+'</td></tr><tr><td valign="top"><span style="color:#FF0000;">*</span>Job Description:</td><td><textarea class="textbox5" style="height:40px; width:370px;" name="description[]"></textarea></td></tr></table>');
}
function getsubspeciall1(jobvall)
		{
		 $.ajax({url:"sub_specialize2.php?jobidvall="+jobvall,
			   success:function(results)
			   {
			    $('#subidd').html(results);
			    }
			   });
		}
		function getsubspeciall(jobvalls,jval)
		{
		$.ajax({url:"sub_specialize3.php?jobidvalls="+jobvalls,
			   success:function(results)
			   {
			    $('#subidd'+jval).html(results);
			    }
			   });
		}
		
</script>

	<form name="f" id="employment_box" action="employment_insert.php" method="post" >
	<?php
	$expid=mysql_query("select * from `experience` where `user_id`='$_SESSION[useridval]'");
	$num=mysql_num_rows($expid);
	
	if($num==0){
	?>
							<table class="tbl">
									
												<tr>
														<td>Company Name:</td>
														<td><input type="text"  name="comapany[]" id="compid"  class="textbox6"/></td>
												</tr>
							
												
												
												<tr>
														<td><span style="color:#FF0000;">*</span>Job Specialization:</td>
														<td>
														<select name="industry[]" class="textbox2" id="induss" onchange="return getsubspeciall1(this.value);">
														<option value="0">Select</option>
														<?php
														$sql=mysql_query("select * from `industry`");
														while($res=mysql_fetch_array($sql)){
														?>
														<option value="<?php echo $res['slno'];?>"><?php echo $res['industry'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<tr id="subidd"></tr>
												<tr>
														<td>Duration:</td>
														<td colspan="2">
														 From: &nbsp;
														<select class="textbox2" style="width:120px; margin-right:10px;" name="from_month[]" id="frommonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>"><?php echo $monthName;?></option>
																<?php
																}

																?>
														</select>&nbsp; 
														 <input type="text" name="from_year[]" class="txtbox"  placeholder="Year" id="fromyearid" onKeyPress="return numbersonly(event)" maxlength="4"/> &nbsp;To: &nbsp;
														 <select class="textbox2" style="width:120px; margin-right:10px;" name="to_month[]" id="tomonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName1 = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>"><?php echo $monthName1;?></option>
																<?php
																}

																?>
														</select> &nbsp;
														 <input type="text" name="to_year[]" class="txtbox" placeholder="Year" id="toyearid" onKeyPress="return numbersonly(event)" maxlength="4"/>&nbsp;
														 <span id="crntid"> <input type="checkbox" name="crnt[]" value="current"/> &nbsp;Current</span>
                                                         </td>
														
												</tr>
												<tr>
														<td>Job title:</td>
														<td>
											<input type="text" class="textbox6" name="title[]" id="titlee"/>
												</td>
												</tr>
												<tr>
														<td><span style="color:#FF0000;">*</span>Position Level:</td>
														<td>
														<select name="position[]" class="textbox2" id="pos">
														<option value="0">Select</option>
														<?php
														$sqlpos=mysql_query("select * from `position_level`");
														while($respos=mysql_fetch_array($sqlpos)){
														?>
														<option value="<?php echo $respos['slno'];?>"><?php echo $respos['position'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<!--<tr>
														<td><span style="color:#FF0000;">*</span>Job Category:</td>
														<td>
														<select name="jobfunction[]" class="textbox2" id="jobb">
														<option value="0">Select</option>
														<?php
														$sqljob=mysql_query("select * from `job_function`");
														while($resjob=mysql_fetch_array($sqljob)){
														?>
														<option value="<?php echo $resjob['slno'];?>" ><?php echo $resjob['jobfunction'];?></option>
														<?php
														}
														?>
													   </select>
                                                        </td>
														
												</tr>-->
												<tr>
														<td valign="top">
                                                        <span style="color:#FF0000;">*</span>Job Description:
                                                        </td>
                                                        <td>
														<textarea class="textbox5" style="height:40px; width:370px;" name="description[]"></textarea>
                                                        </td>
												</tr>
												<tr>
												<td colspan="2"><div id="expid"></div></td>
												</tr>
						
												<tr>
														<td colspan="2">
                                                        <p><span style="color: #000000; width:100%; height:auto; float:left; padding-top:20px; border-top:1px solid #ccc;" onclick="return getdata();">Add Experience +</span></p>
														<div style="width:100%; height:auto; float:left;">
																 <p style="font-weight:bold; margin-top:50px; text-align:right; margin-right:20px; font-size:13px;">
																 <input type="submit" name="submit" value="Save and Continue"/>
																 </p>
														</div>		
                                                        </td>	
												</tr>
										</table>
										
								<?php
								}
								
								else{
								$j=0;
								while($resexpid=mysql_fetch_array($expid)){
								$j++;
								$fromval=$resexpid['from'];
								$fromexpl=explode('-',$fromval);
								$frommonth=$fromexpl[0];
								$fromyear=$fromexpl[1];
								$toval=$resexpid['to'];
								$toexpl=explode('-',$toval);
								$tomonth=$toexpl[0];
								$toyear=$toexpl[1];
								if($resexpid['type']=="current"){
								?>
									
									
									<table class="tbl" id="<?php echo $j;?>">
									
												<tr>
														<td>Company Name:</td>
														<td>
														<input type="text"  name="comapany[]" id="compid"  class="textbox6" value="<?php echo $resexpid['company'];?>"/>
														<input type="hidden" name="hdidd[]" value="<?php echo $resexpid['slno'];?>"/>
														</td>
												</tr>
												
												<tr>
														<td><span style="color:#FF0000;">*</span>Job Specialization:</td>
														<td>
														<select name="industry[]" class="textbox2" id="indus" onchange="return getsubspeciall(this.value,<?php echo $j;?>);">
														<option value="0">Select</option>
														<?php
														$sql=mysql_query("select * from `industry`");
														while($res=mysql_fetch_array($sql)){
														?>
														<option value="<?php echo $res['slno'];?>" <?php if($resexpid['industry']==$res['slno']){echo "selected";}?>><?php echo $res['industry'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<tr id="subidd<?php echo $j;?>"></tr>
												<tr>
														<td>Duration:</td>
														<td colspan="2">
														 From: &nbsp;
														<select class="textbox2" style="width:120px; margin-right:10px;" name="from_month[]" id="frommonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>"
																	<?php
																	if($frommonth==$i){echo "selected";}
																	?>
																	><?php echo $monthName;?></option>
																<?php
																}

																?>
														</select>&nbsp; 
														 <input type="text" name="from_year[]" class="txtbox"  placeholder="Year" id="fromyearid" onKeyPress="return numbersonly(event)" maxlength="4" value="<?php echo $fromyear;?>"/> &nbsp;To: &nbsp;
														 <select class="textbox2" style="width:120px; margin-right:10px;" name="to_month[]" id="tomonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName1 = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>" <?php if($tomonth==$i){echo "selected";}?>><?php echo $monthName1;?></option>
																<?php
																}

																?>
														</select> &nbsp;
														 <input type="text" name="to_year[]" class="txtbox" placeholder="Year" id="toyearid" onKeyPress="return numbersonly(event)" maxlength="4" value="<?php echo $toyear;?>"/>&nbsp;
														 <span id="crntid">
														 <?php
														  if($resexpid['type']=="current"){
														 ?>
														 <input type="checkbox" name="crnt[]" value="current" <?php if($resexpid['type']=="current"){echo "checked";}?>/> 
														 &nbsp;Current
														 <?php
														 }
														 else{}
														 ?>
														 </span>
                                                         </td>
														
												</tr>
												<tr>
														<td>Job title:</td>
														<td>
											<input type="text" class="textbox6" name="title[]" value="<?php echo $resexpid['title'];?>"/>
												</td>
												</tr>
												<tr>
														<td><span style="color:#FF0000;">*</span>Position Level:</td>
														<td>
														<select name="position[]" class="textbox2" id="pos">
														<option value="0">Select</option>
														<?php
														$sqlpos=mysql_query("select * from `position_level`");
														while($respos=mysql_fetch_array($sqlpos)){
														?>
														<option value="<?php echo $respos['slno'];?>" <?php if($resexpid['position']==$respos['slno']){echo "selected";}?>><?php echo $respos['position'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<!--<tr>
														<td><span style="color:#FF0000;">*</span>Job Category:</td>
														<td>
														<select name="jobfunction[]" class="textbox2" id="job">
														<option value="0">Select</option>
														<?php
														$sqljob=mysql_query("select * from `job_function`");
														while($resjob=mysql_fetch_array($sqljob)){
														?>
														<option value="<?php echo $resjob['slno'];?>" <?php if($resexpid['jobcategory']==$resjob['slno']){echo "selected";}?>><?php echo $resjob['jobfunction'];?></option>
														<?php
														}
														?>
													   </select>
                                                        </td>
														
												</tr>-->
												<tr>
														<td valign="top">
                                                        <span style="color:#FF0000;">*</span>Job Description:
                                                        </td>
                                                        <td>
														<textarea class="textbox5" style="height:40px; width:370px;" name="description[]"><?php echo $resexpid['description'];?></textarea>
                                                        </td>
												</tr>
												
						
												
										</table>	
										<div style="width:600px; height:5px; float:left; border-top:1px solid #cdcdcd; margin-top:10px; margin-left:10px;"></div>
								<?php
								}
								else
								{
								?>
								<table class="tbl" id="<?php echo $j;?>">
									
												<tr>
														<td>Company Name:</td>
														<td>
														<input type="text"  name="comapany[]" id="compid"  class="textbox6" value="<?php echo $resexpid['company'];?>"/>
														<input type="hidden" name="hdidd[]" value="<?php echo $resexpid['slno'];?>"/>
														</td>
												</tr>
												
												<tr>
														<td><span style="color:#FF0000;">*</span>Job Specialization:</td>
														<td>
														<select name="industry[]" class="textbox2" id="indus" onchange="return getsubspeciall(this.value,<?php echo $j;?>);">
														<option value="0">Select</option>
														<?php
														$sql=mysql_query("select * from `industry`");
														while($res=mysql_fetch_array($sql)){
														?>
														<option value="<?php echo $res['slno'];?>" <?php if($resexpid['industry']==$res['slno']){echo "selected";}?>><?php echo $res['industry'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<tr id="subidd<?php echo $j;?>"></tr>
												<tr>
														<td>Duration:</td>
														<td colspan="2">
														 From: &nbsp;
														<select class="textbox2" style="width:120px; margin-right:10px;" name="from_month[]" id="frommonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>"
																	<?php
																	if($frommonth==$i){echo "selected";}
																	?>
																	><?php echo $monthName;?></option>
																<?php
																}

																?>
														</select>&nbsp; 
														 <input type="text" name="from_year[]" class="txtbox"  placeholder="Year" id="fromyearid" onKeyPress="return numbersonly(event)" maxlength="4" value="<?php echo $fromyear;?>"/> &nbsp;To: &nbsp;
														 <select class="textbox2" style="width:120px; margin-right:10px;" name="to_month[]" id="tomonthid">
																<option value="0">---Month---</option>
																<?php
																for ($i = 1; $i <= 12; $i++)
																{
																	
																	$monthName1 = date('M', mktime(0, 0, 0, $i, 10));	
																	
																?>
																	<option value="<?php echo $i;?>" <?php if($tomonth==$i){echo "selected";}?>><?php echo $monthName1;?></option>
																<?php
																}

																?>
														</select> &nbsp;
														 <input type="text" name="to_year[]" class="txtbox" placeholder="Year" id="toyearid" onKeyPress="return numbersonly(event)" maxlength="4" value="<?php echo $toyear;?>"/>&nbsp;
														 <span id="crntid">
														 <?php
														  if($resexpid['type']=="current"){
														 ?>
														 <input type="checkbox" name="crnt[]" value="current" <?php if($resexpid['type']=="current"){echo "checked";}?>/> 
														 &nbsp;Current
														 <?php
														 }
														 else{}
														 ?>
														 </span>
                                                         </td>
														
												</tr>
												<tr>
														<td>Job title:</td>
														<td>
											<input type="text" class="textbox6" name="title[]" value="<?php echo $resexpid['title'];?>"/>
												</td>
												</tr>
												<tr>
														<td><span style="color:#FF0000;">*</span>Position Level:</td>
														<td>
														<select name="position[]" class="textbox2" id="pos">
														<option value="0">Select</option>
														<?php
														$sqlpos=mysql_query("select * from `position_level`");
														while($respos=mysql_fetch_array($sqlpos)){
														?>
														<option value="<?php echo $respos['slno'];?>" <?php if($resexpid['position']==$respos['slno']){echo "selected";}?>><?php echo $respos['position'];?></option>
														<?php
														}
														?>
														</select>
                                                        </td>
														
												</tr>
												<!--<tr>
														<td><span style="color:#FF0000;">*</span>Job Category:</td>
														<td>
														<select name="jobfunction[]" class="textbox2" id="job">
														<option value="0">Select</option>
														<?php
														$sqljob=mysql_query("select * from `job_function`");
														while($resjob=mysql_fetch_array($sqljob)){
														?>
														<option value="<?php echo $resjob['slno'];?>" <?php if($resexpid['jobcategory']==$resjob['slno']){echo "selected";}?>><?php echo $resjob['jobfunction'];?></option>
														<?php
														}
														?>
													   </select>
                                                        </td>
														
												</tr>-->
												<tr>
														<td valign="top">
                                                        <span style="color:#FF0000;">*</span>Job Description:
                                                        </td>
                                                        <td>
														<textarea class="textbox5" style="height:40px; width:370px;" name="description[]"><?php echo $resexpid['description'];?></textarea>
                                                        </td>
												</tr>
												
						
												
										</table>	
								<?php
								}
								}
								?>
								<table class="tbl">
								<tr>
												<td colspan="2"><div id="expid"></div></td>
								</tr>
								<tr>
														<td colspan="2">
                                                        <p><span style="color: #000000; width:100%; height:auto; float:left; padding-top:20px; border-top:1px solid #ccc;" onclick="return getdata();">Add Experience +</span></p>
														<div style="width:100%; height:auto; float:left;">
																 <p style="font-weight:bold; margin-top:50px; text-align:right; margin-right:20px; font-size:13px;">
																 <input type="submit" name="submit" value="Save and Continue"/>
																 </p>
														</div>		
                                                        </td>	
								</tr>
								</table>
								<?php
								}
								?>	
									</form>											