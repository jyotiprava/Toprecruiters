<?php
include_once("function.php");
$jobidval=$_GET['jobidval'];
$sqljob=mysql_query("select * from `job_function` where `industry_id`='$jobidval'");
?>
						
                                                        <td><span style="color:#FF0000;">*</span>Job Subspecailization>>></td>
														<td colspan="2">
														<select name="jobfunction" class="textbox2" id="job" >
														<option value="0">Select</option>
														<?php
														while($resjob=mysql_fetch_array($sqljob)){
														?>
														<option value="<?php echo $resjob['slno'];?>" <?php if($resuser['jobfunction']==$resjob['slno']){echo "selected";}?>><?php echo $resjob['jobfunction'];?></option>
														<?php
														}
														?>
													   </select>
													</td>
						
							
						