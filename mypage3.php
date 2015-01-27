<?php
include_once("function.php");
//is_login();
$email=$_SESSION['userid'];
$sqluser=mysql_query("select * from `user_detail` where `emailid`='$email'");
$resuser=mysql_fetch_array($sqluser);
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
.button1{
margin-left:0px;
}
.textbox{
width:250px;

}

</style>
<script>
    function showhide()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
     }
</script>
<style type="text/css">
                    body {
                        background: #f0f0f0;
                        margin: 0;
                        padding: 0;
                        font: 10px normal Verdana, Arial, Helvetica, sans-serif;
                        color: #444;
                    }
                    h1 {font-size: 3em; margin: 20px 0;}
                    .container {width: 500px; margin: 10px auto;}
                    ul.tabs {
                        margin: 0;
                        padding: 0;
                        float: left;
                        list-style: none;
                        height: 32px;
                        border-bottom: 1px solid #999;
                        border-left: 1px solid #999;
                        width: 100%;
                    }
                    ul.tabs li {
                        float: left;
                        margin: 0;
                        padding: 0;
                        height: 31px;
                        line-height: 31px;
                        border: 1px solid #999;
                        border-left: none;
                        margin-bottom: -1px;
                        background: #e0e0e0;
                        overflow: hidden;
                        position: relative;
                    }
                    ul.tabs li a {
                        text-decoration: none;
                        color: #000;
                        display: block;
                        font-size: 1.2em;
                        padding: 0 20px;
                        border: 1px solid #fff;
                        outline: none;
                    }
                    ul.tabs li a:hover {
                        background: #ccc;
                    }	
                    html ul.tabs li.active, html ul.tabs li.active a:hover  {
                        background: #fff;
                        border-bottom: 1px solid #fff;
                    }
                    .tab_container {
                        border: 1px solid #999;
                        border-top: none;
                        clear: both;
                        float: left; 
                        width: 100%;
                        background: #fff;
                        -moz-border-radius-bottomright: 5px;
                        -khtml-border-radius-bottomright: 5px;
                        -webkit-border-bottom-right-radius: 5px;
                        -moz-border-radius-bottomleft: 5px;
                        -khtml-border-radius-bottomleft: 5px;
                        -webkit-border-bottom-left-radius: 5px;
                    }
                    .tab_content {
                        padding: 20px;
                        font-size: 1.2em;
						padding-top:0px;
                    }
                    .tab_content h2 {
                        font-weight: normal;
                        padding-bottom: 10px;
                        border-bottom: 1px dashed #ddd;
                        font-size: 1.8em;
                    }
                    .tab_content h3 a{
                        color: #254588;
                    }
                    .tab_content img {
                        float: left;
                        margin: 0 20px 20px 0;
                        border: 1px solid #ddd;
                        padding: 5px;
                    }
                    
                    ul.tabs1 {
                        margin: 0;
                        padding: 0;
                        float: left;
                        list-style: none;
                        height: 32px;
                        border-bottom: 1px solid #999;
                        border-left: 1px solid #999;
                        width: 100%;
                    }
                    ul.tabs1 li {
                        float: left;
                        margin: 0;
                        padding: 0;
                        height: 31px;
                        line-height: 31px;
                        border: 1px solid #999;
                        border-left: none;
                        margin-bottom: -1px;
                        background: #e0e0e0;
                        overflow: hidden;
                        position: relative;
                    }
                    ul.tabs1 li a {
                        text-decoration: none;
                        color: #000;
                        display: block;
                        font-size: 1.2em;
                        padding: 0 20px;
                        border: 1px solid #fff;
                        outline: none;
                    }
                    ul.tabs1 li a:hover {
                        background: #ccc;
                    }	
                    html ul.tabs1 li.active, html ul.tabs1 li.active a:hover  {
                        background: #fff;
                        border-bottom: 1px solid #fff;
                    }
                    .tab_container1 {
                        border: 1px solid #999;
                        border-top: none;
                        clear: both;
                        float: left; 
                        width: 100%;
                        background: #fff;
                        -moz-border-radius-bottomright: 5px;
                        -khtml-border-radius-bottomright: 5px;
                        -webkit-border-bottom-right-radius: 5px;
                        -moz-border-radius-bottomleft: 5px;
                        -khtml-border-radius-bottomleft: 5px;
                        -webkit-border-bottom-left-radius: 5px;
                    }
                    .tab_content1 {
                        padding: 20px;
                        font-size: 1.2em;
						padding-top:0px;
                    }
                    .tab_content1 h2 {
                        font-weight: normal;
                        padding-bottom: 10px;
                        border-bottom: 1px dashed #ddd;
                        font-size: 1.8em;
                    }
                    .tab_content1 h3 a{
                        color: #254588;
                    }
                    .tab_content1 img {
                        float: left;
                        margin: 0 20px 20px 0;
                        border: 1px solid #ddd;
                        padding: 5px;
                    }
					.txtarea
					{
					height:45px; width:200px;
					}
					.textbox
					{
					font-size:16px;
					}
					.tbl
					{
					font-size:14px;
					}
					.font
					{
					color:#0fd0f9;
					font-size:16px;
                                        font-weight:normal;
					}
                    </style>
                    <script type="text/javascript"src="js/jquery.js"></script>
                    <script type="text/javascript">
                    
                    $(document).ready(function() {
                    
                        //Default Action
                        $(".tab_content").hide(); //Hide all content
                        $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                        $(".tab_content:first").show(); //Show first tab content
                        
                        //On Click Event
                        $("ul.tabs li").click(function() {
                            $("ul.tabs li").removeClass("active"); //Remove any "active" class
                            $(this).addClass("active"); //Add "active" class to selected tab
                            $(".tab_content").hide(); //Hide all tab content
                            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                            $(activeTab).fadeIn(); //Fade in the active content
                            return false;
                        });
                    
                    
                         //Default Action
                        $(".tab_content1").hide(); //Hide all content
                        $("ul.tabs1 li:first").addClass("active").show(); //Activate first tab
                        $(".tab_content1:first").show(); //Show first tab content
                        
                        //On Click Event
                        $("ul.tabs1 li").click(function() {
                            $("ul.tabs1 li").removeClass("active"); //Remove any "active" class
                            $(this).addClass("active"); //Add "active" class to selected tab
                            $(".tab_content1").hide(); //Hide all tab content
                            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                            $(activeTab).fadeIn(); //Fade in the active content
                            return false;
                        });
                        
                    });
                    </script>

 <!-- Load TinyMCE-->
 <script src="js/setup.js" type="text/javascript"></script>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
	
            setupTinyMCE();

        });
		
    </script>
	
    <!-- /TinyMCE -->
    <script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}
