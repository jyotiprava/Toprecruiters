<html>
    <head>
			<link rel="stylesheet" href="login.css">
    </head>
    <body>
	
					<div id="container">
                    <?php if(isset($_GET['msg'])) echo '<span style="color:red;">'.$_GET['msg'].'</span>';?>
		
		<form name="f" method="post" action="login_process1.php">
		
		<label for="name">Username:</label>
		
		<input type="name" name="usrname" placeholder="Username" >
		
		<label for="username">Password:</label>
		
		<input type="password" name="pass" placeholder="Password" >
		
		<div id="lower">
		
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>
		
		<input type="submit" name="submit" value="Login" >
		
		</div>
		
		</form>
		
	</div>
					
					
					
			
        
    </body>
</html>
