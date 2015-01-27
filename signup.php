<?php
include_once("function.php");
$degree='';
$qdegree=mysql_query("select * from `qualification`")or die(mysql_error());
while($rdegree=mysql_fetch_array($qdegree))
{
	$id=$rdegree['id'];
	$qual=$rdegree['qualification'];
$degree.='<option value='.$id.'>'.$qual.'</option>';
}

$fstudy='';
$getdrugdet=mysql_query("select * from `fieldofstudy`")or die(mysql_error());
while($resdrugdet=mysql_fetch_array($getdrugdet))
{
	$label=$resdrugdet['field'].'('.$resdrugdet['trade'].')';
	$id=$resdrugdet['id'];
	$fstudy.='<option value='.$id.'>'.$label.'</option>';	
}

$location='';

$sqlcountry=mysql_query("select * from `location`");
while($rescountry=mysql_fetch_array($sqlcountry))
{
$slno=$rescountry['slno'];
$loc=$rescountry['location'];
$location.='<option value='.$slno.'>'.$loc.'</option>';
}

$indusval='';

$sql=mysql_query("select * from `industry`");
while($res=mysql_fetch_array($sql)){
	$slno=$res['slno'];
$indusval.='<option value='.$slno.'>'.$res['industry'].'</option>';
}

$frommonthval='';
for ($i = 1; $i <= 12; $i++)
	{
$monthName = date('M', mktime(0, 0, 0, $i, 10));
$frommonthval.="<option value=".$i.">".$monthName."</option>";
}

$positionval='';
$sqlpos=mysql_query("select * from `position_level`");
while($respos=mysql_fetch_array($sqlpos)){
$positionval.="<option value=".$respos['slno'].">".$respos['position']."</option>";
}

$jobfunctionval='';

$sqljob=mysql_query("select * from `job_function`");
while($resjob=mysql_fetch_array($sqljob)){
$jobfunctionval.="<option value=".$resjob['slno'].">".$resjob['jobfunction']."</option>";
}

$language='';
$getdrugdet1=mysql_query("select * from `language`")or die(mysql_error());
while($resdrugdet1=mysql_fetch_array($getdrugdet1))
{
	$language.="<option value=".$resdrugdet1['slno'].">".$resdrugdet1['language']."</option>";
}