</script>
<script>
		function validate()
		{
		var presel=document.getElementById('prefix');
		var strpre = presel.options[presel.selectedIndex].value;
		var fname=document.getElementById('fnamee').value;
		var lname=document.getElementById('lnamee').value;
		var citisel=document.getElementById('citizen');
		var strciti = citisel.options[citisel.selectedIndex].value;
		var phonee=document.getElementById('phone').value;
		var countsel=document.getElementById('count');
		var strcount = countsel.options[countsel.selectedIndex].value;
		var postsel=document.getElementById('post').value;
		var agesel=document.getElementById('age').value;
		var nationsel=document.getElementById('nation').value;
		var addrval=tinyMCE.get('addrs').getContent();
		var expsel=document.getElementById('exp').value;
		var edusel=tinyMCE.get('edu').getContent();
		var coursesel=document.getElementById('course').value;
		var cpositionsel=document.getElementById('cposition').value;
		var ppositionsel=document.getElementById('pposition').value;
		var indussel=document.getElementById('indus');
		var strindus = indussel.options[indussel.selectedIndex].value;
		var jobsel=document.getElementById('job');
		var strjob = jobsel.options[jobsel.selectedIndex].value;
		var locsel=document.getElementById('loc');
		var strloc = locsel.options[locsel.selectedIndex].value;
		var expsalarysel=document.getElementById('expsalary').value;
		
		if(strpre=="0")
		{
		alert("Choose  prefix");
		return false;
		}
		if(fname=="")
		{
		alert("Enter your firstname");
		return false;
		}
		if(lname=="")
		{
		alert("Enter your lastname");
		return false;
		}
		if(strciti=="0")
		{
		alert("Choose  citizenship");
		return false;
		}
		if(phonee=="")
		{
		alert("Enter your Contactno");
		return false;
		}
		if(phonee!="" && phonee.length<10)
	{
	 alert("Enter 10 digit contact number");

			return false;
	}
	if(phonee!="" && phonee.length>10)
	{
	 alert("Enter 10 digit contact number");
	return false;
	}
		if(strcount=="0")
		{
		alert("Choose a country");
		return false;
		}
		if(postsel=="")
		{
		alert("Enter your postalcode");
		return false;
		}
		if(agesel=="")
		{
		alert("Enter your age");
		return false;
		}
		if(nationsel=="")
		{
		alert("Enter your nationality");
		return false;
		}
		if(addrval=="")
		{
		alert("Enter your address");
		return false;
		}
		if(expsel=="")
		{
		alert("Enter your experience");
		return false;
		}
		if(edusel=="")
		{
		alert("Enter your education details");
		return false;
		}
		if(coursesel=="")
		{
		alert("Enter your last appeared course");
		return false;
		}
		if(document.myfrm.jobtype[0].checked==false && document.myfrm.jobtype[1].checked==false)
		{
		alert("choose a jobtype");
		return false;
		}
		if(cpositionsel=="")
		{
		alert("Enter your current position");
		return false;
		}
		if(ppositionsel=="")
		{
		alert("Enter your previous position");
		return false;
		}
		if(strindus=="0")
		{
		alert("Choose a industry");
		return false;
		}
		if(strjob=="0")
		{
		alert("Choose a jobfunction");
		return false;
		}
		if(strloc=="0")
		{
		alert("Choose a location");
		return false;
		}
		if(expsalarysel=="")
		{
		alert("Enter your expected salary");
		return false;
		}
		 if($('.chk').is(":checked")) 
			 {
			 return true;
			 }
			 else{
			 alert("Choose a preferred location");
			 return false;
			 }
		
	}

	</script>
	<script>
	
    $(function(){
	var i=1;
	
	    $('#add1').click(function () {
		i++;
		$.ajax({url:"langauge_detail.php?ival="+i,success:function(result){
               $("#tbb").append(result);
                }}); 
		}); 
	   });
	</script>
	 <script type="text/javascript">
		function delete_row(ival){
			var con=confirm("Do you want to delete?");
			if(con){
			$('#'+ival).remove();
			}
		}
