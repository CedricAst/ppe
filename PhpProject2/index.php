<?php
include ("Data/Sujet.php");
include ("Data/Utilisateur.php");
$tab= array();
$tab[1]=new Sujet();
$tab[2]=new Sujet();
$tab[3]=new Sujet();
$tab[1]->setText("sfidqpfisuipruiqfpiqrspfuipuiqspuiqsuiqrfurfuo");
$tab[1]->setNomSujet("issou");
$tab[1]->setIdProfile(1);
$tab[2]->setText("dpufpuqusf");
$tab[2]->setNomSujet("essai1");
$tab[2]->setIdProfile(2);
$tab[3]->setText("sdljfspfpsdfsu");
$tab[3]->setNomSujet("essai2");
$tab[3]->setIdProfile(3);
$tab2=array();
$tab2[1]=new Utilisateur();
$tab2[2]=new Utilisateur();
$tab2[3]=new Utilisateur();
$tab2[1]->setidProfile(1);
$tab2[1]->setpseudo("bjr");
$tab2[2]->setidProfile(2);
$tab2[2]->setpseudo("salut");
$tab2[3]->setpseudo(3);
$tab2[3]->setpseudo("test3");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="index.css" media="all"/>
        <title>Bjr</title>
    </head>
    <body>
        <?php for($cpt=1;$cpt<sizeof($tab);$cpt++)
        {?>
           <div class="block-general">
            <div class="blockBannière">
                <div class="image-Profil">
                    
                </div>
                <div class="Pseudo">
                    <?php echo $tab2[$cpt]->getpseudo() ?>
                </div>
            </div>
            <div class="block-generail-text">
                <div class ="zonetexte">
                    <?php echo $tab[$cpt]->getText();
                    echo $tab[$cpt]->getNomSujet()?>
                </div>
            </div>
        </div> 
       <?php }
?>
              
</html>
