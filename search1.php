<?php
include_once("function.php");
$title=$_POST['title'];
$type=$_POST['type'];
$minexp=$_POST['minexp'];
$maxexp=$_POST['maxexp'];
$min_expsalry=$_POST['min_expsalry'];
$max_expsalry=$_POST['max_expsalry'];
$expect_currency1=$_POST['expect_currency1'];
$mincrntsalry=$_POST['min_crntsalry'];
$max_crntsalry=$_POST['max_crntsalry'];
$current_currency1=$_POST['current_currency1'];
$var='';
$chk='';
$chk1='';
$chk2='';
$chk3='';
$chk4='';
$chk5='';
$chk6='';
$chk7='';
$chk8='';
$checkbo=$_POST['checkbo'];
foreach($checkbo as $checkboval)
{
if($checkboval!=''){
$chk.="'".$checkboval."',";
}
}
$chkval=rtrim($chk,',');
//echo $chkval;

$company=$_POST['company'];
$comp_type=$_POST['comp_type'];
$chkspecialization=$_POST['chkspecialization'];
foreach($chkspecialization as $chkspecializationval)
{
if($chkspecializationval!=''){
$chk1.="'".$chkspecializationval."',";
}
}
$chkvall1=rtrim($chk1,',');
//echo $chkvall;

$sp_type=$_POST['sp_type'];
$chkindustry=$_POST['chkindustry'];
foreach($chkindustry as $chkindustryval)
{
if($chkindustryval!='')
{
$chk2.="'".$chkindustryval."',";
}
}
$chkvall2=rtrim($chk2,',');
//echo $chkvall1;

$indus_type=$_POST['indus_type'];

if($title!='')
{
$var.="(e.`title` like '%$title%' or c.`designation` like '%$title%') and";
}
if($type!='')
{
if($type=="current"){
$var.=" e.`type`='$type' and";
}
else if($type=="previous")
{
$var.=" e.`type`=' ' and";
}
}
if($minexp!='' && $maxexp!='')
{
$var.=" e.`total_experience` between $minexp and $maxexp and";
}
if($min_expsalry!='' && $max_expsalry!='')
{
$var.=" c.`expected_salary` between $min_expsalry and $max_expsalry and";
}
if($expect_currency1!='')
{
$var.=" c.`expected_currency`='$expect_currency1' and";
}
if($mincrntsalry!='' && $max_crntsalry!='')
{
$var.=" c.`current_salary` between $mincrntsalry and $max_crntsalry and";
}
if($current_currency1!='')
{
$var.=" c.`current_currency`='$current_currency1' and";
}
if($chkval!='')
{
$var.=" e.`position` IN ($chkval) and";
}
if($company!='')
{
$var.=" e.`company`='$company' and";
}
if($comp_type!='')
{
if($comp_type=="current"){
$var.=" e.`type`='$comp_type' and";
}
else if($comp_type=="previous")
{
$var.=" e.`type`=' ' and";
}
}
if($chkvall1!='')
{
$var.=" c.`jobfunction` IN ($chkvall1) and";
}
if($sp_type!='')
{
if($sp_type=="current"){
$var.=" e.`type`='$sp_type' and";
}
else if($sp_type=="previous")
{
$var.=" e.`type`=' ' and";
}
}
if($chkvall2!='')
{
$var.=" c.`industry` IN ($chkvall2) and";
}
if($indus_type!='')
{
if($indus_type=="current"){
$var.=" e.`type`='$indus_type' and";
}
else if($indus_type=="previous")
{
$var.=" e.`type`=' ' and";
}
}
/*$query="select c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`first_name`,c.`last_name`,e.`title`,e.`type`,e.`total_experience`,e.`position`,e.`company` from `experience` e INNER JOIN `cv_detail` c ON e.`user_id`=c.`user_id` and $var";
$query=preg_replace('/and$/', ' ', $query);
echo $query;
$sql=mysql_query($query."group by c.user_id")or die(mysql_error());*/


