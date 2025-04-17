<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="menu.php"><button>menu</button></a>

    <?php
    include_once "funzioni riutilizzate/login_check.php";
    include_once "funzioni riutilizzate/db_connection.php";

    $data = $_GET['data_prenotazione'];
    $id_aula = $_GET['id_aula'];
     echo $data;
    $timestamp = date('Y-m-d H:i:s', strtotime($data));

    // echo $timestamp;
    // echo "<br>";
    $username = $_SESSION['user'];

    // $query = "SELECT * FROM prenotare WHERE username = $username and data_prenotazione = '$timestamp'";
    $query = "DELETE FROM prenotare WHERE username = $username and data_prenotazione = '$timestamp' and id = $id_aula";

    // echo $query;
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Prenotazione eliminata con successo.";
    } else {
        echo "Errore durante l'eliminazione della prenotazione: " . mysqli_error($connection);
    }

    ?>
</body>
</html>