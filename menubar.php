<style>
#menu_box ul li a
{
padding-right:10px;
}
</style>
<?php
if(isset($_SESSION['employer_idval']))
{
	?>
    <div id="menu_bar" >
		<div id="menu_content" style="width:1000px;">
        		<div id="menu_box" style="width:1000px;">
                		<ul>
				<li><a href="index.php" class="home" style=" padding-left:0px;">HOME</a></li>		
                        	<li><a href="index1.php" class="request"  style="padding-left:0px;">Request Page</a></li>
                                <li><a href="request.php" class="searchr">Search Resume</a></li>
                                <li><a href="shortlisted.php" class="shortlist">Shortlisted Candidates</a></li>
                                <!--<li><a href="testimonial.php">Add Testimonials</a></li>-->
				<li><a href="addjob.php" class="post">POST JOB</a></li>
				<li><a href="alljob.php" class="all">All JOB</a></li>
				<li style="display:none;"><a href="view_post.php">View employee</a></li>
				<li><a href="cpwdeplyr.php" class="changepwd">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
                        </ul>
                </div>
        </div>
</div>
<?php
}
else if(isset($_SESSION['useridval'])){
?>
<div id="menu_bar" >
		<div id="menu_content" style="width:1000px;">
        		<div id="menu_box" style="width:1000px;">
                		<ul>
				<li><a href="index.php" class="home" style="  padding-left:0px;">HOME</a></li>		
                        	<li style="display:none;"><a href="requestpage1.php" style="padding-left:0px;">Request Page</a></li>
				<!--<li><a href="mypage.php">Edit Resume</a></li>-->
                                <li style="display:none;"><a href="request1.php">Shortlisted Candidates</a></li>
                                <li style="display:none;"><a href="#">Shortlisted Clients </a></li>
				<!--<li><a href="testimonial.php">Add Testimonials</a></li>-->
				<li ><a href="jobdescription.php" class="matching" style="padding-right:10px;">Matching Job</a></li>
				<li><a href="search.php" class="apply" style="padding-left:10px; padding-right:0px;">Apply for job</a></li>
				<li><a href="job_applied.php" class="applied">Applied Job</a></li>
				<!--<li><a href="logout.php">Logout</a></li>-->
                        </ul>
                </div>
        </div>
</div>
<?php
}
else
{
	?>
<div id="menu_bar">
		<div id="menu_content">
        		<div id="menu_box">
                		<ul>
                        	<li><a class="home" href="index.php" style="  padding-left:0px;">HOME</a></li>
                                <li><a href="index2.php" class="request" >OUR SERVICES</a></li>
                                <li><a href="employers.php" class="employers">EMPLOYERS</a></li>
                                <li><a href="jobseeker.php" class="jobseeker">JOBSEEKERS</a></li>
				<li><a href="join.php" class="join">JOIN US</a></li>
                                <li><a href="contact.php" class="contact">CONTACT US</a></li>
                               
                        </ul>
                </div>
        </div>
</div>
<?php
}
?>