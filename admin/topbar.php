<link href="style.css" rel="stylesheet" type="text/css" />


<div id="top_bar" style="height:auto; min-height:120px;">
 		<div id="top_box" style="height:auto;">
		<div style="width:200px; height:auto; float:left;">
				<h2 style="margin-top:0px; padding-top:8px; font-family:Arial, Helvetica, sans-serif; color:#f5f5f5; margin-bottom:0px;">
				Admin Panel
				</h2>
		</div>				
		</div>
 </div>
 <?php
if(isset($_SESSION['user']))
{
?>
<div id="menu_bar3">
		<div id="menu_box3">
       			 <ul>
				
				<li><a href="viewrequest.php">Request Page</a></li>
				<li style="display: none;"><a href="ckeditor/">Page Management</a></li>
				<li><a href="#">Shortlist</a>
						<ul>
							<li><a href="shortlist.php">Shortlist Candidate</a></li>
							<li><a href="shortlistclient.php">Shortlist Employer</a></li>
						</ul>
				</li>
				<li><a href="search_resume1.php" >Search Resume </a></li>
                                  <li><a href="#">Add</a>
                                          <ul>
                                               <li><a href="addqualification.php">Add Highest Qualification/ Degree</a></li>
						<li><a href="field.php">Add Field Of Study</a></li>
						<li><a href="add_currency.php">Add Currency</a></li>
                                                <li><a href="positionlevel.php">Add Position Level</a></li>
                                                <li><a href="addspecialization.php">Create Specialization</a></li>
                                                 <li><a href="add_subspecialization.php">Add Subspecialization (Industry)</a></li>
						<li><a href="addlocation.php">Add Location</a></li>
						<li><a href="addjob.php">Add Job</a></li>
						<li><a href="addprefix.php">Add Prefix</a></li>
						<li><a href="addcitizen.php">Add Nationality</a></li>
						<li><a href="addcountry.php">Add Country</a></li>
						<li><a href="addlanguage.php">Add Language</a></li>
						<li><a href="add_skill.php">Add Skills</a></li>
						<li><a href="add_banner.php">Add Banner Images</a></li>
						<li><a href="add_insight.php">Add Insight</a></li>
						<li><a href="add_testimonial.php">Add Testimonial</a></li>
						<li><a href="add_banner1.php">Add Bottombarimages of homepage</a></li>
						<li><a href="add_indexcontent.php">Page Management</a></li>
						<li><a href="add_rightcontent.php">Staff Request Why choose us?</a></li>
						<li><a href="add_fetrempl.php">Featured Employer</a></li>
                                          </ul>
                                  </li>
                                  
                                  <li><a href="new_account.php">Create New Account</a></li>
								  <li style="display:none;"><a href="change_pwd.php"><span class="new6">Change Password</span></a></li>
						<li><a href="#">Approve</a>
							<ul>
								<li><a href="employee_approve.php">All Employee</a></li>
								<li><a href="employer_approve.php">All Employer</a></li>
							</ul>			  
						</li>
						<li><a href="#">List</a>
							<ul>
								<li><a href="employeelist.php">Employee list</a></li>
								<li><a href="employer.php">Employer list</a></li>
						         </ul>
						</li>
						<li><a href="#">View</a>
							 <ul>
								<li><a href="view_resume.php">View Employee Resume</a></li>
								<li><a href="view_jobvacancy.php">View Employer Jobvacancy</a></li>
							</ul>			  
						</li>
						<li><a href="logout.php">Logout</a></li>
                          </ul>
        </div>
 </div>
 <?php
}
else{
?>
<div id="menu_bar3">
		<div id="menu_box3">
       			 <ul>
								<li><a href="viewrequest.php"><span class="new1">Request Page</span></a>
								         <ul style="display: none;">
										<li><a href="viewrequest.php">Request Page</a></li>
										<li><a href="ckeditor/">Page Management</a></li>
									 </ul>
								</li>
								<li><a href="search_resume1.php" ><span class="new2">Search Resume</span> </a></li>
								<li><a href="shortlist.php"><span class="new3">Shortlisted Candidates</span></a></li>
								<li><a href="shortlistclient.php"><span class="new4">Shortlisted Clients</span></a></li>
								<li><a href="create_account1.php"><span class="new5">Create New Acc</span></a></li>
								<li style="display:none;"><a href="change_pwd.php"><span class="new6">Change Password</span></a></li>
								<li><a href="mass.php"><span class="new6">Mass Email/SMS</span></a></li>
								<li><a href="feature.php"><span class="new7">Featured Jobs</span></a></li>
								<li style="display: none;"><a href="#">Shortlist</a>
								    <ul >
									<li><a href="shortlist.php">Shortlist Candidate</a></li>
									<li><a href="shortlistclient.php">Shortlist Employer</a></li>
								    </ul>
								</li>
								
								
								
								<li style="display: none;"><a href="#">Job</a>
								<ul>
								<li><a href="post.php">Post Job</a></li>
								<li><a href="feature.php">Feature Job</a></li>
								</ul>
								</li>
								
				 
                                  <li style="display: none;"><a href="#">Add</a>
                                          <ul>
						<li><a href="addqualification.php">Add Highest Qualification/ Degree</a></li>
						<li><a href="field.php">Add Field Of Study</a></li>
						<li><a href="add_currency.php">Add Currency</a></li>
                                                <li><a href="positionlevel.php">Add Position Level</a></li>
                                                <li><a href="addspecialization.php">Create Specialization</a></li>
                                                <li><a href="add_subspecialization.php">Add Subspecialization</a></li>
						<li><a href="addlocation.php">Add Location</a></li>
						<li><a href="addjob.php">Add Job</a></li>
						<li><a href="addprefix.php">Add Prefix</a></li>
						<li><a href="addcitizen.php">Add Nationality</a></li>
						<li><a href="addcountry.php">Add Country</a></li>
						<li><a href="addlanguage.php">Add Language</a></li>
						<li><a href="add_skill.php">Add Skills</a></li>
						<li><a href="add_banner.php">Add Banner Images</a></li>
						<li><a href="add_indexcontent.php">Page Management</a></li>
						<li><a href="add_rightcontent.php">RightBox Content</a></li>
                                          </ul>
                                  </li>
						<li style="display: none;"><a href="#">Approve</a>
							<ul>
								<li><a href="employee_approve.php">All Employee</a></li>
								<li><a href="employer_approve.php">All Employer</a></li>
							</ul>			  
						</li>
						<li style="display: none;"> <a href="#">List</a>
							<ul>
								<li><a href="employeelist.php">Employee list</a></li>
								<li><a href="employer.php">Employer list</a></li>
						         </ul>
						</li>
						<li style="display: none;"><a href="#">View</a>
							 <ul>
								<li><a href="view_resume.php">View Employee Resume</a></li>
								<li><a href="view_jobvacancy.php">View Employer Jobvacancy</a></li>
							</ul>			  
						</li>
						<li style="display: none;"><a href="#">Suggest</a>
							<ul>
								<li><a href="suggest_employer.php">Suggest Employers</a></li>
								<li><a href="suggest_jobseeker.php">Suggest Jobseeker</a></li>
							</ul>			  
						</li>
						<li><a href="logout.php">Logout</a></li>
                          </ul>
        </div>
 </div>
<?php
}
?>