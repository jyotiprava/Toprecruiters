<?php
include_once("function.php");
?>
<style>
	.input{
						width:500px;
						float: left;
						height: 40px;
						padding: 5px;
	}
</style>
<div id="testimonials" style="width:502px;">
                                		Search for Jobs &nbsp;<img src="images/icon1.png"  width="15"/>
                         </div>
                         <div class="right_text" style=" border:1px solid #ccc; width:52%;">
                            <form method="post" action="search.php" >
                         		<table style="width: 60%; height:250px; float: left; margin-left: 1%;">
                                		
                                	<tr >
						
                                        	<td><input class="input" type="text" name="keyword" style="width:490px; height:25px;"  placeholder="--Keyword--"/></td>
                                        </tr>
                                        <tr>
                                        	
                                        </tr>
                                        <tr >
                                        	<td>
						         <select name="location" class="input">
                                                                                                            <option value="">--Choose Location--</option>
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
                                        <tr >
                                        	
                                        </tr>
                                        <tr>
                                        	<td>
						 <select name="industry" class="input">
                                                                                                            <option value="">--Choose Industry--</option>
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
                                        	
                                        </tr>
                                  		 <tr >
												
                                        	<td>
						<select name="jobfunction" class="input">
                                                                                                            <option value="">--Choose Job Function--</option>
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
                                                    <input type="submit" value="Search" class="button"/>
                                                </td>
                                        </tr>
                                         
                                </table>
                            </form>
                                </div>
