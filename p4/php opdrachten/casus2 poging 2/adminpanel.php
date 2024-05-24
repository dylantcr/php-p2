<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .news {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            position: relative;
        }
        .news h3 {
            margin-top: 0;
        }
        .news p {
            margin-bottom: 0;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .edit-field {
            display: none;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adminpanel</h2>
        <a href="add_news.php" class="btn">Nieuw nieuwsbericht toevoegen</a>
        <h3>Recente nieuwsberichten</h3>
        <?php
        //auteur: Dylan mahn
        // Database configuratie
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "case2";

        try {
            // Maak een verbinding met de database met PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Stel de foutmodus in op uitzonderingen
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Query om recente nieuwsberichten op te halen
            $sql = "SELECT * FROM nieuwsberichten ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Als er nieuwsberichten zijn, toon deze
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="news" data-id="' . $row["id"] . '">';
                    echo '<h3>' . $row["titel"] . '</h3>';
                    echo '<p>' . $row["inhoud"] . '</p>';
                    echo '<input type="text" class="edit-field" value="' . $row["titel"] . '" />';
                    echo '<textarea class="edit-field">' . $row["inhoud"] . '</textarea>';
                    echo '<button class="btn btn-edit" onclick="editNews(this)">Bewerken</button>';
                    echo '<button class="btn btn-save" onclick="saveNews(this)" style="display:none;">Opslaan</button>';
                    echo '<a href="#" onclick="deleteNews(' . $row["id"] . ')" class="btn btn-delete">Verwijderen</a>';
                    echo '</div>';
                }
            } else {
                echo "Geen nieuwsberichten gevonden.";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
    </div>

    <script>
    function editNews(btn) {
        var newsDiv = btn.parentNode;
        var editFields = newsDiv.querySelectorAll('.edit-field');
        editFields.forEach(function(field) {
            field.style.display = 'block';
        });
        newsDiv.querySelector('h3').style.display = 'none';
        newsDiv.querySelector('p').style.display = 'none';
        btn.style.display = 'none'; // Verberg de bewerk knop
        newsDiv.querySelector('.btn-save').style.display = 'inline-block'; // Toon de opslaan knop
    }

    function saveNews(btn) {
        var newsDiv = btn.parentNode;
        var id = newsDiv.getAttribute('data-id');
        var newTitle = newsDiv.querySelector('.edit-field[type="text"]').value;
        var newContent = newsDiv.querySelector('.edit-field[type="textarea"]').value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_news.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Update the UI with the new values
                newsDiv.querySelector('h3').textContent = newTitle;
                newsDiv.querySelector('p').textContent = newContent;

                // Hide the edit fields and show the text again
                newsDiv.querySelectorAll('.edit-field').forEach(function(field) {
                    field.style.display = 'none';
                });
                newsDiv.querySelector('h3').style.display = 'block';
                newsDiv.querySelector('p').style.display = 'block';
                btn.style.display = 'none';
                newsDiv.querySelector('.btn-edit').style.display = 'inline-block';
            }
        };
        xhr.send("id=" + id + "&title=" + encodeURIComponent(newTitle) + "&content=" + encodeURIComponent(newContent));
    }

    function deleteNews(id) {
        if (confirm("Weet je zeker dat je dit nieuwsbericht wilt verwijderen?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_news.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Remove the news item from the UI
                    var newsDiv = document.querySelector('.news[data-id="' + id + '"]');
                    newsDiv.parentNode.removeChild(newsDiv);
                }
            };
            xhr.send("id=" + id);
        }
    }
    </script>
</body>
</html>
