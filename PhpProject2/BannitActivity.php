<?php
include_once ("manager/BannitManager.php");
include_once ("Data/Banni.php");
$listBannit= BannitManager::findAllBannit();
$grade="Admin";
if($grade!="Admin")
{
    header('Location: index.php');
    exit;
}

 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="BannitActivity.css" media="all"/>
        <title>Bannit</title>
    </head>
    <body>
        <div class="block-general">
            <?php
            for($cpt=0;$cpt<sizeof($listBannit);$cpt++)
            {
            ?>
            <div class="block-secondaire">
                <div class="block-pseudo">
                    <p><?php echo $listBannit[$cpt]->getpseudoBannit() ?></p>
                    <form class="" method="POST" action="insertCommentaire.php">
                        <input type="hidden" name="idProfile" value="<?php echo $listBannit[$cpt]->getidProfile() ?>">
                        <input type="hidden" name="Action" value="7">
                        <input  class="button" type="submit" value="DeBan"/>
                    </form>
                </div>
                <div class="block-justification">
                    <p><?php echo $listBannit[$cpt]->getjustification() ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>
