<?php
include_once("../function.php");
is_admin();
$id=$_GET['id'];
$qskill=mysql_query("select `keyskill` from `alljob` where `id`='$id'")or die(mysql_rror());
$rskill=mysql_fetch_array($qskill);
 
$qwery=mysql_query("select distinct(`slno`) as slno,`first_name`,`last_name`,`email`,`picture`,`expected_salary`,`experience`,`last_course`,`current_position`,`preferd_location`,`user_id`,`contact`,`age`,`updated_date` from (
select c.* from `cv_detail` c,`alljob` a where a.`id`='$id' and a.`jobfunction`=c.`jobfunction`
union
select * from `cv_detail` cv where cv.`advanced` in($rskill[keyskill]) or cv.`intermediate` in($rskill[keyskill]) or cv.`basic`
 in($rskill[keyskill])) d")or die(mysql_error());

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--menu start-->
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
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
<style>
.left_listbox{ width:761px; height:auto; float:left; padding: 10px; border-radius:8px; -moz-border-radius:8px; margin-left: 8px; border:2px solid #dedede; padding-bottom:5px; margin-bottom:10px;}
.left_listimg{ width:150px; height:auto; float:left; font-family: 'Conv_estre'; text-align:center; font-size:14px; color:#ababab;}
.leftlist_textbox1{ width:250px; height:auto; float:left;font-size:15px; color:#3a52a0; margin-left:30px;}
.leftlist_textbox2{ width:270px; height:auto; float:left; margin-left:30px;}
.text4{
    font-family:arial;
    font-size:12px;
    line-height: 1.5;
}
.date{
    width: 100%;
    float: left;
    text-align: right;
}
.left_contectlist {
    margin: 0px;
    padding: 0px;
    font-family:arial;
    font-size: 15px;
    color: #3A52A0;
    list-style-type: none;
    line-height: 2.1;
}
</style>
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
								<a href=""><?php
								if(isset($_SESSION['user'])){
								echo "Superadmin";
								}
								else{echo "Admin";}
								?></a>
								
								  
						</div>
						<div id="content1">
								<div class="head2">
										Sugggest To Employee
								</div>
								<div id="content2" style="min-height:350px;">
	<?php
	while($res=mysql_fetch_array($qwery))
	{
	    $qcheck=mysql_query("select * from `job_apply` where `postid`='$id' and `employee_id`='$res[slno]'")or die(mysql_error());
	    if(mysql_num_rows($qcheck)==0)
	    {
		
	    $qsuggest=mysql_query("select * from `admin_suggest` where `jobid`='$id' and `userid`='$res[slno]'")or die(mysql_error());
	    ?>
		<div class="left_listbox" >
                                		<div class="left_listimg">
                                        		<img src="../<?=$res['picture'];?>" style="width:100%;"/>
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">MYR <?=$res['expected_salary'];?></span>
                                        </div>
                                        <div class="leftlist_textbox1">
                                        		<h3 class="head4">
                                                		1. <?=$res['first_name'].' '.$res['last_name'];?>
							</h3>
                                                <p class="text4">
                                                Exp: <?=$res['experience'];?>yrs
                                                <br />
                                                Edu: <?php echo htmlspecialchars_decode($res['last_course']);?>
                                                <br />
                                                
                                                <br />
                                                Current Position: <?php echo html_entity_decode($res['current_position']);?>
                                                <br />
                                                <br />
                                                Pref Location:
						<?php
						$ploc=$res['preferd_location'];
						$lc=explode(',',$ploc);
						$cont='';
						foreach($lc as $lc1)
						{
						if($lc1!=''){
						    $sqlloc=mysql_query("select * from `location` where `slno`='$lc1'");
						    $rowloc=mysql_fetch_array($sqlloc);
						    $plocation=$rowloc['location'];
						    $cont.=$plocation.",";
						}
						}
						echo $cont;
						?>
						<br/>
						<br/>
						Language:
						<?php 
						$contt="";
						$sqllng1=mysql_query("select * from `language_details` where `user_id`='$res[user_id]'");
						while($rowlngg1=mysql_fetch_array($sqllng1)){
							$langg1=$rowlngg1['language'];
							$langname1=mysql_query("select * from `language` where `slno`='$langg1'");
							$rowname1=mysql_fetch_array($langname1);
							$contt=$contt.",".$rowname1['language'];
						}
						$lngname1=ltrim($contt,",");
						echo $lngname1;
						?>
                                                </p>
                                        </div>
                                        <div class="leftlist_textbox2">
                                        		<ul class="left_contectlist">
                                                	<li><i><img src="../images/i1.jpg"/></i> <span>+<?=$res['contact'];?></span></li>
                                                        <li><i><img src="../images/i2.jpg"/></i> <span><?=$res['email'];?></span></li>
                                                        <li><i><img src="../images/i3.jpg"/></i> <span><?=$res['age'];?> yrs old</span></li>
                                                        <li><i><img src="../images/i4.jpg"/></i> <span>Bandar Tun Razak, Pahang</span></li>
                                                </ul>
					
                                        </div>
                                        <div class="date" >
                                        		Last Updated: <?php
												$date=$res['updated_date'];
												if($date!='0000-00-00 00:00:00'){
												$getday=date('d', strtotime($date));	
												echo $getday." ";	
$getmonth=date('m', strtotime($date));		
$monthName = date('F', mktime(0, 0, 0, $getmonth, 10));	
echo 	$monthName." ";		
$getyear=date('Y', strtotime($date));
echo 	$getyear;		
}
			
												?>
							<br/>
							<?php
							if(mysql_num_rows($qsuggest)==0)
							{
							    ?>
							<input type="button" class="button" value="Suggest" onclick="window.location.href='suggest_maile.php?slno=<?=$res['slno'];?>&jid=<?=$id;?>'"/>
							<?php
							}
							else
							{
							?>
							<input type="button" class="button" value="Suggested"/>
							<?php
							}
							?>
                                        </div>
		</div>    
								    
	<?php
	    }
	}
	?>  
					 
								    
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