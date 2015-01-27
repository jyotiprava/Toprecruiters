<?php
include_once("function.php");
is_employe();
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

<link href="style.css" type="text/css" rel="stylesheet"  />
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
<!-- Load TinyMCE-->
<script src="admin/js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="admin/js/setup.js" type="text/javascript"></script/>
   <script src="admin/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

   </script>
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="banner_delete.php?id1="+vals;
			}
		}
</script>
   <!-- /TinyMCE -->

</head>
<body>
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->

<!--------------------------menu bar----------------------->

<!--------------------------menu bar end----------------------->

<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left">
                		<div id="pg_box">
                        		<h2 class="head3" style="font-size:20px; text-align: center; margin-top:0px; width:1010px; background-color:#FF0000; ext-align:center;">Add Banner</h2>
				 </div>
                		<div id="content2_leftbox" style="width: 980px;height:auto;" >
				 <?php
				       if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
									?>
										<form name="myform"  action="banner_insert.php" method="post" enctype="multipart/form-data">
											<table class="table">
												<tr>
												<td>Banner Name</td>
												<td><input type="text" name="bannername" class="form" required ></td>
												</tr>
												<tr>
												<td>Banner</td>
												<td><input type="file" name="img" class="form" required ></td>
												</tr>
                                                                                                <tr>
												<td>Banner Logo</td>
												<td><input type="file" name="imgl" class="form" required ></td>
												</tr>
												<tr>
												<td>&nbsp;</td>
												<td>
												<input type="submit" name="submit" value="Add" class="button" style="width:75px; margin-top:5px;" >
												</td>
												</tr>
											</table>
                                               
                                                  
										</form>
                                             </div>
				
				<div style="width: 960px;height: auto; float: left;margin-top: 20px;" >
					 <table class="table1" cellpadding="5" style="width: 1010px;height:auto;" border="1">
                                                
                                                <tr style="background:#f2f2f2;">
                                                <th bgcolor="#FF0000">Name</th>
                                                 <th bgcolor="#FF0000">Banner</th>
                                                  <th bgcolor="#FF0000">Logo</th>
												<th colspan="2" bgcolor="#FF0000">Action</th>
                                                </tr>
                                                <?php 
											$sqlloc=mysql_query("select * from `banner` where `employerid`='".$_SESSION['employer_idval']."'");
											while($resloc=mysql_fetch_array($sqlloc)){
											?>
                                            <tr>
												<td><?php echo $resloc['brname'];?></td>
                                                                                                <td><img src="admin/<?php echo $resloc['brimage'];?>" style="width: 150px;height: auto;"/></td>
                                                                                                <td><img src="admin/<?php echo $resloc['brlogo'];?>" style="width: 150px;height: auto;"/></td>
												<td><a href="edit_banner.php?id=<?php echo $resloc['id'];?>"><img src="admin/images/edit.png" ></a></td>
												<td onClick="delete_data(<?php echo $resloc['id']; ?>)"> <img src="admin/images/delete.png" ></td>
											</tr>
                                            <?php
											} 
											?>
                                                </table>
				
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
