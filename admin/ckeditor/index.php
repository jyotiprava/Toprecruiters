<?php
include_once("../../function.php");
function get_content($URL){
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_URL, $URL);
          $data = curl_exec($ch);
          curl_close($ch);
          return $data;
      }

if(isset($_GET['page']))
{
    $filename = '../../'.htmlentities($_GET['page'],ENT_QUOTES);
if (!$handle = fopen($filename, 'r')) {
    echo "$sValue=File did not load.";
    exit;
}


$sValue = fread($handle,filesize($filename));
fclose($handle);

}

?>
<!DOCTYPE html>
<!--
Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>Full Page Editing &mdash; CKEditor Sample</title>
	<script src="ckeditor.js"></script>
	<script src="samples/sample.js"></script>
	<link rel="stylesheet" href="samples/sample.css">
	    <link href="../../style.css" type="text/css" rel="stylesheet"  />
        <link href="../style.css" rel="stylesheet" type="text/css" />
	<meta name="ckeditor-sample-required-plugins" content="sourcearea">
	<meta name="ckeditor-sample-name" content="Full page support">
	<meta name="ckeditor-sample-group" content="Plugins">
	<meta name="ckeditor-sample-description" content="CKEditor inserted with a JavaScript call and used to edit the whole page from &lt;html&gt; to &lt;/html&gt;.">
</head>
<style>
#content2_box ul{ margin:0px; padding:0px;width: 100%;}
#content2_box ul a{ text-decoration:none; color:#333;}
#content2_box ul a li{ float:left; list-style-type:none; width:auto; padding: 5px;}
</style>
<body style="width: 100%;height: 100%;">
    <!--------------top bar -------->
<?php include_once("../topbar.php"); ?>
 <!--------------top bar end-------->
<!--------------------------content bar----------------------->
<div id="content2_bar" >
         <div id="content2_box">
	    <h4 class="head4"><u>Page Management</u></h4>
		<ul>
		    <a href="index.php?page=index.php"><li>Home Page</li></a>
		    <a href="index.php?page=index2.php"><li>Our Service</li></a>
		    <a href="index.php?page=employers.php"><li>Employers</li></a>
		    <a href="index.php?page=index1.php"><li>Staff Request</li></a>
		    <a href="index.php?page=description2.php"><li> Featured Job Description</li></a>
		    <a href="index.php?page=jobdescription1.php"><li>Featured Job & Apply(After click apply)</li></a>
		    <a href="index.php?page=jobseeker.php"><li>JOBSEEKERS</li></a>
		    <a href="index.php?page=join.php"><li>JOIN US</li></a>
		    <a href="index.php?page=contact.php"><li>CONTACT US</li></a>
		</ul>
		<!--<br/><br/><br/>
		<h4 class="head4"><u>For Employee</u></h4>
		<ul>
		    <a href="index.php?page=mypage2.php"><li>View Profile</li></a>
		    <!--<a href="index.php?page=changepwd.php"><li>Change Password</li></a>
		    <a href="index.php?page=job_applied.php"><li>Job application / Applied job</li></a>
		    <a href="index.php?page=search.php"><li>Apply for job</li></a>
		    <a href="index.php?page=jobdescription.php"><li>Matching Job</li></a>
		    <a href="index.php?page=suggestion_req.php"><li>Suggestion</li></a>
		</ul>
		<br/><br/>
		<h4 class="head4"><u>For Employer</u></h4>
		<ul>
		    <a href="index.php?page=alljob.php"><li>All Job</li></a>
		    <a href="index.php?page=request.php"><li>Search Resume</li></a>
		    <a href="index.php?page=candidate.php"><li>View Resume</li></a>
		    <a href="index.php?page=shortlisted.php"><li>Shortlisted Candidates</li></a>
		    <a href="index.php?page=addjob.php"><li>Post Job</li></a>
		   <!--<a href="index.php?page=changepwd.php"><li>Change Password</li></a>
		</ul>-->
	  <div style="width:100%; height:auto; min-height:600px; float:left; margin-top:20px;"> 
	    <form action="samples/sample_posteddata.php" method="post">
		    <input type="hidden" name="pagename" value="<?=$_GET['page'];?>"/>
		    <textarea id="editor1" name="editor1" style="width: 100%;height:600px;">
			    <?php echo htmlentities($sValue,ENT_QUOTES);?>
		    </textarea>
		    <script>
    
			    CKEDITOR.replace( 'editor1', {
				    fullPage: true,
				    allowedContent: true,
				    extraPlugins: 'wysiwygarea'
			    });
    
		    </script>
		    <p>
			    <input type="submit" value="Submit" class="button">
		    </p>
	    </form>
        </div>
	 </div>
</div>

<!--------------footer---------> 
 <div id="footer-bar">
 		<div id="footer">
			&copy;Copy Right All Rights Reserved 2014	
		</div>
 </div>
  <!--------------footer end---------> 
</body>
</html>
