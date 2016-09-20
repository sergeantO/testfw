<?php

require_once ROOT . '/configs/DB.php';

/**
 * Description of Database
 *
 * @author Одмен
 */
class Database {
    public function __construct() {
        mysql_connect(HOST, USER, PASS);
        mysql_select_db(DB);
    }
    
    protected function query($sql){
	$result = mysql_query($sql);
	$data = [];
	while ($row = mysql_fetch_assoc($result)){
		$data[] = $row;
	}
	return $data;
    }
    
    protected function exec($sql){
        $res = mysql_query($sql);
        return $res;
    }
    
    public function getAll($tableName){
        $sql = "SELECT * FROM $tableName ORDER BY date DESC";
        return $this->query($sql);        
    }
    
    public function getNewsById($tableName, $news_id){
        $sql = "SELECT * FROM $tableName WHERE id=$news_id";
        return $this->query($sql);        
    }
    
    public function insert($sql){
        return $this->exec($sql);        
    }
}
