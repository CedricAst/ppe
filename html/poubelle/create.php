<?php
session_start();

include_once ("connex.php");

if ($stmt = $con->prepare('INSERT INTO Utilisateur (pseudo,MDP) VALUES("?","?")')
	{
		// Binding
		$state->bindParam(1,$User);
        $state->bindParam(2,$Mdp);
        $state->bindParam(3,"Utilisateur");
		$stmt->execute();
		// stock les entré 
		$stmt->store_result();	
		header('Location: index_avec_include.php');
	}
	
	header('Location: index_avec_include.php');
	

	
	