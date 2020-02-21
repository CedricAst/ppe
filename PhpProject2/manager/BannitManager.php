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
             $Bannit= BannitManager::findBannit($idBannit);
             $listBannit[]=$Bannit;
        }
        return $listBannit;
    }
    public static function insertBannit($Banniinsert){
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Bannit(pseudoBannit,justification,idProfile)
VALUES(?,?,?");
        $pseudoBannit=$Banniinsert->getpseudoBannit();
        $justification=$Banniinsert->getjustification();
        $idProfile=$Banniinsert->getidProfile();
         $state->bindParam(1,$pseudoBannit);
         $state->bindParam(2,$justification);
         $state->bindParam(3,$idProfile);
         $state->execute();
    }
    public static function deban($idProfile)
    {
    
    }
}
