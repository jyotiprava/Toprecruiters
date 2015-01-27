<?php
include_once("function.php");
$ival=$_GET['ival'];
?>
<tr id="<?php echo $ival;?>">
                <td>
					<select name="language[]" class="textbox" style="width:150px;">
						<option value="0">select</option>
						<?php
						$sqllang=mysql_query("select * from `language`");
						while($reslang=mysql_fetch_array($sqllang)){
						?>
						<option value="<?php echo $reslang['slno'];?>"><?php echo $reslang['language'];?></option>
						<?php
						}
						?>
					
					</select>					
				</td>
				<td>
				<select name="spoken[]" class="textbox" id="spoke" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td>
				<select name="written[]" class="textbox" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td>
				<select name="relevant[]" class="textbox" style="width:100px;">
						<option value="0">select</option>
						<?php
						for($i=1;$i<=10;$i++){
						?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php
						}
						?>
				</select>
				</td>
				<td onClick="delete_row(<?php echo $ival;?>)"><img src="admin/images/delete.png" width="60" style="margin-top:20px;"></td>
		</tr>