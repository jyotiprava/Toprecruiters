<?php
include_once("../function.php");
//is_admin();

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
    $filename = '../'.htmlentities($_GET['page'],ENT_QUOTES);
if (!$handle = fopen($filename, 'r')) {
    echo "$sValue=File did not load.";
    exit;
}


$sValue = fread($handle,filesize($filename));
fclose($handle);

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<!--menu start-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src='js1/jquery.cookie.js'></script>

<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />

<!-- Load TinyMCE-->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script/>
   <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
   <script type="text/javascript">
       $(document).ready(function () {

           setupTinyMCE();

       });

</script>
 <!-- /TinyMCE -->
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
						<?php include_once("header.php");?>
						<div id="content1">
								<div class="head2">
										Add RightBox Content
								</div>
								<div id="content2" style="min-height:350px;">
		<h4 class="head4"><u>Page Management</u></h4>
		<ul>
		    <a href="test.php?page=index.php"><li>Home Page</li></a>
		    <a href="test.php?page=index2.php"><li>Our Service</li></a>
		    <a href="test.php?page=employers.php"><li>Employers</li></a>
		    <a href="test.php?page=index1.php"><li>Staff Request</li></a>
		    <a href="test.php?page=description2.php"><li> Featured Job Description</li></a>
		    <a href="test.php?page=jobdescription1.php"><li>Featured Job & Apply(After click apply)</li></a>
		</ul>
                                                                        
                                                                      
										<form name="myform" method="post" action="test_action.php" enctype="multipart/form-data">
											<table class="table" style="height:250px; line-height:1.5;">
												
												<tr>
												
												<td>
												    <input type="hidden" name="pagename" value="<?=$_GET['page'];?>"/>
												    <textarea name="indexcon" class="form tinymce" style="height: 100px;"><?php echo htmlentities($sValue,ENT_QUOTES);?></textarea></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>&nbsp;</td>
                                                                                                </tr>
												<tr>
												
												<td>
												<input type="submit" name="submit" value="Submit" class="button" style="width:auto; margin-top:5px;" >
												</td>
												
												</tr>
												</table>  
											</form>
											
											
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
