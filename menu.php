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
    <a href="logout.php"><button>logout</button></a> <!-- Bottone per il logout -->
    <a href="visualizzazione.php"><button>visualizza tabelle</button></a>
    <a href="rimozione_GUI.php"><button>elimina prenotazione</button></a>
    <a href="aggiunta_GUI.php"><button>prenota un'aula</button></a>


    <?php
    // Se l'utente è admin, mostra il bottone per aggiungere/rimuovere aule, docenti o prenotazioni
    if($_SESSION['user'] == '6'){
        echo "<a href='aggiuta_rimozione_aule_docenti_prenotazioni.php'><button>aggiungi/rimuovi aule, docenti o prenotazioni</button></a>";
    }
    ?>


</body>
</html>