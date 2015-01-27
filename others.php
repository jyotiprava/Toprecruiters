<?php

$getdrugdet1=mysql_query("select * from `language`")or die(mysql_error());
										  while($resdrugdet1=mysql_fetch_array($getdrugdet1))
												{
												
												 $getemail1[] = array(
																	'value'  =>$resdrugdet1['language'],
																	'idvall' => $resdrugdet1['slno']
																  
														);
												}
$userid=mysql_query("select * from `cv_detail` where `user_id`='$_SESSION[useridval]'");
$no=mysql_num_rows($userid);
$resuser=mysql_fetch_array($userid);
?>

<script type="text/javascript">
	$(function(){
    var otheroptions = { 
			target:        'other_insert.php',   // target element(s) to be updated with server response 
			beforeSubmit:  othershowRequest,  // pre-submit callback 
			success:       othershowResponse  // post-submit callback 
		};
   
    $('#other_box').submit(function() {
	
	
				$(this).ajaxSubmit(otheroptions);
				$(".tabs li a[href='#tab1']").click();
				return false;
				
				
		});

		
    });
    function othershowRequest(formData, jqForm, otheroptions) {}

    function othershowResponse(responseText, statusText)  { 
	
		/*if(responseText=="OK") {
		    $(".tabs li a[href='#tab2']").click();
		} else {
			alert(responseText);
		}*/
		
		//$(".tabs li a[href='#tab2']").click();
	}
	 
</script>

