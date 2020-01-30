<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabasLinker
 *
 * @author utilisateur
 */
class DatabaseLinkers {
    //put your code here
   	private static $URL="mysql:host=localhost;dbname=BDD_PPE1;charset=utf8";
	private static $nomUtilisateurs="root";
	private static $mdp="root";
	private static $PDO;
        
    public static function  getconnexion(){
		if(DatabaseLinkers::$PDO == null)
		{
                    DatabaseLinkers::$PDO=new PDO(DatabaseLinkers::$URL, DatabaseLinkers::$nomUtilisateurs, DatabaseLinkers::$mdp);
		
		}
                return DatabaseLinkers::$PDO;
	}    

     
       
 }
