<?php
require_once 'db.php';

function addNews($title, $content, $author_id, $categories) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('INSERT INTO news (title, content, author_id) VALUES (?, ?, ?)');
    $stmt->execute([$title, $content, $author_id]);
    $news_id = $pdo->lastInsertId();

    foreach ($categories as $category_id) {
        $stmt = $pdo->prepare('INSERT INTO news_categories (news_id, category_id) VALUES (?, ?)');
        $stmt->execute([$news_id, $category_id]);
    }

    return $news_id;
}

function updateNews($news_id, $title, $content, $categories) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('UPDATE news SET title = ?, content = ? WHERE id = ?');
    $stmt->execute([$title, $content, $news_id]);

    $stmt = $pdo->prepare('DELETE FROM news_categories WHERE news_id = ?');
    $stmt->execute([$news_id]);

    foreach ($categories as $category_id) {
        $stmt = $pdo->prepare('INSERT INTO news_categories (news_id, category_id) VALUES (?, ?)');
        $stmt->execute([$news_id, $category_id]);
    }
}

function deleteNews($news_id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('DELETE FROM news WHERE id = ?');
    $stmt->execute([$news_id]);

    $stmt = $pdo->prepare('DELETE FROM news_categories WHERE news_id = ?');
    $stmt->execute([$news_id]);

    $stmt = $pdo->prepare('DELETE FROM views WHERE news_id = ?');
    $stmt->execute([$news_id]);
}

function incrementViewCount($news_id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('INSERT INTO views (news_id) VALUES (?)');
    $stmt->execute([$news_id]);
}

function getNews($news_id) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM news WHERE id = ?');
    $stmt->execute([$news_id]);
    $news = $stmt->fetch();

    if ($news) {
        incrementViewCount($news_id);
    }

    return $news;
}

function getCategories() {
    $pdo = getDbConnection();
    $stmt = $pdo->query('SELECT * FROM categories');
    return $stmt->fetchAll();
}
?>