$chkqualification=$_POST['chkqualification'];
foreach($chkqualification as $chkqualificationval)
{
if($chkqualificationval!='')
{
$chk3.="'".$chkqualificationval."',";
}
}
$chkvall3=rtrim($chk3,',');
$field=$_POST['field'];
foreach($field as $fieldval)
{
if($fieldval!='')
{
$chk4.="'".$fieldval."',";
}
}
$chkvall4=rtrim($chk4,',');

$grade=$_POST['grade'];
foreach($grade as $gradeval)
{
if($gradeval!='')
{
$chk5.="'".$gradeval."',";
}
}
$chkvall5=rtrim($chk5,',');
$min_cgp=$_POST['min_cgp'];
$max_cgp=$_POST['max_cgp'];
$graduate_country=$_POST['graduate_country'];
foreach($graduate_country as $graduate_countryval)
{
if($graduate_countryval!='')
{
$chk6.="'".$graduate_countryval."',";
}
}
$chkvall6=rtrim($chk6,',');
$college=$_POST['college'];
$edu_type=$_POST['edu_type'];
$candidate=$_POST['candidate'];
$chkcountry=$_POST['chkcountry'];
foreach($chkcountry as $chkcountryval)
{
if($chkcountryval!='')
{
$chk7.="'".$chkcountryval."',";
}
}
$chkvall7=rtrim($chk7,',');
$chklocation=$_POST['chklocation'];
foreach($chklocation as $chklocationval)
{
if($chklocationval!='')
{
$chk8.=$chklocationval.",";
}
}
$chkvall8=rtrim($chk8,',');

$city=$_POST['city'];
if($chkvall3!='')
{
$var1.=" edu.`degree` IN ($chkvall3) and";
}
if($chkvall4!='')
{
$var1.=" edu.`field` IN ($chkvall4) and";
}
if($chkvall5!='')
{
$var1.=" edu.`grade` IN ($chkvall5) and";
}
if($min_cgp!='' && $max_cgp!='')
{
$var1.=" edu.`grade` between '$min_cgp' and '$max_cgp' and";
}
if($chkvall6!='')
{
$var1.=" edu.`country` IN ($chkvall6) and";
}
if($college!='')
{
$var1.=" edu.`institute` like '%$college%' and";
}
if($edu_type!='')
{
if($edu_type=="Highest Education"){
$var1.=" c.`education_type`='$edu_type' and";
}
else if($edu_type=="Any Education")
{
$var1.=" c.`education_type`='$edu_type' and";
}
}
if($candidate!='')
{
$dt=date('Y-m-d');
$n=$candidate;
$prev_month_ts = strtotime($dt .'-'.$n.'month');
$prev_month = date('Y-m-d', $prev_month_ts);
 $year1 = date('Y', strtotime($prev_month));
$var1.=" $year1 >=edu.`year` and";
}
if($chkvall7!='')
{
$var1.=" edu.`country` IN ($chkvall7) and";
}
if($chkvall8!='')
{
$var1.=" c.`preferd_location` IN ($chkvall8) and";
}
if($city!='')
{
$var1.=" c.`current_address` like '%$city%' or `permanent_address` like '%$city%' and";
}
/*if($var1!=""){
$query1="select c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`first_name`,c.`last_name`,edu.`degree`,edu.`field`,edu.`grade`,edu.`country`,edu.`institute` from `education` edu INNER JOIN `cv_detail` c ON edu.`user_id`=c.`user_id` and $var1";
$query1=preg_replace('/and$/', ' ', $query1);
echo '<br/>'.$query1;
$sql=mysql_query($query1."group by c.user_id")or die(mysql_error());
}*/


