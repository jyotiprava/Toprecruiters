
<script type="text/javascript">
function myfunction(sid){
$.ajax({
       url:"ajax_addskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_add").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill('+r[0]+');">X</span></div>');
	 var oldvalue=$("#advance_add").val();
	 if (oldvalue) {
			$("#advance_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#advance_add").val(r[0]);	
        }		
       }
});
}

function myfunctionedit(sid){
$.ajax({
       url:"ajax_addskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill('+r[0]+');">X</span></div>');
	 var oldvalue=$("#advance_edit").val();
	 if (oldvalue) {
			$("#advance_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#advance_edit").val(r[0]);	
        }		
       }
});
}


function cancelskill(sid)
{
$('#skill'+sid).remove();
var oldval=$('#advance_add').val();
oldval=oldval.replace(sid, "");
$('#advance_add').val(oldval);
}

function cancelskille(sid)
{
alert(sid);
$('#skill'+sid).remove();
var oldval=$('#advance_edit').val();
oldval=oldval.replace(sid, "");
$('#advance_edit').val(oldval);
}

function myfunction1(sid){
$.ajax({
       url:"ajax_interskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_inter").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill1'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill1('+r[0]+');">X</span></div>');
	 var oldvalue=$("#intermediate_add").val();
	 if (oldvalue) {
			$("#intermediate_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#intermediate_add").val(r[0]);	
        }		
       }
});
}

function myfunction1edit(sid){
$.ajax({
       url:"ajax_interskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_inter_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill1'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill1('+r[0]+');">X</span></div>');
	 var oldvalue=$("#intermediate_edit").val();
	 if (oldvalue) {
			$("#intermediate_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#intermediate_edit").val(r[0]);	
        }		
       }
});
}

function cancelskill1(sid)
{
$('#skill1'+sid).remove();
var oldval=$('#intermediate_add').val();
oldval=oldval.replace(sid, "");
$('#intermediate_add').val(oldval);
}
function cancelskille1(sid)
{
$('#skill'+sid).remove();
var oldval=$('#intermediate_edit').val();
oldval=oldval.replace(sid, "");
$('#intermediate_edit').val(oldval);
}

function myfunction2(sid){
$.ajax({
       url:"ajax_basicskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_basic").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill2'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill2('+r[0]+');">X</span></div>');
	 var oldvalue=$("#basic_add").val();
	 if (oldvalue) {
			$("#basic_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#basic_add").val(r[0]);	
        }		
       }
});
}

function myfunction2edit(sid){
$.ajax({
       url:"ajax_basicskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_basic_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill2'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill2('+r[0]+');">X</span></div>');
	 var oldvalue=$("#basic_edit").val();
	 if (oldvalue) {
			$("#basic_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#basic_edit").val(r[0]);	
        }		
       }
});
}

function cancelskill2(sid)
{
$('#skill2'+sid).remove();
var oldval=$('#basic_add').val();
oldval=oldval.replace(sid, "");
$('#basic_add').val(oldval);
}
function cancelskille2(sid)
{
$('#skill'+sid).remove();
var oldval=$('#basic_edit').val();
oldval=oldval.replace(sid, "");
$('#basic_edit').val(oldval);
}

function selectedskill() {
       var skilid=$('#advance_edit').val();
       $.ajax({
	   url:"ajax_selectedskill.php?id1="+skilid,
	   success:function(result){
	     $("#select").html(result); 
	   }
       });
      
}

function selectedskillbasic() {
       var skilid=$('#advance_edit').val();
       var skilid1=$('#intermediate_edit').val();
	   var sklid=skilid+","+skilid1;
       $.ajax({
	   url:"ajax_selectedskillbasic.php?id="+sklid,
	   success:function(result){
	     $("#select1").html(result); 
	   }
       });
      
}
</script>

