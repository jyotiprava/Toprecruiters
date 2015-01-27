<link href="../css/reveal.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="../js/jquery.reveal.js"></script>
<script type="text/javascript">
	function getreqid(idval){
		$('#staff_id').val(idval);
	}
	function getreqid1(idval){
		$('#staff_id1').val(idval);
	}
</script>
<?php
include_once("../function.php");
$tbl_name="staff_request";		//your table name

$condition='';
if(isset($_GET['req_status']))
{
$req_status=$_GET['req_status'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where request_status IN($req_status)";
$condition="where request_status in($req_status)";
}
elseif(isset($_GET['client_contact']))
{
$client_contact=$_GET['client_contact'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where mobile='$client_contact'";
$condition = "where mobile='$client_contact'";	
}
elseif(isset($_GET['name_email']))
{
$name_email=$_GET['name_email'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `name` like '%$name_email%' or `email` like '%$name_email%'";
$condition = "where `name` like '%$name_email' or `email` like '%$name_email%'";		
}
elseif(isset($_GET['request_id']))
{
$request_id=$_GET['request_id'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `id`='$request_id'";
$condition = "where `id`='$request_id'";	
}
elseif(isset($_GET['position_title']))
{
$position_title=$_GET['position_title'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `position_title` like '%$position_title%'";
$condition = "where `position_title` like '%$position_title%'";	
}
elseif(isset($_GET['company_name']))
{
$company_name=$_GET['company_name'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `company_name` like '%$company_name%'";
$condition = "where `position_title` like '%$position_title%'";	
}
elseif(isset($_GET['job_description']))
{
$job_description=$_GET['job_description'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `description` like '%$job_description%'";
$condition = "where `position_title` like '%$position_title%'";	
}
elseif(isset($_GET['company_industry']))
{
$company_industry=$_GET['company_industry'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `company_industry` like '%$company_industry%'";
$condition = "where `company_industry` like '%$company_industry%'";	
}
elseif(isset($_GET['country']))
{
$country=$_GET['country'];
$town=$_GET['town'];
$form=$_GET['request_form_y'].'-'.$_GET['request_form_m'].'-'.$_GET['request_form_d'];
$to=$_GET['request_to_y'].'-'.$_GET['request_to_m'].'-'.$_GET['request_to_d'];
$query = "SELECT COUNT(*) as num FROM $tbl_name where `country` like '%$country' and `city` like '%$city' and date(`date`) BETWEEN '$form' AND '$to'";

$condition = "where `country` like '%$country' and `city` like '%$city' and date(`date`) BETWEEN '$form' AND '$to'";	
}

//echo $query;	
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "viewrequest.php"; 	//your file name  (the name of this file)
	$limit = 4; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name $condition LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
		else
			$pagination.= "<span class=\"disabled\"><< previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
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
			//in middle; hide some front and some back
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
			//close to end; only hide early pages
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
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
		else
			$pagination.= "<span class=\"disabled\">next >></span>";
		$pagination.= "</div>\n";		
	}
?>

<div id="pg_box">
	<div id="pg_listbox" style="width: 100%; display: block;">
					    <?=$pagination?>
					</div>
                        		<h2 class="head3" style="font-size:20px; text-align:left; margin-top:0px;margin-bottom:0px; padding-top: 8px; padding-bottom: 0px;"><?=$total_pages;?> Candidates found. Pg 1 of <?=$lastpage?></h2>
					
</div>
                		<div id="content2_leftbox">

	<?php
	$staffid='';
		while($row = mysql_fetch_array($result))
		{
			$staffid=$row['id'];
?>
                                
							<table class="table3" style="border-bottom: 3px solid #8ba264;margin-bottom: 20px;  color: rgb(58, 82, 160);">
							<tr>
						      <td colspan="3" style="font-size:12px; font-weight:bold;cursor: pointer;" onclick="return getdetailre(<?=$row['id'];?>);">REQUEST ID <span style="color: #CC0000;"><?=$row['id'];?></span> dated <?=$row['date'];?></td>
					         </tr>
						    <tr>
							<td>Name:</td>
							<td><?=$row['name'];?></td>
							<td width="150" align="right" style="color: red;">
								<?php
								if($row['request_status']==0)
								{
									$value='Pending';
								}
								elseif($row['request_status']==1)
								{
									$value='Completed';
								}
								elseif($row['request_status']==2)
								{
									$value='Payment Pending';
								}
								elseif($row['request_status']==3)
								{
									$value='Feedback Pending';
								}
								?>
								Status : <?=$value;?> <br/>
							</td>
						    </tr>
						    <tr>
							<td>Office No:</td>
							<td>+<?=$row['officeno'];?></td>
							<td align="right"><span style="color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return getsh(<?=$row['id'];?>);">Add To Shortlist</span> </td>
						    </tr>
						    <tr>
							<td>Mobile No:</td>
							<td>+<?=$row['mobile'];?></td>
							<td align="right">
								<?php
								if($row['shortlist']==1)
								{
									?>
								<span style="color: #a60006;cursor: pointer;border-bottom: 1px solid #a60006;" onclick="return getresh(<?=$row['id'];?>);">Remove From Shortlist</span>
								<?php
								}
								?>
								<br/><br/></td>
						    </tr>
						    <tr>
							<td>Email:</td>
							<td><?=$row['email'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Designation:</td>
							<td><?=$row['description'];?></td>
							<td></td>
						    </tr>
							 <tr>
							<td>Company:</td>
							<td><?=$row['company'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Address:</td>
							<td><?=$row['address'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Town:</td>
							<td><?=$row['city'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Country:</td>
							<td><?=$row['country'];?></td>
							<td></td>
						    </tr>
							<tr>
							<td>Company website:</td>
							<td><?=$row['company_website'];?></td>
							<td></td>
						    </tr>
							<tr>
							<td>Company Industry:</td>
							<td><?=$row['company_industry'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td>Position Title 1:</td>
							<td><?=$row['position_title'];?></td>
							<td></td>
						    </tr>
							<tr>
							<td>Position Description:</td>
							<td><?=$row['position_desc'];?></td>
							<td></td>
						    </tr>
						    <tr>
							<td></td>
							<td></td>
							<td></td>
						    </tr>
                                                    
						</table>
                

<?php

		}
?>

        </div>	
                </div>