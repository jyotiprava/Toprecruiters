<?php
$getdrugdet=mysql_query("select * from `fieldofstudy`")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
	
 $getemail[] = array(
		    'label'=>$resdrugdet['field'].'('.$resdrugdet['trade'].')',
                    'idval' => $resdrugdet['id']
        );
	
}
?>

<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
    var educationoptions = { 
			target:        'insert_education.php',   // target element(s) to be updated with server response 
			beforeSubmit:  educationshowRequest,  // pre-submit callback 
			success:       educationshowResponse  // post-submit callback 
		};
    
    $('#education_box').submit(function() {
	/*var hd_countval=$('#hd_count').val();
	//alert(hd_countval);
	if(hd_countval==0)
	{
	//alert("Fill up your education details");
	return false;
	}
	/*var tblval=$('#tbb').html();
	var tblvall=$('#tbb1').html();
	var courseval=$('#course').val();
	if(tblval=="")
	{
	alert("Fill up your education details");
	return false;
	}
	if(tblvall=="")
	{
	alert("Fill up your training details");
	return false;
	}
	if(courseval=="")
	{
	alert("Fill up your last apperaed course detail");
	return false;
	}*/
				$(this).ajaxSubmit(educationoptions);
				$(".tabs li a[href='#tab3']").click();
				return false;
		});

    });
    function educationshowRequest(formData, jqForm, options) { }

    
    function educationshowResponse(responseText, statusText)  { 
		/*if(responseText == "OK") {
		    $(".tabs li a[href='#tab3']").click();
		} else {
			alert(responseText);
		}*/
	}
var iz=0;
function getdatas()
{

iz++;


			var sel=$('#degree').find('option:selected').attr("value");
			var selno=$('#degree').find('option:selected').attr("id");
			var fieldval=$('#field').val();
			var fieldvalno=$('#field-id').val();
			var grade=$('#grade').val();
			var graduationval=$('#graduation').val();
			var country=$('#country').val();
			var instituteval=$('#institute').val();
			
			if(sel==0 && fieldval=='' && graduationval=='' && instituteval==''){}
			else{
			$('#tbb').append('<tr id="edu'+iz+'" class="eduval'+iz+'"><td><input type="checkbox" class="chk" value="'+iz+'"/></td><td>'+sel+'<input type="hidden" name="degree[]" value="'+selno+'"/></td><td>'+fieldval+'<input type="hidden" name="field[]" value="'+fieldvalno+'"/></td><td>'+grade+'<input type="hidden" name="grade[]" value="'+grade+'"/></td><td align="center">'+instituteval+'<input type="hidden" name="institute[]" value="'+instituteval+'"/></td><td>'+country+'<input type="hidden" name="country[]" value="'+country+'"/></td><td>'+graduationval+'<input type="hidden" name="gryear[]" value="'+graduationval+'"/></td></tr>');
			
			$('#field').val('');
			$('#graduation').val('');
			$('#institute').val('');
			$('#grade').val('');
			$('#country').val('');
		
		 }
}

function del()
{
$('.chk:checkbox:checked').map(function() {
    $('#edu'+this.value).remove();
}).get();
$('.chkclk:checkbox:checked').map(function() {
slnovals=$('#hdidval'+this.value).val();
    $('#eduu'+this.value).remove();
	$.ajax({url:"delete_education.php?slvall="+slnovals,success:function(result){
			  
                }}); 
}).get();

}

