<?php 
include_once("../function.php");
is_admin();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--menu start-->
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type='text/javascript' src='js1/jquery.cookie.js'></script>
<script type='text/javascript' src='js1/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js1/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript">
$(document).ready(function($){
					$('#accordion-5').dcAccordion({
						eventType: 'hover',
						autoClose: false,
						saveState: true,
						disableLink: true,
						menuClose: true,
						speed: 'fast',
						showCount: true
					});
					
});
</script>
<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="employer_delete.php?id="+vals;
			}
		}
	function getstatus(val,slno){
    $.ajax({
	url:"status_update.php?vals="+val+'&slno='+slno,
	success:function(result){
	  alert("Successfully Updated");
	       }
    });
    }	
</script>
</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
 
 <!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
                                    <?php include_once('conleft_bar.php');?>
				</div>
				<div id="right_box" >
						<?php include_once("header.php");?>
						<div id="content1">
								<div class="head2">
										Employer Status Change
								</div>
								<div id="content2" style="min-height:350px;">
									<?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<script>alert('".$mess."')</script>";
										  }
									?>   
                                             <table class="table1"  >
                                                
                                                <tr>
                                                <th>Name</th>
												<th>Emailid</th>
												<th>JoiningDate</th>
												
												<th colspan="2">Action</th>
                                                </tr>
                                                <?php 
											$sqluser=mysql_query("select * from `user_detail` where `is_employer`='1'");
											while($resuser=mysql_fetch_array($sqluser)){
											?>
                                            <tr>
												<td><?php echo $resuser['first_name'].$resuser['last_name'];?></td>
												<td><?php echo $resuser['emailid'];?></td>
												<td><?php echo $resuser['join_date'];?></td>
												
												<td>
												<select name="staus" onChange="return getstatus(this.value,<?php echo $resuser['slno'];?>);">
												<option value="1" <?php if($resuser['status']==1){echo "selected";}?>>Active</option>
												<option value="0" <?php if($resuser['status']==0){echo "selected";}?>>Deactive</option>
												</select>
												</td>
												<td onClick="delete_data(<?php echo $resuser['slno']; ?>)"> <img src="images/delete.png" width="60"></a></td>
											</tr>
                                            <?php  } ?>
                                                </table>
								</div>
						</div>
				</div>
		</div>
 </div>
  <!--------------content bar end-------->

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
</body>
</html>
