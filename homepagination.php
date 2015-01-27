<?php
/* Pagination start*/

	if(!isset($_POST['search']))
	{
		$query = mysql_query("select a.*,l.`location`,i.`industry` from `alljob` a,`location` l,`industry` i where a.`posttype`='1' and l.`slno`=a.`location` and i.`slno`=a.`industry` AND a.`status` =  '0'")or die(mysql_error());
		
		$sql = "select a.*,l.`location`,i.`industry` from `alljob` a,`location` l,`industry` i where a.`posttype`='1' and l.`slno`=a.`location` and i.`slno`=a.`industry` AND a.`status` =  '0' ";
	}
	else
	{
		
	$location = '';
$shift=$_POST['location'];

if ($shift)
{
    foreach ($shift as $value)
    {
        $location.=$value.",";
    }
}

$location=rtrim($location,",");

$keyword=htmlentities($_POST['keyword'],ENT_QUOTES);
$industry=htmlentities($_POST['industry'],ENT_QUOTES);
$jobfunction=htmlentities($_POST['jobfunction'],ENT_QUOTES);
$worktype=htmlentities($_POST['worktype'],ENT_QUOTES);

//echo $location;

$variable='';
if($keyword!=''){
	$variable.="`postname` like '%$keyword%' and ";
	}
	if($location!=''){
	$variable.="`location` in ($location) and ";
	}
	if($industry!=''){
	$variable.="`industry` = '$industry' and ";
	}
	if($jobfunction!=''){
	$variable.="`jobfunction` = '$jobfunction' and ";
	}
	if($worktype!='')
	{
	$variable.="`job_type`='$worktype' and";
	}
$variable.='`status`=0';	
	
	$query = mysql_query("SELECT COUNT(*) as num FROM alljob where $variable")or die(mysql_error());
	
	 $sql = "select * from `alljob` where $variable ";	
		
	}
	
	//echo $sql;
	
	$adjacents = 3;
	$total_pages = mysql_num_rows($query);

	$targetpage = "index.php";
	$limit = 15; 								
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			
	else
		$start = 0;								
	
	$sql.="LIMIT $start, $limit";
	
	$qwe = mysql_query($sql);
	
	
	if ($page == 0) $page = 1;					
	$prev = $page - 1;							
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$lpm1 = $lastpage - 1;						
	
	
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination.= "<div class=\"pagination\">";
		
		
		
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\" style='display:none;'><<</a>";
		else
			$pagination.= "<span class=\"disabled\" style='display:none;'><<</span>";	
		
		
		if ($lastpage < 7 + ($adjacents * 2))	
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	
		{
			
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\"><img src='images/icon11.png' /></a>";
		else
			$pagination.= "<span class=\"disabled\"> <img src='images/icon11.png' /></span>";
		$pagination.= "</div>\n";		
	}				
				
				
/*pagination end */
?>