function getdel1(){
	$('.chk1:checkbox:checked').map(function() {
		$('#train'+this.value).remove();
	}).get();
	$('.ch:checkbox:checked').map(function() {
	slnooval=$('#hdidvl'+this.value).val();
		$('#trainn'+this.value).remove();
		$.ajax({url:"delete_train.php?sllval="+slnooval,success:function(result){
			  
                }});
	}).get();
}
 $(function() {
    var projects =<?= json_encode($getemail); ?>;
 
    $( "#field" ).autocomplete({
      minLength: 0,
      source: projects,
      focus: function( event, ui ) {
        $( "#field" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#field" ).val( ui.item.label );
        $( "#field-id" ).val( ui.item.idval );
        return false;
      }
    });
  });
 
 var j=0;
 function getdata1()
{
j++;
			var titleval=$('#title').val();
			var durationval=$('#duration').val();
			var objectiveval=$('#objective').val();
			var instituteeval=$('#institutee').val();
			if(titleval=='' && durationval=='' && objectiveval=='' && instituteeval==''){}
			else{
			$('#tbb1').append('<tr id="train'+j+'"><td><input type="checkbox" class="chk1" value="'+j+'"/></td><td>'+titleval+'<input type="hidden" name="title[]" value="'+titleval+'" /></td><td>'+durationval+'<input type="hidden" name="duration[]" value="'+durationval+'" /></td><td>'+objectiveval+'<input type="hidden" name="objective[]" value="'+objectiveval+'" /></td><td align="center">'+instituteeval+'<input type="hidden" name="institutee[]" value="'+instituteeval+'" /></td></tr>');
			$('#title').val('');
			$('#duration').val('');
			$('#objective').val('');
			$('#institutee').val('');
		 
		 }
}
</script>

<style>
  #project-label {
    display: block;
    font-weight: bold;
    margin-bottom: 1em;
  }
  #project-description {
    margin: 0;
    padding: 0;
  }
  </style>
<h2><span style="color: #900;">Education</span></h2>
                	<p align="right" style="color:#000; font-weight:bold; margin-bottom:3px;cursor: pointer;" onclick="return getdatas();">Add+</p>
