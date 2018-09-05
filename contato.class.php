<?php 
class Contato{
    
    private $pdo;
    
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "admin", "admin@12");
        echo "conectou";
    }
}
?>