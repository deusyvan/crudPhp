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
        
    public function editar($nome,$email){//Update
        if($this->existeEmail($email) == TRUE){
            $sql = "UPDATE contatos SET nome = :nome WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();
            return TRUE;
        } else {
            return FALSE;
        }
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