<form id="education_box" action="insert_education.php" method="post">
						<table class="table6">
								<tr class="tr2">
                                	<th>&nbsp;</th>
                                        <th>Degree</th>
                                        <th>Field</th>
					<th>Grade/CGP</th>
                                        <th>Institute/ <br/>University</th>
					<th>Country of <br/>Institute/University</th>
                                        <th>Graduation year</th>
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                        <td>
						<select class="textbox1" name="degree" id="degree" style="width: 100px;">
							<option value="0">--Select--</option>
							<?php
							$qdegree=mysql_query("select * from `qualification`")or die(mysql_error());
							while($rdegree=mysql_fetch_array($qdegree))
							{
							?>
							<option value="<?=$rdegree['qualification'];?>" id="<?=$rdegree['id'];?>"><?=$rdegree['qualification'];?></option>
							<?php
							}
							?>
						</select>
					</td>
                                        <td><input type="text"  id="field" class="textbox1" style="width: 100px;" autocomplete="off" />
										<input type="hidden" id="field-id" /></td>
					<td><input type="text" id="grade" class="textbox1" style="width: 100px;" autocomplete="off" /></td>
                                        <td><input type="text" id="institute" class="textbox1" style="width: 100px;" autocomplete="off"/></td>
					<td><input type="text" id="country" class="textbox1" style="width: 100px;" autocomplete="off"/></td>
                                        <td><input type="text" name="graduation" id="graduation" class="textbox1" style="width: 100px;"  autocomplete="off" value=""/>
										
										</td>
                                </tr>
								
								
								
								<?php
								$ivll=0;
								$sqledu=mysql_query("select * from `education` where `user_id`='$_SESSION[useridval]'");
								while($resedu=mysql_fetch_array($sqledu)){
								$ivll++;
								$degreename=mysql_query("select * from `qualification` where `id`='$resedu[degree]'");
								$resdegreename=mysql_fetch_array($degreename);
								$fieldofstd=mysql_query("select * from `fieldofstudy` where `id`='$resedu[field]'");
								$resfieldofstd=mysql_fetch_array($fieldofstd);
								?>
								
								<tr id="eduu<?php echo $ivll;?>" class="eduval">
                                		<td><input type="checkbox" name="check" class="chkclk" value="<?php echo $ivll;?>"/></td>
                                        <td>
										<?php echo $resdegreename['qualification'];?>
										<input type="hidden" name="deg" id="deg" class="textbox1"  autocomplete="off" value="<?php echo $resdegreename['qualification'];?>" readonly/>
										<input type="hidden" name="degree[]" id="degree" value="<?php echo $resdegreename['id'];?>" />
										<input type="hidden" name="hdidd[]" value="<?php echo $resedu['slno'];?>" id="hdidval<?php echo $ivll;?>"/>
										</td>
                                        <td>
										<?php echo $resfieldofstd['field'].'('.$resfieldofstd['trade'].')';?>"
										<input type="hidden"  id="field" class="textbox1" style="width: 100px;" value="<?php echo $resfieldofstd['field'].'('.$resfieldofstd['trade'].')';?>" readonly/>
										<input type="hidden" id="field-id" value="<?php echo $resedu['field'];?>" name="field[]"/>
						
										</td>
                                        <td>
										<?php echo $resedu['grade'];?>
										<input type="hidden" name="grade[]" class="textbox1"  value="<?php echo $resedu['grade'];?>" readonly/>
										
										</td>
                                        <td>
										<?php echo $resedu['institute'];?>
										<input type="hidden" name="institute[]" class="textbox1"  value="<?php echo $resedu['institute'];?>" readonly/>
										
										</td>
										<td>
										<?php echo $resedu['country'];?>
										<input type="hidden" name="country[]" class="textbox1"  value="<?php echo $resedu['country'];?>" readonly/>
										</td>
										<td>
										<?php echo $resedu['year'];?>
										<input type="hidden" name="gryear[]" class="textbox1"  value="<?php echo $resedu['year'];?>" readonly/>
										</td>
										
                                </tr>
								<?php
								}
								$numm=mysql_num_rows($sqledu);
								echo "<input type='hidden' id='hd_count' value='$numm'>";
								?>
								
							<tbody id="tbb"></tbody>	
								<input type="hidden" name="hd_high" value="Highest"/>
								
						</table>
						
						
					
					
                    <p style="color:#000; font-weight:bold; margin-top:3px;cursor:pointer;" >
					<span onclick="return del();">
					Delete
					</span>
					</p>
					<!--<h2 style="display: none"><span style="color: #900;">Last appeared course:</span></h2>
					<table style="display: none">
					<tr>
								
									<td colspan="2"><textarea name="course" id="course" class="txtarea" required></textarea></td>
					</tr>
					</table>-->
                    
                    
                    <h2><span style="color: #900;">Training</span></h2>
                	<p align="right" style="color:#000; font-weight:bold; margin-bottom:3px;cursor: pointer;" onclick="return getdata1();">Add+</p>
					
						<table class="table6">
								<tr class="tr2">
                                		<th>&nbsp;</th>
                                        <th>Title</th>
                                        <th>Duration</th>
                                        <th>Objective</th>
                                        <th>Institute</th>
                                </tr>
                                <tr>
                                		<td>&nbsp;</td>
                                        <td><input type="text" name="title" id="title" class="textbox1"  autocomplete="off" value=""/></td>
                                        <td><input type="text" name="duration" id="duration" class="textbox1"  autocomplete="off" value=""/></td>
                                        <td><input type="text" name="objective" id="objective" class="textbox1"  autocomplete="off" value=""/></td>
                                        <td><input type="text" name="institutee" id="institutee" class="textbox1"  autocomplete="off" value=""/></td>
                                </tr>
								
								<?php
								$ivlls=0;
								$sqltrn=mysql_query("select * from `training` where `user_id`='$_SESSION[useridval]'");
								while($restrn=mysql_fetch_array($sqltrn))
								{
								$ivlls++;
								?>
								<tr id="trainn<?php echo $ivlls;?>">
                                		<td><input type="checkbox" name="check" class="ch" value="<?php echo $ivlls;?>"/></td>
                                        <td>
										<?php echo $restrn['title'];?>
										<input type="hidden" name="title[]" id="ttl" class="textbox1"  autocomplete="off" value="<?php echo $restrn['title'];?>" readonly/>
										<input type="hidden" name="hdidvl[]" value="<?php echo $restrn['slno'];?>" id="hdidvl<?php echo $ivlls;?>"/>
										</td>
                                        <td>
									    <?php echo $restrn['duration'];?>
										<input type="hidden"  name="duration[]" class="textbox1" style="width: 100px;" value="<?php echo $restrn['duration'];?>" readonly/>
										</td>
                                        <td>
										<?php echo $restrn['objective'];?>
										<input type="hidden" name="objective[]" class="textbox1"  value="<?php echo $restrn['objective'];?>" readonly/>
										</td>
                                        <td>
										<?php echo $restrn['institute'];?>
										<input type="hidden" name="institutee[]" class="textbox1"  value="<?php echo $restrn['institute'];?>" readonly/>
										</td>
                                </tr>
								<?php
								}
								?>
								
								
								<tbody id="tbb1"></tbody>
						</table>	

                    <p style="color:#000; font-weight:bold; margin-top:3px;cursor: pointer;" onclick="return getdel1();">Delete</p>
                    <input type="submit" value="Save and Continue"/>
		    
		    </form>