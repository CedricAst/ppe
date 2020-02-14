<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'bdd_ppe1';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) 
	{
		// erreur de connection sql
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	}

if ( !isset($_POST['pseudo'], $_POST['MDP']) ) 
	{
		// Could not get the data that should have been sent.
		die ("Veuillez remplir le champ nom d'utilisateur et mot de passe!");
	}

if ($stmt = $con->prepare('SELECT idUtilisateur, MDP FROM Utilisateur WHERE pseudo = ?')) 
	{
		// Binding
		$stmt->bind_param('s', $_POST['pseudo']);
		$stmt->execute();
		// stock les entré 
		$stmt->store_result();	
	}
	if ($stmt->num_rows > 0) 
	{
		$stmt->bind_result($idUtilisateur, $MDP);
		$stmt->fetch();
		// CHECK MDP
		if ($_POST['MDP'] === $MDP) 
		{
			
			// CREATION DE SESSION
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['pseudo'];
			$_SESSION['id'] = $idUtilisateur;
			echo 'Welcome ' . $_SESSION['name'] . '!';
			header('Location: home.php');
  exit();
		} 
		else 
		{
			echo 'Incorrect password!';
		}
	}
	else 
	{
		echo 'Incorrect username!';
	}
?>
