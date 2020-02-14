<?php
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
	}_
	else
	{	
	($stmt = $con->prepare('INSERT INTO Utilisateur (pseudo,MDP,grade,URLimageProfile) VALUES
	("superkiller",123456789,0,"DATA\image\image_Utilisateur")')
	}
	{
		// Binding
		$stmt->execute();
		// stock les entré 
		$stmt->store_result();	
	}
	
	// creation de compte donné par louis a adapté 
	
	    {
        $CurrentUser=new Utilisateur();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Utilisateur(idProfile,pseudo,MDP,grade,URLimageProfile)VALUES(NULL,?,?,?,NULL)");
        $state->bindParam(1,$User);
        $state->bindParam(2,$Mdp);
        $state->bindParam(3,"User");
        $state->execute();
        $resultats = $state->fetchAll();
         foreach ($resultats as $lineResultat) 
         {
             $CurrentUserUser->setURLimageProfile($lineResultat["$URLimageProfile"]);
             $CurrentUserUser->setMDP($Mdp);
             $CurrentUserUser->setgrade($lineResultat["grade"]);
             $CurrentUserUser->setidProfile($lineResultat["$idProfile"]);
             $CurrentUserUser->setpseudo($User);

         }
         return $CurrentUserr;
                
    }
	
	
	