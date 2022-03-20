<?php
class Database{

    private $db_name;

    private $db_user;

    private $db_pass;

    private $db_host;

    private $pdo;

    public function __construct(string $db_name, string $db_user, string $db_pass, string $db_host){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO() : PDO {
        if($this->pdo === null){
            $this->pdo = new PDO("mysql:dbname=($this->db_name);host=($this->db_host)", $this->db_user, $this->db_pass);
        }

        return $this->pdo;
    }
}
?>
