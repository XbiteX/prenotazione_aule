<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    session_start();

    // se l'utente non è loggato lo reindirizza alla pagine di login
    if($_SESSION['logged_in']!==true){
        header("Location: form.php");
        exit;
    }
    ?> 
    
    <?php
        require 'vendor/autoload.php'; // include le librerie Composer

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $host = "localhost";
        $user = "root";
        $password = ""; // o la tua password
        $database = "nome_del_tuo_database";

        // Connessione
        $conn = new mysqli($host, $user, $password, $database);

        // Controllo connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per ottenere tutte le tabelle
        $sql = "SHOW TABLES";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Tabelle nel database:</h3><ul>";
            while ($row = $result->fetch_array()) {
                echo "<li>" . $row[0] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Nessuna tabella trovata.";
        }

        $conn->close();
    ?>

</body>
</html>