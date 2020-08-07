<?php
require 'config.php';

session_start();

// Verifying if there is a session logged
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    // Get id will be deleted
    if(isset($_GET['id']) && empty($_GET['id'] ) == false ){
        $id = addslashes($_GET['id']);
    
        $sql = "DELETE FROM usuarios WHERE id = '$id' ";
        $pdo->query($sql);
    
        header("Location: index.php");
        
    } else{
        header("Location: index.php");
    }

} else{
    header("Location: login.php");
}

?>