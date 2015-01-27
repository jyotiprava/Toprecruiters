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
<script type="text/javascript" src="js/jquery.min.js"></script>
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
										All Job Vacancy
								</div>
								<div id="content2" style="min-height:350px;">
									<table class="table1" cellpadding="5" height="100px">
										<tr> 
												<th width="69">Post name</th>
										  <th width="82">Posted Date</th>
										  <th width="120">No Of Application</th>
										  <th width="211">Suggest This Job To Employees</th>
									  </tr>
<?php
$sqlvacancy=mysql_query("select * from `alljob`");
while($resvacancy=mysql_fetch_array($sqlvacancy))
{
$dt=$resvacancy['date'];
$date=date("Y-m-d",strtotime($dt));
$qapplication=mysql_query("select * from `job_apply` where `postid`='$resvacancy[id]'")or die(mysql_error());
$totalapp=mysql_num_rows($qapplication);
?>
<tr>
<td><?php echo $resvacancy['postname']; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $totalapp; ?></td>
<td><input type="button" value="Suggest" class="button" onClick="window.location.href='suggest.php?id=<?=$resvacancy['id'];?>'"/></td>
</tr>
<?php
}
?>
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
<?php
// } ?>