<?php 
class Contato{
    
    private $pdo;
    
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "admin", "admin@12");
    }
    
    public function adicionar($email, $nome = ''){//create , neste caso o nome é opcional
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
    
    public function getInfo($id){//Read
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
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
        
    public function editar($nome,$id){//Update
            $sql = "UPDATE contatos SET nome = :nome WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':id', $id);
            $sql->execute();
    }
    
    public function excluir($id){//Delete
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
    }
    
    private function existeEmail($email){//teste
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>