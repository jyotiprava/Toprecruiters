<?php
$titl=$_GET['titl'];
$dura=$_GET['dura'];
$object=$_GET['object'];
$inst=$_GET['inst'];
?>
					<tr>
								
								
                                		<td><input type="checkbox" name="chkk"  class="chk" value="1"/></td>
                                        <td><?php echo $titl;?></td>
                                        <td><?php echo $dura;?></td>
                                        <td><?php echo $object;?></td>
                                        <td align="center"><?php echo $inst;?>
										<input type="hidden" name="hdid" id="hdival"/>
										</td>
                                </tr>