<?php
include_once ("Data/Message.php");
include_once ("manager/MessageManager.php");
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