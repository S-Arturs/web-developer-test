<?php
//connecting to database
class dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $db = "emails_database";
    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        //default attributes so that we don't have to set tehm every time we make connection
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
