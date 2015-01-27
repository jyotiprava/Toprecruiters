<?php
session_start();
$host='localhost';
$user='root';
$pass='colourfade';
$db='jobportal';
$sql=mysql_connect($host,$user,$pass) or die('database not connected'.mysql_error());
mysql_select_db($db,$sql) or die('database not selected'.mysql_error());
function is_login(){
 if(!isset($_SESSION['userid']))
 {
  header("location:index.php");
 }
}

function is_admin()
{
if($_SESSION['type']=="admin")
	{
	 if(!isset($_SESSION['username']))
	 {
	  header("location:index.php");
	 }
	}
	else if($_SESSION['type']=="superadmin")
	{
	if(!isset($_SESSION['user']))
	 {
	  header("location:index.php");
	 }
	}
}

function is_employe(){
 if(!isset($_SESSION['employer_idval']))
 {
  header("location:index.php");
 }
}




$relative_path = end(explode("/",$_SERVER['PHP_SELF']));
$realpath=end(explode("/",$_SERVER['REQUEST_URI']));
//echo $realpath;
$qwerypage=mysql_query("select * from `pagemanagement` where `pagename`='$relative_path'")or die(mysql_error());
$resultpage=mysql_fetch_array($qwerypage);

if(mysql_num_rows($qwerypage)>0 && $resultpage['wstatus']==1)
{
$valuepage=str_replace("&amp;amp;nbsp;"," ",$resultpage['value']);
$valuepage=html_entity_decode(htmlspecialchars_decode(htmlspecialchars_decode($valuepage)), ENT_QUOTES);
$valuepage=str_replace("!--?","?",$valuepage);
$valuepage=str_replace("?--","?",$valuepage);

//echo $value;
$fp = fopen($relative_path, 'w');
fwrite($fp, '<?php include_once("function.php");?>');
fwrite($fp, $valuepage);
fclose($fp);
chmod($fp, 0777);
mysql_query("update `pagemanagement` set `wstatus`='0' where `pagename`='$relative_path'")or die(mysql_error());
header("location:$realpath");
}
?>