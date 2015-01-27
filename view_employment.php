<?php
	$expid=mysql_query("select * from `experience` where `user_id`='$_SESSION[useridval]'");
								while($resexpid=mysql_fetch_array($expid)){
								$fromval=$resexpid['from'];
								$fromexpl=explode('-',$fromval);
								$frommonth=$fromexpl[0];
								$fromyear=$fromexpl[1];
								$toval=$resexpid['to'];
								$toexpl=explode('-',$toval);
								$tomonth=$toexpl[0];
								$toyear=$toexpl[1];
								$sql=mysql_query("select * from `industry` where `slno`='$resexpid[industry]'");
								$res=mysql_fetch_array($sql);
								$sqlpos=mysql_query("select * from `position_level` where `slno`='$resexpid[position]'");
								$respos=mysql_fetch_array($sqlpos);
								?>
									
									
									<table class="tbl">
									
												<tr>
														<td>Company Name:</td>
														<td>
														<?php echo $resexpid['company'];?>
														</td>
												</tr>
												<tr>
														<td>Job Specialization:</td>
														<td>
														<?php echo $res['industry'];?>
                                                        </td>	
												</tr>
												<tr>
														<td>Duration:</td>
														<td>
														 From: &nbsp;
														 <?php 
														 $monthName = date('M', mktime(0, 0, 0, $frommonth, 10));
														 echo $monthName ;
														 ?>
														&nbsp; 
														<?php echo $fromyear ; ?>
													    &nbsp;To: &nbsp;
														 <?php 
														 $monthName1 = date('M', mktime(0, 0, 0, $tomonth, 10));
														 echo $monthName1 ;
														 ?>
														&nbsp;
														<?php echo $toyear ; ?>
														 &nbsp;
														 <span> <?php echo $resexpid['type']; ?> </span>
                                                         </td>
														
												</tr>
												<tr>
														<td>Job title:</td>
														<td><?php echo $resexpid['title'];?></td>
												</tr>
												<tr>
														<td>Position Level:</td>
														<td><?php echo $respos['position'];?> </td>
														
												</tr>
												<tr>
														<td>
                                                        Job Description:
                                                        </td>
                                                        <td>
														<?php echo html_entity_decode($resexpid['description']);?>
                                                        </td>
												</tr>
												
						
												
									</table>	
										<div style="width:600px; height:5px; float:left; border-top:1px solid #cdcdcd; margin-top:10px; margin-left:10px;"></div>

								<?php
								}
								?>										