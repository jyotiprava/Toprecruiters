<?php
include_once("function.php");
if(isset($_SESSION['useridval'])){
    is_login();
	$id=$_GET['empid'];
	$idval=$_SESSION['useridval'];
}
elseif(isset($_SESSION['employer_idval'])){
 is_employe();  
 $id=$_GET['userid'];
 $idval=$_SESSION['employer_idval'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<link href="style.css" type="text/css" rel="stylesheet"  media="screen"/>
<link href="font.css" type="text/css" rel="stylesheet" media="screen"  />
<style>
@font-face {
    font-family: 'EstrangeloEdessaRegular';
    src: url('font/estrangeloedessa.eot');
    src: url('font/estrangeloedessa.eot') format('embedded-opentype'),
         url('font/estrangeloedessa.woff2') format('woff2'),
         url('font/estrangeloedessa.woff') format('woff'),
         url('font/estrangeloedessa.ttf') format('truetype'),
         url('font/estrangeloedessa.svg#EstrangeloEdessaRegular') format('svg');
}



</style>
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_testimonial.php?id="+vals;
			}
		}
</script>
</head>
<body>
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->

<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content_bar">
		<div id="content_box">
        		<div id="content_left">
				        <?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
                		<form name="myform"  action="insert_testimonial.php" method="post" enctype="multipart/form-data">
                        <table class="table1" style="margin-top:25px;">
                        		
                                <tr>
                                		<td>Personal Name</td>
                                        <td>
										<input type="text" name="pname" value="" class="input"  />
										<input type="hidden" name="hdval" value="<?php echo $id;?>"/>
										</td>
                                </tr>
								 <tr>
                                		<td>Company Name</td>
                                        <td><input type="text" name="cname" value="" class="input"  /></td>
                                </tr>
                                <tr>
                                		<td>Designation</td>
                                        <td><input type="text" name="desgn" value="" class="input"  /></td>
                                </tr>
                                <tr>
                                		<td>Testimonial image</td>
                                        <td><input type="file" name="img"  class="input"  /></td>
                                </tr>
                                <tr>
                                		<td>Short Description</td>
                                        <td><textarea class="input"  name="area" style="height:100px;"></textarea></td>
                                </tr>
                              
								<tr>
                                		<td>&nbsp;</td>
                                        <td><input type="submit" name="submit" value="Add" class="button3" height="40" width="100" style="margin-left:100px;"/></td>
                                </tr>
                                 
                        </table>
					</form>
						<table class="table6">
                                                
                                                <tr class="tr2">
												<th> Personal Name</th>
												<th>Company Name</th>
												<th>Designation</th>
												<th>Testimonial Image</th>
												<th>Short Description</th>
												<th colspan="2">Action</th>
                                                </tr>
												
											     <?php 
											       $add=mysql_query("select * from `testimonial` where `addby`='$idval' and `addto`='$id'")or die(mysql_error());
											        while($result=mysql_fetch_array($add)){
											       ?>
                                               <tr>
													<td><?php echo $result['personal_name']; ?></td>
													<td><?php echo $result['company_name']; ?></td>
													<td><?php echo $result['designation']; ?></td>
													<td><img src="<?php echo $result['testimonialimage']; ?>" style="width:100px;height:auto;"/></td>
													<td><?php echo $result['shortdescription']; ?></td>
													<td><a  href="edit_testimonial.php?id=<?php echo $result['slno'];?>"><img src="admin/images/edit.png" ></a></td>
													<td onClick="delete_data(<?php echo $result['slno'];  ?>)"><img src="admin/images/delete.png" ></td>
													
											</tr>
                                            	<?php  } ?>
												
                                               
                           			 </table>
                </div>
                <div id="content_right">
                	<?php //include_once("searchjob.php");?>
                                
                		<div id="right_box1">
                        		<div id="right_box2">
                                Top Recruiters is ready to help you with your staffing needs! Simply complete this form and a consultant will contact you to confirm your order. 
								<br />
                                <br />
                                Need help in filling up this form? Please contact us below:
								<br />
                                <br />
                                Phone: +60 12 722 5501<br />
                                Email: info@toprecruiters.com.my<br />
                                Add: 
                                </div>
                        </div>
                         <div id="testimonials">
                                		Testimonials <img src="images/icon1.png"  width="15"/>
                         </div>
<div class="right_textbox" style="height:400px;overflow: auto;">
<?php
$sqltest=mysql_query("select * from `admin_testimonial`");
while($restest=mysql_fetch_array($sqltest)){
?>
<div class="right_text">
<?php
  if($restest['image']!='')
  {
    ?>
    <img src="admin/<?=$restest['image'];?>" style="width: 190px;height: 105px;"/>
    <?php
  }
  ?>
<?php echo html_entity_decode($restest['short_description']);?><br />
<span> <?php echo $restest['personal_name'].",".$restest['designation'].",".$restest['company_name'];?> </span></div>
<?php
}
?>
</div>
                        
                         </div>
                </div>
        </div>
</div>
<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php 
include_once("footer.php");
?>

<!--------------------------footer bar end----------------------->
</body>
</html>
