<?php
session_start();

// se l'utente non è loggato lo reindirizza alla pagine di login
if($_SESSION['logged_in']!==true){
    header("Location: form.php");
    exit;
}
?> 