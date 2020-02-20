<?php
session_start();

    class DatabaseLinker
    {
        private static $host = "mysql:host=localhost;dbname=bdd_ppe1;charset=utf8";
        private static $login = "root";
        private static $password = "root";
        private static $con;
        
        public static function getConnexion()
        {
            if (DatabaseLinker::$connex == null)
            {
                DatabaseLinker::$connex = new PDO(DatabaseLinker::$host, DatabaseLinker::$login, DatabaseLinker::$password);
            }
            
            return DatabaseLinker::$con; 
        }
    }

if ($stmt = $con->prepare('INSERT INTO Utilisateur (pseudo,MDP) VALUES("?","?")')
	{
		// Binding
		$state->bindParam(1,$User);
        $state->bindParam(2,$Mdp);
        $state->bindParam(3,"User");
		$stmt->execute();
		// stock les entré 
		$stmt->store_result();	
	}
	
	

	
	