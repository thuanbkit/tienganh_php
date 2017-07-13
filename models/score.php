<?php

class ScoreModel {

    protected $servername;
    protected $username;
    protected $password;
    protected $table;

    public function __construct($servername, $username, $password, $table) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->table = $table;
    }

    public function getDb() {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=thitienganh", $this->username, $this->password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    public function update($scoreuser=  array()) {
        $conn = $this->getDb();
        $sth = $conn->prepare("select * from $this->table where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $result = $sth->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function addOne($item=  array()) {
        $conn = $this->getDb();
        $q = "INSERT INTO $this->table (user_id, mark) values (:user_id, :mark)";
        $stmt = $conn->prepare($q);
        $stmt->execute($item);
    }
}
