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

    <h1>loggin effettuato con successo</h1>
    <a href="visualizzazione.php"><button>visualizza tabelle</button></a>
    <a href="eliminazione.php"><button>elimina prenotazione</button></a>
    <a href="form.php"><button>prenota un'aula</button></a>


</body>
</html>