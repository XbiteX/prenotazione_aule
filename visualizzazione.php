<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="div" style="display: flex; flex-direction: row; justify-content: space-evenly; align-items: center;">


    <?php
        include_once "funzioni riutilizzate/login.php";
        include_once "funzioni riutilizzate/db_connection.php";  

        // // Query per ottenere il nome di tutte le tabelle
        $sql = "SHOW TABLES";
        $result = mysqli_query($connection, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $table_name = $row[0];
                $table_result = mysqli_query($connection, "SELECT * FROM `$table_name`");
                
                if ($table_result->num_rows > 0) {
                    echo "<table border='1' cellpadding='5' cellspacing='0'><tr>";
        
                    // Printazione attributi
                    while ($field = $table_result->fetch_field()) {
                        echo "<th>{$field->name}</th>";
                    }
                    echo "</tr>";
        
                    // Dati delle righe
                    while ($data_row = $table_result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($data_row as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>";
                    }
        
                    echo "</table><br>";
                } else {
                    echo "Nessun dato trovato in questa tabella.<br>";
                }
            }
            echo "</ul>";
        } else {
            echo "Nessuna tabella trovata.";
        }

    ?>
    </div>

</body>
</html>