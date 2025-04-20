<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        include_once "funzioni riutilizzate/db_connection.php";
        include_once "funzioni riutilizzate/login_check.php";

        $tabella = $_GET['tabella'];
        $operazione = $_GET['operazione'];

        // stampa la tabella per avercela di financo
        $query = "SELECT * FROM $tabella";
        $result = mysqli_query($connection, $query);
        $fields = mysqli_fetch_fields($result); // Ottieni i nomi dei campi

        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='8'>";
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<th>$field->name</th>";
            }
            echo "</tr>";
        
            // Cicla tra i risultati e stampa ogni riga nella tabella
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($fields as $field){
                    echo "<th>".$row[$field->name]."</th>";
                }
                echo "</tr>";
            }
            echo "</table>";

            if($operazione == 'aggiunta'){
                echo "<form action='aggiunta_script.php' method='GET'>";
                echo "<input type='hidden' name='tabella' value=$tabella>";

                if ($tabella == 'aule_risorse'){
                    echo "<label for='id_aula'>ID aula da aggiungere</label>";
                    echo "<input type='number' name='id_aula'>";
                } elseif ($tabella == 'docenti'){
                    echo "<label for='nome'>nome docente da aggiungere</label>";
                    echo "<input type='text' name='nome'>";
                    echo "<label for='cognome'>cognome docente da aggiungere</label>";
                    echo "<input type='text' name='cognome'>";
                    echo "<label for='password'>password docente da aggiungere</label>";
                    echo "<input type='password' name='password'>";
                } elseif ($tabella == 'prenotare'){
                    echo "<label for='id_aula'>ID dell'aula da prenotare</label>";
                    echo "<input type='number' name='id_aula'>";
                    echo "<label for='data_prenotazione'>Data e ora prenotazione:</label>";
                    echo "<input type='datetime-local' name='data_prenotazione' step='3600' required>";
                    echo "<label for='username'>username docente che prenota</label>";
                    echo "<input type='number' name='usr_for_prenotation'>";
                }
            echo "<input type='submit' value='Aggiungi'>";
            echo "</form>";

            } elseif($operazione == 'rimozione'){
                echo "<form action='rimozione_script.php' method='GET'>";
                echo "<input type='hidden' name='tabella' value=$tabella>";

                if ($tabella == 'aule_risorse'){
                    echo "<label for='id_aula'>ID aula da rimuovere</label>";
                    echo "<input type='number' name='id_aula'>";
                } elseif ($tabella == 'docenti'){
                    echo "<label for='username'>username docente da rimuovere</label>";
                    echo "<input type='number' name='usr_to_remove'>";
                } elseif ($tabella == 'prenotare'){
                    echo "<label for='id_aula'>ID dell'aula da rimuovere la prenotazione:</label>";
                    echo "<input type='number' name='id_aula'>";
                    echo "<label for='data_prenotazione'>Data e ora della prenotazione da rimuovere:</label>";
                    echo "<input type='datetime-local' name='data_prenotazione' step='3600' required>";
                }
                echo "<input type='submit' value='rimuovi'>";
                echo "</form>";
            } else {
                echo "<h1>Operazione non valida</h1>";
            }
        }
    }
    ?>
</body>
</html>


