<link href="style.css" type="text/css" rel="stylesheet"  />
<link href="font.css" type="text/css" rel="stylesheet" media="screen"  />
<?php
include_once("function.php");
include_once('pagination.php');
echo $pagination;
$pg=$_GET['page'];	
			if($total_pages==0)
						{
						?>
						<div id="content2_leftbox">
						<span style="font-family:arial; font-size:14px;">There are no records.</span>
						</div>						
						<?php
						}
						else{
						
						?>
						
						<h2 class="head3" style="font-size:20px; text-align:center; margin-top:0px;">
								<?php
						$new_array=array();
						while($rescvdetails=mysql_fetch_array($res2))
						{ 
						$status=$rescvdetails['shortlisted']; 
						array_push($new_array, $status);
						}
						if (in_array("0", $new_array))
						{
							echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return addallshort();'>Add All to Shortlist</span></div>";
						}
						else
						{
						echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return removeallshort();'>Remove All from shortlist</span></div>";
						}
						?>	
								<?php echo $numm;?> Candidates found in Pg <?php echo $pg;?> of <?php echo $lastpage;?>
						</h2>
						<div id="content2_leftbox">
						<?php
						$contsll='';
						while($reskeyskill=mysql_fetch_array($res1)){
						 $slno=$reskeyskill['slno'];
						
						$contsll.=$slno.",";
						 
						?>
						
						<div class="left_listbox">
                                		<div class="left_listimg">
                                        		<a href="candidate.php?slno=<?php echo $slno;?>">
												<!--<img src="images/img4.jpg" style="width:100%;"/>-->
												<img src="<?php echo $reskeyskill['picture'];?>" style="width:100%;" />
												</a>
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">
												<!--MYR 1,200-->
												<?php
												$sqlcurrency1=mysql_query("select * from `currency` where `slno`='$reskeyskill[expected_currency]'");
												$rescurrency1=mysql_fetch_array($sqlcurrency1);
												echo $rescurrency1['symbol']." ".$reskeyskill['expected_salary'];
												?>
												</span>
                                        </div>
									    <div class="leftlist_textbox1">
                                        		<h3 class="head4">
                                                		
														1.<?php echo $reskeyskill['first_name']." ".$reskeyskill['last_name'];?>
												</h3>
                                                <p class="text4">
                                                Exp:
												<?php
												$expr=$reskeyskill['experience_date'];
												$split=explode('-',$expr);
												$spiltyear=$split[0];
												$spiltmonth=$split[1];
												echo $spiltyear." yrs";
												
												?>
                                                <br />
                                                Edu: 
												<?php echo htmlspecialchars_decode($reskeyskill['last_course']);?>
												</p>
												<p class="text4">
                                                
                                                Current Position: 
												<?php
												$sqlexp=mysql_query("select * from `experience` where `user_id`='$reskeyskill[user_id]' and `type`='current'");
												$resexp=mysql_fetch_array($sqlexp);
												echo html_entity_decode($resexp['title']);
												
												?>
											 
												<br/>
												<br/>
                                                Pref Location: <!--Johor Bahru, Kuala Lumpur, Melaka-->
												<?php 
												$ploc=$reskeyskill['preferd_location'];
												$lc=explode(',',$ploc);
												$cont='';
												foreach($lc as $lc1)
												{
												if($lc1!=''){
												$sqlloc=mysql_query("select * from `location` where `slno`='$lc1'");
												$rowloc=mysql_fetch_array($sqlloc);
												$plocation=$rowloc['location'];
												$cont.=$plocation.",";
												}
												}
												echo $cont;
												?>
												<br/>
											Language: <!--English, Chinese, Malay-->
											<?php
											//echo 'dgdfghb----------------';
												$contt="";
												$sqllng1=mysql_query("select * from `language_details` where `user_id`='$reskeyskill[user_id]'");
												//echo "select * from `language_details` where `user_id`='$res[user_id]'";
												while($rowlngg1=mysql_fetch_array($sqllng1)){
												$langg1=$rowlngg1['language'];
												$langname1=mysql_query("select * from `language` where `slno`='$langg1'");
												$rowname1=mysql_fetch_array($langname1);
												$contt=$contt.",".$rowname1['language'];
												}
												$lngname1=ltrim($contt,",");
												echo $lngname1;
												
											?>
											<br/><br/>
												<a href="testimonial.php?userid=<?php echo $reskeyskill['user_id'];?>">Add Testimonial</a>
												<a href="candidate.php?slno=<?=$slno;?>"><button class="button3">View Resume</button></a>
                                                </p>
                                        </div>
										 <div class="leftlist_textbox2">
                                        		<ul class="left_contectlist">
                                                		<li><i><img src="images/i1.jpg"/></i> <span>+<!--60127113349--><?php echo $reskeyskill['mobile_contact'];?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> <span>
														<!--ibrahim@gmail.com-->
														<?php 
														$emll=$reskeyskill['email'];
														$xx=substr($emll,0,20)."<br/>";
														echo $xx;
														$lenn=strlen($emll);
														$restt=$lenn-20;
														$yy=substr($emll,20,$restt);
														echo $yy;
														?>
														</span></li>
                                                        <li><i><img src="images/i3.jpg"/></i> <span><!--28--><?php echo $reskeyskill['age'];?> yrs old</span></li>
                                                        <li><i><img src="images/i4.jpg"/></i> <span><!--Bandar Tun Razak, Pahang-->
														<?php 
														$crntaddress=$reskeyskill['current_address'];
														$ext=explode('/',$crntaddress);
														$address=$ext[0].",".$ext[1];
														echo html_entity_decode($address);
														?>
														</span></li>
                                                </ul>
                                        </div>
										 <div style="width:430px; float: left;margin-left: 100px; font-size: 13px;font-weight: bold;">
					 <?php
					 if($reskeyskill['shortlisted']==0){
					 ?>
					 <span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return addshort(<?php echo $reskeyskill['slno']; ?>);" id="addid<?php echo $reskeyskill['slno']; ?>">Add to Shortlist </span>
					 <?php
					 }
					 else{
					 ?>
						<span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return removeshort(<?php echo $reskeyskill['slno']; ?>);" id="remvid<?php echo $reskeyskill['slno']; ?>">Remove from Shortlist</span>
					<?php
					 }
					?>
					</div>
                                        <div class="date">
                                        		Last Updated: 
												<!--20 June 2011-->
												<?php
												$date=$reskeyskill['updated_date'];
												if($date!='0000-00-00 00:00:00'){
												$getday=date('d', strtotime($date));	
												echo $getday." ";	
$getmonth=date('m', strtotime($date));		
$monthName = date('F', mktime(0, 0, 0, $getmonth, 10));	
echo 	$monthName." ";		
$getyear=date('Y', strtotime($date));
echo 	$getyear;		
}
else{}			
												?>
												
                                        </div>
																	
						</div>				
						<?php
						}
						?>
						 <input type='hidden' name='hid' id='hid_slno' value='<?php echo $contsll; ?>' />
						</div>
						<?php
						}
						?>