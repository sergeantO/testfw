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

    public function __isset($k) {
        return isset($this->data[$k]);
    }

    public static function getTable() {
        return static::$table;
    }
    
    public static function findByColumn($column, $value) {
        $db = new Database;
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value])[0];
        
        if (!empty($res)){
            return $res[0];
        }
        return FALSE;
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
    
    protected function insert() {
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
        $this->id = $db->lastInsertId();
    }
    
    protected function update(){
        $cols = [];
        $data = [];
        
         foreach ($this->data as $k => $v){
             $data[':' . $k] = $v;
             if ('id' == $k){
                 continue;
             }
             $cols[] = $k . '=:' . $v;
        }
        
        $sql = ' UPDANE '. static::$table .
               ' SET ' . implode(', ', $cols) .   
               ' WHERE id=:id';
        
        $db = new Database;
        $db->execute($sql, $data);
    }
    
    public function save() {
        if (!isset($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }
    
    public function delete(){
        echo $sql = 'DELETE FROM '. static::$table .' WHERE id=:id';
        
        $db = new Database;
        $db->query($sql);
    }
}
