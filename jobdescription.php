<?php
include_once("function.php");
is_login();

$qjobmatchprofile=mysql_query("SELECT a.* , c.`user_id`,l.`location` FROM  `alljob` a,  `cv_detail` c,`location` l WHERE c.`jobfunction` = a.`jobfunction` AND c.`user_id` =$_SESSION[useridval] and l.`slno`=a.`location`
")or die(mysql_error());

/*SELECT *
FROM alljob a
JOIN (
SELECT user_id,
CASE WHEN `intermediate` = '' THEN 'nointerskq' ELSE intermediate END AS intermediate,
CASE WHEN `advanced` = '' THEN 'noadvcskq' ELSE advanced END AS advanced,
CASE WHEN basic = '' THEN 'nobasskq' ELSE basic END AS basic
FROM `cv_detail`
WHERE user_id =$_SESSION[useridval]
)c ON a.keyskill LIKE concat( '%', c.advanced, '%' )
OR a.keyskill LIKE concat( '%', c.`intermediate` , '%' )
OR a.keyskill LIKE concat( '%', c.`basic` , '%' )*/

$count=mysql_num_rows($qjobmatchprofile);


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
                        		<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;"><?=$count;?> Jobs Matches Your Profile.</h2>
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
                            	    <th>Posting Date</th>
                                    <th>Job title</th>
                                    <th>Job Specialisation</th>
                                    <th>Location</th>
                                    <th>Ref. No.</th>
                                </tr>
				<?php
				$i=0;
				while($rjobmatchprofile=mysql_fetch_array($qjobmatchprofile))
				{
				    $i++;
				?>
                                <tr <?php if($i%2==0) {?>bgcolor="#CCCCCC" <?php }?> style="cursor: pointer;" onclick="window.location.href='job_details.php?id=<?=$rjobmatchprofile['id'];?>'">
                                    <td><?php echo date('d M Y',strtotime($rjobmatchprofile['date']));?></td>
                                    <td style="color:#C60;"><?=$rjobmatchprofile['postname'];?></td>
                                    <td>
									<?=
									$cont2='';
									$keyskill=$rjobmatchprofile['keyskill'];
									$expl=explode(',',$keyskill);
									foreach($expl as $explval)
									{
									 $sqlskill2=mysql_query("select * from `skill` where `slno`='$explval'");
									  $resskill2=mysql_fetch_array($sqlskill2);
									  $skill2=$resskill2['skill'];
									  $cont2.=$skill2.",";
								   }
								   $rtrm2=rtrim($cont2,',');
								   echo $rtrm2;
									?></td>
                                    <td><?=$rjobmatchprofile['location'];?></td>
                                    <td><?=$rjobmatchprofile['refno'];?></td>
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
