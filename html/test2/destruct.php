<?php
session_start();
$_SESSION['idProfile'] = "";
$_SESSION['Mdp'] = "";
$_SESSION['pseudo'] = "";
if(empty($_SESSION['idProfile'])) header("location: index_avec_include.php");
session_destroy();
?>