<?php
$qwery_res=mysql_query("select * from `cv_detail` where `user_id`='$_SESSION[useridval]'")or die(mysql_error());
$result_res=mysql_fetch_array($qwery_res);
$useremail=mysql_query("select `emailid` from `user_detail` where `slno`='$_SESSION[useridval]'");
$resemail=mysql_fetch_array($useremail);
$num=mysql_num_rows($qwery_res);
if($num==0)
{

?>

<h2><span style="color: #900;">Store CV</span></h2>
<div class="container" style="width:100%; float: left; height: auto;">
			<ul class="tabs1">
				<li><a href="#tab4">Personal Info</a></li>
				<li><a href="#tab5">Education Training</a></li>
				<li><a href="#tab6">Employment</a></li>
				<li><a href="#tab7">Other Details</a></li>
			</ul>
			
		<div class="tab_container1">
			<form name="myfrm" method="post" action="" enctype="multipart/form-data" onsubmit="return validate();">
			<div id="tab4" class="tab_content1">
				<table class="tbl">
        <tr>
                <td class="font" colspan="5">
					Your Personal Details :			
				</td>
		</tr>
		<tr>
                <td>
                       <select name="prefix" class="textbox" id="prefix">
						<option value="0">Prefix</option>
						<?php
						$sqlprefix=mysql_query("select * from `prefix`");
						while($resprefix=mysql_fetch_array($sqlprefix)){
						?>
						<option value="<?php echo $resprefix['slno'];?>"><?php echo $resprefix['prefix'];?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td>
                            <input type="text" name="fname" placeholder="First Name" class="textbox" id="fnamee"/>
				</td>
				<td colspan="3">
							<input type="text" name="lname" placeholder="Last Name" class="textbox"  id="lnamee"/>
				</td>
		</tr>
		<tr>
				<td>
                       <select name="citizen" class="textbox" id="citizen">
						<option value="0">Citizenship</option>
						<?php
						$sqlcitizenship=mysql_query("select * from `citizenship`");
						while($rescitizenship=mysql_fetch_array($sqlcitizenship)){
						?>
						<option value="<?php echo $rescitizenship['slno'];?>"><?php echo $rescitizenship['citizen'];?></option>
						<?php
						}
						?>
					</select>
				</td>
                <td>
                           <input type="text" name="contact" id="phone" placeholder="Primary Contact Number" class="textbox" onKeyPress="return numbersonly(event)"/>
				</td>
				<td colspan="3">
                           <input type="text" name="email" id="email_id" placeholder="Email Address" class="textbox"  value="<?php echo $resemail['emailid'];?>" readonly/>
				</td>
				 
		</tr>
		<tr>
                <td>
                    <select name="country" class="textbox" id="count">
						<option value="0">Country</option>
						<?php
						$sqlcountry=mysql_query("select * from `country`");
						while($rescountry=mysql_fetch_array($sqlcountry)){
						?>
						<option value="<?php echo $rescountry['slno'];?>"><?php echo $rescountry['country'];?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td>
                           <input type="text" name="postal" id="post" placeholder="Postal Code" class="textbox"  onKeyPress="return numbersonly(event)"/>
				</td>
				 <td colspan="3">
                       <input type="text" name="age" id="age" placeholder="Age" class="textbox" />
				</td>	
				 
		</tr>
		<tr>
				<td colspan="5">
                       <input type="text" name="nationality" id="nation" placeholder="Nationality" class="textbox" />
				</td>
				 
		</tr>
		<tr>
		<td colspan="5" class="font">Address :</td>
		</tr>
		<tr>
		<td colspan="5"><textarea class="tinymce" name="address" id="addrs" placeholder="Address" style="height:auto;"></textarea></td>
		</tr>
		<tr>
		<td class="font">Gender:</td>
		<td><input type="radio" name="gen" value="male" checked/>Male</td>
		<td colspan="3"><input type="radio" name="gen" value="female"/>Female</td>
		</tr>
		<tr>
		<td colspan="5"><span class="font">Experience :</span>
		<input type="text" name="exp" id="exp" placeholder="eg:5" class="textbox" style="width:60px; height:25px;"/>Year</td>
		</tr>
		<tr>
		<td colspan="5"><textarea  class="tinymce" name="expdesc" id="expdesc" style="width:50px;"></textarea></td>
		</tr>
		<tr>
			<td class="font">
				Upload Picture :
			</td>
			<td colspan="4">
				<input type="file" name="img" />
			</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Key	Skills :				
				</td>
		</tr>
		<tr>
			<td><div style="float:left; margin-top: 15px;">Advanced:</div>
			<select class="textbox" onchange="return myfunction(this.value)" >
					<option>--Choose Skill--</option>
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
					
				</div>
				<input type="hidden" name="advance" id="advance_add" class="txtarea"/>
			</td>
			<td><div style="float:left;">Intermediate:</div>
			<select class="textbox" onchange="return myfunction1(this.value)" >
					<option>--Choose Skill--</option>
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
					
				</div>
			<input type="hidden" name="intermediate" id="intermediate_add" class="txtarea"/>
			</td>
			<td colspan="3"><div style="float:left;">Basic:</div>
			<select class="textbox" onchange="return myfunction2(this.value)" >
					<option>--Choose Skill--</option>
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
					
				</div>
			<input type="hidden" name="basic" id="basic_add" class="txtarea"/>
			</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab5']&quot;).click();" class="button1" style="float:right;"/></td>
		</tr>
				</table>
			</div>
			<div id="tab5" class="tab_content1">
				<table class="tbl">
					<tr>
                <td  class="font">
					Education	Details :				
				</td>
		</tr>
		<tr>
                <td>
					<textarea name="education" class="tinymce" placeholder="Education" style="height:auto;" id="edu"></textarea>		
				</td>
		</tr>
		<tr>
                <td class="font">
					<div style="float:left;">Last appeared course:</div>
					<textarea name="course" id="course" placeholder="Last course" class="txtarea"></textarea>				
				</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab6']&quot;).click();" class="button1" style="float:right;"/></td>
		</tr>
				</table>
			</div>
			<div id="tab6" class="tab_content1">
				<table class="tbl">
					<tr>
                <td colspan="5" class="font">
					Vacancy Details :		
				</td>
		</tr>
		<tr>
                <td colspan="5">
					What type of jobs are you looking for?
					<input type="radio" name="jobtype" value="Permanent"/>Permanent	
					<input type="radio" name="jobtype" value="Temporary / Contract"/> Temporary / Contract						
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					<div style="float:left;">Current Position:</div>
					<textarea name="cposition" id="cposition" placeholder="Current position" class="txtarea"></textarea>				
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					<div style="float:left;">Previous Position:</div>
					<textarea name="pposition" id="pposition" placeholder="Previous position" class="txtarea"></textarea>				
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Specialisation :			
				</td>
		</tr>
		<tr>
		<td>Choose Industry</td>
		<td colspan="4"> 
		<select name="industry" class="textbox" id="indus">
						<option value="0">Industry</option>
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
		<tr>
		<td>Choose Jobfunction</td>
		<td colspan="4"> 
		<select name="jobfunction" class="textbox" id="job">
						<option value="0">Job function</option>
						<?php
						$sqljob=mysql_query("select * from `job_function`");
						while($resjob=mysql_fetch_array($sqljob)){
						?>
						<option value="<?php echo $resjob['slno'];?>"><?php echo $resjob['jobfunction'];?></option>
						<?php
						}
						?>
					
		</select>
		</td>
		</tr>
		<tr>
		<td>Choose Location</td>
		<td colspan="4"> 
		<select name="location" class="textbox" id="loc">
						<option value="0">Location</option>
						<?php
						$sqlloc=mysql_query("select * from `location`");
						while($resloc=mysql_fetch_array($sqlloc)){
						?>
						<option value="<?php echo $resloc['slno'];?>"><?php echo $resloc['location'];?></option>
						<?php
						}
						?>
					
		</select>
		</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Languages Known :		
				</td>
		</tr>
		<tr>
		<td  colspan="5">Proficiency level:0-poor,10-Excellent</td>
		</tr>
		<tr>
                <td>Language</td>
				<td>Spoken</td>
				<td>Written</td>
				<td>RelevantCertificates</td>
				<td>Action</td>
		</tr>
		<tr id="1">
                <td>
					<select name="language[]" class="textbox" id="langg" style="width:150px;">
						<option value="0">language</option>
						<?php
						$sqllang=mysql_query("select * from `language`");
						while($reslang=mysql_fetch_array($sqllang)){
						?>
						<option value="<?php echo $reslang['slno'];?>"><?php echo $reslang['language'];?></option>
						<?php
						}
						?>
					
					</select>					
				</td>
				<td>
				<select name="spoken[]" class="textbox" id="spoke" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td>
				<select name="written[]" class="textbox" id="write" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td>
				<select name="relevant[]" class="textbox" id="relev" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td onClick="delete_row(1)"><img src="admin/images/delete.png" width="60" style="margin-top:20px;"></td>
		</tr>
		<tbody id="tbb"></tbody>
		<tr>
		<td colspan="5"><input type="button" name="button" value="Addnew" class="button1" id="add1"/></td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Additional Info :		
				</td>
		</tr>
		<tr>
		<td>Expected salary:</td>
		<td colspan="4"><input type="text" name="expsalary" id="expsalary" placeholder="Expected salary" class="textbox" /></td>
		</tr>
		<tr>
			<td colspan="5">
					Preferred Location :		
			</td>
		</tr>
		<?php
		$sqllocat=mysql_query("select * from `location`");
		while($reslocat=mysql_fetch_array($sqllocat)){
		?>
		<tr>
		<td><input type="checkbox" name="chk[]" value="<?php echo $reslocat['slno'];?>" class="chk"/></td>
		<td colspan="4"><?php echo $reslocat['location'];?></td>
		</tr>
		<?php
		}
		?>
		
				</table>
		<table style="width:920px;">
		<tr>
		<td colspan="3">
		<input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab7']&quot;).click();" class="button1" style="float:right;"/>
		</td>
		</tr>
		</table>
			</div>
			<div id="tab7" class="tab_content1">
				<table class="tbl">
					
					<tr>
			<td colspan="2" class="font">
					Other Information :		
			</td>
		</tr>
		<tr>
		<td colspan="2"><textarea  class="tinymce" name="other" id="other" style="width:50px;"></textarea></td>
		</tr>
		<tr>
			<td>Attach Your CV:</td>
			<td> <input type="file" name="upload"   /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td ><input type="submit" name="submit"  value="Upload" class="button1"  style="margin-top:10px; margin-bottom:10px;" /></td>
		</tr>
</table>
			</div>
			</form>
		</div>
</div>

<?php
}
else{
?>
<h2><span style="color: #900;">Edit Store CV</span></h2>
<div class="container" style="width:100%; float: left; height: auto;">
			<ul class="tabs1">
				<li><a href="#tab8">Personal Info</a></li>
				<li><a href="#tab9">Education Training</a></li>
				<li><a href="#tab10">Employment</a></li>
				<li><a href="#tab11">Other Details</a></li>
			</ul>
			
		<div class="tab_container1">
			<form method="post" action="mypage_update.php" enctype="multipart/form-data">	
			<div id="tab8" class="tab_content1">
				<table class="tbl">
        <tr>
                <td class="font" colspan="5">
					Your Personal Details			
				</td>
		</tr>
		<tr>
                <td>
				<input type="hidden" name="hd_id" value="<?php echo $result_res['slno'];?>"/>
                       <select name="prefix" class="textbox" id="prefix">
						<option value="0">Prefix</option>
						<?php
						$sqlprefix=mysql_query("select * from `prefix`");
						while($resprefix=mysql_fetch_array($sqlprefix)){
						?>
						<option value="<?php echo $resprefix['slno'];?>" <?php if($result_res['prefix']==$resprefix['slno']){echo "selected=selected";}?>><?php echo $resprefix['prefix'];?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td>
                            <input type="text" name="fname" placeholder="First Name" class="textbox" id="fnamee" value="<?php echo $result_res['first_name'];?>"/>
				</td>
				<td colspan="3">
							<input type="text" name="lname" placeholder="Last Name" class="textbox"  id="lnamee" value="<?php echo $result_res['last_name'];?>"/>
				</td>
		</tr>
       
		<tr>
				<td>
                       <select name="citizen" class="textbox" id="citizen">
						<option value="0">Citizenship</option>
						<?php
						$sqlcitizenship=mysql_query("select * from `citizenship`");
						while($rescitizenship=mysql_fetch_array($sqlcitizenship)){
						?>
						<option value="<?php echo $rescitizenship['slno'];?>" <?php if($result_res['citizen']==$rescitizenship['slno']){echo "selected=selected";}?>><?php echo $rescitizenship['citizen'];?></option>
						<?php
						}
						?>
					</select>
				</td>
                 <td>
                           <input type="text" name="contact" id="phone" placeholder="Primary Contact Number" class="textbox" onKeyPress="return numbersonly(event)" value="<?php echo $result_res['contact'];?>"/>
				</td>
				<td colspan="3">
                           <input type="text" name="email" id="email_id" placeholder="Email Address" class="textbox" value="<?php echo $resemail['emailid'];?>" readonly/>
				</td>
				 
		</tr>
		<tr>
                 <td>
                    <select name="country" class="textbox" id="count">
						<option value="0">Country</option>
						<?php
						$sqlcountry=mysql_query("select * from `country`");
						while($rescountry=mysql_fetch_array($sqlcountry)){
						?>
						<option value="<?php echo $rescountry['slno'];?>" <?php if($result_res['country']==$rescountry['slno']){echo "selected=selected";}?>><?php echo $rescountry['country'];?></option>
						<?php
						}
						?>
					</select>
				</td>
				<td>
                           <input type="text" name="postal" id="post" placeholder="Postal Code" class="textbox"  onKeyPress="return numbersonly(event)" value="<?php echo $result_res['postal'];?>"/>
				</td>
				<td colspan="3">
                       <input type="text" name="age" id="age" placeholder="Age" class="textbox" value="<?php echo $result_res['age'];?>"/>
				</td>
				 
		</tr>
		<tr>
				<td colspan="5">
                       <input type="text" name="nationality" id="nation" placeholder="Nationality" class="textbox" value="<?php echo $result_res['nationality'];?>"/>
				</td>
				 
		</tr>
		<tr>
		<td colspan="5" class="font">Address :</td>
		</tr>
		<tr>
		<td colspan="5"><textarea class="tinymce" name="address" id="addrs" placeholder="Address" style="height:auto;"><?php echo $result_res['address'];?></textarea></td>
		</tr>
		<tr>
		<td class="font">Gender:</td>
		<td><input type="radio" name="gen" value="male" <?php if($result_res['gender']=="male"){echo "checked";}?>/>Male</td>
		<td colspan="3"><input type="radio" name="gen" value="female" <?php if($result_res['gender']=="female"){echo "checked";}?>/>Female</td>
		</tr>
		<tr>
		<td colspan="5"><span class="font">Experience :</span>
		<input type="text" name="exp" id="exp" placeholder="eg:5" class="textbox" style="width:60px; height:25px;" value="<?php echo $result_res['experience'];?>"/>Year</td>
		</tr>
		<tr>
		<td colspan="5"><textarea  class="tinymce" name="expdesc" id="expdesc" style="width:50px;"><?php echo $result_res['exp_description'];?></textarea></td>
		</tr>
		
		<tr>
			<td class="font">
				Upload Picture
				
			</td>
			<td>
			
				<input type="file" name="img" />
				
			</td>
			<td colspan="3">
			<input type="hidden" name="hd_picture" value="<?php echo $result_res['picture']; ?>"/>
			<img src="<?php echo $result_res['picture']; ?>" width="60" height="60"/>
            </td>
		</tr>

		<tr>
                <td colspan="3" class="font">
					Key Skills				
				</td>
		</tr>
		<!-- start -->
		<tr>
			<td><div style="float:left; margin-top: 15px;">Advanced:</div>
			<select class="textbox" onchange="return myfunctionedit(this.value)">
					<option>--Choose Skill--</option>
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
		        <div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_edit">
			<?php $advance=explode(",",$result_res['advanced']);
			foreach($advance as $key=>$value)
			{
						if($value!='')
						{
				$qskillname=mysql_query("select `skill` from `skill` where `slno`='$value'")or die(mysql_error());
				$rskillname=mysql_fetch_array($qskillname);
			?>
		        <div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill<?=$value;?>"><span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskille(<?=$value;?>);">X</span><?php echo $rskillname['skill']; ?>	</div>				
			<?php } } ?>
				</div>
		        <input type="hidden" name="advance" id="advance_edit" class="txtarea" value="<?=$result_res['advanced'];?>"/>
			</td>
			
			<td><div style="float:left;">Intermediate:</div>
			  
			<div id="select"><select class="textbox" onchange="return myfunction1edit(this.value)">
					<option>--Choose Skill--</option>
					<?php
					$qskill=mysql_query("select * from `skill`")or die(mysql_error());
					while($rskill=mysql_fetch_array($qskill))
					{
					?>
					<option value="<?=$rskill['slno'];?>"><?=$rskill['skill'];?></option>
					<?php
					}
					?>
		       </select></div>
			<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_inter_edit">
				<?php $intermediate=explode(",",$result_res['intermediate']);
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
			<input type="hidden" name="intermediate" id="intermediate_edit" class="txtarea" value="<?=$result_res['intermediate'];?>"/>
			</td>
			<td colspan="3"><div style="float:left;">Basic:</div>
			<div id="select1"><select class="textbox" onchange="return myfunction2edit(this.value)" >
					<option>--Choose Skill--</option>
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
				</div>
			<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_basic_edit">
				<?php $basic=explode(",",$result_res['basic']);
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
			<input type="hidden" name="basic" id="basic_edit" class="txtarea" value="<?=$result_res['basic'];?>"/>
			</td>
		</tr>
			
		<!-- end -->
		
		
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab9']&quot;).click();" class="button1" style="float:right;"/></td>
		</tr>
				</table>
			</div>
			<div id="tab9" class="tab_content1">
				<table class="tbl">
					<tr>
                <td  class="font">
					Education	Details				
				</td>
		</tr>
		<tr>
                <td >
					<textarea name="education" class="tinymce" placeholder="Education" id="edu" style="height:auto;"><?php echo $result_res['education']; ?></textarea>		
				</td>
		</tr>
		<tr>
                <td  class="font">
					<div style="float:left;">Last appeared course:</div>
					<textarea name="course" id="course" placeholder="Last course" class="txtarea"><?php echo $result_res['last_course'];?></textarea>				
				</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab10']&quot;).click();" class="button1" style="float:right;"/></td>
		</tr>
				</table>
			</div>
			<div id="tab10" class="tab_content1">
				<table class="tbl">
					<tr>
                <td colspan="5" class="font">
					Vacancy Details			
				</td>
		</tr>
		<tr>
                <td colspan="5">
					What type of jobs are you looking for?
					<input type="radio" name="jobtype" value="Permanent" <?php if($result_res['vancancy']=="Permanent"){echo "checked=checked";}?>/>Permanent	
					<input type="radio" name="jobtype" value="Temporary / Contract" <?php if($result_res['vancancy']=="Temporary / Contract"){echo "checked=checked";}?>/> Temporary / Contract						
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					<div style="float:left;">Current Position:</div>
					<textarea name="cposition" id="cposition" placeholder="Current position" class="txtarea"><?php echo $result_res['current_position'];?></textarea>				
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					<div style="float:left;">Previous Position:</div>
					<textarea name="pposition" id="pposition" placeholder="Previous position" class="txtarea"><?php echo $result_res['previous_position'];?></textarea>				
				</td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Specialisation			
				</td>
		</tr>
		<tr>
			<td>Choose Industry</td>
            <td colspan="4"> 
            <select name="industry" class="textbox" id="indus">
                            <option value="0">Industry</option>
                            <?php
                            $sql=mysql_query("select * from `industry`");
                            while($res=mysql_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $res['slno'];?>" <?php if($result_res['industry']==$res['slno']){echo "selected=selected";}?>><?php echo $res['industry'];?></option>
                            <?php
                            }
                            ?>
                        
            </select>
            </td>
		</tr>
		<tr>
          <td>Choose Jobfunction</td>
		  <td colspan="4"> 
            <select name="jobfunction" class="textbox" id="job">
                            <option value="0">Job function</option>
                            <?php
                            $sqljob=mysql_query("select * from `job_function`");
                            while($resjob=mysql_fetch_array($sqljob)){
                            ?>
                            <option value="<?php echo $resjob['slno'];?>" <?php if($result_res['jobfunction']==$resjob['slno']){echo "selected=selected";}?>><?php echo $resjob['jobfunction'];?></option>
                            <?php
                            }
                            ?>
                        
            </select>
            </td>
		</tr>
		<tr>
            <td>Choose Location</td>
		    <td colspan="4">  
            <select name="location" class="textbox" id="loc">
                            <option value="0">Location</option>
                            <?php
                            $sqlloc=mysql_query("select * from `location`");
                            while($resloc=mysql_fetch_array($sqlloc)){
                            ?>
                            <option value="<?php echo $resloc['slno'];?>" <?php if($result_res['location']==$resloc['slno']){echo "selected=selected";}?>><?php echo $resloc['location'];?></option>
                            <?php
                            }
                            ?>
                        
            </select>
            </td>
		</tr>
		
		<tr>
                <td colspan="5" class="font">
					Languages Known :		
				</td>
		</tr>
		<tr>
		<td  colspan="5">Proficiency level:0-poor,10-Excellent</td>
		</tr>
		<tr>
                <td>Language</td>
				<td>Spoken</td>
				<td>Written</td>
				<td>RelevantCertificates</td>
				<td>Action</td>
		</tr>
		<?php
		$sqllng=mysql_query("select * from `language_details` where `user_id`='$result_res[user_id]'");
		while($reslng=mysql_fetch_array($sqllng))
		{
		$sqllanguage=mysql_query("select * from `language` where `slno`='$reslng[language]'");
		$reslanguage=mysql_fetch_array($sqllanguage);
		?>
		<tr>
		<td>
		<select name="language[]" class="textbox" id="langg" style="width:150px;">
		<option value="<?php echo $reslanguage['slno']?>"><?php echo $reslanguage['language'];?></option>
		<?php
		$fetchlanguage=mysql_query("select * from `language` where `slno`!='$reslanguage[slno]'");
		while($row=mysql_fetch_array($fetchlanguage)){
		?>
		<option value="<?php echo $row['slno'];?>"><?php echo $row['language'];?></option>
		<?php
		}
		?>
		</select>
		<input type="hidden" name="hd_slno[]" value="<?php echo $reslng['slno'];?>"/>
		</td>
		<td>
		<select  name="spoken[]" class="textbox" id="spoke" style="width:100px;">
		<option value="0">select</option>
					<?php
						for($i=1;$i<=10;$i++)
						{
					?>
						<option value="<?php echo $i;?>" <?php if($i==$reslng['spoken']){echo "selected='selected'";}?>><?php echo $i;?></option>
					<?php
						}
					?>
		</select>
		</td>
		<td>
		<select name="written[]" class="textbox" id="write" style="width:100px;">
		<option value="0">select</option>
					<?php
						for($i=1;$i<=10;$i++)
						{
					?>
						<option value="<?php echo $i;?>" <?php if($i==$reslng['written']){echo "selected='selected'";}?>><?php echo $i;?></option>
					<?php
						}
					?>
		</select>
		</td>
		<td>
		<select name="relevant[]" class="textbox" id="relev" style="width:100px;">
		<option value="0">select</option>
					<?php
						for($i=1;$i<=10;$i++)
						{
					?>
						<option value="<?php echo $i;?>" <?php if($i==$reslng['relevant']){echo "selected='selected'";}?>><?php echo $i;?></option>
					<?php
						}
					?>
		</select>
		</td>
		</tr>
		<?php
		}
		?>
		<tbody id="tbb"></tbody>
		<tr>
		<td colspan="5"><input type="button" name="button" value="Addnew" class="button1" id="add1"/></td>
		</tr>
		<tr>
                <td colspan="5" class="font">
					Additional Info :		
				</td>
		</tr>
		<tr>
		<td>Expected salary:</td>
		<td colspan="4"><input type="text" name="expsalary" id="expsalary" placeholder="Expected salary" class="textbox" value="<?php echo $result_res['expected_salary'];?>"/></td>
		</tr>
		<tr>
			<td colspan="5" class="font">
					Preferred Location		
			</td>
		</tr>
		<?php
		$prelocation=$result_res['preferd_location'];
		$expl=explode(',',$prelocation);
		$sqllocat=mysql_query("select * from `location`");
		while($reslocat=mysql_fetch_array($sqllocat))
		{
		$loct=$reslocat['slno'];
		?>
		<tr>
		<td><input type="checkbox" name="chk[]" value="<?php echo $reslocat['slno'];?>" <?php if(in_array($loct,$expl)){echo "checked=checked";}?>/></td>
		<td colspan="4"><?php echo $reslocat['location'];?></td>
		</tr>
		<?php
		}
		?>
		
		</table>
		<table style="width:920px;float:left;">
		<tr>
		<td colspan="3">
		<input type="button" name="button" value="next" onclick="$(&quot;.tabs1 li a[href='#tab11']&quot;).click();" class="button1" style="float:right;"/>
		</td>
		</tr>
		</table>
			</div>
			<div id="tab11" class="tab_content1">
				<table class="tbl">
						
		<tr>
			<td colspan="2" class="font">
					Other Information :		
			</td>
		</tr>
		<tr>
		<td colspan="2"><textarea  class="tinymce" name="other" id="other" style="width:50px;"><?php echo $result_res['other_info'];?></textarea></td>
		</tr>
		<tr>
			<td>Attach Your New CV:</td>
			<td> <input type="file" name="upload"/><input type="hidden" name="hd_cv" value="<?php echo $result_res['cv']; ?>"/>
			<a href="pdf_server.php?file=<?php echo $result_res['cv'];?>">
			<?php
			echo $result_res['first_name'].".cv";
			?>
			</a></td>
			
			
			
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit"  value="Update" class="button1"  style="margin-top:10px; margin-bottom:10px;" /></td>
		</tr>
				</table>
			</div>
			</form>
		</div>
</div>

<?php
}
?>
