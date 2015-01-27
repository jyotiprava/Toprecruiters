<?php
    include_once("function.php");
    $val=$_GET['id'];
    $name=$_GET['name'];
    //echo "select * from `alljob` where $name=$val";
    $qwe=mysql_query("select * from `alljob` where $name=$val and `status`='0'")or die(mysql_error());
    while($result=mysql_fetch_array($qwe)){
    $id=$result['id'];
    $post=$result['postname'];
    $vac=$result['noofvaccancy'];
    $loc=$result['location'];
    $ind=$result['industry'];
    $jobfun=$result['jobfunction'];
    $salfrm=$result['range1'];
    $salto=$result['range2'];
    $exp=$result['experience'];
    $shtdes=$result['shortdesc'];
    $date=$result['date'];
    $logo=$result['logo'];							
?>
 <tr style="background:#fff; border:1px solid #ccc; border-collapse:collapse;" >
                         	<td style=" padding:20px;">
                            	<span>
                                <a href="job_details.php?id=<?=$id;?>" style="text-decoration:none;color: #900; font-size:16px; font-weight:bold;"><?php echo  $post; ?></a></span>
                                <div style=" width:300px; height:auto; background:#f4ecec; border-radius:4px; border:1px solid #ccc; padding:10px; margin-top:10px; font-size:13px; line-height:2.0;">
                            	<span style="font-weight:bold; color:#000;">Industry : </span> <?php
									$qry=mysql_query("select * from `industry` where `slno`='$ind'");
									$rs=mysql_fetch_array($qry);
									echo $rs['industry'];
								 ?> <br />
                                 <span style="font-weight:bold; color:#000;">Job Function : </span><?php
									$qry=mysql_query("select * from `job_function` where `slno`='$jobfun'");
									$rs=mysql_fetch_array($qry);
									echo $rs['jobfunction'];
								 ?> <br />
				<span style="font-weight:bold; color:#000;">No. of Vaccancy : </span><?php echo $vac;?><br />			 
                            	<span style="font-weight:bold; color:#000;">Location : </span><?php
									$qry=mysql_query("select * from `location` where `slno`='$loc'");
									$rs=mysql_fetch_array($qry);
									echo $rs['location'];
								 ?> <br />
                                <span style="font-weight:bold; color:#000;">Salary : </span> <?php echo $salfrm; ?> - <?php echo $salto; ?>
                               <br />
                                <span style="font-weight:bold; color:#000;">Experience : </span> <?php echo $exp; ?><br />
                                <span style="font-weight:bold; color:#000;">Description : </span> <?php echo htmlspecialchars_decode($shtdes); ?>
                               </div>
                           </td>
                          
                         
                            <td valign="middle" style="text-align:center;">Date Posted: <?php echo $date; ?><br />
							<?php echo "<img src=admin/".$logo.">";?>
                             <br/>
                            <br/>
                            <input type="button" class="button3" value="Apply" onclick="window.location.href='job_details.php?id=<?=$id;?>'" style="margin-left:50px; width:180px; padding:7px; font-size:18px;"/>
			    </td>
                         </tr>
                        <tr>
                          	<td colspan="2"><hr /></td>
                          </tr>
 <?php } ?>