</script>
<style>
	.textbox2 {
	width:250px;
	height:25px;
	border: 1px solid #c7c7c7;
	font-family: 'Conv_estre';
	padding-left: 5px;
	font-size: 18px;
	}
	.box3{ width:300px; height:100px; float:left; border:1px solid #ccc; padding:10px;}
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
        		<h3 class="head3" style="margin-top:15px; margin-bottom:0px;">My Page Detail</h3>
                
        		<div style="width:180px; height:auto; float:left; margin-top:15px;">
                		<div class="list_box1">
                        		<img src="images/pas.png"  style="width:96%; margin-left:2%;"/>
                        </div>
                        <div class="list_box1" style="padding:5px;">
                        		<ul>
                                		<a href="#"><li>View Profile</li></a>
                                        <a href="mypage2.php"><li>Edit Profile</li></a>
                                        <a href="#"><li>Change Password</li></a>
                                        <a href="#"><li>Job Application</li></a>
                                </ul>
                        </div>
                </div>
                <div id="content2_right" style="width:800px; margin-left:20px;">
                <div class="container" style="width:100%">
            		<table class="tbl">
						<tr>
							<td colspan="2">Name</td>
							<td><input type="text" name="" id="" class="textbox2" /></td>						
						</tr>
                        <tr>
							<td colspan="2">Total Experience</td>
							<td><input type="text" name="" id="" class="textbox2" /></td>						
						</tr>
                        <tr>
							<td colspan="2">Designation</td>
							<td><input type="text" name="" id="" class="textbox2" /></td>						
						</tr>
                        <tr>
							<td colspan="2">Contact</td>
							<td><input type="text" name="" id="" class="textbox2" /></td>						
						</tr>
                        <tr>
							<td colspan="2">Email</td>
							<td><input type="text" name="" id="" class="textbox2" /></td>						
						</tr>
                     </table>
                </div>   
                  <h2 style="color: #900; font-size:25px;">Hot Jobs</h2>
                  <div style="width:100%; height:auto; float:left;">
                        <div class="box3">
                                &nbsp;
                        </div>
                        <div class="box3" style="margin-left:15px;">
                                &nbsp;
                        </div>
                        <div class="box3" style=" margin-top:15px;">
                                &nbsp;
                        </div>
                        <div class="box3" style="margin-left:15px; margin-top:15px;">
                                &nbsp;
                        </div>
                  </div>  
                  <p style="margin-top:20px; float:left;">Display jobs depends on the developer choice.Once user set the skill and interest  then  job will be list about according to that. </p>		
		</div>
		</div>
</div>

<!--------------------------content bar end----------------------->

<!--------------------------footer bar----------------------->
<?php
include_once('footer.php');
?>
<!--------------------------footer bar end----------------------->
</body>
</html>
