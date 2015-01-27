<?php
include_once("function.php");
is_login();

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
.textbox1 {
width:150px;
height: 30px;
border: 1px solid #c7c7c7;
font-family: 'Conv_estre';
padding-left: 5px;
font-size: 18px;
}

.textbox2 {
width:150px;
height:25px;
border: 1px solid #c7c7c7;
font-family: 'Conv_estre';
padding-left: 5px;
font-size: 18px;
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
                         font-size:16px;
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
                        font-size: 14px;
						padding-top:0px;
                    }
                    .tab_content h2 {
                        font-weight: normal;
                        padding-bottom: 10px;
                        border-bottom: 1px dashed #ddd;
                         font-size: 18px;
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
					.txtbox
					{
					width:60px; height:15px;
					}
					.textbox5
					{
					width:200px;
					height:20px;
					}
					.textbox6
					{
					width:190px;
					height:15px;
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

                  <script src="js/jquery-1.10.2.min.js"></script>
                  <script src="js/jquery.form.js"></script> 
                    
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
	
          // setupTinyMCE();

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
  <script type="text/javascript">
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false //disable key press
}
}
 $(function(){
	    $('#yesid').click(function () {
		$('#exp_sp').show();
		$('#psal').show();
		}); 
		 $('#noid').click(function () {
		$('#exp_sp').hide();
		$('#psal').hide();
		}); 
		 if($('#yesid').is(":checked"))
		 {
		 $('#exp_sp').show();
		 $('#psal').show();
		 }
	   });
</script>

<script type="text/javascript">
function myfunction(sid){
$.ajax({
       url:"ajax_addskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_add").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill('+r[0]+');">X</span></div>');
	 var oldvalue=$("#advance_add").val();
	 if (oldvalue) {
			$("#advance_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#advance_add").val(r[0]);	
        }		
       }
});
}

function myfunctionedit(sid){
$.ajax({
       url:"ajax_addskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill('+r[0]+');">X</span></div>');
	 var oldvalue=$("#advance_edit").val();
	 if (oldvalue) {
			$("#advance_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#advance_edit").val(r[0]);	
        }		
       }
});
}


function cancelskill(sid)
{
$('#skill'+sid).remove();
var oldval=$('#advance_add').val();
oldval=oldval.replace(sid, "");
$('#advance_add').val(oldval);
}

function cancelskille(sid)
{
alert(sid);
$('#skill'+sid).remove();
var oldval=$('#advance_edit').val();
oldval=oldval.replace(sid, "");
$('#advance_edit').val(oldval);
}

function myfunction1(sid){
$.ajax({
       url:"ajax_interskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_inter").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill1'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill1('+r[0]+');">X</span></div>');
	 var oldvalue=$("#intermediate_add").val();
	 if (oldvalue) {
			$("#intermediate_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#intermediate_add").val(r[0]);	
        }		
       }
});
}

function myfunction1edit(sid){
$.ajax({
       url:"ajax_interskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_inter_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill1'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill1('+r[0]+');">X</span></div>');
	 var oldvalue=$("#intermediate_edit").val();
	 if (oldvalue) {
			$("#intermediate_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#intermediate_edit").val(r[0]);	
        }		
       }
});
}

function cancelskill1(sid)
{
$('#skill1'+sid).remove();
var oldval=$('#intermediate_add').val();
oldval=oldval.replace(sid, "");
$('#intermediate_add').val(oldval);
}
function cancelskille1(sid)
{
$('#skill'+sid).remove();
var oldval=$('#intermediate_edit').val();
oldval=oldval.replace(sid, "");
$('#intermediate_edit').val(oldval);
}

function myfunction2(sid){
$.ajax({
       url:"ajax_basicskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_basic").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill2'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill2('+r[0]+');">X</span></div>');
	 var oldvalue=$("#basic_add").val();
	 if (oldvalue) {
			$("#basic_add").val(oldvalue+','+r[0]);
	 }
         else{
		$("#basic_add").val(r[0]);	
        }		
       }
});
}

function myfunction2edit(sid){
$.ajax({
       url:"ajax_basicskill.php?id="+sid,
       success:function(result){
         var r=result.split(',');
	 $("#advance_skill_basic_edit").append('<div style=" float:left;width:auto;height:auto;padding:5px;border:1px solid #FFCC00; margin-left:5px; margin-top:5px;" id="skill2'+r[0]+'">'+r[1]+'<span style="width:10px;float:right;color:red;cursor:pointer;" onclick="return cancelskill2('+r[0]+');">X</span></div>');
	 var oldvalue=$("#basic_edit").val();
	 if (oldvalue) {
			$("#basic_edit").val(oldvalue+','+r[0]);
	 }
         else{
		$("#basic_edit").val(r[0]);	
        }		
       }
});
}

