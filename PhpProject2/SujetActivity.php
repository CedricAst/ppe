<?php
include_once ("manager/SujetManager.php");
include_once ("Data/Sujet.php");
include_once ("manager/MessageManager.php");
include_once ("manager/UtilisateurManager.php");
$idSujet=1;
if(SujetManager::findSujet($idSujet)==NULL)
{
    header('Location: index.php');
        exit;
}
$Sujet=SujetManager::findSujet($idSujet);
$limit=5;
$page=isset($_GET["page"]) ? $_GET["page"] :1;
$start=($page-1)*$limit;
$listMessage= MessageManager::findMessagetoSujet($idSujet,$start,$limit);
$pages= MessageManager::findMessagetoSujetCount($idSujet);
$Users= UtilisateurManager::findUser($Sujet->getIdProfile());
$test=1;
$grade="Admin";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SujetActivity</title>
        <link rel="stylesheet" type="text/css" href="index.css" media="all"/>
    </head>
    <body>
        <h1><?php echo $Sujet->getNomSujet() ?></h1>
        <nav>
            <ul>
                <li>
                    <a href="http://localhost/ppe/PhpProject2/SujetActivity.php?page=<?php if($page-1<1)
                        {
                            echo $page;
                        }else
                        {
                            echo $page-1; 
                        }
                         ?>">
                        <span>&laquo; Previous </span>
                    </a>
                </li>
                <?php for($i =1; $i<= $pages; $i++)
                {
                ?>
                <li>
                    <a href="http://localhost/ppe/PhpProject2/SujetActivity.php?page=<?php echo $i ?>"><?php echo $i ?></a> 
                </li>
                <?php }?>
                <li>
                    <a href="http://localhost/ppe/PhpProject2/SujetActivity.php?page=<?php if($page+1>$pages)
                        {
                            echo $page;
                        }else
                        {
                            echo $page+1; 
                        }
                         ?>">
                        <span>&raquo;; Previous </span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php if($page==1)
        {?>
        <div class="block-general">
            <div class="blockBannière">
                <div class="image-Profil">
                    <?php $Users->getURLimageProfile() ?>
                </div>
                <div class="Pseudo">
                    <?php  echo $Users->getpseudo();?>
                </div>
                <div class="action">
                  <?php if($test == $Users->getidProfile())
                  {
                  ?>
                   <form class="" method="POST" action="insertCommentaire.php">
                        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
                        <input type="hidden" name="Action" value="1">
                        <input  class="button" type="submit" value="Supprimer"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                <div class="action">
                  <?php if($test == $Users->getidProfile())
                  {
                  ?>
                    <form class="" method="POST" action="modifSM.php">
                        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
                        <input type="hidden" name="Action" value="1">
                        <input  class="button" type="submit" value="Modifier"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                 <div class="action">
                  <?php if($test != $Users->getidProfile())
                  {
                  ?>
                    <form class="" method="POST" action="modifSM.php">
                        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
                        <input type="hidden" name="idProfile" value="<?php echo $Users->getidProfile(); ?>"
                        <input type="hidden" name="Action" value="2">
                        <input  class="button" type="submit" value="Modifier"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                <div class="action">
                  <?php if($grade == "Admin")
                  {
                  ?>
                   <form class="" method="POST" action="modifSM.php">
                       <input type="hidden" name="idProfile" value="<?php echo $Users->getidProfile() ?>">
                        <input type="hidden" name="Action" value="4">
                        <input  class="button" type="submit" value="Bannir"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
            </div>
       
            <div class="block-generail-text">
                <div class ="zonetexte">
                    <?php echo $Sujet->getText();
                    echo $Sujet->getNomSujet()?>
                </div>
            </div>
        </div>
       <?php } ?>
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
                    <a href="ProfileActivity.php?idP=<?php echo $user->getidProfile() ?>"><?php 
                    echo $user->getpseudo(); ?></a>
                </div>
                <div class="action">
                  <?php if($test == $listMessage[$cpt]->getIdProfile())
                  {
                  ?>
                   <form class="" method="POST" action="insertCommentaire.php">
                       <input type="hidden" name="idMessage" value="<?php echo $listMessage[$cpt]->getIdMessage() ?>">
                        <input type="hidden" name="Action" value="2">
                        <input  class="button" type="submit" value="Supprimer"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                <div class="action">
                  <?php if($test == $listMessage[$cpt]->getIdProfile())
                  {
                  ?>
                    <form class="" method="POST" action="modifSM.php">
                       <input type="hidden" name="idMessage" value="<?php echo $listMessage[$cpt]->getIdMessage() ?>">
                        <input type="hidden" name="Action" value="1">
                        <input  class="button" type="submit" value="Modifier"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                <div class="action">
                  <?php if($test != $listMessage[$cpt]->getIdProfile())
                  {
                  ?>
                    <form class="" method="POST" action="modifSM.php">
                        <input type="hidden" name="idMessage" value="<?php echo $listMessage[$cpt]->getIdMessage() ?>">
                        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
                        <input type="hidden" name="idProfile" value="2">
                        <input type="hidden" name="Action" value="3">
                        <input  class="button" type="submit" value="Répondre"/>
                    </form>
                    <?php
                  }
                    ?>
                </div>
                <div class="action">
                  <?php if($grade == "Admin")
                  {
                  ?>
                   <form class="" method="POST" action="modifSM.php">
                       <input type="hidden" name="idProfile" value="<?php echo $Users->getidProfile() ?>">
                        <input type="hidden" name="Action" value="4">
                        <input  class="button" type="submit" value="Bannir"/>
                    </form>
                    <?php
                  }
                    ?>
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
         <input type="hidden" name="Action" value="0">
         <textarea class="commentarea" name="content" placeholder="Votre commentaire"><blockquote><?php echo $Sujet->getText() ?></blockquote></textarea>
        <input  class="button" type="submit" value="Envoyer un Commentaire"/>
        </form>
        </div>
    <script src="ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    </body>
</html>
