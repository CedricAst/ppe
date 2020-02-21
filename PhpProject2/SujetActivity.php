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
                    <div class="canemarchepas">
                        <?php $user->getURLimageProfile();
                        echo $listMessage[$cpt]->getLikeMessage();?>
                    </div >
                    <div class="canemarchepas1">
                        <?php
                         echo "   ".$listMessage[$cpt]->getDislikeMessage();?>
                    </div>
                </div>
                <div class="Pseudo">
                    <?php 
                    echo $user->getpseudo(); ?>
                </div>
                <div>
                    
                </div>
            </div>
            <div class="block-generail-text">
                <div class ="zonetexte">
                    <?php echo $listMessage[$cpt]->getText();?>
                </div>
            </div>
        </div>
    </div>
       <?php }?>
        <div class="insertCommentaire">
            <form class="" method="POST" action="insertCommentaire.php">
        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
        <input type="hidden" name="idProfile" value="2">
        <textarea class="commentarea" name="content" placeholder="Votre commentaire"></textarea>
        <input  class="button" type="submit" value="Envoyer un Commentaire"/>
        </form>
        </div>
    </body>
</html>
