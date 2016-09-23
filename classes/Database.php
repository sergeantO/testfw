<?php

class Database {
    
    private $dbh;
    private $className = "stdClass";

    public function __construct() {
        $dsn = 'mysql:dbname=' . DBNAME . ';host=' . HOST;
        $this->dbh = new PDO($dsn, USER, PASS);
    }
    
    public function setClassName($className){
        $this->className = $className;
    }

    public function query($sql, $params=[]){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
    
    public function execute($sql, $params=[]){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
    }
}
