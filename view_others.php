<?php
$userid=mysql_query("select * from `language_details` where `user_id`='$_SESSION[useridval]'");

?>


			<h2><span style="color: #900;">Language</span></h2>
			
                    <div class="id_100">
                	
					
						<table class="table6">
								<tr class="tr2">
                                        <th>Language</th>
                                        <th>Writing</th>
                                        <th>Reading</th>
                                        <th>Speaking</th>
                                </tr>
								
      
								<?php
								$sqllang=mysql_query("select * from `language_details` where `user_id`='$_SESSION[useridval]'");
								while($reslang=mysql_fetch_array($sqllang)){
								$langname=mysql_query("select * from `language` where `slno`='$reslang[language]'");
								$reslangname=mysql_fetch_array($langname);
								?>
								<tr>
                                        <td>
										<?php echo $reslangname['language'];?>
										</td>
                                        <td>
										<?php echo $reslang['write'];?>
										</td>
                                        <td>
										<?php echo $reslang['read'];?>
										<input type="hidden" name="read[]" class="textbox1" id="readd" value="<?php echo $reslang['read'];?>" readonly/>
										</td>
                                        <td>
										<?php echo $reslang['spoken'];?>
										<input type="hidden" name="spoken[]" class="textbox1" id="spokenn" value="<?php echo $reslang['spoken'];?>" readonly/>
										</td>
                                </tr>
								<?php
								}
								?>
								
								
                                <tbody id="tbb2"></tbody>
						</table>
                    </div>
                    
                    <p>Other related details not mention is resume</p>
                    <div style="width:100%; height:auto; float:left; margin-bottom:20px;">
                    		
							<?php echo html_entity_decode($resuser['other_info']);?>
                           
                            
                            <div style="width:100%; height:auto; float:left;">
                                <p style="margin-top:10px; font-size:14px;">Setting Privacy:
                                <span style="margin-left:15px;"> 
								<?php 
								if($resuser['setting']=="Allow")
								{
								echo "Allow search";
								}
								else{
								echo "Don't allow search";
								}
								?>
								</span><br />
                                </p>
				<p style="font-weight:bold; text-align:right; margin-right:20px; font-size:13px; float:left;">
				Your Cv:
				<a href="pdf_server.php?file=<?php echo $resuser['cv'];?>">
				<?php
				if($resuser['cv']!=''){
				echo $resuser['first_name'].".cv";
				}
				else{
				}
				?>	
				</a>				
				</p>
                            </div>
                    </div> 					