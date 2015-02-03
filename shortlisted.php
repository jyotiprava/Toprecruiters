<?php
include_once("function.php");
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
<script src="admin/js/jquery-1.6.4.min.js" type="text/javascript"></script>
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
.table6 tr:nth-child(even) { 
background: #EAF4FF;
}
.table6 tr:nth-child(odd) {
background: #c5e2ff;
}
</style>
<link href="css/reveal.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="js/jquery.reveal.js"></script>
<script type="text/javascript">
function getidval(mail)
{
//alert(mail);
$('#myModal').hide();
var urlval="popup.php?eval="+mail;
$('#postdetails').attr('src',urlval);  
}
</script>
<style>
	    .shortlist{
		color:#797878 !important;
	    }
</style>
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
        		<div id="content2_left" style="width: 100%">
                		<div id="pg_box">
                        		
                                <div id="pg_listbox">
                                
                                </div>
                        </div>
                		<div id="content2_leftbox" style="border:none;width:85%">
                        	<table class="table6">
                            	<!--<tr class="tr2" style="background:#35557f;">
                            	    <th>Posting Date</th>
                                    <th>Job title</th>
                                    <th>Emailid</th>
                                    <th>Location</th>
                                    <th>Ref. No.</th>
                                </tr>
                                <?php
                                /*$qwey=mysql_query("select * from `alljob`")or die(mysql_error());
								while($rs=mysql_fetch_array($qwey)){
								$dt=$rs['date'];
												$date=date("d-m-Y",strtotime($dt));
								$qwe=mysql_query("select * from `location` where `slno`='$rs[location]'")or die(mysql_error());
								$res=mysql_fetch_array($qwe);
                                ?>
                                <tr>
                                    <td><?php echo $date; ?></td>
                                    <td style="color:#C60;"><?php echo $rs['postname'];?></td>
                                    <td>
								<?php
                                $qwery=mysql_query("select * from `job_apply` where `postid`='$rs[id]'")or die(mysql_error());
                                while($rest=mysql_fetch_array($qwery)){
                                    echo $rest['email'].'<br />';
                                }
                                ?>
                                </td>
                                    <td><?php echo $res['location'];?></td>
                                    <td><?php echo $rs['refno'];?></td>
                                </tr>
                                <?php }  */?>
				-->
				
				<tr class="tr2" style="background:#35557f;">
				    <th>Name</th>
                                    <th>Emailid</th>
                                    <th>Contact No</th>
                                    <th>Send Mail</th>
                                </tr>
				<?php
				$i=0;
				$qwery=mysql_query("select c.*,cv.`first_name`,cv.`last_name`,cv.`home_contact`,cv.`mobile_contact`,cv.`email` from `candidateshortlist` c,`cv_detail` cv where c.`emplerid`='$_SESSION[employer_idval]' and c.`shortlist`='1' and c.`emplyeid`=cv.`user_id`")or die(mysql_query());
				while($res=mysql_fetch_array($qwery))
				{
				    $i++;
				    ?>
				    <tr style="background: <?php if($i%2==0) echo '#efefef'; else echo '#fff';?>">
					<td><?=$res['first_name'].' '.$res['last_name'];?></td>
					<td><?=$res['email'];?></td>
					<td><?=$res['home_contact'].' / '.$res['mobile_contact'];?></td>
					<td><a href="#" style=" text-decoration:none" class="big-link2" data-reveal-id="myModal" data-animation="none" onclick="return getidval('<?=$res['email'];?>');"><button class="table_button2">send</button></a>                                                
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
