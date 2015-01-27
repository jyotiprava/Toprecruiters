<?php 
include_once("../function.php");
is_admin();
/*if(!isset($_SESSION['username']))
{
	header("location:index.php");
}
else{*/
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
						<?php include_once('header.php');?>
						<div id="content1">
								<div class="head2">
										Add Position Level
								</div>
								<div id="content2" style="min-height:350px;">
									<?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
										<form name="myform"  action="insert_position_level.php" method="post">
											<table class="table" style="height:250px; line-height:1.5;">
												
												<tr>
												<td>Position Level</td>
												<td><input type="text" name="position" class="form" required ></td>
												</tr>
												
												
												<tr>
												<td>&nbsp;</td>
												<td>
												<input type="submit" name="submit" value="Add" class="button" style="width:75px; margin-top:5px;" >
												</td>
												<!--<td>
												<input type="button" name="button" value="Addnew" id="add1" class="button" style="width:75px; margin-top:5px;" >
												</td>-->
												</tr>
												</table>
                                               
                                                  
											</form>
                                            
                                             <table class="table1"  >
                                                
                                                <tr>
                                                <th>Name</th>
												<th colspan="2">Action</th>
                                                </tr>
                                                <?php 
											$add=mysql_query("select * from `position_level`");
											while($result=mysql_fetch_array($add)){
											?>
                                            <tr>
												<td><?php echo $result['position'];?></td>
												<td><a href="edit_position_level.php?id=<?php echo $result['slno'];?>"><img src="images/edit.png" width="60"></a></td>
												<td> <a href="delete_position_level.php?id=<?php echo $result['slno']; ?>"><img src="images/delete.png" width="60"></a></td>
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
<?php
// } ?>