$qskill=mysql_query("select * from `skill`")or die(mysql_error());
	while($rskill=mysql_fetch_array($qskill))
	{
	$getemail[] = array(
		    'label'=>$rskill['skill'],
                    'idval' =>$rskill['slno']
        );
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></body>
</html>
<title>..::TOP RECRUITERS::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="style2.css" media="screen" rel="stylesheet" type="text/css" />
<link href="font.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">@font-face {
    font-family: 'EstrangeloEdessaRegular';
    src: url('font/estrangeloedessa.eot');
    src: url('font/estrangeloedessa.eot') format('embedded-opentype'),
         url('font/estrangeloedessa.woff2') format('woff2'),
         url('font/estrangeloedessa.woff') format('woff'),
         url('font/estrangeloedessa.ttf') format('truetype'),
         url('font/estrangeloedessa.svg#EstrangeloEdessaRegular') format('svg');
}
.heading{
    background: #efefef;
    color: #000;
    font-family:arial;
    font-size:14px;
    font-weight:bold;
    padding: 5px;
    width: 990px;
}
.righttext{
    width:35%;
    text-align:right;
    padding-right: 10px;
}
.input{
    float: left;
}
.smalltext{
    font-size:12px;
    color: #666;
    float: left;
    margin-left: 5px;
    margin-top: 5px;
}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
    var projects =<?= json_encode($getemail); ?>;
 
    $( ".skill" ).autocomplete({
      minLength: 0,
      source: projects,
      focus: function( event, ui ) {
        $(this).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $(this).val( ui.item.label );
        $(this).next().val( ui.item.idval );
        return false;
      }
    });
  });
	
	function addmorequalification()
	{
		$('#qualification').append('<tr><td class="righttext">Highest Qualification :</td><td><select class="input" name="highqualification[]" required><?=$degree;?></select></td></tr><tr><td class="righttext">Field Of Study :</td><td><select class="input" name="fstudy[]" required><?=$fstudy;?></select></td></tr><tr><td class="righttext">Institute/university</td><td><input name="institute[]" type="text" class="input"  required/></td></tr><tr><td class="righttext">Located In :</td><td><select class="input" name="located[]" required><?=$location;?></select></td></tr><tr><td class="righttext" style="vertical-align: top;">Graduation Date :</td><td><input name="graduation_date[]" type="text" class="input" style="width: 100px;" maxlength="4" required/>(YYYY)<br/> <br/></td></tr>');
	}
	
	var j=0;
	function addmorework()
	{
		j++;
		$('#workexperience').append('<tr><td class="righttext" style="font-weight:bold;">Work Experience '+j+'</td></tr><tr><td class="righttext">Company name <span style="color: red;">*</span>:</td><td><input name="company[]" type="text" class="input"  required/><span class="smalltext">Pls type the full name of the company</span></td></tr><tr><td class="righttext">Industry <span style="color: red;">*</span>:</td><td><select class="input" name="industry[]" required><?=$indusval;?></select></td></tr><tr><td class="righttext">Date Joined <span style="color: red;">*</span>:</td><td><select class="input" style="width: 147px; float: left;" name="fmonth[]"><?=$frommonthval?></select><input type="text" class="input" style="width: 147px; float: left; margin-left: 12px;" name="fyear[]" required></td></tr><tr><td class="righttext">Date Left <span style="color: red;">*</span>:</td><td><select class="input" style="width: 147px; float: left;" name="tmonth[]"><?=$frommonthval?></select><input type="text" class="input" style="width: 147px; float: left; margin-left: 12px;" name="tyear[]" required></td></tr><tr><td class="righttext">Job Title <span style="color: red;">*</span>:</td><td><input name="title[]" type="text" class="input" required /><span class="smalltext">Pls type the full name of the job Title</span></td></tr><tr><td class="righttext">Position Level <span style="color: red;">*</span>:</td><td><select class="input" name="position[]" required><?=$positionval;?></select></td></tr><tr><td class="righttext">Speciallization <span style="color: red;">*</span>:</td><td><select class="input" name="specialization[]" required><?=$jobfunctionval;?></select></td></tr><tr><td class="righttext">Role <span style="color: red;">*</span>:</td><td><input type="text" class="input" name="role[]" required></td></tr><tr><td class="righttext">Work Description <span style="color: red;">*</span>:</td></tr><tr><td colspan="2"><div style="width:55%; margin: auto;"><textarea name="workexpdesc[]"  class="input" style="width: 420px; height: 250px;" onkeyup="return countwork($(this));" onblur="return checkwork($(this));" required></textarea></div></td></tr><tr><td colspan="2"><div style="width:45%; margin: auto;"><span class="smalltext"> 100 to 3500 characters.Number of characters now:</span> <input name="" type="text" class="input" value="0" style="width: 100px;background: #efefef; margin-left: 22px;"  /></div></td></tr>');
		
	}
	
	function addmoreskill()
	{
		$('#skillmore').append('<tr><td>Skills<br/><input type="text" class="input skill" style="width: 270px;" required /><input name="skill[]" type="hidden" class="sk"/></td><td>Proficiency<br/><select class="input" name="profi[]" style="background: #fff;width: 158px; height: 28px; padding: 2px;"><option value="Advanced">Advanced</option><option value="Intermediate">Intermediate</option><option value="Basic">Basic</option></select></td></tr>');
		
		 var projects =<?= json_encode($getemail); ?>;
 
    $( ".skill" ).autocomplete({
      minLength: 0,
      source: projects,
      focus: function( event, ui ) {
        $(this).val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $(this).val( ui.item.label );
        $(this).next().val( ui.item.idval );
        return false;
      }
    });
    
	}
	
	function addmorelng() {
		$('#languagebox').append('<tr><td>Language<span style="color: red;">*</span><br/><select class="input" name="laguage[]" style="background: #fff;width: 158px; height: 28px; padding: 2px;" required><?=$language;?></select></td><td>Primary<span style="color: red;">*</span><br/><input type="radio" name="isprimary[]" value="Yes"/></td><td>Spoken<span style="color: red;">*</span><br/><select class="input" style="background: #fff;width: 70px; height: 28px; padding: 2px;" name="spoken[]"><option value="Poor">Poor</option><option value="Good">Good</option><option value="Average">Average</option><option value="Excellent">Excellent</option></select></td><td>Written<span style="color: red;">*</span><br/><select class="input" style="background: #fff;width: 70px; height: 28px; padding: 2px;" name="write[]"><option value="Poor">Poor</option><option value="Good">Good</option><option value="Average">Average</option><option value="Excellent">Excellent</option></select></td><td>Relevant certificates<br/><input type="text" name="certificate[]" class="input" style="background: #fff;width: 100px; height: 28px; padding: 2px;"></td></tr>');
	}
	
	function countwork(obj)
	{
		obj.parent().parent().parent().next().find('input').val(obj.val().length);
	}
	function checkwork(obj) {
		if(obj.val().length>3500)
		{
			alert('Exceed limit.');
			obj.val('').focus();
			return false;
		}
		else if(obj.val().length<100)
		{
			alert('Work Description must be greater than 100 character.');
			obj.val('').focus();
			return false;
		}
	}
	
	function checkother(obj) {
		if(obj.val().length>1000)
		{
			alert('Exceed limit.');
			obj.val('').focus();
			return false;
		}
		else if(obj.val().length<200)
		{
			alert('Description must be greater than 200 character.');
			obj.val('').focus();
			return false;
		}
	}
	
	function formvalidate() {
		 if ($('#expp').is(':checked')){
			if ($('#expc').val().length.trim()==0) {
				alert('Please fiil up your work experience.');
				$('#expc').val().focus();
				return false;
			}
		 }
	}
