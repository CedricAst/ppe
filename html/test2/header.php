<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php

		if(empty($_SESSION['idProfile'])) 
		{	
			?>
			<div class="login">
				<h1>Login</h1>
				<form action="verif.php" method="post">
					<label for="utilisateur">
						<i class="fas fa-user"></i>
					</label>
					<input type="text" name="pseudo" placeholder="pseudo" id="pseudo" value="pseudo" required>
					<label for="MDP">
						<i class="fas fa-lock"></i>
					</label>
					<input type="password" name="MDP" placeholder="MDP" id="MDP"  value="MDP" required>
					<input type="submit" value="Login" >
					
				</form>
				
				
				
				
				
				
				
				<form action="create.php" method="post">
								<label for="utilisateur">
						<i class="fas fa-user"></i>
					</label>
					<input type="text" name="pseudo" placeholder="pseudo" id="pseudo" value="pseudo" required>
					<label for="MDP">
						<i class="fas fa-lock"></i>
					</label>
					<input type="password" name="MDP" placeholder="MDP" id="MDP"  value="MDP" required>
					<input type="submit" value="Sign up">
				</form>
			</div>
		<?php	
		}
		
		else
		{
			?>
			<div class="login">
				<h1>BIENVENUE</h1>
					<label> bon retourn parmi nous :<?php	 print_r ($_SESSION['pseudo']);	?>
				<form action="destruct.php" method="post">
				<input type="submit" value="Logout" >
				</form>
				<A  title="profile">
					<IMG src="image/profile/default.jpg" >
				</A>
			</div>
		<?php		
		}
		?>
		
	</body>
</html>
