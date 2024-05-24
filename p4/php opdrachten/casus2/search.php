<?php
include 'db.php';

function searchNews($keyword) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM news WHERE title LIKE ? OR content LIKE ?');
    $keyword = '%' . $keyword . '%';
    $stmt->execute([$keyword, $keyword]);
    return $stmt->fetchAll();
}
?>
