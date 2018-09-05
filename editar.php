<?php 
include 'contato.class.php';
$contato = new Contato();

if (!empty($_GET['id'])){
    $id = $_GET['id'];
    
    $contato->excluir($id);
}
header("Location: index.php");
exit;

?>

<h1>Editar</h1>

<form method="POST" action="editar_submit.php">
Nome:<br/>
<input type="text" name="nome"/><br/><br/>

E-mail:<br/>
<br/><br/>

<input type="submit" value="Salvar">

</form>