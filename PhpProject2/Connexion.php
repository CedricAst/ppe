<?php
class Connexion
{
   function testIdentifiants($User, $Mdp)
    {
       $CurrentUser=new Utilisateur();  
       $CurrentUser=DatabaseLinkers::getUser($User, $Mdp);
       
        $codeRetour = false;
        
        if ($CurrentUser->getpseudo() != NULL && $CurrentUser->getMDP() != NULL)
        {
            $codeRetour = true;
        }
              
        return $codeRetour;
    }
        
}


?>