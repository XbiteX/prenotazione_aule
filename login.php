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

$servername = "localhost";
$db_user = "root";
$db_password = "";
$dbname = "prenotazione_aule";

// Connessione al DB
$connection = new mysqli($servername, $db_user, $db_password, $dbname);
if ($connection->connect_error) {
    die("Connessione fallita: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement per sicurezza
    $stmt = $connection->prepare("SELECT * FROM docenti WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Controlla se esiste l'utente
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica password
        if ($row['password'] === $password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $username;
            header("Location: menu.php");
            exit();
        } else {
            header("Location: form.php?error=password");
            exit();
        }
    } else {
        header("Location: form.php?error=username");
        exit();
    }

    $stmt->close();
}

$connection->close();
?>


</body>
</html>