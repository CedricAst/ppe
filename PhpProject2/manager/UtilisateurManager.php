<?php
include_once ("Data/Utilisateur.php");
include_once ("DatabaseLinkers.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilisateurManager
 *
 * @author utilisateur
 */
class UtilisateurManager {
    
    public static function findUser($idProfile)
    {
        $Utilisateur=new Utilisateur();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Utilisateur WHERE idProfile=?");
        $state->bindParam(1,$idProfile);
        $state->execute();
        $resultas=$state->fetchAll();
        $resultasMessage=$resultas[0];
        $Utilisateur->setidProfile($idProfile);
        $Utilisateur->setidProfile($resultasMessage["idProfile"]);
        $Utilisateur->setpseudo($resultasMessage["pseudo"]);
        $Utilisateur->setMDP($resultasMessage["MDP"]);
        $Utilisateur->setURLimageProfile($resultasMessage["URLimageProfile"]);
        $Utilisateur->setgrade($resultasMessage["grade"]);
        return $Utilisateur;   
        
    }

    public static function findUtilisateurAll()
    {
        $listUtilisateur=array();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Utilisateur");
        $state->execute();
        $resultas=$state->fetchAll();
        foreach($resultas as $lineresultas)
        {
             $Sujet= SujetManager::findSujet($lineresultas["idProfile"]);
             $listUtilisateur[]=$Sujet;
        }
        return $listUtilisateur;
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
        $User1="User";
        $CurrentUser=new Utilisateur();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Utilisateur(pseudo,MDP,grade,URLimageProfile)VALUES(?,?,?,NULL)");
        $state->bindParam(1,$User);
        $state->bindParam(2,$Mdp);
        $state->bindParam(3,$User1);
        $state->execute();
        
                
    }
    public static function UpdateUser($User)
    {
      $pseudo=$User->getpseudo();
      $MDP=$User->getMDP();
      $URLimageProfile=$User->getURLimageProfile();
      $idProfile=$User->getidProfile();
      $connex= DatabaseLinkers::getconnexion();
      $state=$connex->prepare("UPDATE Utilisateur SET pseudo=?,MDP=?,URLimageProfile=? WHERE idProfile=?");
      $state->bindParam(1,$pseudo);
      $state->bindParam(2,$MDP);
      $state->bindParam(3,$URLimageProfile);
      $state->bindParam(4,$idProfile);
      $state->execute();  
    }
}