</script>
<!--------------------------header----------------------->
<?php include_once("topbar.php");?>
<!--------------------------header end----------------------->
<!--------------------------menu bar----------------------->
<?php include_once("menubar.php");?>
<!--------------------------menu bar end----------------------->
<!--------------------------content bar----------------------->
<div id="content_bar">
<div id="content_box" style="width: 1000px;">
    <h3 style="font-family: 'DaunPenhRegular'; font-size: 32px; font-weight:normal;margin: 0px;line-height: 1; margin-top: 30px;border-bottom:1px solid #333;">Account Registration<br/>
        <span style="font-size: 28px; color: #666;">Create Resume</span>
    </h3>
     <p class="text" style="padding-left: 5px;font-family:arial;font-size: 14px; color: #000; font-weight:bold;">
        Fields indicate with (<span style="color: red;">*</span>) are required.
    </p>
<div class="content_leftbar" style="width: 100%;height:auto;border:1px solid #dedede; margin-top: 0px;" >
   
<div class="heading" >Personal Particulars & Contact Details <span style="color: red;">*</span>(This Section is Required Field)</div>

<form method="post" action="resume_register.php" enctype="multipart/form-data" onsubmit="formvalidate();">
        <table style="width:100%;" align="center">
		<tr>
			<td class="righttext">Name :</td>
			<td><input name="fname" type="text" class="input" style="width: 140px;float: left;" required/>
				<input name="lname" type="text" class="input" style="width: 140px;float: left; margin-left: 12px;" required/></td>
		</tr>
                <tr>
                    <td class="righttext">Date Of Birth :</td>
                    <td>
                        <select class="input" style="width:50px; float: left;" name="day" required>
                            <?php
				for($i=1;$i<=31;$i++)
				{
				?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option> 
				<?php
				}
				?>
                        </select>
                         <select class="input" style="width:87px; float: left; margin-left: 10px;" name="mon" required>
                            <?php
				for ($i = 1; $i <= 12; $i++)
				{
				$monthName = date('M', mktime(0, 0, 0, $i, 10));	
				?>
				<option value="<?php echo $i;?>"><?php echo $monthName;?></option>
			<?php
				}
				?>
                        </select>
                         <input type="text" class="input" style="width: 140px;float: left; margin-left: 12px;" name="year" maxlength="4" required/>
                    </td>
                </tr>
               <tr>
                    <td class="righttext">Country Of Residence :</td>
                    <td>
                        <select class="input" name="country" required>
                            <?php
				$sqlcountry=mysql_query("select * from `country`");
				while($rescountry=mysql_fetch_array($sqlcountry)){
				?>
				<option value="<?php echo $rescountry['slno'];?>"><?php echo $rescountry['country'];?></option>
			<?php
				}
			?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <td class="righttext">State/Region :</td>
                    <td>
                        <select class="input" name="state" required>
                            <?php
				$sqlcountry=mysql_query("select * from `location`");
				while($rescountry=mysql_fetch_array($sqlcountry)){
				?>
				<option value="<?php echo $rescountry['slno'];?>"><?php echo $rescountry['location'];?></option>
			<?php
				}
			?>
                        </select>
                    </td>
               </tr>
		<tr>
                    <td class="righttext">Nationality :</td>
                    <td>
                        <select class="input" name="nationality" required>
                            <?php
				$sqlcitizenship=mysql_query("select * from `citizenship`");
				while($rescitizenship=mysql_fetch_array($sqlcitizenship)){
				?>
				<option value="<?php echo $rescitizenship['slno'];?>"><?php echo $rescitizenship['citizen'];?></option>
				<?php
				}
			?>
                        </select>
                    </td>
               </tr>
		<tr>
			<td rowspan="2" class="righttext" style="vertical-align: top;">Contact No :</td>
			<td><span style="float: left; margin-right: 5px;">Mobile :</span>
                        <select class="input" style="width:130px;" name="code">
				<?php
				$qcountrycode=mysql_query("select * from `country` where `countrycode`!=''")or die(mysql_error());
				while($countrycode=mysql_fetch_array($qcountrycode))
				{
					?>
					<option value="<?=$countrycode['countrycode'];?>"><?=$countrycode['countrycode'].'('.$countrycode['country'].')';?></option>
			    <?php
			    }
			    ?>
                        </select>
                        <input name="contact" type="text" class="input" placeholder="Number" style="width: 102px;float: left; margin-left: 12px;" required/>
                        </td>
		</tr>
                <tr>
                    <td><span style="width:36px;float: left; margin-right: 5px;">Tel :</span>
                        <input name="areacode" type="text" class="input" placeholder="Area code" style="width: 123px;float: left; margin-left: 12px;" required/>
                        <input name="tel" type="text" class="input" placeholder="Number" style="width: 102px;float: left; margin-left: 12px;" required/>
                        </td>
                </tr>
		<tr>
			<td class="righttext">Email</td>
			<td><input name="email" type="email" class="input" placeholder="koi0702@gmail.com" required/></td>
		</tr>
                <tr>
			<td class="righttext">Password</td>
			<td><input name="password" type="password" class="input"  id="pwd" required onblur="if(this.value.length<6){ alert('password must be greater than 6 character.'); $(this).val('').focus();}"/></td>
		</tr>
                <tr>
			<td class="righttext">Retype Password</td>
			<td><input type="password" class="input" onblur="if(this.value!=$('#pwd').val()){ alert('Password do not Match'); $(this).val('').focus();}" required/></td>
		</tr>
        </table>
	<div class="heading" >Highest Qualification <span style="color: red;">*</span>(This Section is Required Field)</div>
	<table style="width:100%;" align="center">
                <tr>
                    <td class="righttext">Highest Qualification :</td>
                    <td>
                        <select class="input" name="highqualification[]" required>
                           <?=$degree;?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <td class="righttext">Field Of Study :</td>
                    <td>
                        <select class="input" name="fstudy[]" required>
                            <?=$fstudy;?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <td class="righttext">Institute/university</td>
                    <td><input name="institute[]" type="text" class="input"  required/></td>
                </tr>
                <tr>
                    <td class="righttext">Located In :</td>
                    <td>
                        <select class="input" name="located[]" required>
                           <?=$location;?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <td class="righttext" style="vertical-align: top;">Graduation Date :</td>
                    <td><input name="graduation_date[]" type="text" class="input" style="width: 100px;" maxlength="4" required/>(YYYY)<br/> <br/>
		    <input type="hidden" name="hd_high[]" value="Highest" />
                    
                    </td>
                </tr>
		
		<tbody id="qualification"></tbody>
		<tr>
			<td>&nbsp;</td>
			<td>
				[<span style="color: rgb(106, 136, 189);cursor: pointer;" onclick="return addmorequalification();">Add 2nd Highest Qualification</span>]
			</td>
		</tr>
        </table>
        <div class="heading" >Work Experience <span style="color: red;">*</span>(This Section is Required Field)</div>
        <table style="width:100%;" align="center">
            <tr>
                <td class="righttext" rowspan="3" style="vertical-align: top;">Experience Level<span style="color: red;">*</span>:</td>
                <td>
                    <input type="radio" name="explevel" style="float: left;" id="expp"/><span style="float: left;" >I have been working since</span>
                        <input type="text" class="input" style="width: 60px; float: left; margin-left: 10px;" name="exp" id="expc"/>
                </td>
            
            </tr>
            <tr>
                <td> <input type="radio" name="explevel" style="float: left;" /><span style="float: left;" >I am a fresh graduate seeking my first job</span></td>
            </tr>
            <tr>
                <td> <input type="radio" name="explevel" style="float: left;" /><span style="float: left;" >I am a fresh student  seeking internship or part-time jobs</span></td>
            </tr>
            <tr>
                <td class="righttext" style="font-weight:bold;">Most Recent Job</td>
            </tr>
            <tr>
                <td class="righttext">Company name <span style="color: red;">*</span>:</td>
                <td><input name="company[]" type="text" class="input"  required/><span class="smalltext">Pls type the full name of the company</span></td>
            </tr>
            <tr>
                <td class="righttext">Industry <span style="color: red;">*</span>:</td>
                <td>
                    <select class="input" name="industry[]" required>
                        <?=$indusval;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="righttext">Date Joined <span style="color: red;">*</span>:</td>
                <td>
                    <select class="input" style="width: 147px; float: left;" name="fmonth[]">
                        <?=$frommonthval?>
                    </select>
                    <input type="text" class="input" style="width: 147px; float: left; margin-left: 12px;" name="fyear[]" required>
                </td>
            </tr>
             <tr>
                <td class="righttext">Date Left <span style="color: red;">*</span>:</td>
                <td>
                    <select class="input" style="width: 147px; float: left;" name="tmonth[]">
                         <?=$frommonthval?>
                    </select>
                   <input type="text" class="input" style="width: 147px; float: left; margin-left: 12px;" name="tyear[]" required>
			<input type="hidden" name="recent[]" value="current" />
                </td>
            </tr>
            <tr>
                <td class="righttext">Most Recent Job Title <span style="color: red;">*</span>:</td>
                <td><input name="title[]" type="text" class="input" required /><span class="smalltext">Pls type the full name of the job Title</span></td>
            </tr>
            <tr>
                <td class="righttext">Position Level <span style="color: red;">*</span>:</td>
                <td>
                    <select class="input" name="position[]" required>
                        <?=$positionval;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="righttext">Speciallization <span style="color: red;">*</span>:</td>
                <td>
                    <select class="input" name="specialization[]" required>
                        <?=$jobfunctionval;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="righttext">Role <span style="color: red;">*</span>:</td>
                <td>
                    <input type="text" class="input" name="role[]" required>
                </td>
            </tr>
             <tr>
                <td class="righttext">Work Description <span style="color: red;">*</span>:</td>
             </tr>
             <tr>
                <td colspan="2">
                    <div style="width:55%; margin: auto;">
                        <textarea name="workexpdesc[]"  class="input" style="width: 420px; height: 250px;" onkeyup="return countwork($(this));" onblur="return checkwork($(this));" required></textarea>
                    </div>
                </td>
             </tr>
             <tr>
                <td colspan="2">
                    <div style="width:45%; margin: auto;">
                    <span class="smalltext"> 100 to 3500 characters.Number of characters now:</span> <input name="" type="text" class="input" value="0" style="width: 100px;background: #efefef; margin-left: 22px;"  />
                   
                    </div>
                </td>
             </tr>
	     
	     <tbody id="workexperience"></tbody>
	     
	     <tr>
		<td>&nbsp;</td>
		<td>
			 [<span style="color: rgb(106, 136, 189);cursor: pointer;" onclick="return addmorework();">Add Another Work Experience</span>]
		</td>
	     </tr>
        </table>
         <div class="heading" >Language and Skills</div>
        <table style="width:100%;" align="center">
            <tr>
                <td colspan="2">
                   <div style="width:45%; margin: auto; min-height: 120px;height: auto;background: #efefef;">
                        <table  style="width:100%;">
                            <tr>
                                <td>Skills<br/>
                                 <input type="text" class="input skill" style="width: 270px;" required />
				 <input name="skill[]" type="hidden" class="sk"/>
                                </td>
                                <td>Proficiency<br/>
                                 <select class="input" name="profi[]" style="background: #fff;width: 158px; height: 28px; padding: 2px;">
                                    <option value="Advanced">Advanced</option>
				    <option value="Intermediate">Intermediate</option>
				    <option value="Basic">Basic</option>
                                </select>
                                </td>
                            </tr>
			    <tbody id="skillmore"></tbody>
                            <tr>
                                <td><p class="text4" style="font-size:20px;cursor: pointer;" onclick="return addmoreskill();"><img src="images/add.jpg" style="float: left; margin-right: 10px; margin-top: -2px;">Add Skill</p></td>
                            </tr>
                        </table>
                   </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                   <div style="width:55%; margin: auto; min-height: 140px;height: auto;background: #efefef;">
                        <table  style="width:100%;">
                            <tr>
                                <td colspan="5">Proficiency level :0-poor,10-Excellent</td>
                            </tr>
                            <tr>
                                <td>Language<span style="color: red;">*</span><br/>
                                 <select class="input" name="laguage[]" style="background: #fff;width: 158px; height: 28px; padding: 2px;" required>
                                    <?=$language;?>
                                </select>
                                </td>
                                <td>Primary<span style="color: red;">*</span><br/>
                                <input type="radio" name="isprimary[]" value="Yes"/></td>
                                <td>Spoken<span style="color: red;">*</span><br/>
                                 <select class="input" style="background: #fff;width: 70px; height: 28px; padding: 2px;" name="spoken[]" required>
					<option value="Poor">Poor</option>
					<option value="Good">Good</option>
					<option value="Average">Average</option>
					<option value="Excellent">Excellent</option>
                                </select>
                                </td>
                                <td>Written<span style="color: red;">*</span><br/>
                                 <select class="input" style="background: #fff;width: 70px; height: 28px; padding: 2px;" name="write[]" required>
					<option value="Poor">Poor</option>
                                   <option value="Good">Good</option>
					<option value="Average">Average</option>
					<option value="Excellent">Excellent</option>
                                </select>
                                </td>
                                <td>Relevant certificates<br/>
                                 <input type="text" name="certificate[]" class="input" style="background: #fff;width: 100px; height: 28px; padding: 2px;">
                                </td>
                            </tr>
			    <tbody id="languagebox"></tbody>
                            <tr>
                                <td><p class="text4" style="font-size:20px;cursor: pointer;" onclick="return addmorelng();"><img src="images/add.jpg" style="float: left; margin-right: 10px; margin-top: -2px;">Add Language</p></td>
                            </tr>
                        </table>
                   </div>
                </td>
            </tr>
        </table>
         <div class="heading" >Additional Info</div>
         <table style="width:100%;">
            <tr>
                <td colspan="2">
                    <div style="width:55%; margin: auto; height: 160px;background: #efefef;">
                        <table  style="width:100%; color: #888;">
                            <tr>
                                <td width="180">Expected Monthly Salary<span style="color: red;">*</span>:</td>
                                 <td>
                                    <select class="input" style="background: #fff;width: 100px; height: 28px; padding: 2px;" name="expcurency" required>
                                        <?php
					$sqlcurrency=mysql_query("select * from `currency`");
					while($rescurrency=mysql_fetch_array($sqlcurrency)){
					?>
					<option value="<?php echo $rescurrency['slno'];?>" <?php if($resuser['current_currency']==$rescurrency['slno']){echo "selected";}?>><?php echo $rescurrency['symbol'];?></option>
					<?php
					}
					?>
                                    </select>
                               
                                 <input type="text" name="expsalary" class="input" style="background: #fff;width: 158px; float: left; margin-left: 15px; height: 28px; padding: 2px;" required/>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3">Preferred Work Location<span style="color: red;">*</span>:</td>
                                 <td >
                                    <select class="input" style="background: #fff; height: 28px; padding: 2px;" name="prefl1" required>
                                        <option>-Select First Prefered Location</option>
					<?=$location;?>
                                    </select>
                                 </td>
                            </tr>
                            <tr>
                                <td> 
                                 <select class="input" style="background: #fff;  height: 28px; padding: 2px;" name="prefl2" required>
                                    <option>-Select Second Prefered Location (Optional)</option>
				    <?=$location;?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                  <select class="input" style="background: #fff;  height: 28px; padding: 2px;" name="prefl3" required>
                                    <option>-Select Third Prefered Location (Optional)</option>
				    <?=$location;?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" name="workinoversea" value="Yes">I want to work in any Overseas location </td>
                            </tr>
                        </table>
                   </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="width:65%; margin: auto; height: auto;">
                        Enter relevant information not provided elsewhere in your resume.Example:skills,vocational/on-the-job training,seminars/training attended, etc.
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <textarea name="otherinfo" class="input" style="width:630px; height: 350px;" onkeyup="$(this).parent().parent().next().find('input').val(this.value.length);" onblur="return checkother($(this));"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="float: right;">
                                    <span class="smalltext"> 200 to 1000 characters.Number of characters now:</span> <input name="" type="text" class="input" value="0" style="width: 100px;background: #efefef; margin-left: 22px;"  /><br/><br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            
         </table>
         
        <div class="heading" >Upload My Own resume</div>
        <table style="width: 100%;" align="center">
            <tr>
                <td class="righttext"></td>
                <td><input type="radio" >Upload My Own Resume<br/>
                <input type="file" name="upload" required/><br/>
                <span class="smalltext">Word(.doc or .docx),Text(.txt),Rich Text(.rtf)or PDF(.pdf)only.Word 95 documents are not accepted.File size must not exceed 300KB.</span>
                </td>
            </tr>
            <tr>
                <td class="righttext"></td>
                <td>Do not wish to receive notification about new job via:</td>
            </tr>
            <tr>
                <td class="righttext"></td>
                <td>
                    <span style="width: 100px;float: left; text-align: right;">Text Messages:</span>
                    <select class="input" style="width: 100px;background: #fff; height: 28px; margin-left: 15px; padding: 2px;" name="textmsgnf">
                                        <option value="Yes">Yes</option>
					<option value="No">No</option>
                </select>
                </td>
            </tr>
            <tr>
                 <td class="righttext"></td>
               
                <td>
                     <span style="width: 100px;float: left;text-align: right;">Email:</span>
                    <select class="input" style="width: 100px;background: #fff; margin-left: 15px;height: 28px; padding: 2px;" name="emailnf">
                        <option value="Yes">Yes</option>
			<option value="No">No</option>
                    </select>
                </td>
            </tr>
        </table>

</div>
<div style="width: 100%; float: left;">
    <p class="text" style="width:60%; margin: auto; padding-top: 10px; font-family:arial;  font-size:13px; text-align: center;">
    By Clicking on "Create My Resume",I have read and agreed to Top Recruiters Terms of Use and Privacy Policy.<br/><br/>
   <input name="" type="submit" value="Create My Resume" style="background: yellow; border:1px solid #888; padding: 5px; border-radius:5px; -moz-border-radius:5px;" /></td>
		
</p>
</div>
</form>

</div>
</div>
<!--------------------------content bar end-----------------------><!--------------------------footer bar-----------------------><?php 
include_once("footer1.php");
?><!--------------------------footer bar end----------------------->