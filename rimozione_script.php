<?php
include_once "funzioni riutilizzate/login_check.php";
include_once "funzioni riutilizzate/db_connection.php";

if($_SERVER["REQUEST_METHOD"]=="GET"){

    $tabella = $_GET["tabella"]; // Tabella sulla quale fare la rimozione

    if($tabella == "aule_risorse") {
        $id_aula = $_GET['id_aula'];
    }elseif($tabella == "docenti") {
        $usr_to_remove = $_GET["usr_to_remove"];
    }else{
        $id_aula = $_GET['id_aula'];
        $data = $_GET['data_prenotazione'];
        $timestamp = date('Y-m-d H:i:s', strtotime($data));    }

    $query;

    if($tabella == "aule_risorse") {
        $query = "DELETE FROM aule_risorse WHERE id = $id_aula";
    }elseif($tabella == "docenti") {
        $query = "DELETE FROM docenti WHERE username = $usr_to_remove";
    }else{
        $query = "DELETE FROM prenotare WHERE data_prenotazione = '$timestamp' and id = $id_aula";
    }

    try{
        $result = mysqli_query($connection, $query);
        echo "rimozione effettuata con successo.";
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
    }

}
?>