/*$query="select * from (select c.`first_name`, c.`last_name`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,e.`title`,e.`type`,e.`total_experience`,e.`position`,e.`company`  from `experience` e INNER JOIN `cv_detail` c ON e.`user_id`=c.`user_id` and $var )x union  
select c.`first_name`,c.`last_name`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,'' title,'' type,'' total_experience,'' position,'' company,edu.`degree`,edu.`field`,edu.`grade`,edu.`country`,edu.`institute`  from `education` edu INNER JOIN `cv_detail` c ON edu.`user_id`=c.`user_id` and $var1 union 
select  c.`first_name`,'' last_name  from `cv_detail` c INNER JOIN `language_details` lang ON lang.`user_id`=c.`user_id` and c.`gender`='any'";*/


//$sql=mysql_query($query."group by c.user_id")or die(mysql_error());


$min_age=$_POST['min_age'];
$max_age=$_POST['max_age'];
$gender=$_POST['gender'];
$language=$_POST['language'];
$language1=$_POST['language1'];
$fromday=$_POST['fromday'];
$frommonth=$_POST['frommonth'];
$fromyear=$_POST['fromyear'];

$today=$_POST['today'];
$tomonth=$_POST['tomonth'];
$toyear=$_POST['toyear'];

$smsnotice=$_POST['smsnotice'];
$emailnotice=$_POST['emailnotice'];

if($min_age!='' && $max_age!='')
{
$var2.=" c.`age` between '$min_age' and '$max_age' and";
}
if($gender!='')
{
$var2.=" c.`gender`='$gender' and";
}
if($language!='' or $language1!='')
{
$var2.=" lang.`language`='$language' or lang.`language`='$language1' and";
}
if($fromyear!="" && $frommonth!="" && $fromday!="" && $toyear!="" && $tomonth!="" && $today!="")
{
$joindate=$fromyear."-".$frommonth."-0".$fromday;
$joindate1=$toyear."-".$tomonth."-0".$today;
$var2.=" c.`join_date` between '$joindate' and '$joindate1' and";
}
if($smsnotice!='')
{
$var2.=" c.`nfbysms`='$smsnotice' and";
}
if($emailnotice!='')
{
$var2.=" c.`nfbyemail`='$emailnotice' and";
}
/*if($var2!=""){
$query2="select c.`age`,c.`gender`,c.`join_date`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`first_name`,c.`last_name`,lang.`language` from `cv_detail` c INNER JOIN `language_details` lang ON lang.`user_id`=c.`user_id` and $var2";
$query2=preg_replace('/and$/', ' ', $query2);
echo '<br/>'.$query2;
$sql=mysql_query($query2."group by c.user_id")or die(mysql_error());
}*/

if($var=='')
{
$var='and 1!=1';
}
else
{
$var='and'.$var;
$v=preg_replace('/and$/', ' ', $var);
}
if($var1=='')
{
$var1='and 1!=1';
}
else
{
$var1='and'.$var1;
$v1=preg_replace('/and$/', ' ', $var1);
}
if($var2=='')
{
$var2='and 1!=1';
}
else
{
$var2='and'.$var2;
$v2=preg_replace('/and$/', ' ', $var2);
}

