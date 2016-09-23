<?php

abstract class AbstractModel {
    protected static $table;
    
    protected $data = [];
    
    public function __set($k, $v) {
        $this->data[$k] = $v;
    }
    
    public function __get($k) {
        return $this->data[$k];
    }

    public static function getTable() {
        return static::$table;
    }
    
    public static function findAll(){
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
        $db = new Database;
        $class = get_called_class();
        $db->setClassName($class);
        return $db->query($sql);
    }
    
    public static function findById($id){
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new Database;
        $class = get_called_class();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }
    
    public function insert() {
        $cols = array_keys($this->data);
        $data = [];
        
        foreach ($cols as $col){
            $data[':' . $col] = $this->data[$col];
        }
        
        echo $sql = 'INSERT INTO '. static::$table .
               '('.  implode(',', $cols).')'.
               'VALUES '.
               '('.  implode(',', array_keys($data)). ')';
        
        $db = new Database;
        $db->execute($sql, $data);
    }
}
