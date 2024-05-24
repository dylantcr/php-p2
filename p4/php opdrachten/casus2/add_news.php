<?php
include 'news.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = 1;  // Voorbeeld gebruiker ID
    $categories = $_POST['categories'];

    addNews($title, $content, $author_id, $categories);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nieuwsbericht Toevoegen</title>
</head>
<body>
    <form method="post">
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Inhoud:</label>
        <textarea id="content" name="content" required></textarea><br>
        <label for="categories">Categorieën:</label>
        <select id="categories" name="categories[]" multiple>
            <?php
            $categories = getCategories();
            foreach ($categories as $category) {
                echo '<option value="' . $category['id'] . '">' . htmlspecialchars($category['name']) . '</option>';
            }
            ?>
        </select><br>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>