<script>
 $(function(){
        var availabledrug1=<?= json_encode($getemail1); ?>;
        $('#language').autocomplete({
	 select: function(event,ui){
  $(this).val((ui.item ? ui.item.id : ""));
},
        source: availabledrug1,
        select: function( event, ui )
		{
		var valshow1=ui.item.value;
        $('#language').val(valshow1);
		 $('#langid').val(ui.item.idvall);
        return false;
		}
        });
});
var z=0;
function getdataval()
{
z++;
			
			var languageval=$('#language').val();
			var langval=$('#langid').val();
			var selwrite=$('#writee').find('option:selected').attr("value");
			var selread=$('#readd').find('option:selected').attr("value");
			var selspoken=$('#spokenn').find('option:selected').attr("value");
			if(languageval=='' && selwrite=='0' && selread=='0' && selspoken=='0'){}
			else{
			$('#tbb2').append('<tr id="other'+z+'"><td><input type="checkbox" class="chkk" value="'+z+'"/></td><td>'+languageval+'<input type="hidden" name="langg[]" value="'+langval+'"/></td><td>'+selwrite+'<input type="hidden" name="write[]" value="'+selwrite+'"/></td><td>'+selread+'<input type="hidden" name="read[]" value="'+selread+'"/></td><td align="center">'+selspoken+'<input type="hidden" name="spoken[]" value="'+selspoken+'"/></td></tr>');
			
			$('#language').val('');
			$('#langval').val('');
			//$('#writee option[value="select"]');
			$('#writee').val("select");
			$('#readd').val('select');
			$('#spokenn').val('select');
			
		
		 }
}
function rowdelete()
{
$('.chkk:checkbox:checked').map(function() {
    $('#other'+this.value).remove();
}).get();
$('.chkcl:checkbox:checked').map(function() {
slnoval=$('#hdidval'+this.value).val();
$('#otherr'+this.value).remove();
$.ajax({url:"delete_other.php?slval="+slnoval,success:function(result){
			  
                }});  
    
}).get();
}
</script>


			<h2><span style="color: #900;">Language</span></h2>
			<form name="f" id="other_box" action="other_insert.php" method="post">
                    <div class="id_100">
                	<p align="right" style="color:#000; font-weight:bold; margin-bottom:3px; cursor: pointer;" onclick="return getdataval();">Add+</p>
					
						<table class="table6">
								<tr class="tr2">
                                		<th>&nbsp;</th>
                                        <th>Language</th>
                                        <th>Writing</th>
                                        <th>Reading</th>
                                        <th>Speaking</th>
                                </tr>
								
                                <tr>
                                		<td>&nbsp;</td>
                                        <td>
										<input type="text" name="lname" id="language" class="textbox1"  autocomplete="off" />
										<input type="hidden" name="lang[]" id="langid"/>
										</td>
                                        <td>
										<select  name="writee" class="textbox1" id="writee" style="width:100px;">
															<option value="0">select</option>
															<option value="Good">Good</option>
															<option value="Average">Average</option>
															<option value="Excellent">Excellent</option>			
										</select>
										</td>
                                        <td>
										<select  name="readd" class="textbox1" id="readd" style="width:100px;">
											<option value="0">select</option>
														
														<option value="Good">Good</option>
														<option value="Average">Average</option>
													    <option value="Excellent">Excellent</option>	
										</select>
										</td>
                                        <td>
										<select  name="spokenn" class="textbox1" id="spokenn" style="width:100px;">
											<option value="0">select</option>
														
														<option value="Good">Good</option>
														<option value="Average">Average</option>
														<option value="Excellent">Excellent</option>	
										</select>
										</td>
                                </tr>
								<?php
								$ivl=0;
								$sqllang=mysql_query("select * from `language_details` where `user_id`='$_SESSION[useridval]'");
								while($reslang=mysql_fetch_array($sqllang)){
								$ivl++;
								$langname=mysql_query("select * from `language` where `slno`='$reslang[language]'");
								$reslangname=mysql_fetch_array($langname);
								?>
								<tr id="otherr<?php echo $ivl;?>">
                                		<td><input type="checkbox" name="check" class="chkcl" value="<?php echo $ivl;?>"/></td>
                                        <td>
										<?php echo $reslangname['language'];?>
										<input type="hidden" name="lname" id="language" class="textbox1"  autocomplete="off" value="<?php echo $reslangname['language'];?>" readonly/>
										<input type="hidden" name="langg[]" id="langid" value="<?php echo $reslang['language'];?>" />
										<input type="hidden" name="hdid[]" value="<?php echo $reslang['slno'];?>" id="hdidval<?php echo $ivl;?>"/>
										</td>
                                        <td>
										<?php echo $reslang['write'];?>
										<input type="hidden" name="write[]" class="textbox1" id="writee" value="<?php echo $reslang['write'];?>" readonly/>
										</td>
                                        <td>
										<?php echo $reslang['read'];?>
										<input type="hidden" name="read[]" class="textbox1" id="readd" value="<?php echo $reslang['read'];?>" readonly/>
										</td>
                                        <td>
										<?php echo $reslang['spoken'];?>
										<input type="hidden" name="spoken[]" class="textbox1" id="spokenn" value="<?php echo $reslang['spoken'];?>" readonly/>
										</td>
                                </tr>
								<?php
								}
								?>
								
								
                                <tbody id="tbb2"></tbody>
						</table>	
					
                    <p style="color:#000; font-weight:bold; margin-top:3px;">
					<span onclick="return rowdelete();">
					Delete
					</span>
					</p>
                    </div>
                    
                    <p>Other related details not mention is resume</p>
                    <div style="width:100%; height:auto; float:left; margin-bottom:20px;">
                    		
							<textarea style="width:735px; height:150px; float:left; border:1px solid #ccc; padding:10px;" name="otherinfo" class="tinymce"><?php echo $resuser['other_info'];?></textarea>
                           
                            
                            <div style="width:100%; height:auto; float:left;">
                                <p style="margin-top:10px; font-size:14px;">Setting Privacy<br />
                                <span style="margin-left:15px;"><input type="radio" name="setting" value="Allow" <?php if($resuser['setting']=="Allow"){echo "checked";}?>/>Allow search</span><br />
                                <span style="margin-left:15px;"><input type="radio"name="setting" value="DontAllow" <?php if($resuser['setting']=="Don'tAllow"){echo "checked";}?>/>Don't allow search</span>
                                </p>
				
                              
                            </div>
							
							<div style="width:100%; height:auto; float:left;">
                                <p style="margin-top:10px; font-size:14px;">Do not wish to receive notification about new job via:<br />
                                <span style="margin-left:15px;">
								Text Messages
								<select name="message">
								<option value="yes" <?php 
								if($resuser['nfbysms']=="yes"){echo "selected";}
								?>>Yes</option>
								<option value="no" <?php 
								if($resuser['nfbysms']=="no"){echo "selected";}
								?>>No</option>
								</select>
								</span><br />
								<span style="margin-left:15px;">
								Email
								<select name="email">
								<option value="yes" <?php 
								if($resuser['nfbyemail']=="yes"){echo "selected";}
								?>>Yes</option>
								<option value="no" <?php 
								if($resuser['nfbyemail']=="no"){echo "selected";}
								?>>No</option>
								</select>
								</span>
                               
                                </p>
                                <p style="font-weight:bold; margin-top:50px; text-align:right; margin-right:20px; font-size:13px; float:left;">
				Attach Your New Cv:<input type="file" name="upload" required/>
				<input type="hidden" name="hd_cv" value="<?php echo $resuser['cv']; ?>"/>
				<a href="pdf_server.php?file=<?php echo $resuser['cv'];?>">
				
				<?php
				if($resuser['cv']!=''){
				echo $resuser['first_name'].".cv";
				}
				else{
				}
				?>
				</a>				
				</p>
                            </div>
							<div style="width:100%; height:auto; float:left;">
							<p style="font-weight:bold; margin-top:50px; text-align:right; margin-right:20px; font-size:13px;">
								 <input type="submit" name="submit" value="Save"/>
								
								</p>
							</div>
                    </div> 
</form>						