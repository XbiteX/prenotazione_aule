<?php
$db_host = "localhost";

        $db_name = "prenotazione_aule";
        $db_user = "root";
        $db_pass = "";

        // Connessione al DB
        $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($connection->connect_error) {
            die("Connessione fallita: " . $connection->connect_error);
        }
?>