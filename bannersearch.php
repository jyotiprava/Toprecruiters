<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css" />

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/jquery.multiselect.js"></script>
<script type="text/javascript">
$(function(){
	$("#location").multiselect();
});

function validateform()
{
	var keyword=$('#keyword').val();
	var location=$('#location').val();
	var industry=$('#industry').val();
	var jobfunction=$('#jobfunction').val();
	var worktype=$('#worktype').val();
	
	if (keyword=='' && location==null && industry=='' && jobfunction=='' && worktype=='') {
		alert("Please fillup Some field before Search.");
		return false;
	}
}
</script>
<div id="banner_bar">
       <div id="banner_box" >
        	<div class="border_box" >
				<div class="box_skitter box_skitter_large"style="position: relative;">
					<ul>
					<?php
					$banner=mysql_query("select * from `bannerimage`");
					while($resbanner=mysql_fetch_array($banner))
					{
					?>
					
						<li>
						        <a href="#cube"><img src="admin/<?php echo $resbanner['bannerimage'];?>"  class="circles" /></a>
							<div class="label_text">
								<p style="width: 470px;margin-left: 280px;font-family: 'Conv_estre';">
								      <span style="color:rgb(0, 225, 229); "><?php echo $resbanner['title'];?></span>
								      <br/></p>
							</div>
						</li>
					<?php
					}
					?>
					
			
					</ul>
					<div class="searchbox">
						 <h2 class="head3" style="font-family:arial; color: #fff; padding-left: 20px; padding-top: 10px;">Search for jobs</h2>
						  <form method="post" action="index.php" onsubmit="return validateform();">
						 <table align="center" style="color: #fff;">
                                		
                                	<tr>
                                        	<td>Job Title *:<br/>
						<input class="input4" type="text" name="keyword" id="keyword"  placeholder="--Keyword--"/></td>
                                        </tr>
                                       
                                        <tr >
						 <td>
						   Location:<br/>
						   <select name="location[]" class="input4" multiple="multiple" id="location">
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
                                        	<td>
						 Job Specialisation:<br/>
						  <select name="industry" id="industry" class="input4" onchange="return getsubjob(this.value);" style="width:205px;">
                                                        <option value="">--Job Specialisation--</option>
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
                                        <tr id="subid">
                                        	<td>
						 Sub Specialisation:<br/>
						<select name="jobfunction" id="jobfunction" class="input4" style="width:205px;">
                                                        <option value="">--Choose Sub Specialisation--</option>
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
					 <tr >
                                        	<td>
						 Work Types:<br/>
						<select name="worktype" id="worktype" class="input4" style="width:100px; margin-top: 7px; margin-right: 7px;">
                                                        <option value="">--Choose Work Type--</option>
							<option value="Permanent">Permanent</option>
							<option value="Temporary">Temporary</option>
							<option value="Contract">Contract</option>
							<option value="All">All</option>
						</select>
                                                  <input type="submit" value="Search" class="search" name="search"/>                                                                                                                                                                    
						</td>
                                        </tr>
                                </table>
						  </form>
						<a href="<?php if(isset($_SESSION['userid'])){ echo 'mypage2.php';} else {echo 'signup.php';}?>" style="text-decoration: none;"><div class="cvheading" style="cursor: pointer;">
							<img src="images/cv.png" style="float: left; margin-right: 5px;">Submit Your CV
						</div></a>
				        </div>
				</div>
				
			</div>
		
        </div>
</div>