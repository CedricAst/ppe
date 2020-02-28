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
        $idSujet=$_POST["idSujet"];
        $SujetA=SujetManager::findSujet($idSujet);
        $SujetA->setNomSujet($_POST["nomSujet"]);
        $SujetA->setText($_POST["content"]);
        SujetManager::UpdateSujet($SujetA);
        header('Location: SujetAcb tivity.php');
        exit;
    case 4:
        $idMessage=$_POST["idMessage"];
        $MessageA= MessageManager::findMessage($idMessage);
        $MessageA->setText($_POST["content"]);
        MessageManager::UpdateMessage($MessageA);   
        header('Location: SujetActivity.php');
        exit;
    case 5:
        break;
}