<?php
session_start();

require_once 'header.php';
require_once 'menu.php';

if(isset($_SESSION['logado']) && $_SESSION['logado'] = 1){
	header("Location: paginas.php");
	exit;
}
?>
<div class="content" style="max-width: 30%; margin: 5% auto; border: 1px solid gray; padding: 20px">
	<form method="POST" action="enviar.php">
		  <div class="form-group">
		    <label for="exampleInputUser1">Usuário</label>
		    <input type="text" class="form-control" id="exampleInputUser1" name="usuario" aria-describedby="emailHelp" placeholder="Usuário">		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Senha</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha">
		  </div>
		   <button type="submit" class="btn btn-primary">Entrar</button>
	</form>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="alert alert-danger">
			 <span class="glyphicon glyphicon-exclamation-sign"></span>
			 <?php echo $_SESSION['message'];
			 unset($_SESSION['message']); ?>    
		</div>
	<?php endif; ?>

</div>
<?php require_once 'footer.php'; ?>