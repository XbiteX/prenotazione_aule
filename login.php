<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prenotazione_aule";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara la query per cercare l'utente nel database
    $query = "SELECT * FROM docenti WHERE username = $username";
    $result = mysqli_query($connection, $query);


    if ($result->num_rows > 0) {
        // L'utente esiste, verifica la password
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Login riuscito
            session_start();
            $_SESSION['user'] = $user;
            header("Location: menu.php");  // Redirect a menu.php
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Password errata');</script>";
            header("Location: form.php");
            exit();
        }
    } else {
        echo "<script type='text/javascript'>alert('Docente non trovato');</script>";
        header("Location: form.php");
        exit();
    }
}

$connection->close();
?>

</body>
</html>