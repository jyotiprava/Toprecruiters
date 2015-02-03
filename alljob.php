<?php
include_once("function.php");
is_employe();
$user_id=$_SESSION['employer_idval'];
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
<script src="admin/js/setup.js" type="text/javascript"></script>
   <script src="admin/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

   </script>

   <!-- /TinyMCE -->
<script type="text/javascript">
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="delete_job.php?id1="+vals;
			}
		}
		
		function getstatus(selval,idvalue)
		{
		
		$.ajax({url:"status.php?idval="+idvalue+'&sel='+selval,success:function(result){
			 // $("#cls"+ival).html(result);
			 alert("successfully updated");
                }});  
		}
		
		
function myfunction(sid){
$.ajax({
       url:"ajax_addskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_add").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill('+r[0]+');">X</span></div>');
	 var oldvalue=$("#advance_add").val();
	 if (oldvalue) {
			$("#advance_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#advance_add").val(r[0]);	
        }		
       }
});
}

function cancelskill(sid)
{
$('#skill'+sid).remove();
var oldval=$('#advance_add').val();
oldval=oldval.replace(sid, "");
$('#advance_add').val(oldval);
}
</script>

<style>
	    .all{
		color:#797878 !important;
	    }
</style>
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
                        		<h2 class="head6">View All Jobs</h2>
				 		</div>
				<div style="width: 960px;height: auto; float: left; margin-top:5px;" >
				 <table class="table6" cellpadding="5" style="width: 1010px;height:auto;" border="1">
                                                
                                          <tr class="tr2">
                                                <th>Name</th>
						<th>Job Type</th>
                                                <th>Location</th>
                                                <th>No Of Applification</th>
                                                <th colspan="4">Action</th>
                                           </tr>
                                                <?php 
												$i=0;
											$add=mysql_query("select * from `alljob` where `addby`='$user_id' order by `posttype` desc");
											while($result=mysql_fetch_array($add)){
											$loc=$result['location'];
											$sqlloc=mysql_query("select * from `location` where `slno`='$loc'");
											$resloc=mysql_fetch_array($sqlloc);
				
				
				$qapplication=mysql_query("select * from `job_apply` where `postid`='$result[id]'")or die(mysql_error());
				$totalapp=mysql_num_rows($qapplication);
											$i++;
											?>
                                            <tr>
												<td><?php echo $result['postname'];?></td>
												<td><?php
												    if($result['posttype']==0) echo "Standard Job"; else echo "Featured Job";?></td>
												<td><?php echo $resloc['location'];?></td>
												<td><?=$totalapp;?></td>
												<td><a href="view_post.php?id=<?php echo $result['id'];?>" target="_blank">View Application</a></td>
												<td><a href="edit_job.php?id=<?php echo $result['id'];?>"><img src="admin/images/edit.png" ></a></td>
												<td onClick="delete_data(<?php echo $result['id']; ?>)"><img src="admin/images/delete.png" ></td>
												<!--<td id="cls<?php echo $i;?>"><input type="button" name="button" value="close" onclick="return getstatus(<?php echo $result['id'];?>,<?php echo $i;?>);"/></td>-->
												<td>
												<select onchange="return getstatus(this.value,<?php echo $result['id'];?>);">
												<option value="0" <?php if($result['status']=="0"){echo "selected";}?>>open</option>
												<option value="1" <?php if($result['status']=="1"){echo "selected";}?>>close</option>
												</select></td>
											</tr>
                                            <?php  } ?>
                                                </table>
				</div>
				
			</div>
        </div>
</div>
<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php
include_once("footer1.php");
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
