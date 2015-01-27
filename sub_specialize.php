<?php
include_once("function.php");
$jobidval=$_GET['jobidval'];
$sqljob=mysql_query("select * from `job_function` where `industry_id`='$jobidval'");
?>
					<td>
						 Sub Specialisation:<br/>
						<select name="jobfunction" class="input4">
                                              <option>--Choose Subspecialization--</option>
                                                        <?php
                                                        while($rjob=mysql_fetch_array($sqljob))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $rjob['slno'];?>"><?php echo $rjob['jobfunction'];?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                 </select>
					</td>
				