$query="select * from (select * from (select c.`user_id`,c.`mobile_contact`,c.`email`,c.`updated_date`,c.`first_name`, c.`last_name`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,
c.`current_currency`,c.`jobfunction`,c.`industry`,c.`picture`,c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,c.`age`,c.`gender`,c.`join_date`,c.`nfbysms`,c.`nfbyemail`,c.`shortlisted`,
e.`title`,e.`type`,e.`total_experience`,e.`position`,e.`company`,'' degree,'' field,'' grade,'' country,'' institute,'' language  from `experience` e INNER JOIN 
`cv_detail` c ON e.`user_id`=c.`user_id` $v )x union  
select c.`user_id`,c.`mobile_contact`,c.`email`,c.`updated_date`,c.`first_name`,c.`last_name`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,
c.`industry`,c.`picture`,c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,c.`age`,c.`gender`,c.`join_date`,c.`nfbysms`,c.`nfbyemail`,c.`shortlisted`,'' title,'' type,'' total_experience,
'' position,'' company,edu.`degree`,edu.`field`,edu.`grade`,edu.`country`,edu.`institute`,'' language  from `education` edu INNER JOIN `cv_detail` c ON 
edu.`user_id`=c.`user_id` $v1 union 
select  c.`user_id`,c.`mobile_contact`,c.`email`,c.`updated_date`,c.`first_name`,c.`last_name`,c.`designation`,c.`expected_salary`,c.`expected_currency`,c.`current_salary`,c.`current_currency`,c.`jobfunction`,
c.`industry`,c.`picture`,c.`education_type`,c.`slno`,c.`preferd_location`,c.`current_address`,c.`age`,c.`gender`,c.`join_date`,c.`nfbysms`,c.`nfbyemail`,c.`shortlisted`,'' title,'' type,'' total_experience,
'' position,'' company,'' degree,'' field,'' grade,'' country,'' institute,lang.`language`  from `cv_detail` c INNER JOIN `language_details` 
lang ON lang.`user_id`=c.`user_id` $v2 ";
$queryy=$query.")u group by u.`user_id`";

//echo $queryy.'<br/>';
include_once('pagination.php');
echo $pagination;
$new_array=array();

						while($rescvdetails=mysql_fetch_array($res2))
						{ 
						$status=$rescvdetails['shortlisted']; 
						echo $status;
						array_push($new_array, $status);
						}
						if (in_array("0", $new_array))
						{
							echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return addallshort();'>Add All to Shortlist</span></div>";
						}
						else
						{
						echo "<div id='divid'><span style='float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;' onclick='return removeallshort();'>Remove All from shortlist</span></div>";
						}
