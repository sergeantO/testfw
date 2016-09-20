<?php

require_once ROOT . '/classes/database.php';
//require_once ROOT . '/../function/file.php';

class News{
    public $id;
    public $title;
    public $date;
    public $text;
    
    //получение всех новостей
    public static function getAll(){
        $db = new Database;
        $sql = "SELECT * FROM news ORDER BY date DESC";
        return $db->queryAll($sql, 'News');
    }
    
    //get news from DB by id
    public static function getOne($news_id){
        $db = new Database;
        $sql = "SELECT * FROM news WHERE id=" . $news_id;
        return $db->queryOne($sql, 'News');
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
}


