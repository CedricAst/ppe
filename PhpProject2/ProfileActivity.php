<?php
include_once ("Data/Utilisateur.php");
include_once ("manager/UtilisateurManager.php");
include_once ("manager/SujetManager.php");
include_once ("Data/Sujet.php");
include_once ("manager/MessageManager.php");
$idProfile=1;
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
        <div class="block-general">
            <div class="block-secondaire">
                <div class="block-imageProfile">
                    <img src="<?php echo $User->getURLimageProfile() ?>" style="width: 100%; height: 100%">
                </div>
                <div class="block-nom">
                    <h1><?php echo $User->getpseudo() ?></h1>
                    <a href="http://localhost/ppe/PhpProject2/ProfileActivity.php?M=1">Modifier</a>
                </div>
            </div>
            <div class="block-secondaire2">
                <div class="block-profil">
                    <p>nombre de message:<?php echo sizeof($listMessage) ?></p>
                    <p>nombre de sujet:<?php echo sizeof($listSujet) ?></p>
                    <p>grade:<?php echo $User->getgrade()?></p>
                </div>
                <div class="blockCommentaire">
                    <h3>liste de Sujet</h3>
                    <?php for($i=0;$i<sizeof($listSujet);$i++)
                    {?>
                    <div>
                        <div style="text-decoration: underline;"><?php echo $listSujet[$i]->getNomSujet() ?></div>
                        <div><?php echo $listSujet[$i]->getText() ?></div>
                    </div>                    
                   <?php
                    }
                    ?>
                    <h3>liste de message</h3>
                    <?php for($j=0;$j<sizeof($listMessage);$j++)
                    {?>
                    <div>
                        <div><?php echo $listMessage[$j]->getText() ?></div>
                    </div>                    
                   <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
