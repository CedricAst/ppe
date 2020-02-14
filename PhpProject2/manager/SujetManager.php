<?php
 include_once(Data/Sujet.php);
 include_once(DatabaseLinkers.php);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SujetManager
 *
 * @author utilisateur
 */
class SujetManager {
    //put your code here
    public static function findSujet($idSujet)
    {
        $Sujet=new Sujet();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Sujet WHERE idSujet=?");
        $state->bindParam(1,$idSujet);
        $state->execute();
        $resultas=$state->fetchAll();
        $resultasSujet=$resultas[0];
        $Sujet->setIdSujet($idSujet);
        $Sujet->setIdProfile($resultasSujet["idProfile"]);
        $Sujet->setNomSujet($resultasSujet["nomSujet"]);
        $Sujet->setLikeSujet($resultasSujet["likeSujet"]);
        $Sujet->setDislikeSujet($resultasSujet["dislikeSujet"]);
        $Sujet->setText($resultasSujet["text"]);
        return $Sujet;
        
    }
    public static function findAllSujet()
    {
        $listSujet=array();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Sujet");
         $state->execute();
        $resultas=$state->fetchAll();
        foreach($resultas as $lineresultas)
        {
             $Sujet= SujetManager::findSujet($lineresultas["idProfile"]);
             $listSujet[]=$Sujet;
        }
        return $listSujet;
    }
    public static function insertSujet($Sujetinsert)
    {
         $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Sujet(nomSujet,likeSujet,dislikeSujet,text,idProfile)
VALUES(?,?,?,?,?");
         $state->bindParam(1,$Sujetinsert->getNomSujet());
         $state->bindParam(2,$Sujetinsert->getLikeSujet());
         $state->bindParam(3,$Sujetinsert->getDislikeSujet());
         $state->bindParam(4,$Sujetinsert->getText());
         $state->bindParam(5,$Sujetinsert->getIdProfile());
         $state->execute();
        
    }
    public static function deleteSujet($idSujet)
    {
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("DELETE FROM Sujet WHERE idSujet=?");
        $state->bindParam(1,$idSujet);
    }
    public static function likeSujet($idSujet)
    {
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("UPDATE Sujet SET likeMessage=likeMessage+1 WHERE idSujet=?");
        $state->bindParam(1,$idSujet);
        
    }
    public static function dislikeSujet($idSujet)
    {
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("UPDATE Sujet SET dislikeMessage=dislikeMessage+1 WHERE idSujet=?");
        $state->bindParam(1,$idSujet);
        
    }
}
