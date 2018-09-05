<h1>Adicionar</h1>

<form method="POST" action="adicionar_submit.php">
	Nome:<br/>
	<input type="text" name="nome"/><br/><br/>
	
	E-mail:<br/>
	<input type="email" name="email"/><br/><br/>
	
	<input type="submit" value="Adicionar">
	
</form>

Dados:
Nome: <?php echo $_POST['nome'];?>
E-mail: <?php echo $_POST['email'];?>