<?php
session_start();
	include_once("DATABASELINKER.php");
	include_once("Data/Utilisateur.php");
	if(!empty($_POST['MDP'] && !empty($_POST['pseudo'])))
	{
		$User= ($_POST["pseudo"]);
		$Mdp= ($_POST["MDP"]);
		if ($User !="" && $Mdp !="")
		{	
			try 
			{
				$User1="user" ;
				 $CurrentUser=new Utilisateur();
				 $connex=DATABASELINKER::getconnexion();
				 $state=$connex->prepare("INSERT INTO Utilisateur(pseudo,MDP,grade,URLimageProfile)VALUES(?,?,?,NULL)");
				 $state->bindParam(1,$User);
				 $state->bindParam(2,$Mdp);
				 $state->bindParam(3,$User1);
				 $state->execute();
				
				
			}
			catch (PDOException $e) 
			{
				echo "Error : ".$e->getMessage();
			}
		}	
	}
	header("location: index_avec_include.php");
