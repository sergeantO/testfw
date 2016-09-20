<?php

require_once ROOT . '/models/news.php';

if (!isset($_GET['id'])){
    echo "Такой новости нет";
}else{
    $news_id = $_GET['id'];
    $full_news = news_getId($news_id);
}

include ROOT . '/views/fullnews.php';
