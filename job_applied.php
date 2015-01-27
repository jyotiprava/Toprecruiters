<?php
include_once("function.php");
is_login();

$qjobmatchprofile=mysql_query("SELECT j.`postid`,a.`postname`,a.`status`,j.`date`,a.`id` from `job_apply` j,`alljob` a where j.`employee_id`='$_SESSION[useridval]' and j.`postid`=a.`id`")or die(mysql_error());

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
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<!--<script>
 $(function(){
	    $('.pstid').click(function () {
		var pstname=$('.pstid').html();
		alert(pstname);
	   /* $.ajax({url:"description.php?con="+i,
	       success:function(result){
                $("#addnew").append(result);
                }
		});*/
	    
	   });
    });
</script>-->
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
                        		<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;">Applied Job</h2>
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
                		<div id="content2_leftbox" style="width: 100%;border:none;">
                        	<table class="table6">
                            	<tr class="tr2">
				    <th>Job title</th>
                            	    <th>Date Of Applied</th>
                                    <th>Current Status</th>
                                </tr>
				<?php
				$i=0;
				while($rjobmatchprofile=mysql_fetch_array($qjobmatchprofile))
				{
				    $i++;
				?>
                                <tr style="cursor: pointer;" onclick="window.location.href='job_details.php?id=<?php echo $rjobmatchprofile['id'];?>'" <?php if($i%2==0) { echo 'bgcolor="#CCCCCC"'; }?> >
				    <td style="color:#C60;"><?php echo $rjobmatchprofile['postname'];?></td>
                                    <td><?php echo date('d M Y',strtotime($rjobmatchprofile['date']));?></td>
                                    <td><?php if($rjobmatchprofile['status']==1)
				    {
					echo "<span style='color:red;'>Closed</span>";
				    }
				    else
				    {
					echo "<span style='color:green;'>Open</span>";
				    }
				    ?>
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

<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php
include_once("footer.php");
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
