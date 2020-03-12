<?php
include_once ("Data/Banni.php");
include_once ("DatabaseLinkers.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BannitManager
 *
 * @author utilisateur
 */
class BannitManager {
    //put your code here
    public static function findBannit($idBannit)
    {
       $Bannit=new Banni();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Bannit WHERE idBannit=?");
        $state->bindParam(1,$idBannit);
        $state->execute();
        $resultas=$state->fetchAll();
        $resultasMessage=$resultas[0];
        $Bannit->setIdBannit($idBannit);
        $Bannit->setPseudoBannit($resultasMessage["pseudoBannit"]);
        $Bannit->setJustification($resultasMessage["justification"]);
        $Bannit->setIdProfile($resultasMessage["idProfile"]);
        return $Bannit;   
    }
    public static function findAllBannit()
    {
        $listBannit=array();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Bannit");
        $state->execute();
        $resultas=$state->fetchAll();
        foreach($resultas as $lineresultas)
        {
             $Bannit= BannitManager::findBannit($lineresultas["idBannit"]);
             $listBannit[]=$Bannit;
        }
        return $listBannit;
    }
    public static function insertBannit($_pseudoBannit,$_justification,$_idProfile){
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Bannit(pseudoBannit,justification,idProfile)
VALUES(?,?,?)");
        $pseudoBannit=$_pseudoBannit;
        $justification=$_justification;
        $idProfile=$_idProfile;
         $state->bindParam(1,$pseudoBannit);
         $state->bindParam(2,$justification);
         $state->bindParam(3,$idProfile);
         $state->execute();
    }
    public static function deban($idProfile)
    {
        $connex=DatabaseLinkers::getconnexion();
        $state=$connex->prepare("DELETE FROM Bannit WHERE idProfile=?");
        $state->bindParam(1,$idProfile);
        $state->execute();
    }
    public static function findBannittoidProfile($idProfile)
    {
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Bannit WHERE idProfile=?");
        $state->bindParam(1,$idProfile);
        $state->execute();
        $resultas=$state->fetchAll();
        if(count($resultas) == 0)
        {
            return FALSE;
        }else
        {
            return TRUE;
        }
    }
    
}
