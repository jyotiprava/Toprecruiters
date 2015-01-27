<?php
include_once("function.php");
is_employe();
$user_id=$_SESSION['employer_idval'];
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
<!-- Load TinyMCE-->
<script src="admin/js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="admin/js/setup.js" type="text/javascript"></script/>
   <script src="admin/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

   </script>

   <!-- /TinyMCE -->
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_job.php?id1="+vals;
			}
		}
		
		function getstatus(selval,idvalue)
		{
		
		$.ajax({url:"status.php?idval="+idvalue+'&sel='+selval,success:function(result){
			 // $("#cls"+ival).html(result);
			 alert("successfully updated");
                }});  
		}
		
		
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

function cancelskill(sid)
{
$('#skill'+sid).remove();
var oldval=$('#advance_add').val();
oldval=oldval.replace(sid, "");
$('#advance_add').val(oldval);
}
</script>
</head>
<body>
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->

<!--------------------------menu bar----------------------->

<!--------------------------menu bar end----------------------->

<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left">
                		<div id="pg_box">
                        		<h2 class="head6">Post Job</h2>
				 </div>
                		<div id="content2_leftbox" style="width: 980px;height:auto;" >
				 <?php
				       if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
			      <form name="myform"  action="job_insert.php" method="post" enctype="multipart/form-data">
				       <table class="table3" style="border-bottom: #009933 solid 2px;">
											    <tr>
												<td>Post Job As</td>
												<td>
												    <select name="posttype" class="form">
													<option value="0">Standard</option>
													<option value="1">Featured</option>
												    </select>
												</td>
											    </tr>
					<tr>
												<td>Name Of Post</td>
												<td><input type="text" name="postname" class="form" required ></td>
												</tr>
												<tr>
												<td>No. Of Vaccancy</td>
												<td><input type="text" name="noofpost" class="form" required ></td>
												</tr>
                                                                                                <tr>
												<td>Short Description about post</td>
												<td><textarea name="shortdesc" class="form tinymce" style="height: 80px;"></textarea></td>
												</tr>
                                                                                                <tr>
												<td>Full Description about post</td>
												<td><textarea name="desc" class="form tinymce" style="height: 80px;"></textarea></td>
												</tr>
                                                                                                <tr>
												<td>Salary Range</td>
												<td>
                                                                                                    SGD <input type="text" name="range1" class="form" style="width: 100px;" > -
                                                                                                    SGD <input type="text" name="range2" class="form" style="width: 100px;" >
                                                                                                </td>
												</tr>
                                                                                                <tr>
												<td>Experience</td>
												<td><input type="text" name="experience" class="form" /></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>Logo</td>
                                                                                                    <td>
                                                                                                        <input type="file" name="logo" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Location</td>
                                                                                                    <td>
                                                                                                        <select name="location" class="form">
                                                                                                            <option>--Choose Location--</option>
                                                                                                            <?php
                                                                                                            $qloc=mysql_query("select * from `location`")or die(mysql_error());
                                                                                                            while($rloc=mysql_fetch_array($qloc))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rloc['slno'];?>"><?=$rloc['location'];?></option>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                
                                                                                                 <tr>
                                                                                                    <td>Job Specialization</td>
                                                                                                    <td>
                                                                                                        <select name="industry" class="form">
                                                                                                            <option>--Choose Specialization--</option>
                                                                                                            <?php
                                                                                                            $qind=mysql_query("select * from `industry`")or die(mysql_error());
                                                                                                            while($rind=mysql_fetch_array($qind))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rind['slno'];?>"><?=$rind['industry'];?></option>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                 
                                                                                                  <tr>
                                                                                                    <td>Job Subspecialization</td>
                                                                                                    <td>
                                                                                                        <select name="jobfunction" class="form">
                                                                                                            <option>--Choose Subspecialization--</option>
                                                                                                            <?php
                                                                                                            $qjob=mysql_query("select * from `job_function`")or die(mysql_error());
                                                                                                            while($rjob=mysql_fetch_array($qjob))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rjob['slno'];?>"><?=$rjob['jobfunction'];?></option>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
																								<tr>
																								<td>Skill Specialization</td>
																								<td>
				<div  style="width: 100%;height: auto;float: left;"> 																				    
				<select class="textbox" onchange="return myfunction(this.value)" style="float: left;">
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
				<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_add">
					
				</div>
				<input type="hidden" name="specialize" id="advance_add" class="form"/>				
																								</tr>
																								<!--<tr>
																								<td>Reference no</td>
																								<td><input type="hidden" name="reference" class="form" required/></td>
																								</tr>-->
													<tr>
													<td>Job Type</td>
													<td>
													<select class="textbox" style="float: left;" name="job_type">
														<option value="0">select</option>
														<option value="permanent">Permanent</option>
														<option value="Temporary/Contract">Temporary/Contract</option>
														<option value="Contract">Contract</option>
													</select>
													</td>
													</tr>											
												<tr>
												<td>&nbsp;</td>
												<td >
												<input type="submit" name="submit" value="Add" class="button" style="width:75px; margin-top:5px;">
												</td>
												
												</tr>
												</table>
                                               
                                                  
											</form>
			      
			      
			      
			      
				 </div>
				
				<div style="width: 960px;height: auto; float: left;margin-top: 20px; display:none;" >
				 <table class="table1" cellpadding="5" style="width: 1010px;height:auto;" border="1">
                                                
                                                <tr style="background:#f2f2f2;">
                                                <th bgcolor="#FF0000">Name</th>
						<th bgcolor="#FF0000">Location</th>
						<th bgcolor="#FF0000">No Of Applification</th>
						<th colspan="4" bgcolor="#FF0000">Action</th>
                                                </tr>
                                                <?php 
												$i=0;
											$add=mysql_query("select * from `alljob` where `addby`='$user_id'");
											while($result=mysql_fetch_array($add)){
											$loc=$result['location'];
											$sqlloc=mysql_query("select * from `location` where `slno`='$loc'");
											$resloc=mysql_fetch_array($sqlloc);
				
				
				$qapplication=mysql_query("select * from `job_apply` where `postid`='$result[id]'")or die(mysql_error());
				$totalapp=mysql_num_rows($qapplication);
											$i++;
											?>
                                            <tr>
												<td><?php echo $result['postname'];?></td>
												<td><?php echo $resloc['location'];?></td>
												<td><?=$totalapp;?></td>
												<td><a href="view_post.php?id=<?php echo $result['id'];?>" target="_blank">View Application</a></td>
												<td><a href="edit_job.php?id=<?php echo $result['id'];?>"><img src="admin/images/edit.png" ></a></td>
												<td onClick="delete_data(<?php echo $result['id']; ?>)"><img src="admin/images/delete.png" ></td>
												<!--<td id="cls<?php echo $i;?>"><input type="button" name="button" value="close" onclick="return getstatus(<?php echo $result['id'];?>,<?php echo $i;?>);"/></td>-->
												<td>
												<select onchange="return getstatus(this.value,<?php echo $result['id'];?>);">
												<option value="0" <?php if($result['status']=="0"){echo "selected";}?>>open</option>
												<option value="1" <?php if($result['status']=="1"){echo "selected";}?>>close</option>
												</select></td>
											</tr>
                                            <?php  } ?>
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
