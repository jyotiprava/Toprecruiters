<?php
include_once("../function.php");
is_admin();
$qwery=mysql_query("select * from `fieldofstudy` order by `field` asc")or die(mysql_error());
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!--menu start-->
<link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src='js1/jquery.cookie.js'></script>
<script type='text/javascript' src='js1/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js1/jquery.dcjqaccordion.2.7.min.js'></script>
<script type="text/javascript">
$(document).ready(function($){
					$('#accordion-5').dcAccordion({
						eventType: 'hover',
						autoClose: false,
						saveState: true,
						disableLink: true,
						menuClose: true,
						speed: 'fast',
						showCount: true
					});
					
});
</script>
<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />
<link href="css/skins/graphite.css" rel="stylesheet" type="text/css" />
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		var i=0;			
		function delete_data(vals){
			var con=confirm("Do you want to delete?");
			if(con){
			window.location="qualification_delete.php?id="+vals;
			}
		}
                
                function addtrade(obj,num) {
                   obj.next().append('<input type="text" name="trade'+num+'[]" class="form" style="margin-bottom:10px;"/><br/>');
                }
		
		function addtrade1(num,val)
		{
                    $('#trade_box'+num).append('<tr><td align="center"><input type="text" name="field[]" value="'+val+'" class="form" ></td><td><input type="text" name="trade[]" class="form" /></td></tr>')
		}
		function addfield() {
					i++;
			$('#field').append('<tr style="border-bottom: 1px solid #333;"><td colspan="2" style="border-bottom: 1px solid #333;"></td></tr><tr><td align="center">Field Name</td><td><input type="text" name="field[]" class="form" required ></td></tr><tr><td>Trade To Field</td><td><input type="text" name="trade'+i+'[]" class="form"/>  <span style="font-weight: bold;cursor: pointer;" onclick="return addtrade($(this),'+i+');">+ Add More Trade</span><span style="width: 100%;float:left;margin-top: 10px;" class="trade"></span></td></tr>');
		}
		function addfield1(ival)
		{
			$('#field').append('<tr><td align="center"><input type="text" name="field[]" class="form" ></td><td><input type="text" name="trade[]" class="form" /></td></tr>');		
		}
		
		function deletefiled(id)
		{
			var con=confirm("Do you want to delete?");
			if(con==true){
					$.ajax({url:"ajax_deletefield.php?id="+id,
					       success:function(results)
					       {
						location.reload();				
					       }
					})
			}
		}
</script>
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
										Add Study Of Field
								</div>
								<div id="content2" style="min-height:350px;">
									
										<form name="myform" method="post" action="field_insert.php">
											<table class="table" style="height:250px; line-height:1.5;">
												<?php
										
										  if(isset($_GET['msg']))
										  {
										  $mess=$_GET['msg'];
										  echo "<span style='font-family:arial; color:#5FBE5F; margin-left:20px;'>".$mess."</span>";
										  }
										  if(mysql_num_rows($qwery)==0)
										  {
											?>
												<tr>
												<td align="center">Field Name</td>
												<td><input type="text" name="field[]" class="form" required ></td>
												</tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        Trade To Field
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <input type="text" name="trade0[]" class="form"/>  <span style="font-weight: bold;cursor: pointer;" onclick="return addtrade($(this),0);">+ Add More Trade</span>
                                                                                                        <span style="width: 100%;float:left;margin-top: 10px;" class="trade"></span>
                                                                                                    </td>
                                                                                                </tr>
												<tbody id="field"></tbody>
												<tr>
															<input type="button" value="Add More Field" class="button"  onclick="return addfield();" style="width: 150px;"/>
												</tr>
										<?php
										  }
										  
										  
										  else
										  {
															?>
															

										<tr>
															<th>Field Name</th>
															<th>Trade To Field</th>
															<th>Action</th>
										  </tr>
										<tr style="display: none;">
										    <td>
										           <input type="hidden" name="editval" value="1"/>
										    </td>
										</tr>
															 <?php
										$i=-1;
										$j=0;
										$field='';
										while($result=mysql_fetch_array($qwery))
										{
											if($result['field']!=$field && $field!='')
											{
										         $i++;
											 $j++;
											?>
											<tbody id="trade_box<?=$i;?>"></tbody>
											<tr>
										              <td colspan="3" style="text-align: right;"> <span style="font-weight: bold;cursor: pointer;" onclick="return addtrade1(<?=$i;?>,'<?=$field;?>');">+ Add More Trade</span>
					
											      </td>
											</tr>
										<tr style="border-bottom: 1px solid #333;">
											<td colspan="3" style="border-bottom: 1px solid #333;"></td>
										</tr>
										
										  <?php
											}
											?>
										  	<tr>
												<td align="center">
												
													<input type="text" name="field[]" class="form" value="<?=$result['field'];?>" ></td>
												
												<td>
													<input type="text" name="trade[]" class="form" value="<?=$result['trade'];?>"/>		
												</td>
												<td>
															<img src="images/delete.png" onclick="return deletefiled(<?=$result['id'];?>);"/>
												</td>
												
											</tr>
											<?php
										  $field=$result['field'];
										  
										}
										  }
										  ?>
										  <tbody id="trade_box<?=$i+1;?>"></tbody>
										  <tr>
										              <td colspan="3" style="text-align: right;"> <span style="font-weight: bold;cursor: pointer;" onclick="return addtrade1(<?=$i+1;?>,'<?=$field;?>');">+ Add More Trade</span>
					
											      </td>
											</tr>
										<tr style="border-bottom: 1px solid #333;">
											<td colspan="3" style="border-bottom: 1px solid #333;"></td>
										</tr>
										  <tbody id="field"></tbody>
												<tr>
															<input type="button" value="Add More Field" class="button"  onclick="return addfield1(<?=$j+1;?>);" style="width: 150px;"/>
												</tr>
												<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>
												<input type="submit" name="submit" value="Add" class="button" style="width:75px; margin-top:5px;" >
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
