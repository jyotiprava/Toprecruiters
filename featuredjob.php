<table class="table5" style="margin-top:8px;">
                            	<tr>
                            	    <th>Posting Date</th>
                                    <th width="170">Job title</th>
                                    <th>Job Specialisation</th>
                                    <th>Location</th>
                                    <th>Ref. No.</th>
                                    <th width="100">&nbsp;</th>
                                </tr>
				<?php
				    $i=0;
				    while($radd=mysql_fetch_array($qwe))
				    {
					$i++;
					 if($i%2==0) { $bgcolor="#efefef"; }else { $bgcolor='#ffffff';}
				?>
				
                                <tr bgcolor="<?php echo $bgcolor;?>" >
                                    <td><?=date('d M Y',strtotime($radd['date']));?></td>
                                    <td style="color:#135095; cursor:pointer;" onclick="window.location.href='description2.php?id=<?=$radd['id'];?>'"><?=$radd['postname'];?></td>
                                    <td><?=$radd['industry'];?></td>
                                    <td><?=$radd['location'];?></td>
                                    <td><?=$radd['refno'];?></td>
                                    <td>
					<?php
					if(isset($_SESSION['userid']))
					{
					    $qweryc=mysql_query("select * from `job_shortlist` where `employeeid`='$_SESSION[useridval]' and `jobid`='$radd[id]'")or die(mysql_error());
					    $resc=mysql_fetch_array($qweryc);
					    if($resc['shortlist']==0)
					    {
					    ?>
					<input type="button" value="Add to Shortlist" class="button6" onclick="return getshlist(<?=$radd['id'];?>);"/>
					<?php
					    }
					    else
					    {
						?>
						<input type="button" value="Shortlisted" class="button6" onclick="return getshlist(<?=$radd['id'];?>);"/>
						<?php
					    }
					
					}
					else
					{
				          $msg="Please login to shortlist this job.";
					?>
					<input type="button" value="Add to Shortlist" class="button6" onclick="window.location.href='login.php?msg=<?=$msg;?>'"/>
					<?php
					}
					?>
				    </td>
                                </tr>
				<?php
				    }
				    ?>
                            </table>