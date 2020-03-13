<?php
session_start();

include_once ("connex.php");
	
if ( !isset($_POST['pseudo'], $_POST['MDP']) ) 
	{
		// remplire les champs
		die ("Veuillez remplir le champ nom d'utilisateur et mot de passe!");
	}

if ($stmt = $con->prepare('SELECT idProfile, MDP FROM Utilisateur WHERE pseudo = ?')) 
	&{
		// Binding
		$stmt->bind_param(1, $_POST['pseudo']);
		$stmt->execute();
		// stock les entré 
		$stmt->store_result();	
	}
	if ($stmt->num_rows > 0) 
	{
		$stmt->bind_result($idProfile, $MDP);
		$stmt->fetch();
		// CHECK MDP
		if ($_POST['MDP'] === $MDP) 
		{
			
			// CREATION DE SESSION
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['pseudo'];
			$_SESSION['id'] = $idProfile;
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
