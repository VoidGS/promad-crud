<?php

class dbClass {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "promad_crud";
    private $charset = "utf8mb4";

    public function connect() {
        
        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            header("Location: ../public/dberror.php");
        }

    }

}