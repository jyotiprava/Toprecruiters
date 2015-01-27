<div class="headline" style="color: #08C; font-size:15px;">
								<?php
								if(isset($_SESSION['user'])){
								echo "Superadmin";
								}
								else
								{
								$sql=mysql_query("select * from `admin` where `username`='$_SESSION[username]' and `status`='1'");
								$res=mysql_fetch_array($sql);
								echo "welcome  ".$res['username'];
								}
								?>
								
</div>								
								
							