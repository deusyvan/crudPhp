<?php 
class Contato{
    
    private $pdo;
    
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "admin", "admin@12");
    }
    
    public function adicionar($email, $nome = ''){//create
        // Verificar se já existe senão adiciona
        if ($this->existeEmail($email) == FALSE){
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            return TRUE;
            
        }else {
            return FALSE;
        }
        
    }
    
    public function getNome($email){//Read
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $info = $sql->fetch();
            
            return $info['nome'];
        } else {
            return '';
        }
        
    }
    
    public function getAll(){//Read
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } else {
            return array();
        }
        
    }
        
    private function existeEmail($email){
        
    }
}
?>