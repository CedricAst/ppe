<?php
    include_once('Data/Message.php');
    include_once ('DatabaseLinkers.php');
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
        $Message=new Message();
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
        $Message->setIdSujet($resultasMessage["idSujet"]);
        $Message->setIdProfile($resultasMessage["idProfile"]);
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
             $Message= MessageManager::findMessage($lineresultas["idMessage"]);
             $listMessage[]=$Message;
        }
        return $listMessage;
    }
    public static function InsertMessage($MesssageE)
    {
        $connex= DatabaseLinkers::getconnexion();
        $state=$connex->prepare("INSERT INTO Message(text,likeMessage,dislikeMessage,URLimage,idSujet,idProfile)
VALUES (?,?,?,?,?,?)");
        $Text=$MesssageE->getText();
        $LikeMessage=$MesssageE->getLikeMessage();
        $DislikeMessage=$MesssageE->getDislikeMessage();
        $URLimage=$MesssageE->getURLimage();
        $IdSujet=$MesssageE->getIdSujet();
        $IdProfile=$MesssageE->getIdProfile();
        
        
        $state->bindParam(1,$Text);
        $state->bindParam(2,$LikeMessage);
        $state->bindParam(3,$DislikeMessage);
        $state->bindParam(4,$URLimage);
        $state->bindParam(5,$IdSujet);
        $state->bindParam(6,$IdProfile);
        $state->execute();
    }
  public static function DeleteMessage($idMessage)
  {
      $connex= DatabaseLinkers::getconnexion();
      $state=$connex->prepare("DELETE FROM Message WHERE idMessage=?");
      $state->bindParam(1,$idMessage);
      $state->execute();
  }
  public static function  UpdateMessage($MessageA,$idMessage)
  {
      $connex= DatabaseLinkers::getconnexion();
      $state=$connex->prepare("ALTER TABLE UPDATE Message SET text=?,likeMessage=?,dislikeMessage=?,URLimage=? WHERE idMessage=?");
      $state->bindParam(1,$MessageA->getText());
      $state->bindParam(2,$MessageA->getLikeMessage());
      $state->bindParam(3,$MessageA->getDislikeMessage());
      $state->bindParam(4,$MessageA->getURLimage());
      $state->bindParam(5,$MessageA->getIdSujet());
      $state->execute();   
  }
}
