<?php

abstract class AbstractModel {
    protected static $table = '';
    protected static $class = '';

    public static function getAll(){
        $db = new Database;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        return $db->queryAll($sql, static::$class);
    }
    
    public static function getOne($news_id){
        $db = new Database;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $news_id;
        return $db->queryOne($sql, static::$class);
    }
}
