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
			window.location="delete_testimonial.php?id="+vals;
			}
		}
</script>
<!-- Load TinyMCE-->
<!--<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>-->
<script src="js/setup.js" type="text/javascript"></script/>
   <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

   </script>

   <!-- /TinyMCE -->
</head>
<body>
<!--------------top bar -------->
<?php include_once("topbar.php"); ?>
 <!--------------top bar end-------->
 
 <!--------------content bar-------->
 <div id="main_bar">
 		<div id="main_box">
				<div id="left_box">
                                    <?php //include_once('conleft_bar.php');?>
				</div>
				<div id="right_box" >
						<?php include_once("header.php");?>
						<div id="content1">
								<div class="head2">
										Add Testimonial
								</div>
								<div id="content2" style="min-height:350px;">
									
										<form name="myform" method="post" action="insert_testimonial.php" enctype="multipart/form-data">
											<table class="table" style="height:250px; line-height:1.5;">
												<?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
											?>
												<tr>
												<td align="center">Personal Name</td>
                                                                                                
												<td><input type="text" name="pname" class="form" required ></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
												<td align="center">Company Name</td>
												<td><input type="text" name="cname" class="form" required ></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
												<td align="center">Designation</td>
												<td><input type="text" name="desig" class="form" required ></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
												<td align="center">Testimonial Image</td>
												<td><input type="file" name="timg"><br/>
												<span style="font-size:12px;color:red;"></span>
												</td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>&nbsp;</td>
                                                                                                </tr>
												<tr>
												<td align="center">Short Description</td>
                                                                                                <td><textarea name="sdesc" class="tinymce" style="height: 50px;"></textarea></td>
												
												</tr>                                                                                                
												<tr>
												<td>&nbsp;</td>
												<td>
												<input type="submit" name="submit" value="Add" class="button" style="width:75px; margin-top:5px;" >
												</td>
												
												</tr>
												</table>  
											</form>
											
					    <table class="table1">
					    <tr>
                                    		<th>Personal Name</th>
                                                <th>Company Name</th>
                                                <th>Designation</th>                                               
                                                <th colspan="2">Action</th>
                                    	    </tr>
						    <?php
							$que=mysql_query("select * from  `admin_testimonial`");
							while($res=mysql_fetch_array($que))
							{
						    ?>																					
                                    	    <tr>
                                                <td>
                                                    <?php echo $res['personal_name'];?>
                                                </td>
                                                <td>
                                                    <?php echo $res['company_name'];?>
                                                </td>
                                                <td>
                                                    <?php echo $res['designation'];?>
                                                </td>
                                                <td><a href="edit_testimonial.php?id=<?php echo $res['slno']; ?>"><img src="images/edit.png" width="60"></a></td>
                                                <td onClick="delete_data(<?php echo $res['slno']; ?>)"><img src="images/delete.png" width="60"></td>
                                    	    </tr>
						<?php } ?>
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
</html>
