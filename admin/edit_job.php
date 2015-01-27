<?php 
include_once("../function.php");
is_admin();
$jobid=$_GET['id'];
$sqljob=mysql_query("select * from `alljob` where `id`='$jobid'");
$resjob=mysql_fetch_array($sqljob);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<!-- Load TinyMCE-->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script/>
   <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

   </script>

   <!-- /TinyMCE -->
   
<!--menu start-->
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='js1/jquery.cookie.js'></script>
<script type='text/javascript' src='js1/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js1/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript">
$(document).ready(function($){
					$('#accordion-5').dcAccordion({
						eventType: 'hover',
						autoClose: false,
						saveState: true,
						disableLink: true,
						menuClose: true,
						speed: 'fast',
						showCount: true
					});
					
});
</script>
<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
 
 <!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
                                    <?php include_once('conleft_bar.php');?>
				</div>
				<div id="right_box" >
						<div class="headline">
								<a href=""><?php
								if(isset($_SESSION['user'])){
								echo "Superadmin";
								}
								else{echo "Admin";}
								?></a>
								
								  
						</div>
						<div id="content1">
								<div class="head2">
										Add Job
								</div>
								<div id="content2" style="min-height:350px;">
									<?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
										<form name="myform"  action="job_update.php" method="post" enctype="multipart/form-data">
											<table class="table" style="height:250px; line-height:1.5;">
												
												<tr>
												<td>Name Of Post</td>
												<td><input type="text" name="postname" class="form" value="<?php echo $resjob['postname'];?>">
												<input type="hidden" name="hidden_id" value="<?php echo $resjob['id'];?>"/>
												</td>
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
												 <img src="<?php echo $resjob['logo']; ?>" width="100" height="100" />
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
                                                                                                    <td>Job Specialization</td>
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
 </div>
  <!--------------content bar end-------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
</body>
</html>