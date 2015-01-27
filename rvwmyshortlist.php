<?php
include_once("function.php");
is_login();
$mqwe=mysql_query("select j.*, a.`postname`,a.`noofvaccancy`,a.`jobfunction`,a.`refno`,l.`location`,j.`jobid` from `alljob` a,`job_shortlist` j,`location` l where j.`employeeid`='$_SESSION[useridval]' and j.`jobid`=a.`id` and a.`location`=l.`slno` and j.`shortlist`='1'")or die(mysql_error());
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

.button6{ width:100px; height:auto; float:left; padding:4px; text-align:center; color:#fff; background-image: -o-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -moz-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -webkit-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: -ms-linear-gradient(bottom, #00A3BC 0%, #017B8E 100%);
background-image: linear-gradient(to bottom, #00A3BC 0%, #017B8E 100%); border:1px solid #027b8c; border-radius:4px 4px;}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    function getshlist(jobid)
		{
		    $.ajax({url:"ajax_jobshlist.php?jobid="+jobid,
			   success:function(results)
			   {
			    if (results.trim()=='OK') {
			    alert('Successfully Updated');
			    location.reload();
			    }
			   }
		    });
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

<!--------------------------menu bar----------------------->
<div id="menu_bar2" style="display: none;">
		<div id="menu_content2">
        		<div id="menu_box2">
                		<ul>
                        	<li><a href="#" style="padding-left:0px;">Request Page</a></li>
                                <li><a href="#">Search Resume</a></li>
                                <li><a href="#">Shortlisted Candidates</a></li>
                                <li><a href="#">Shortlisted Clients </a></li>
                                <li><a href="#">Create New Acc </a></li>
                                <li><a href="#">Mass Email/SMS</a></li>
                        </ul>
                </div>
        </div>
</div>
<!--------------------------menu bar end----------------------->

<!--------------------------content bar----------------------->
<div id="content2_bar">
		<div id="content2_box">
        		<div id="content2_left" style="width: 960px;">
                		<div id="pg_box">
                        		<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;"></h2>
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
                		<div id="content2_leftbox" style="width: 100%;border:none;">
						<?php
                                                    if(isset($_GET['msg']))
                                                    {
                                                    $mess=$_GET['msg'];
                                                    echo "<script>alert('".$mess."')</script>";
                                                    }						
						?>
                        	<table class="table6">
                            	<tr class="tr2">
                            	    <th>Post Name</th>
                                    <th>No of Vacancy</th>
                                    <th>Job Function</th>
                                    <th>Location</th>
                                    <th>Ref. No.</th>
                                    <th colspan="2">Status</th>
                                </tr>
                               <?php
                               while($resmqwe=mysql_fetch_array($mqwe)){
                                    ?>
                                <tr>
                                   <td><?php echo $resmqwe['postname'];?></td>
                                   <td><?php echo $resmqwe['noofvaccancy'];?></td>
                                   <td><?php echo $resmqwe['jobfunction'];?></td>
                                   <td><?php echo $resmqwe['location'];?></td>
                                   <td><?php echo $resmqwe['refno'];?></td>
                                   <td>
				    <?php
				    if($resmqwe['shortlist']==0)
					    {
					    ?>
					<input type="button" name="" value="Add to Shortlist" class="button6" onclick="return getshlist(<?=$resmqwe['jobid'];?>);"/>
					<?php
					    }
					    else
					    {
					    ?>
						<input type="button" name="" value="Shortlisted" class="button6" />
				   </td>
				   <td>
				    <input type="button" class="button6" value="Cancel" onclick="return getshlist(<?=$resmqwe['jobid'];?>);"/>
				   </td>
				   <?php } ?>
                                </tr>
                                <?php } ?>
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
