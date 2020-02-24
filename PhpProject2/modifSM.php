<?php
include_once ("Data/Sujet.php");
include_once ("manager/SujetManager.php");
include_once ("Data/Message.php");
include_once ("manager/MessageManager.php");

$Action=$_POST["Action"];
switch ($Action)
{
    case 0:
         $idSujet=$_POST["idSujet"];
        $Sujet=SujetManager::findSujet($idSujet);
        ?><h1><?php echo $Sujet->getNomSujet()  ?></h1>
         <form class="" method="POST" action="insertCommentaire.php">
        <input type="hidden" name="idSujet" value="<?php echo $Sujet->getIdSujet(); ?>">
         <input type="hidden" name="Action" value="3">
         <input type="text" name="nomSujet" value="<?php echo $Sujet->getNomSujet() ?>">
         <textarea class="" name="content" placeholder="Votre commentaire"><?php echo $Sujet->getText() ?></textarea>
        <input  class="" type="submit" value="Modifier le Sujet"/>
        </form>
         <script src="ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
        <?php
                break;
    case 1:
        $idMessage=$_POST["idMessage"];
        $Message= MessageManager::findMessage($idMessage);?>
        <form class="" method="POST" action="insertCommentaire.php">
        <input type="hidden" name="idMessage" value="<?php echo $Message->getIdMessage(); ?>">
        <input type="hidden" name="Action" value="4">
        <textarea class="" name="content" placeholder="Votre commentaire"><?php echo $Message->getText() ?></textarea>
        <input  class="" type="submit" value="Modifier le Message"/>
        </form>
        <script src="ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
        <?php
    break;
}
?>

