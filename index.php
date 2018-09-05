<?php 
include 'contato.class.php';

$contato = new Contato();
$contato->adicionar('suporte@b7web.com','Suporte b7web');
$contato->adicionar('fulano@b7web.com');


$nome = $contato->getNome('suporte@b7web.com');

echo "Nome: ".$nome."<br/>";

$lista = $contato->getAll();

print_r($lista);

$contato->editar('Fulano', 'fulano@b7web.com');
$nome = $contato->getNome('fulano@b7web.com');

echo "<br/>Nome: ".$nome."<br/>";

$excluir = $contato->excluir('ciclano@gmail.com');

if($excluir == TRUE){
    echo 'Foi Excluído!';
} else {
    echo 'E-mail para exclusão não existe!';
}

//$excluir = $contato->excluir('fulano@b7web.com');

if($excluir == TRUE){
    echo 'Foi Excluído!';
} else {
    echo 'E-mail para exclusão não existe!';
}

?>