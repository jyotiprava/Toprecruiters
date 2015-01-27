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
										View Employee Resume
								</div>
								<div id="content2" style="min-height:350px;">
									<table class="table1" cellpadding="5">
										<tr> 
												<th>Name</th>
												<th>Email</th>
												<th>Phone no</th>
												<th>Resume</th>
										</tr>
<?php
$sqlcv=mysql_query("select * from `cv_detail`");
while($rescv=mysql_fetch_array($sqlcv))
{
?>
<tr>
<td style="word-break: break-all;width: 35%;"><?php echo $rescv['first_name']." ".$rescv['last_name']; ?></td>
<td style="word-break: break-all;width: 25%;"><?php echo $rescv['email']; ?></td>
<td style="word-break: break-all;"><?php echo $rescv['home_contact']; ?></td>
<td style="word-break: break-all;width: 25%;"><a href="../pdf_server.php?file=<?php echo $rescv['cv'];?>"><?php echo $rescv['first_name'].".cv"; ?></a></td>
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