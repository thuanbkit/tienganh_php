<?php
class ContentModel {

    protected $servername;
    protected $username;
    protected $password;
    protected $conn;
    protected $table;

    public function __construct($servername, $username, $password, $table) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->table = $table;
        
    }

    public  function getDb() {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=thitienganh;", $this->username, $this->password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

    public  function findOne($id) {
        $conn = $this->getDb();
        $sth = $conn->prepare("select * from $this->table where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $result = $sth->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function findAll($start,$per_page) {
        $conn = $this->getDb();
        $sth = $conn->prepare("select * from $this->table LIMIT :limit OFFSET :offset");
        $sth->bindValue(':limit', (int) $start, PDO::PARAM_INT);
        $sth->bindValue(':offset', (int) $per_page, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function Count_record() {
        $conn = $this->getDb();
        $nRows = $conn->query("select count(*) from $this->table")->fetchColumn();
        return $nRows;
    }
    
    public function updateOne($item=  array()) {
        $conn = $this->getDb();
        $q = "UPDATE $this->table SET title = :title,text =:text WHERE id = :id";
        $stmt = $conn->prepare($q);
        $stmt->execute($item);
        
    }
    public function addOne($item=  array()) {
        unset($item["id"]);
        $conn = $this->getDb();
        $q = "INSERT INTO $this->table (title,text) values (:title,:text)";
        $stmt = $conn->prepare($q);
        $stmt->execute($item);
        
    }
    public function delete($id) {
        $conn = $this->getDb();
        $q = "DELETE FROM $this->table WHERE id = '$id'";
        $conn->exec($q);
        
    }
}
