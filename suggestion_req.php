<?php
include_once("function.php");
is_login();

$qwe=mysql_query("SELECT a.* from `alljob` a,`admin_suggest` ad where ad.`userid`='$_SESSION[useridval]' and ad.`jobid`=a.`id`")or die(mysql_error());

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
                        		<h2 class="head3" style="font-size:20px; text-align:right; margin-top:0px;">You Have <?=$suggestcount;?> Suggestion From Top Recruiter</h2>
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
                		<div id="content2_leftbox" style="width: 100%;border:none;">
                        	<table width="100%" style="font-family:arial; font-size:15px; border-collapse:collapse;" cellspacing="0" >
                                    <tbody id="jobs">
					
                        <?php
							while($result=mysql_fetch_array($qwe)){
								$id=$result['id'];
								$post=$result['postname'];
								$vac=$result['noofvaccancy'];
								$loc=$result['location'];
								$ind=$result['industry'];
								$jobfun=$result['jobfunction'];
								$salfrm=$result['range1'];
								$salto=$result['range2'];
								$exp=$result['experience'];
								$shtdes=$result['shortdesc'];
								$date=$result['date'];
								$logo=$result['logo'];
							
						 ?>
                         <tr style="background:#fff; border:1px solid #ccc; border-collapse:collapse;">
                         	
                         	<td style=" padding:20px;">
                           
                            	<span>
                                <a href="job_details.php?id=<?=$id;?>" style="text-decoration:none; color: #900; font-size:18px; font-weight:bold;">
								<?php echo  $post; ?></a>
                                </span>
                                 <div style=" width:300px; height:auto; background:#f4ecec; border-radius:4px; border:1px solid #ccc; padding:10px; margin-top:10px;">
                                <span style="font-size:13px; line-height:2.0;">
                            	<span style="font-weight:bold; color:#000;">Industry : </span><?php
									$qry=mysql_query("select * from `industry` where `slno`='$ind'");
									$rs=mysql_fetch_array($qry);
									echo $rs['industry'];
								 ?> <br />
                                 <span style="font-weight:bold; color:#000;">Job Function : </span><?php
									$qry=mysql_query("select * from `job_function` where `slno`='$jobfun'");
									$rs=mysql_fetch_array($qry);
									echo $rs['jobfunction'];
								 ?> <br />
								<span style="font-weight:bold; color:#000;">No. of Vaccancy: </span>
                 				<?php echo $vac;?>
                                <br />			 
                            	<span style="font-weight:bold; color:#000;">Location : </span>
								<?php
									$qry=mysql_query("select * from `location` where `slno`='$loc'");
									$rs=mysql_fetch_array($qry);
									echo $rs['location'];
								 ?> <br />
                                <span style="font-weight:bold; color:#000;">Salary : </span> <?php echo $salfrm; ?> - <?php echo $salto; ?>
                               <br />
                                <span style="font-weight:bold; color:#000;">Experience : </span> <?php echo $exp; ?><br />
                               <span style="font-weight:bold; color:#000;"> Description : </span><?php echo htmlspecialchars_decode($shtdes); ?><br />
                              </span> 
                             </div>  
                           </td>
                          
                         
                            <td valign="middle" style="line-height:0.7; text-align:center;">
                            <span style="font-weight:bold; color:#000;">Date Posted :</span> <?php echo $date; ?>
                            <br />
                            <br />
							<?php echo "<img src=admin/". $logo. ">";?>
                            <br/>
                            <br/>
                            <input type="button" value="Apply" class="button3" onclick="window.location.href='job_details.php?id=<?=$id;?>'" style="margin-left:50px; width:180px; padding:7px; font-size:18px;"/>
			    			</td>
                         </tr>
                        <tr>
                          	<td colspan="2">&nbsp;</td>
                          </tr>
                          <?php } ?>
			  </tbody>	
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
