<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="utilisateur">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="pseudo" placeholder="pseudo" id="pseudo" required>
				<label for="MDP">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="MDP" placeholder="MDP" id="MDP" required>
				<input type="submit" value="Login">
				
			</form>
			<form action="create.php" method="post">
				<input type="submit" value="Sign up">
			</form>
		</div>
	</body>
</html>
