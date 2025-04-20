<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "funzioni riutilizzate/login_check.php";
    include_once "funzioni riutilizzate/db_connection.php";
    ?>

    <form action="aggiuta_rimozione_aule_docenti_prenotazioni_script.php" method="GET">
        <div class="container">
        <label for="tabella">scegli una tabella da modificare:</label>
        <select name="tabella">
            <?php
                // Query per ottenere il nome di tutte le tabelle
                $sql = "SHOW TABLES";
                $result = mysqli_query($connection, $sql);
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
            ?>
        </select>

            <label for="operazione"><b>scegli il tipo di operazione</b></label>
            <select name="operazione">
                <option value="aggiunta">aggiunta</option>
                <option value="rimozione">rimozione</option>
           </select>
            <button type="submit">submit</button>
        </div>
    </form>
</body>
</html>