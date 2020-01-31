<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabasLinker
 *
 * @author utilisateur
 */
class DatabaseLinkers {
    //put your code here
   	private static $URL="mysql:host=localhost;dbname=BDD_PPE1;charset=utf8";
	private static $nomUtilisateurs="root";
	private static $mdp="root";
	private static $PDO;
        
    public static function  getconnexion(){
		if(DatabaseLinkers::$PDO == null)
		{
                    DatabaseLinkers::$PDO=new PDO(DatabaseLinkers::$URL, DatabaseLinkers::$nomUtilisateurs, DatabaseLinkers::$mdp);
		
		}
                return DatabaseLinkers::$PDO;
	}    
    public static function getUser($User,$Mdp)
     {
         $CurrentUser=new Utilisateur();
         $connex=DatabaseLinkers::getconnexion();
         $state=$connex->prepare("SELECT * FROM Profile WHERE pseudo=? AND MDP=? ");
         $state->bindParam(1,$User);
         $state->bindParam(2,$Mdp);

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
    public static function  newAccount($User,$Mdp)
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
       
 }
