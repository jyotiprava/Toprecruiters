<?php
include_once("function.php");
?>
<div id="testimonials" style="width:230px;">
Search for Jobs &nbsp;<img src="images/icon1.png"  width="15"/>
                         </div>
                         <div class="right_text" style="background-color:#CFCFCF">
                            <form method="post" action="search.php" >
                         		<table align="center">
                                		<tr align="center">
                                        	<td>&nbsp;</td>
                                        </tr>
                                	<tr align="center">
                                        	<td><input class="input4" type="text" name="keyword"  placeholder="--Keyword--"/></td>
                                        </tr>
                                        <tr align="center">
                                        	<td>&nbsp;</td>
                                        </tr>
                                        <tr align="center">
                                        	<td>
						         <select name="location" class="input4">
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
                                        <tr align="center">
                                        	<td>&nbsp;</td>
                                        </tr>
                                        <tr align="center">
                                        	<td>
						 <select name="industry" class="input4">
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
                                         <tr align="center">
                                        	<td>&nbsp;</td>
                                        </tr>
                                  		 <tr align="center">
                                        	<td>
						<select name="jobfunction" class="input4">
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
                                        <tr align="center">
                                        	<td>&nbsp;</td>
                                        </tr>
                                         <tr align="center">
                                        	<td>
                                                    <input type="submit" value="Search" class="button"/>
                                                </td>
                                        </tr>
                                         
                                </table>
                            </form>
                                </div>