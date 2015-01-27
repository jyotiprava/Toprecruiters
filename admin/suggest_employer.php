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
			window.location="delete.php?id="+vals;
			}
		}
</script>
<script type="text/javascript">
function shortlist(val){
    $.ajax({
	url:"ajax_shortlisted.php?id="+val,
	success:function(result){
	  //  $('#short').html(result);
	  
	  alert("Successfully shortlisted");
	  $('#short').html(result);
	 
	 
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
										Suggest Employer
								</div>
								<div id="content2" style="min-height:350px;">
								<?php
								if(isset($_GET['mess']))
								{
								$mess=$_GET['mess'];
								echo "<script>alert('".$mess."')</script>";
								}
								?>
										<form name="f" action="suggest_mail.php" method="post">
											<table class="table1" cellpadding="5" border="1">
                                                
                                                <tr style="background:#f2f2f2;">
												<th>&nbsp;</th>
                                                <th bgcolor="#FF0000">Post Name</th>
												<th bgcolor="#FF0000">Employer</th>
												<th bgcolor="#FF0000">JobSpecialization</th>
												<th bgcolor="#FF0000">JobSubspecialization</th>
                                                </tr>
                                                <?php 
											$sqlpost=mysql_query("select * from `alljob` where `status`='0'");
											while($respost=mysql_fetch_array($sqlpost)){
											$sqlempl=mysql_query("select * from `cv_detail` where `industry`='$respost[industry]' and `jobfunction`='$respost[jobfunction]'");
											//echo "select * from `cv_detail` where `industry`='$respost[industry]' and `jobfunction`='$respost[jobfunction]'";
											$num=mysql_num_rows($sqlempl);
											$sqluser=mysql_query("select * from `user_detail` where `slno`='$respost[addby]'");
											$resuser=mysql_fetch_array($sqluser);
											$sqlindustry=mysql_query("select * from `industry` where `slno`='$respost[industry]'");
											$resindustry=mysql_fetch_array($sqlindustry);
											$sqljobfunction=mysql_query("select * from `job_function` where `slno`='$respost[jobfunction]'");
											$resjobfunction=mysql_fetch_array($sqljobfunction);
											if($num==0){}
											else{
											?>
                                            <tr>
												<td><input type="checkbox" name="check[]" value="<?php echo $resuser['emailid'];?>_<?php echo $respost['industry'];?>_<?php echo $respost['jobfunction'];?>"/></td>
												<td><?php echo $respost['postname'];?></td>
												<td><?php echo $resuser['emailid'];?></td>
												<td><?php echo $resindustry['industry'];?></td>
												<td><?php echo $resjobfunction['jobfunction'];?></td>
											</tr>
                                            <?php  
											}
											}
											?>
											<tr>
											<td colspan="5"><input type="submit" name="submit" value="Send" class="button"/></td>
											</tr>
                                                </table>
										</form>
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
<?php
// } ?>