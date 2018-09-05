<h1>Adicionar</h1>

<form method="POST" >
	Nome:<br/>
	<input type="text" name="nome"/><br/><br/>
	
	E-mail:<br/>
	<input type="email" name="email"/><br/><br/>
	
	<input type="submit" value="Adicionar">
	
</form>
<?php if (!empty($_POST['nome'])): ?>
Dados vindos pra cá:<br/>
Nome: <?php echo $_POST['nome'];?><br/>
E-mail: <?php echo $_POST['email'];?>
<?php endif;?>