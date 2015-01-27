<link href="../css/reveal.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="../js/jquery.reveal.js"></script>
<script type="text/javascript">
	function getreqid(idval){
		$('#staff_id').val(idval);
	}
	function getreqid1(idval){
		$('#staff_id1').val(idval);
	}
</script>
<?php
include_once("../function.php");
$tbl_name="staff_request";		//your table name

$condition='';
if(isset($_GET['request_id']))
{
$request_id=$_GET['request_id'];
$condition = "where `id`='$request_id'";	
}



	$sql = "SELECT * FROM $tbl_name $condition";
	$result = mysql_query($sql);
	
	$staffid='';
		$row = mysql_fetch_array($result);
		
			$staffid=$row['id'];
?>
                                <div id="pg_box">
                        		<h2 class="head3" style="font-size:20px; text-align:left;"><?=$total_pages;?> Candidates found. Pg 1 of <?=$lastpage?></h2>
					<div id="pg_listbox">
					   
					</div>
				</div>
                		<div id="content2_leftbox">
				<form method="post" action="admin_request.php">
							<table class="table3">
							<tr>
						      <td colspan="3" style="font-size:12px; font-weight:bold;">REQUEST ID <span style="color: #CC0000;"><?=$row['id'];?></span> dated <?=$row['date'];?></td>
					         </tr>
						    <tr>
							<td>Name:</td>
							<td><?=$row['name'];?></td>
							<td width="150" align="right" style="color: red;">
								<?php
								if($row['request_status']==0)
								{
									$value='Pending';
								}
								elseif($row['request_status']==1)
								{
									$value='Completed';
								}
								elseif($row['request_status']==2)
								{
									$value='Payment Pending';
								}
								elseif($row['request_status']==3)
								{
									$value='Feedback Pending';
								}
								?>
								Status : <?=$value;?> <br/>
							</td>
						    </tr>
						    <tr>
							<td>Office No:</td>
							<td>+<?=$row['officeno'];?></td>
							<td align="right">
			<?php
			$qall=mysql_query("select * from `staff_request` where `id`='$row[id]'")or die(mysql_error());
			$rall=mysql_fetch_array($qall);
			if($rall['shortlist']==0)
			{
				?>
								<span style="color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return getsh(<?=$row['id'];?>);">Add To Shortlist</span>
								<?php
			}
			else
			{
				?>
				<span style="color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return getresh(<?=$row['id'];?>);">Remove From Shortlist</span>
			<?php
			}
			?>
							</td>
						    </tr>
						    <tr>
							<td>Mobile No:</td>
							<td>+<?=$row['mobile'];?></td>
							<td align="right">
								<?php
								if($row['shortlist']==1)
								{
									?>
								<span style="color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;">+Create Contact</span>
								<?php
								}
								?>
								<br/><br/></td>
						    </tr>
						    <tr>
							<td>Email:</td>
							<td><?=$row['email'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Designation:</td>
							<td><?=$row['description'];?></td>
							<td></td>
						    </tr>
							 <tr>
							<td>Company:</td>
							<td><?=$row['company'];?></td>
						    </tr>
						    <tr>
							<td>Address:</td>
							<td><?=$row['address'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Town:</td>
							<td><?=$row['city'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Country:</td>
							<td><?=$row['country'];?></td>
						    </tr>
							<tr>
							<td>Company website:</td>
							<td><?=$row['company_website'];?></td>
							<td></td>
						    </tr>
							<tr>
							<td>Company Industry:</td>
							<td><?=$row['company_industry'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Position Title 1:</td>
							<td><?=$row['position_title'];?></td>
							<td></td>
						    </tr>
							<tr>
							<td>Position Description:</td>
							<td><?=$row['position_desc'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td colspan="3"></td>
							
						    </tr>
                                                    <tr>
							<td>How do you hear about us?:</td>
							<td><?=$row['hear_about'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Remarks:</td>
							<td><?=$row['remark'];?></td>
							<td></td>
						    </tr>
						    <tr>
						   
                                                    <tr>
							<td>Status:</td>
                                                        <td colspan="2">
                                                            <input type="radio" name="req_status" <?php if($row['request_status']==0) echo "checked='checked'";?>/>Pending<br/>
                                                        </td>
                                                    </tr>
                                                    <tr>
							<td></td>
							<td colspan="2"><input type="radio" name="req_status" <?php if($row['request_status']==2) echo "checked='checked'";?>/>Payment pending<br/></td>
						    </tr>
							<tr>
							<td></td>
							<td colspan="2"><input type="radio" name="req_status" <?php if($row['request_status']==3) echo "checked='checked'";?>/>Feedback pending<br/></td>
						    </tr>
							<tr>
							<td></td>
							<td colspan="2"><input type="radio" name="req_status" <?php if($row['request_status']==1) echo "checked='checked'";?>/>Completed<br/>
						</td>
						</tr>
						<tr>
							<td>Progress/Feedbacks:</td>
							<td colspan="2"> <textarea  style="height:120px; width:200px;" name="progress"><?=$row['progress'];?></textarea></td>
						</tr>
						</table>
						
								<br />
								<a href="#" style="text-decoration:none" class="big-link2" data-reveal-id="myModal" data-animation="none" onclick="return getreqid(<?=$row['id'];?>);">
								<font color="#CC0000"><u>+create interview</u></font>
								</a>
								<br />							
								<table class="table8">
									  <tr>
										<th>No.</th>
										<th>Position</th>
										<th>Candidate</th>
										<th>Id</th>
										<th>Arranged on</th>
										<th>Interview Date/Time</th>
										<th>Interview Remark</th>
										<th>Consultant</th>
									  </tr>
									  <?php
									  $i=0;
									  $qinter=mysql_query("select i.*,c.`first_name`,c.`last_name` from `create_interview` i,`cv_detail` c where c.`user_id`=i.`candiate_id` and i.`staff_id`='$row[id]'")or die(mysql_error());
									  while($rinter=mysql_fetch_array($qinter))
									  {
										$i++;
									  ?>
									  <tr bgcolor="<?php if($i%2==0) echo '#ffffff'; else echo '#FFA8D3';?>" id="candidate<?=$rinter['candiate_id'];?>"><td><?=$i;?></td><td><?=$rinter['position'];?></td><td><?=$rinter['first_name'].' '.$rinter['last_name'];?></td><td><?=$rinter['candiate_id'];?></td><td><?=$rinter['arrangon'];?></td><td><?=$rinter['in_datetime'];?></td><td class="in_remark"></td><td><?=$rinter['consultant'];?></td></tr>
									  <?php
									  }
									  ?>
									  <tbody id="create_interview"></tbody>
									</table>
									
									<br /><br /><br /><br /><br /><br /><br /><br />
									<a href="#" style="text-decoration:none" class="big-link2" data-reveal-id="myModal1" data-animation="none" onclick="return getreqid1(<?=$row['id'];?>);">
									<font color="#CC0000"><u>+create appointment candidate</u></font>
									</a>
									<br />
									<table class="table8" >
									  <tr>
										<th>No.</th>
										<th>Start Work Date</th>
										<th>Consultant</th>
										<th>Remark</th>
										<th>Position </th>
										<th>Candidate</th>
										<th>Share</th>
										<th>Net Sale</th>
									  </tr>
									  <?php
									  $j=0;
									  $qapp=mysql_query("select a.*,c.`first_name`,c.`last_name` from `appointment_candidate` a,`cv_detail` c where c.`user_id`=a.`candidateid` and a.`staffid`='$row[id]'")or die(mysql_error());
									  while($rapp=mysql_fetch_array($qapp))
									  {
										$j++;
										?>
									  <tr bgcolor="<?php if($j%2==0) echo '#ffffff'; else echo '#9999CC';?>">
										<td><?=$j;?></td>
										<td><?=$rapp['start_date'];?></td>
										<td><?=$rapp['ap_consultant'];?></td>
										<td><?=$rapp['ap_remark'];?></td>
										<td><?=$rapp['ap_position'];?></td>
										<td><?=$rapp['candidateid'];?></td>
										<td>&nbsp;</td>
										<td><?=$rapp['ap_netsale'];?> </td>
									  </tr>
									  <?php
									  }
									  ?>
									  <tbody id="app_candidate"></tbody>
									</table>
									
									 <table style="font-family:arial; font-size:12px;">
							 	<tr>
									<td colspan="2" style="text-align:left">Term</td>
								</tr>
								<tr>
									<td align="right">&nbsp;</td>
									<td>
										<input type="hidden" name="staffid" value="<?=$row['id'];?>"/>
										<input type="checkbox" id="term"/>Terms Signed</td>
								</tr>
								<tr>
									<td align="right">Signed Date</td>
									<td><input class="input4" type="date" name="signed_date" value="<?=$row['signed_date'];?>" id="inputField1"/></td>
								</tr>
								<tr>
									<td align="right">Signed By</td>
									<td><input class="input4" type="text" name="signed_by" value="<?=$row['signed_by'];?>"/></td>
								</tr>
								<tr>
									<td align="right">Designation</td>
									<td><input class="input4" type="text" name="designation" value="<?=$row['designation'];?>"/></td>
								</tr>
								<tr>
									<td align="right">Client's Feedback</td>
									<td><textarea class="input4" style="height:80px;" name="client_feedback"><?=$row['client_feedback'];?></textarea></td>
								</tr>
								<tr>
									<td align="left">Last saved:</td>
									<td align="center"><?=$row['date'];?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center"><input type="submit" class="button1" value="Save"/></td>
								</tr>
							 </table>

						
                        
                        </div>	
                </div>
               

<?php
$getcandidate=mysql_query("select c.`user_id`,c.`first_name`,c.`last_name` from `cv_detail` c,`user_detail` u where u.`slno`=c.`user_id` and u.`status`='1'")or die(mysql_error());
while($rescandidate=mysql_fetch_array($getcandidate))
{
 $candidate[] = array(
		    'label'=>$rescandidate['first_name'].' '.$rescandidate['last_name'],
                    'idval' => $rescandidate['user_id']
        );
	
}

$getconsultant=mysql_query("select `consultant` from `create_interview` where `staff_id`='$staffid'")or die(mysql_error());
while($resconsultant=mysql_fetch_array($getconsultant))
{
 $consultant[] = array(
		    'label'=>$resconsultant['consultant']
        );
	
}
?>
<link rel="stylesheet" href="../css/jquery-ui.css">
<script src="../js/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
    var candidate =<?=json_encode($candidate);?>;
    $( "#candidate" ).autocomplete({
      minLength: 0,
      source: candidate,
      focus: function( event, ui ) {
        $( "#candidate" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#candidate" ).val( ui.item.label );
        $( "#candidate-id" ).val( ui.item.idval );
        return false;
      }
    });
    
    
     var consultant =<?=json_encode($consultant);?>;
    $( "#ap_consultant" ).autocomplete({
      minLength: 0,
      source: consultant,
      focus: function( event, ui ) {
        $( "#ap_consultant" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#ap_consultant" ).val( ui.item.label );
        return false;
      }
    });
    
     
    $( "#ap_candidate" ).autocomplete({
      minLength: 0,
      source: candidate,
      focus: function( event, ui ) {
        $( "#ap_candidate" ).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $( "#ap_candidate" ).val( ui.item.label );
        $( "#ap_candidate-id" ).val( ui.item.idval );
        return false;
      }
    });
    
    
  });

var i=0;
  function createinterview(){
	i++;
	var in_pos=$('#in_pos').val();
	var candidate=$('#candidate').val();
	var candidateid=$('#candidate-id').val();
	var inputField=$('#inputField').val();
	var in_datetime=$('#in_datetime').val();
	var consultant=$('#consultant').val();
	var staffid=$('#staff_id').val();
	if (i%2!=0) {
		var bgcolor='#FFA8D3';
	}else
	{
		var bgcolor='#FFFFFF';
	}
	
	$.ajax({url:"ajax_createin.php?staffid="+staffid+"&candidateid="+candidateid+"&in_pos="+in_pos+"&date="+inputField+"&in_datetime="+in_datetime+"&consultant="+consultant,
	       success:function(results)
	       {
		if (results.trim()=="OK") {
		
		$('#create_interview').append('<tr bgcolor="'+bgcolor+'" id="candidate'+candidateid+'"><td>'+i+'</td><td>'+in_pos+'</td><td>'+candidate+'</td><td>'+candidateid+'</td><td>'+inputField+'</td><td>'+in_datetime+'</td><td class="in_remark"></td><td>'+consultant+'</td></tr>');
	
	$('#in_pos').val('');
	$('#candidate').val('');
	$('#candidate-id').val('');
	$('#inputField').val('');
	$('#in_datetime').val('');
	$('#consultant').val('');
	$('#staff_id').val('');
	$('.close-reveal-modal').click();
	
		}
	       }
	});
  }
  
  
  var j=0;
  function createappointment(){
	j++;
	var start_date=$('#start_date').val();
	var ap_position=$('#ap_position').val();
	var ap_candidate=$('#ap_candidate').val();
	var ap_candidateid=$('#ap_candidate-id').val();
	var ap_netsale=$('#ap_netsale').val();
	var ap_remark=$('#ap_remark').val();
	var ap_consultant=$('#ap_consultant').val();
	var staffid=$('#staff_id1').val();
	if (j%2!=0) {
		var bgcolor='#9999CC';
	}else
	{
		var bgcolor='#FFFFFF';
	}
	
	$.ajax({url:"ajax_createap.php?staffid="+staffid+"&candidateid="+ap_candidateid+"&ap_position="+ap_position+"&start_date="+start_date+"&ap_netsale="+ap_netsale+"&ap_remark="+ap_remark+"&ap_consultant="+ap_consultant,
	       success:function(results)
	       {
		if (results.trim()=="OK") {
		
		$('#app_candidate').append('<tr bgcolor="'+bgcolor+'"><td>'+j+'</td><td>'+start_date+'</td><td>'+ap_consultant+'</td><td>'+ap_remark+'</td><td>'+ap_position+'</td><td>'+ap_candidate+'</td><td>&nbsp;</td><td>'+ap_netsale+'</td></tr>');
	
	$('#start_date').val('');
	$('#ap_position').val('');
	$('#ap_candidate').val('');
	$('#ap_candidate-id').val('');
	$('#ap_netsale').val('');
	$('#ap_remark').val('');
	$('#ap_consultant').val('');
	$('#staff_id1').val('');
	
	$('.close-reveal-modal').click();
	
		}
	       }
	});
  }
</script>
<div id="myModal" class="reveal-modal" >    
 <div style="width: 600px;height: auto;float: left;">
	 <table style="font-family:arial; font-size:12px;">
								<tr>
									<td align="right">Position</td>
									<td>
										<input type="hidden" id="staff_id"/>
										<input class="input4" type="text" id="in_pos" />
									</td>
								</tr>
								<tr>
									<td align="right">Candidate</td>
									<td>
										<input class="input4" id="candidate" type="text" />
										<input type="hidden" id="candidate-id"/>
									</td>
								</tr>
								<tr>
									<td align="right">Arranged On</td>
									<td><input class="input4" type="date" id="inputField"/></td>
								</tr>
								<tr>
									<td align="right">Interview Date/Time</td>
									<td><input class="input4" type="datetime" id="in_datetime"/></textarea></td>
								</tr>
								<tr>
									<td align="left">Consultant</td>
									<td align="center"><input class="input4" type="text" id="consultant"/></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center">
										<input type="button" class="button1" value="Save" onclick="return createinterview();"/>
									</td>
								</tr>
							 </table>
 </div>
                <a class="close-reveal-modal" style="text-decoration: none;">&#215;</a>
</div>

<div id="myModal1" class="reveal-modal" >    
 <div style="width: 600px;height: auto;float: left;">
	 <table style="font-family:arial; font-size:12px;">
								<tr>
									<td align="right">Start Work Date</td>
									<td>
										<input type="hidden" id="staff_id1"/>
										<input class="input4" type="date" id="start_date" />
									</td>
								</tr>
								<tr>
									<td align="right">Consultant</td>
									<td>
										<input class="input4" id="ap_consultant" type="text" />
										
									</td>
								</tr>
								<tr>
									<td align="right">Remark</td>
									<td><input class="input4" type="text" id="ap_remark"/></td>
								</tr>
								<tr>
									<td align="right">Position</td>
									<td><input class="input4" type="text" id="ap_position"/></textarea></td>
								</tr>
								<tr>
									<td align="left">Candidate</td>
									<td align="center"><input class="input4" type="text" id="ap_candidate"/> <input class="input4" type="hidden" id="ap_candidate-id"/></td>
								</tr>
								<tr>
									<td align="left">Net Sale</td>
									<td align="center"><input class="input4" type="text" id="ap_netsale"/></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center">
										<input type="button" class="button1" value="Save" onclick="return createappointment();"/>
									</td>
								</tr>
							 </table>
 </div>
                <a class="close-reveal-modal" style="text-decoration: none;">&#215;</a>
</div>	