<?php
include_once ("Data/Utilisateur.php");
include_once ("manager/UtilisateurManager.php");
include_once ("manager/SujetManager.php");
include_once ("Data/Sujet.php");
include_once ("manager/MessageManager.php");
$idProfileS=1;
$idProfile=isset($_GET["idP"]) ? $_GET["idP"] :$idProfileS;
$idM=isset($_GET["M"]) ? $_GET["M"] :0;
$User=UtilisateurManager::findUser($idProfile);
$listMessage=MessageManager::findMessagetoUser($idProfile);
$listSujet= SujetManager::findAllSujettoUser($idProfile);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="ProfileActivity.css" media="all"/>
        <title>ProfileActivity</title>
    </head>
    <body>
        <?php if($idProfileS==$User->getidProfile() && $idM==1 )
                    {?>
            <form class="" method="POST" action="insertCommentaire.php">
                <input type="hidden" name="idProfile" value="<?php echo $idProfileS ?>">
                <input type="hidden" name="Action" value="5">
           <?php 
        }
?>
        <div class="block-general">
            <div class="block-secondaire">
                <div class="block-imageProfile">
                    <?php if($idProfileS==$User->getidProfile() && $idM==1 )
                    {?>
                    <div>
                    <input type="text" name="URLimageProfile" value="<?php echo $User->getURLimageProfile() ?>">
                    </div>
                    <?php
                    }else
                    {?>
                    <img src="<?php echo $User->getURLimageProfile() ?>" style="width: 100%; height: 100%">
                    <?php
                    }?>
                </div>
                <div class="block-nom">
                     <?php if($idProfileS==$User->getidProfile() && $idM==1 )
                    {?>
                    <div>
                    <input type="text" name="pseudo" value="<?php echo $User->getpseudo() ?>">
                    </div>
                    <?php
                    }else
                    {?>
                    <h1><?php echo $User->getpseudo() ?></h1>
                    <?php
                    
                    }
                    if($idProfileS==$User->getidProfile() && $idM!=1)
                    {?>
                    <a href="http://localhost/ppe/PhpProject2/ProfileActivity.php?idP=<?php echo $idProfile  ?>&M=1">Modifier</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="block-secondaire2">
                <div class="block-profil">
                    <p>nombre de message:<?php echo sizeof($listMessage) ?></p>
                    <p>nombre de sujet:<?php echo sizeof($listSujet) ?></p>
                    <p>grade:<?php echo $User->getgrade()?></p>
                    <p>Date inscription:<?php echo $User->getDateInscription()?></p>
                </div>
                <div class="blockCommentaire">
                    <h3>liste de Sujet</h3>
                    <?php for($i=0;$i<sizeof($listSujet);$i++)
                    {?>
                    <div>
                        <div style="text-decoration: underline;"><?php echo $listSujet[$i]->getNomSujet() ?></div>
                        <div><?php echo $listSujet[$i]->getText() ?><?php echo $listSujet[$i]->getDateCreationS()?></div>
                    </div>                    
                   <?php
                    }
                    ?>
                    <h3>liste de message</h3>
                    <?php for($j=0;$j<sizeof($listMessage);$j++)
                    {?>
                    <div>
                        <div><?php echo $listMessage[$j]->getText() ?>><?php echo $listMessage[$j]->getDateCreationM()?></div>
                    </div>                    
                   <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php if($idProfileS==$User->getidProfile() && $idM==1 )
         {?>
        <div class="block-modification">
            <p>modifier le mot de passe:</p>
            <input type="text" name="newMDP" value="">
            <p>Verification du mot de passe ou (l'ancien de mot de passe) afin de sauvegarder les modifications  </p>
            <input type="text" name="MDP" value="">
            <input type="submit" value="Envoyer" >
        </div>
        </form>
         <?php } ?>
    </body>
</html>
