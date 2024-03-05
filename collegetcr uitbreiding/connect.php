<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoek leerling</title>
    <style>
        table {width: 50%;}
        th, td {border: 1px solid black;padding: 8px;text-align: left;cursor: pointer;}
        th {background-color: white;}

    </style>
</head>
<body>
    <h1>Zoek  naar een leerling</h1>
    <a href="edit.php">Voeg cijfers toe</a><br><br>
    <form method="get">
        <label for="search">Zoekterm:</label><br>
        <input type="text" id="search" name="search">
        <button type="submit">Zoeken</button>
    </form>
    <br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "collegetcr";
 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    $query = "SELECT id, leerling, cijfers, Docenten, Vakken FROM Cijfers";
    if (!empty($searchTerm)) $query .= " WHERE leerling LIKE :searchTerm";
 
    try {
        $stmt = $conn->prepare($query);
        if (!empty($searchTerm)) $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        if ($result) {
            echo "<table id='dataTable'><tr><th onclick='sortTable(0)'>ID</th><th onclick='sortTable(1)'>Leerling</th><th onclick='sortTable(2)'>Cijfers</th><th onclick='sortTable(3)'>Docenten</th><th onclick='sortTable(4)'>Vakken</th><th>Verwijderen</th></tr>";
            foreach ($result as $row) {
                $class = (stripos($row['leerling'], $searchTerm) !== false && !empty($searchTerm)) ? ' class="blue"' : '';
                echo "<tr$class><td>{$row['id']}</td><td>{$row['leerling']}</td><td>{$row['cijfers']}</td><td>{$row['Docenten']}</td><td>{$row['Vakken']}</td><td><button class='delete-btn' onclick='deleteRow({$row['id']})'>Verwijderen</button></td></tr>";
            }
            echo "</table>";
        } else {
            echo "Geen resultaten gevonden";
        }
    } catch(PDOException $e) {
        echo "Query mislukt: " . $e->getMessage();
    }
 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        try {
            $stmt = $conn->prepare("DELETE FROM Cijfers WHERE id = :delete_id");
            $stmt->bindParam(':delete_id', $delete_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Fout bij verwijderen van rij: " . $e->getMessage();
        }
        exit();
    }
 
    $conn = null;
    ?>
    <script>
        function deleteRow(id) {
            if (confirm('Weet je zeker dat je dit cijfer wilt verwijderen?')) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        location.reload();
                    }
                };
                xhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("delete_id=" + id);
            }
        }
 
        function sortTable(columnIndex) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("dataTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch= true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch= true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount ++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
</body>
</html>
 