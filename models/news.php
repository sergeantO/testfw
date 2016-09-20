<?php

require_once ROOT . '/functions/database.php';
//require_once ROOT . '/../function/file.php';

//модель
//получение всех новостей
function news_getAll(){
    $db = new Database;
    return $db->getAll('news');
}

//add to DB
function news_insert(){
    $db = new Database;
    $sql = "INSERT INTO news 
            (title, text)
            VALUES
            (" . $data['title'] . ", " . $data['text'] . ")";
    return $db->getAll($sql);
}

//get news from DB by id
function news_getId($news_id){
    $db = new Database;
    return $db->getNewsById('news',$news_id);
}


