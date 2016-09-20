<?php

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
    
    public function queryAll($sql, $class='stdClass'){
	$result = mysql_query($sql);
	$data = [];
	while ($row = mysql_fetch_object($result, $class)){
		$data[] = $row;
	}
	return $data;
    }
    
    public function queryOne($sql, $class='stdClass'){	
	return $this->queryAll($sql, $class)[0];
    }
}
