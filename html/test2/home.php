<?php 
session_start();
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_user_name'].'</h1>';
  echo '<h4><a href="logout.php">Logout</a></h4>';
} else { 
  header('location:index_avec_include.php');
}
?>