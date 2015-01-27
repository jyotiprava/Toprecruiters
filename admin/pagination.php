<script type="text/javascript">
	<?php
	if(isset($_POST['sub']))
	{
	?>
	$(function(){
		$('.pagination').on('click','a',function(e){
			e.preventDefault();
			var page=$(this).attr("href");
			page=page.split("?");
			$.ajax({ type: 'post', url: 'search1.php?'+page[1], data: $('form').serialize()+'&'+$.param({ 'sub': 'Search' }),
			success: function (result) {
			//alert(result);
		       $('#leftid').html(result);
			}
			});
		});
			
	});
	<?php
	}
	?>
</script>
<?php
	$tbl_name="cv_detail";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	
	if(isset($_POST['sub']))
	{
	//echo $queryy."query";
	$query=$queryy;
	$sql1=$query;
	}
	elseif((isset($_POST['hidden_keyskill'])) || (isset($_POST['searchin'])) || (isset($_POST['active'])))
	{
	$keywords=$_POST['hidden_keyskill'];
	if($keywords!='')
	{
		$key="`advanced` like '%$keywords%' or";
	}
	
	$var='';
	$mid=$_POST['searchin'];
	
	if($mid!='')
	{
	$chk=explode('>',$mid);
	 $midval=$chk[0];
	$last5chars=$chk[1];
	
	if($last5chars=='cname'){
	$cname=mysql_query("select `user_id` from  `education` where `institute`='$midval'")or die(mysql_error());
	while($rescname=mysql_fetch_array($cname)){
		$uid=$rescname['user_id'];
		$var.=" `user_id`='$uid' or";
		
	}	
	}
	else if($last5chars=='jpost'){
	$jpost=mysql_query("select `user_id` from  `experience` where `title`='$midval'")or die(mysql_error());
	while($resjpost=mysql_fetch_array($jpost)){
		$uid=$resjpost['user_id'];
		$var.="`user_id`='$uid' or";
		
	}
		
	}
	else if($last5chars=='skill'){
	$cv=mysql_query("select `user_id` from  `cv_detail` where `advanced` in ($midval) or `intermediate` in ($midval) or `basic` in ($midval) ")or die(mysql_error());
	while($rescv=mysql_fetch_array($cv)){
		$uid=$rescv['user_id'];
		$var.="`user_id`='$uid' or";
	}
		
	}
	
	}
	
	$last=$_POST['active'];

	$dt=" `datediff`='$last'";
	
	//echo $dt."jguguig";
	//$dt=substr($dt,0,-3);
	$query="SELECT * FROM $tbl_name where $key $var $dt";

	$sql1=$query;
	}
	
	else if(isset($_GET['hd_skill']) || isset($_GET['searchin']) || isset($_GET['active']))
	{
	
	$keywords=$_GET['hd_skill'];
	if($keywords!='')
	{
		$key="`advanced` like '%$keywords%' or";
	}
	
	$var='';
	$mid=$_GET['searchin'];
	
	if($mid!='')
	{
	$chk=explode('>',$mid);
	 $midval=$chk[0];
	$last5chars=$chk[1];
	
	if($last5chars=='cname'){
	$cname=mysql_query("select `user_id` from  `education` where `institute`='$midval'")or die(mysql_error());
	while($rescname=mysql_fetch_array($cname)){
		$uid=$rescname['user_id'];
		$var.=" `user_id`='$uid' or";
		
	}	
	}
	else if($last5chars=='jpost'){
	$jpost=mysql_query("select `user_id` from  `experience` where `title`='$midval'")or die(mysql_error());
	while($resjpost=mysql_fetch_array($jpost)){
		$uid=$resjpost['user_id'];
		$var.="`user_id`='$uid' or";
		
	}
		
	}
	else if($last5chars=='skill'){
	$cv=mysql_query("select `user_id` from  `cv_detail` where `advanced` in ($midval) or `intermediate` in ($midval) or `basic` in ($midval) ")or die(mysql_error());
	while($rescv=mysql_fetch_array($cv)){
		$uid=$rescv['user_id'];
		$var.="`user_id`='$uid' or";
	}
		
	}
	
	}
	
	$last=$_GET['active'];

	$dt=" `datediff`='$last'";
	
	//echo $dt."jguguig";
	//$dt=substr($dt,0,-3);
	$query="SELECT * FROM $tbl_name where $key $var $dt";

	 $sql1=$query;
	
	
	}
	else
	{
	$query = "SELECT * FROM $tbl_name";
	$sql1 = $query;
	}
	
	//echo $query.'----'.$sql1;
	$total_pages = mysql_num_rows(mysql_query($sql1));
	
	/* Setup vars for query. */
	$targetpage = "search_resume1.php"; 	//your file name  (the name of this file)
	$limit = 7; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	//echo "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$sql=$sql1." LIMIT $start, $limit";
	$res1 = mysql_query($sql);
	$res2 = mysql_query($sql);
	$numm=mysql_num_rows($res1);
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
		{
		
			if(isset($_POST['sub']))
			{
				$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
			}
			elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
			{
			$pagination.= "<a href=\"$targetpage?page=$prev&hd_skill=$keywords&searchin=$mid&active=$last\"><< previous</a>";
			}
			else
			{
			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
			}
			
			}
		else
		{
			$pagination.= "<span class=\"disabled\"> << previous</span>";	
			}
		//echo $lastpage;
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
				{
					$pagination.= "<span class=\"current\">$counter</span>";
					}
				else
				{
				
					if(isset($_POST['sub']))
					{
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
					}
					elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
					{
					$pagination.= "<a href=\"$targetpage?page=$counter&hd_skill=$keywords&searchin=$mid&active=$last\">$counter</a>";	
					}
					else
					{
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
					}
				}					
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
					{
						$pagination.= "<span class=\"current\">$counter</span>";
						}
					else
					{
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{
						$pagination.= "<a href=\"$targetpage?page=$counter&hd_skill=$keywords&searchin=$mid&active=$last\">$counter</a>";		
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";		
						}						
					}						
				}
				$pagination.= "...";
				
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
							$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{
						$pagination.= "<a href=\"$targetpage?page=$lpm1&hd_skill=$keywords&searchin=$mid&active=$last\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage&hd_skill=$keywords&searchin=$mid&active=$last\">$lastpage</a>";
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
						}
						
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{	
							$pagination.= "<a href=\"$targetpage?page=1&hd_skill=$keywords&searchin=$mid&active=$last\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2&hd_skill=$keywords&searchin=$mid&active=$last\">2</a>";						
						}
						else
						{
							$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						}
				
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<span class=\"current\">$counter</span>";
						}
					else
					{
					
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";	
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{
						$pagination.= "<a href=\"$targetpage?page=$counter&hd_skill=$keywords&searchin=$mid&active=$last\">$counter</a>";		
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";		
						}	
							
					}						
				}
				$pagination.= "...";
				
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
							$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{
						$pagination.= "<a href=\"$targetpage?page=$lpm1&hd_skill=$keywords&searchin=$mid&active=$last\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage&hd_skill=$keywords&searchin=$mid&active=$last\">$lastpage</a>";
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
						}
					
			}
			//close to end; only hide early pages
			else
			{
				
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{	
							$pagination.= "<a href=\"$targetpage?page=1&hd_skill=$keywords&searchin=$mid&active=$last\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2&hd_skill=$keywords&searchin=$mid&active=$last\">2</a>";						
						}
						else
						{
							$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
							$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						}
				
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					{
						$pagination.= "<span class=\"current\">$counter</span>";
						}
					else
					{
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";	
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{
						$pagination.= "<a href=\"$targetpage?page=$counter&hd_skill=$keywords&searchin=$mid&active=$last\">$counter</a>";		
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";		
						}
						
					}						
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
		{
		
						if(isset($_POST['sub']))
						{
							$pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";		
						}
						elseif(isset($_POST['hidden_keyskill']) || (isset($_POST['searchin'])) || isset($_POST['active']) || isset($_GET['hd_skill']) || (isset($_GET['searchin'])) || isset($_GET['active']))
						{	
						$pagination.= "<a href=\"$targetpage?page=$next&hd_skill=$keywords&searchin=$mid&active=$last\">next >> </a>";						
						}
						else
						{
						$pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";		
						}
			}
		else
		{
			$pagination.= "<span class=\"disabled\">next >> </span>";
			}
		$pagination.= "</div>\n";	
	}
?>



	
