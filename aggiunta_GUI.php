<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="div" style="display: flex; flex-direction: row; justify-content: space-evenly; align-items: center;">
        <a href="menu.php"><button>menu</button></a>

    <?php
        include_once "funzioni riutilizzate/login_check.php";
        include_once "funzioni riutilizzate/db_connection.php";  

        $username = $_SESSION['user'];

        $query = "SELECT * FROM prenotare";
        $result = mysqli_query($connection, $query);

        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='8'>";
            echo "<tr><th>username</th><th>data_prenotazione</th></tr>";
        
            // Cicla tra i risultati e stampa ogni riga nella tabella
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username']. "</td>";
                echo "<td>" . $row['data_prenotazione'] . "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        } else {
            echo "Nessun risultato trovato.";
        }

    ?>
    </div>
    
    <form action="aggiunta_script.php" method="get" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <label for="data_prenotazione">Data e ora prenotazione:</label>
    <input 
        type="datetime-local" 
        id="data_prenotazione" 
        name="data_prenotazione" 
        step="3600" 
        required
    >
    <label for="id_aula">ID aula:</label>
    <input 
        type="number" 
        id="id_aula" 
        name="id_aula"  
        required
    >
    <input type="submit" value="Aggiungi prenotazione">
    </form>


</body>
</html>