<?php
include_once ("Data/Message.php");
include_once ("manager/MessageManager.php");
include_once ("manager/SujetManager.php");
$Action=$_POST["Action"];
switch ($Action)
{
    case 0:
        if(!empty($_POST["content"])&& !empty($_POST["idProfile"]) && !empty($_POST["idSujet"]))
            {
                $Message=new Message();
                $Message->setText($_POST["content"]);
                $Message->setIdProfile($_POST["idProfile"]);
                $Message->setLikeMessage(0);
                $Message->setDislikeMessage(0);
                $Message->setURLimage(null);
                $Message->setIdSujet($_POST["idSujet"]);
                MessageManager::InsertMessage($Message);
            }
            header('Location: SujetActivity.php');
             exit;
    case 1:
        $idSujet=$_POST["idSujet"];
        SujetManager::deleteSujet($idSujet);
        header('Location: index.php');
        exit;
    case 2:
        $idMessage=$_POST["idMessage"];
        MessageManager::DeleteMessage($idMessage);
        header('Location: SujetActivity.php');
        exit;
    case 3:
        break;
        
}