<?php
include 'news.php';

$news_id = $_GET['id'];
$news = getNews($news_id);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($news['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($news['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($news['content'])); ?></p>
</body>
</html>