?>
						<h2 class="head3" style="font-size:20px; text-align:center; margin-top:0px;">
								
								<?php echo $numm;?> Candidates found.
						</h2>
		<div id="content2_leftbox">
                
						<?php
						$nos=0;
						$cont='';
				 while($resdetails=mysql_fetch_array($res1))
				    { 
					$nos++;
					//echo $resdetails['user_id'];
					
					$userid=$resdetails['user_id'];
					$pic=$resdetails['picture'];
					$picval=explode('/',$pic);	 
$slno=$resdetails['slno']; 
						$cont.=$slno.",";						
		  
		  ?>

                  
<div class="left_listbox">
                                		<div class="left_listimg">
                                        		<a href="candidate1.php?slno=<?php echo $resdetails['slno'];?>">
												<?php
												if($pic=="images/default.jpg"){
												?>
												<img src="../images/default.jpg" style="width:100%;"/>
												<?php
												}
												else{
												?>
												<img src="<?php echo $picval[1]."/".$picval[2];?>" style="width:100%;"/>
												<?php
												}
												?>
												</a>
                                                <span>Expected Salary</span>
                                                <span style="font-size:17px;">
												<?php 
												$sqlcurrency=mysql_query("select * from `currency` where `slno`='$resdetails[expected_currency]'");
												$rescurrency=mysql_fetch_array($sqlcurrency);
												echo $rescurrency['symbol']." ".$resdetails['expected_salary'];
												?></span>
                                        </div>
                                        <div class="leftlist_textbox1">
                                        		<h3 class="head4"> 
							
                                                		<?php echo $nos;?>.<?php echo $resdetails['first_name']." ".$resdetails['last_name']; ?><!--(Malaysian/Singapore, PR)-->
							</h3>
                                                <p class="text4">
                                                Exp: 
												<?php
												$expr=$resdetails['experience_date'];
												if($expr!=""){
												$split=explode('-',$expr);
												$spiltyear=$split[0];
												$spiltmonth=$split[1];
												echo $spiltyear." yrs";
												}
												else
												{
												echo "0 yrs";
												}
												
												?>
                                                <br />
                                                Edu: 
												<?php 
												$sqllastt=mysql_query("select * from `education` where `education_type`='Highest' and `user_id`='$userid'");
											    $reslastt=mysql_fetch_array($sqllastt);
												$sqldegree=mysql_query("select `qualification` from `qualification` where `id`='$reslastt[degree]'");
												$resdegree=mysql_fetch_array($sqldegree);
												$sqlfield=mysql_query("select `field`,`trade` from `fieldofstudy` where `id`='$reslastt[field]'");
												$resfield=mysql_fetch_array($sqlfield);
												echo $resdegree['qualification']." in ".$resfield['field']."(".$resfield['trade']."),".$reslastt['country']."(".$reslastt['year'].")";
												//echo $resdegree['qualification'];
				
												?>	 
                                                <br />
                                                <br />
                                                Current Position:
						<?php
						$fetchexperience=mysql_query("select * from `experience` where `user_id`='$userid'");
						$resexperience=mysql_fetch_array($fetchexperience);
						echo $resexperience['title'];
					    ?>
                                                <br />
                                                <br />
						
                                               Pref Location: <?php
						$preferd_location=$resdetails['preferd_location'];
						$arr=explode(',',$preferd_location);
						foreach ($arr as & $value)
						{
						$floc=mysql_query("select * from `location` where `slno`='$value'");
						$rloc=mysql_fetch_array($floc);
						if($rloc['location']!=""){
						echo $rloc['location'].",";}
						}
						?><!--Johor Bahru, Kuala Lumpur, Melaka-->
						</br>Language:
						<?php 
						$contt="";
												$sqllng1=mysql_query("select * from `language_details` where `user_id`='$resdetails[user_id]'");
												//echo "select * from `language_details` where `user_id`='$res[user_id]'";
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
                                                		<li><i><img src="images/i1.jpg"/></i> <span>+<?php echo $resdetails['mobile_contact'];?></span></li>
                                                        <li><i><img src="images/i2.jpg"/></i> 
														<span>
														<?php
														
														$emll=$resdetails['email'];
														$xx=substr($emll,0,20)."<br/>";
														echo $xx;
														$lenn=strlen($emll);
														$restt=$lenn-20;
														$yy=substr($emll,20,$restt);
														echo $yy;
														?>
														</span></li>
                                                        <li><i><img src="images/i3.jpg"/></i> <span><?php echo $resdetails['age']; ?></span></li>
                                                        <li><i><img src="images/i4.jpg"/></i> <span>
														<?php 
														$crntaddress=$resdetails['current_address'];
														$ext=explode('/',$crntaddress);
														$address=$ext[0].",".$ext[1];
														echo html_entity_decode($address);
														?></span></li>
                                                </ul>
                                        </div>
										<div style="width:430px; float: left;margin-left: 40px;">
					 <?php
					 if($resdetails['shortlisted']==0){
					 ?>
					 <span style="float: left;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return addshort(<?php echo $resdetails['slno']; ?>);" id="addid<?php echo $resdetails['slno']; ?>">Add to Shortlist </span>
					 <?php
					 }
					 else{
					 ?>
						<span style="float: left; margin-left: 10px;color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return removeshort(<?php echo $resdetails['slno']; ?>);" id="remvid<?php echo $resdetails['slno']; ?>">Remove from Shortlist</span>
					<?php
					 }
					?>
					</div>
                                        <div class="date">
                                        		Last Updated:
												<?php
												$date=$resdetails['updated_date'];
												if($date!='0000-00-00 00:00:00'){
												$getday=date('d', strtotime($date));	
												echo $getday." ";	
$getmonth=date('m', strtotime($date));		
$monthName = date('M', mktime(0, 0, 0, $getmonth, 10));	
echo 	$monthName." ";		
$getyear=date('Y', strtotime($date));
echo 	$getyear;		
}
else{}			
												?>
												
                                        </div>
	</div>
<?php
}
?>	
        <input type='hidden' name='hid' id='hid_slno' value='<?php echo $cont; ?>' />
               
        </div>


