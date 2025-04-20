<?php
include_once "funzioni riutilizzate/login_check.php";
include_once "funzioni riutilizzate/db_connection.php";

if($_SERVER["REQUEST_METHOD"]=="GET"){

    $tabella = $_GET["tabella"]; // Tabella sulla quale fare l'aggiunta

    if($tabella == "aule_risorse") {
        $id_aula = $_GET['id_aula'];
    }elseif($tabella == "docenti") {
        $nome = $_GET["nome"];
        $cognome = $_GET["cognome"];
        $password = $_GET["password"];
    }else{
        $id_aula = $_GET['id_aula'];
        $data = $_GET['data_prenotazione'];
        $timestamp = date('Y-m-d H:i:s', strtotime($data));
        $usr_for_prenotation = $_GET["usr_for_prenotation"];
    }

    $query;

    if($tabella == "aule_risorse") {
        $query = "INSERT INTO aule_risorse (id) VALUES ('$id_aula')";
    }elseif($tabella == "docenti") {
        $query = "INSERT INTO docenti (nome, cognome, password) VALUES ('$nome', '$cognome', '$password')";
    }else{
        $query = "INSERT INTO prenotare (username,id, data_prenotazione) VALUES ('$usr_for_prenotation', '$id_aula', '$timestamp')";
    }

    try{
        $result = mysqli_query($connection, $query);
    } catch (Exception $e) {
        echo "Errore: " . $e->getMessage();
    }

}
?>