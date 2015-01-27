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
						<div class="headline">
								<a href="">Superadmin</a>
								
								  
						</div>
						<div id="content1">
								<div class="head2">
										Shortlist Candidates
								</div>
								<div id="content2" style="min-height:350px;">
										
											<table class="table1" cellpadding="5" border="1">
                                                
                                                <tr style="background:#f2f2f2;">
                                                <th bgcolor="#FF0000">Post Name</th>
												<th bgcolor="#FF0000">Employee Name</th>
												<th bgcolor="#FF0000">Employee Email</th>
												<th bgcolor="#FF0000">Employee Cv</th>
												<th bgcolor="#FF0000">Status</th>
                                                </tr>
                                                <?php 
											$sqljob=mysql_query("select * from `job_apply`");
											while($resjob=mysql_fetch_array($sqljob)){
											$sqlpostname=mysql_query("select * from `alljob` where `id`='$resjob[postid]'");
											$respostname=mysql_fetch_array($sqlpostname);
											$dt=$resjob['date'];
											$date=date("Y-m-d",strtotime($dt));
											$getcv=mysql_query("select * from `cv_detail` where `user_id`='$resjob[employee_id]'");
											$rescv=mysql_fetch_array($getcv);
											if($resjob['postid']==""){}
											else{
											
											?>
											
                                            <tr>
												<td><?php echo $respostname['postname'];?></td>
												<td><?php echo $resjob['fname']." ".$resjob['lname'];?></td>
												<td><?php echo $resjob['email'];?></td>
												<td><a href="pdf_server.php?file=<?php echo $rescv['cv'];?>"><?php echo $rescv['first_name'].".cv";;?></a></td>
												<td>
												    <?php
												    if($resjob['shortlisted']==0)
												    {
												    ?>
													<div id="short">
												    <button  onclick="return shortlist(<?php echo $resjob['id']; ?>);">Shortlist</button>
													</div>
												    <?php
												    }
												    else
												    {
												    ?>
													<button>Shortlisted</button>
												    <?php
												    }	    
												    ?>
												</td>
											</tr>
                                            <?php  
											}
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