function cancelskill2(sid)
{
$('#skill2'+sid).remove();
var oldval=$('#basic_add').val();
oldval=oldval.replace(sid, "");
$('#basic_add').val(oldval);
}
function cancelskille2(sid)
{
$('#skill'+sid).remove();
var oldval=$('#basic_edit').val();
oldval=oldval.replace(sid, "");
$('#basic_edit').val(oldval);
}

function selectedskill() {
       var skilid=$('#advance_edit').val();
       $.ajax({
	   url:"ajax_selectedskill.php?id1="+skilid,
	   success:function(result){
	     $("#select").html(result); 
	   }
       });
      
}

function selectedskillbasic() {
       var skilid=$('#advance_edit').val();
       var skilid1=$('#intermediate_edit').val();
	   var sklid=skilid+","+skilid1;
       $.ajax({
	   url:"ajax_selectedskillbasic.php?id="+sklid,
	   success:function(result){
	     $("#select1").html(result); 
	   }
       });
      
}
function getsubspecial(jobval)
		{
		 $.ajax({url:"sub_specialize1.php?jobidval="+jobval,
			   success:function(results)
			   {
			    $('#subid').html(results);
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
        		<h3 class="head3" style="margin-top:15px; margin-bottom:0px;">My Page Detail</h3>
                
        		<div style="width:180px; height:auto; float:left; margin-top:15px;">
                		<div class="list_box1">
                                     <?php
                                    $qimage=mysql_query("select `picture` from `cv_detail` where `user_id`='$_SESSION[useridval]'")or die(mysql_error());
                                    $rimage=mysql_fetch_array($qimage);
                                    ?>
                        		<img src="<?=$rimage['picture'];?>"  style="width:96%; margin-left:2%;"/>
                                </div>
                                <div style="width: 180px;float: left;height: auto;">
                                    Upload Photo
                                   
                                    
                                    <img src="images/Edit-icon.png" style="float: right;cursor: pointer;" onclick="$('#upload_image').toggle();"/>
                                    
                                </div>
                               
                                    <div style="width: 180px;height: auto;float: left;margin-top: 20px;display: none;" id="upload_image">
                                       <form method="post" action="image_upload.php" enctype="multipart/form-data">
                                            <table style="font-family:arial; font-size:12px;">
                                                                                                   <tr>
                                                                                                           <td align="right">Upload Image</td>
                                                                                                           <td>
                                                                                                                   <input type="file" name="image" />
                                                                                                           </td>
                                                                                                   </tr>
                                                                                                   
                                                                                                   <tr>
                                                                                                           <td>&nbsp;</td>
                                                                                                           <td align="center">
                                                                                                                   <input type="submit" class="button1" value="Upload"/>
                                                                                                           </td>
                                                                                                   </tr>
                                                                                            </table>
                                       </form>
                                    </div>
                                                
                                   

                        <div class="list_box1" style="padding:5px;">
                        		<ul>
                                	<a href="mypage2.php"><li>View Profile</li></a>
                                        <a href="mypage2.php"><li>Edit Profile</li></a>
                                        <a href="changepwd.php"><li>Change Password</li></a>
                                        <a href="job_applied.php"><li>Job Application</li></a>
                                </ul>
                        </div>
                </div>
                <div id="content2_right" style="width:800px; margin-left:20px;">
<!------------------Tab start ---------------------->
					
     
	<div class="container" style="width:100%">

	
			<ul class="tabs">
				<li><a href="#tab1">personal Info</a></li>
				<li><a href="#tab2">Education/Training</a></li>
				<li><a href="#tab3">Employement</a></li>
                                <li><a href="#tab4">Others</a></li>
			</ul>
		<div class="tab_container">
                    <?php if(isset($_GET['msg'])){$ms=$_GET['msg'];echo "<script>alert('".$ms."')</script>"; }?>
                   
			<div id="tab1" class="tab_content">
				<?php include_once('view_personalinfo.php');?>
			</div>
		
			<div id="tab2" class="tab_content">
				<?php include_once('view_education.php');?>
			</div>
            
            
			<div id="tab3" class="tab_content" style=" margin-bottom:20px; margin-left:0px;">
				<?php include_once('view_employment.php');?>	
			</div>
            
                        <div id="tab4" class="tab_content">
                                    <?php include_once('view_others.php');?>
			</div>
		
		</div>
	</div>        
<!----------------------------Tab end ------------------------------->
						
				<div id="newpost" >
				
				</div>
				
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