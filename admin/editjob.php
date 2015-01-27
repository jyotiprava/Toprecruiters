<?php 
include_once("../function.php");
is_admin();
$jobid=$_GET['id'];
$sqljob=mysql_query("select * from `alljob` where `id`='$jobid'");
$resjob=mysql_fetch_array($sqljob);
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
<!-- Load TinyMCE-->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script>
   <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
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

function cancelskille(sid)
{
$('#skill'+sid).remove();
var oldval=$('#advance_edit').val();
oldval=oldval.replace(sid, "");
$('#advance_edit').val(oldval);
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
                        		<h2 class="head6">Edit Job</h2>
				 </div>
                		<div id="content2_leftbox" style="width: 980px;height:auto; margin-top:0px;" >
				 <?php
				       if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
				<form name="myform"  action="updatejob.php" method="post" enctype="multipart/form-data">
											<table class="table3" style="border-bottom: #009933 solid 2px;">
												
												<tr>
												<td>Name Of Post</td>
												<td><input type="text" name="postname" class="form" value="<?php echo $resjob['postname'];?>">
												<input type="hidden" name="hidden_id" value="<?php echo $resjob['id'];?>"/>
												</td>
												</tr>
												<tr>
												<td>No. Of Vaccancy</td>
												<td><input type="text" name="noofpost" class="form" value="<?php echo $resjob['noofvaccancy'];?>" ></td>
												</tr>
                                                                                                <tr>
												<td>Short Description about post</td>
												<td><textarea name="shortdesc" class="form tinymce" style="height: 80px;"><?php echo $resjob['shortdesc'];?></textarea></td>
												</tr>
                                                                                                <tr>
												<td>Full Description about post</td>
												<td><textarea name="desc" class="form tinymce" style="height: 80px;"><?php echo $resjob['desc'];?></textarea></td>
												</tr>
                                                                                                <tr>
												<td>Salary Range</td>
												<td>
                                                                                                    SGD <input type="text" name="range1" class="form" style="width: 100px;" value="<?php echo $resjob['range1'];?>"> -
                                                                                                    SGD <input type="text" name="range2" class="form" style="width: 100px;" value="<?php echo $resjob['range2'];?>">
                                                                                                </td>
												</tr>
                                                                                                <tr>
												<td>Experience</td>
												<td><input type="text" name="experience" class="form" value="<?php echo $resjob['experience'];?>"/></td>
												</tr>
												<tr>
												<td>Old Logo</td>
												<td>
												 <img src="admin/<?php echo $resjob['logo']; ?>" width="100" height="100" />
												 <input type="hidden" name="oldimage" value="<?php echo $resjob['logo']; ?>"/>
												</td>	
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
                
                                                                                                            <?php
                                                                                                            $qloc=mysql_query("select * from `location`")or die(mysql_error());
                                                                                                            while($rloc=mysql_fetch_array($qloc))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rloc['slno'];?>"
																											<?php 
																											if($rloc['slno']==$resjob['location']){
																											echo "selected=selected";
																											}
																											?>><?=$rloc['location'];?></option>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                
                                                                                                 <tr>
                                                                                                    <td> Job Specialization</td>
                                                                                                    <td>
                                                                                                        <select name="industry" class="form">
                                                                                                          
                                                                                                            <?php
                                                                                                            $qind=mysql_query("select * from `industry`")or die(mysql_error());
                                                                                                            while($rind=mysql_fetch_array($qind))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rind['slno'];?>"<?php 
																											if($rind['slno']==$resjob['industry']){
																											echo "selected=selected";
																											}
																											?>><?=$rind['industry'];?></option>
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
                                                                                                           
                                                                                                            <?php
                                                                                                            $qjob=mysql_query("select * from `job_function`")or die(mysql_error());
                                                                                                            while($rjob=mysql_fetch_array($qjob))
                                                                                                            {
                                                                                                            ?>
                                                                                                            <option value="<?=$rjob['slno'];?>"<?php 
																											if($rjob['slno']==$resjob['jobfunction']){
																											echo "selected=selected";
																											}
																											?>><?=$rjob['jobfunction'];?></option>
                                                                                                            <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </td>
                                                                                                </tr>
																								<tr>
																								<td>Skill Specialization</td>
																								<td>
																<div style="width: 100%;height: auto;float: left;">
				<select class="textbox" onchange="return myfunctionedit(this.value)" >
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
				<div style="width: 250px;height:200px;float: left;margin-top: 10px;border: 1px solid #ccc;overflow: auto;" id="advance_skill_edit">
			<?php $advance=explode(",",$resjob['keyskill']);
			foreach($advance as $key=>$value)
			{
						if($value!='')
						{
				$qskillname=mysql_query("select `skill` from `skill` where `slno`='$value'")or die(mysql_error());
				$rskillname=mysql_fetch_array($qskillname);
			?>
			
				<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill<?=$value;?>"><span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskille(<?=$value;?>);">X</span><?php echo $rskillname['skill']; ?>	</div>		
						
			<?php
						}
			}
			?>
				
				</div>
				<input type="hidden" name="specialize" id="advance_edit" class="form" value="<?=$resjob['keyskill'];?>"/>																</td>
																								</tr>
																								<!--<tr>
																								<td>Reference no</td>
																								<td><input type="text" name="reference" class="form" value="<?php echo $resjob['refno'];?>"/></td>
																								</tr>-->
												<tr>
												<td>&nbsp;</td>
												<td>
												<input type="submit" name="submit" value="Update" class="button" style="width:75px; margin-top:5px;" >
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
<?php include_once("footer.php");?>
<!--------------------------footer bar end----------------------->
</body>
</html>
