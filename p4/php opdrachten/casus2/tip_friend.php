<?php
include 'db.php';

function tipAFriend($news_id, $friend_email) {
    $news = getNews($news_id);
    $subject = "Tip: Lees dit interessante nieuwsbericht!";
    $message = "Hallo, \n\nIk wil je graag wijzen op dit interessante nieuwsbericht: \n\n" . $news['title'] . "\n\nLees meer: http://yourwebsite.com/news.php?id=" . $news_id;
    $headers = 'From: no-reply@yourwebsite.com' . "\r\n" .
               'Reply-To: no-reply@yourwebsite.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($friend_email, $subject, $message, $headers);
}
?>
