<?php 
include 'contato.class.php';

$contato = new Contato();
?>
<html>
	<head>
		<title>Site de Contatos</title>
		<link rel="stylesheet" href="assets/css/estilo.css" type="text/css" />
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
	</head>
	<body>
        <h1>Contatos</h1>
        <a href="adicionar.php">[ ADICIONAR ]</a><br/><br/>
        <table border="1" width="600">
        	<tr>
            	<th>ID</th>
            	<th>NOME</th>
            	<th>E-MAIL</th>
            	<th>AÇÕES</th>
        	</tr>
        	
        	<?php 
        	$lista = $contato->getAll();
        	foreach($lista as $item):
        	?>
        	<tr>
            	<td><?php echo $item['id'];?></td>
            	<td><?php echo $item['nome'];?></td>
            	<td><?php echo $item['email'];?></td>
            	<td>
            		<a href="editar.php?id=<?php echo $item['id']?>">[ EDITAR ]</a>
            		<a href="excluir.php?id=<?php echo $item['id']?>">[ EXCLUIR ]</a>
            	</td>
        	</tr>
        	<?php endforeach;?>
        	
        </table>
        <!-- Modal -->
        <div class="modal_bg">
        	<div class="modal"></div>
        </div>
	</body>
</html>