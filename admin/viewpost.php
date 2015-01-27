<?php
include_once("../function.php");
is_admin();
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

<link href="../style.css" type="text/css" rel="stylesheet"  />
<link href="../font.css" type="text/css" rel="stylesheet" media="screen"  />
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
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script/>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
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
</script>

<script type="text/javascript">
function shortlist(val){
	
   var ok=confirm("Are you sure to shortlist this candidate?");
	if(ok){
			$.ajax({
	url:"ajax_shortlisted.php?id="+val,
	success:function(result){
	    //$('#short').html(result);
	    location.reload();
	       }
    });
		}	
	else{
			return false;
		}
    }		
</script>
<link href="../css/reveal.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="../js/jquery.reveal.js"></script>
<script type="text/javascript">
function getidval(mail)
{
//alert(mail);
$('#myModal').hide();
var urlval="popup.php?eval="+mail;
$('#postdetails').attr('src',urlval);  
}
</script>
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
                        		<h2 class="head6">View Employee for Post Job</h2>
				 </div>
				
				<div style="width: 960px;height: auto; float: left;margin-top:0px;" >
				 <table class="table6" >
                                                
                                                <tr class="tr2">
                                                <th>Post Name</th>
												<th>Employee Name</th>
												<th>Employee Email</th>
												<th>Employee Contactno</th>
												<th>Employee Cv</th>
												<th>Date</th>
												<th>Status</th>
                                                 <th>Send Message</th>
                                                </tr>
                                                <?php 
			
											$sqljob=mysql_query("select j.*,a.`postname`,a.`id` as aid from `job_apply` j,`alljob` a where j.`postid`=a.`id` and j.`postid`='$_GET[id]'");
											while($resjob=mysql_fetch_array($sqljob))
											{
											$dt=$resjob['date'];
											$date=date("Y-m-d",strtotime($dt));
											$getcv=mysql_query("select * from `cv_detail` where `user_id`='$resjob[employee_id]'");
											$rescv=mysql_fetch_array($getcv);
											
											
											?>
											
                                            <tr>
												<td><?php echo $resjob['postname'];?></td>
												<td><?php echo $resjob['fname']." ".$resjob['lname'];?></td>
												<td><?php echo $resjob['email'];?></td>
												<td><?php echo $resjob['contactno'];?></td>
												<td><a href="pdf_server.php?file=<?php echo $rescv['cv'];?>"><?php echo $rescv['first_name'].".cv";;?></a></td>
												<td><?php echo $date;?></td>
												<td id="short">
												    <?php
												    if($resjob['shortlisted']==0)
												    {
												    ?>
												    <button  onclick="return shortlist(<?php echo $resjob['id'];?>);">Shortlist</button>
												    <?php
												    }
												    else
												    {
												    ?>
													<button class="table_button1">Shortlisted</button>
												    <?php
												    }	    
												    ?>
												</td>
                                                <td><a href="#" style=" text-decoration:none" class="big-link2" data-reveal-id="myModal" data-animation="none" onclick="return getidval('<?=$resjob['email'];?>');"><button class="table_button2">send</button></a>                                                
                                                </td>
											</tr>
                                            <?php  
											
											}
											?>
                                                </table>
				</div>

				
			</div>
        </div>
</div>

<div id="myModal" class="reveal-modal" >    
                                        <iframe src="allmatch1.php" style="height:200px; width:400px; border: none; background: #fff;" scrolling="no" frameborder="0" id="postdetails" onload='document.getElementById(&#39myModal&#39).style.display = "block";'></iframe>    
                <a class="close-reveal-modal" style="text-decoration: none;">&#215;</a>
</div>
<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php
include_once("footer.php");
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
