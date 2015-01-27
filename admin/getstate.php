<?php
include_once("../function.php");
$countryid=$_GET['contid'];
$state=mysql_query("select * from `location` where `countryid`='$countryid'");

					
?>

			

    <div style="width: 100%;float: left;margin-left: 0px;">
						<?php
					while($resstate=mysql_fetch_array($state)){
					 $pos = strpos($resstate['location'], "Any");
					 if($pos === false)
					 {
					  ?>
					 
					   <span style="width: 100%;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]" value="<?php echo $resstate['slno']; ?>" class="locationcheckbox"/><?php echo $resstate['location']; ?></span>
					  <?php
					 }
					 else
					 {
					 ?>
	</div>
					<span style="width: 100%;font-weight: bold;color: #333;"><input type="checkbox" style="float: left;" name="chklocation[]"  class="locationcheckbox"/><?php echo $resstate['location']; ?></span>
					<div style="width: 100%;float: left;margin-left: 20px;">
						<?php
					 }
						
						}?>
					</div> 			
