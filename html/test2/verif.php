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
				 $CurrentUser=new Utilisateur();
				 $connex=DATABASELINKER::getconnexion();
				 $state=$connex->prepare("SELECT * FROM Utilisateur WHERE pseudo=? AND MDP=? ");
				 $state->bindParam(1,$User);
				 $state->bindParam(2,$Mdp);
				 $state->execute();
				 $resultats = $state->fetchAll();
				 foreach ($resultats as $lineResultat) 
				{
					$_SESSION['idProfile'] = $lineResultat["idProfile"];
					$_SESSION['Mdp'] = $lineResultat["MDP"];
					$_SESSION['pseudo'] = $lineResultat["pseudo"];
					$_SESSION['URLimageProfile']= $lineResultat["URLimageProfile"];
					
				}

				
			}
			catch (PDOException $e) 
			{
				echo "Error : ".$e->getMessage();
			}
			
		}
		else 
		{
			$msg = "Both fields are required!";
		}
	
	}
	header("location: index_avec_include.php");

?>		


