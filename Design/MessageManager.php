<?php
    include('Data/Message.php');
    include('DatabaseLinkers');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageManager
 *
 * @author utilisateur
 */
class MessageManager {
    //put your code here
    public static function findMessage($idMessage)
    {
        $Message=new Messsage();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Message WHERE idMessage=?");
        $state->bindParam(1,$idMessage);
        $state->execute();
        $resultas=$state->fetchAll();
        $resultasMessage=$resultas[0];
        $Message->setIdMessage($idMessage);
        $Message->setText($resultasMessage["text"]);
        $Message->setLikeMessage($resultasMessage["likeMessage"]);
        $Message->setDislikeMessage($resultasMessage["dislikeMessage"]);
        $Message->setURLimage($resultasMessage["URLimage"]);
        $Message->setIdSujet($resultas["idSujet"]);
        return $Message;   
    }
    public static function findMessagetoSujet($idSujet)
    {
        $listMessage=array();
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("SELECT * FROM Message WHERE idSujet=?");
        $state->bindParam(1,$idSujet);
        $state->execute();
        $resultas=$state->fetchAll();
        foreach($resultas as $lineresultas)
        {
             $Message= SujetManager::findSujet($lineresultas["idProfile"]);
             $listMessage[]=$Message;
        }
        return $listMessage;
    }
  
}
