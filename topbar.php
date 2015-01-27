<script>
$(document).ready(function(){
  $("#box5").click(function(){
    $(".my_accountbox").slideToggle();
  });
});
</script>
<?php
$qsuggest=mysql_query("select * from `admin_suggest` where `userid`='$_SESSION[useridval]'")or die(mysql_error());
$suggestcount=mysql_num_rows($qsuggest);
?>
<div id="header_bar">
		<div id="header_content">
        		<div id="header_contentbox">
                		<div id="logo">
                        		<img src="images/logo.jpg" width="100%"/>
                        </div>
                        <div id="logo_text">
                        		<span>TOP</span> <span style="color:#0fd0f9; ">RECRUITERS</span><br />
                                <span style="font-size:14px; font-family: 'estrangelo_edessaregular'; text-transform:capitalize; text-transform:uppercase;">Vision into Reality</span>
                        </div>
                        <div id="like_box">
                        		<a href="https://www.facebook.com/lovetoprecruiters"><img src="images/like.png" width="50" style=" margin-bottom:20px;" /></a>
                        </div>
                </div>
				<?php
				if(isset($_SESSION['userid']))
				{
				?>
				
                <div style="width:auto; height:auto; float:right; margin-top:70px; text-align:right; margin-left:10px;color: #fff;" >
                		<a href="#" id="box5">
						<span class="button3" style="width:80px; height:auto; margin-bottom:5px;float:left;">My Account</span>
						</a>
						<br/><br/>
						<span style="width:auto;height:auto; float:left; font-size:14px; ">Welcome <?=$_SESSION['employee_name'];?></span>
                </div>
                <div class="my_accountbox" style="display:none;">
                		<ul>
                        	<a href="mypage2.php"><li>View Profile</li></a>
                                <a href="mypage2.php"><li>Edit Profile</li></a>
				<a href="suggestion_req.php"><li>Suggestion <span style="color: red;font-weight: bold;"><?=$suggestcount;?></span></li></a>
                                <a href="logout.php"><li>Logout</li></a>
                        </ul>
                </div>
				<?php
				}
				if(isset($_SESSION['employer_id']))
				{
				?>
				<div style="width:auto; height:auto; float:right; margin-top:80px; text-align:right; margin-left:-50px;color: #fff;" id="box5">
						<a href="logout.php"><span class="button3" style="width:auto;">Logout</span></a>
						<br/>
				Welcome <?=$_SESSION['employer_name'];?>
				</div>
				 <?php
				}
				?>
               
                <div style="width:228px; height:auto; float:right; margin-top:20px;">
                	<div style="width:100%; height:auto; float:left; line-height:1.5; text-align:right;">
                    		<span class="text" style="font-size:40px; color:#fff; margin-bottom:0px; line-height:0.7;">012 722 5501</span>
                            <br />
                            <span class="text" style="font-size:28px; color:#fff; margin-top:0px; line-height:0.7;">info@toprecruiters.com.my</span>
				</div>
                    <div style="width:100%; height:auto; float:right; margin-top:20px;">
				<?php
				if(!isset($_SESSION['userid']) && !isset($_SESSION['employer_id']))
				{
						?>
                        <div style="width:100px; height:auto; float:left;">
                                <span>
                                    <a href="login.php" class="button3" style="width:auto; background:#1c3f93; border:none; padding:12px; width:80px; text-decoration:none;">
                                            Login
                                    </a>	
                                </span>
                        </div>
			
                        <a href="login1.php" style="text-decoration: none;"><div style="width:120px; height:auto; float:left; font-family: 'Conv_estre'; font-size:18px; text-align:center; font-weight:normal; margin-left:8px;">
                        		<span style="color:#52e7c9;">Employers</span>
                                <br />
                                <span style="color:#fff;">Submit Request</span>
                        </div></a>
			<?php
				}
				?>
                    </div>
                </div>
        </div>
</div>