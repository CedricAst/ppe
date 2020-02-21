<?php
include_once ("manager/SujetManager.php");
include_once ("Data/Sujet.php");
include_once ("manager/MessageManager.php");
include_once ("manager/UtilisateurManager.php");
$idSujet=1;
$Sujet=SujetManager::findSujet($idSujet);
$listMessage= MessageManager::findMessagetoSujet($idSujet);
$Users= UtilisateurManager::findUser($Sujet->getIdProfile());
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SujetActivity</title>
        <link rel="stylesheet" type="text/css" href="index.css" media="all"/>
    </head>
    <body>
        <div class="block-general">
            <div class="blockBannière">
                <div class="image-Profil">
                    <?php $Users->getURLimageProfile() ?>
                </div>
                <div class="Pseudo">
                    <?php  echo $Users->getpseudo();?>
                </div>
            </div>
            <div class="block-generail-text">
                <div class ="zonetexte">
                    <?php echo $Sujet->getText();
                    echo $Sujet->getNomSujet()?>
                </div>
            </div>
        </div> 
       <?php for($cpt=0;$cpt<sizeof($listMessage);$cpt++)
        {
           $user=UtilisateurManager::findUser($listMessage[$cpt]->getIdProfile());
           ?>
           <div class="block-general">
            <div class="blockBannière">
                <div class="image-Profil">
                    <div class="block-like">
                        <?php $user->getURLimageProfile();
                        echo $listMessage[$cpt]->getLikeMessage();?>
                    </div>
                    <div>
                        <?php
                         echo "   ".$listMessage[$cpt]->getDislikeMessage();?>
                    </div>
                </div>
                <div class="Pseudo">
                    <?php 
                    echo $user->getpseudo(); ?>
                </div>
            </div>
            <div class="block-generail-text">
                <div class ="zonetexte">
                    <?php echo $listMessage[$cpt]->getText();?>
                </div>
            </div>
        </div> 
       <?php }?>
    </body>
</html>
