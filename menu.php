<?php session_start();?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="empresa.php">Empresa</a></li>
			<li><a href="produtos.php">Produtos</a></li>
			<li><a href="servicos.php">Serviços</a></li>
			<li><a href="contato.php">Contato</a></li>		
		</ul>
		 <form method="POST" class="navbar-form navbar-left" action="busca.php">
         <div class="form-group">
          <input type="text" class="form-control" name="consulta" placeholder="Pesquisar">
         </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      	<?php if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1): ?>
        	<li><a href="logout.php">Sair</a></li>	
        <?php endif; ?>
        <li><a href="login.php"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Administração</a></li>

      </ul>
      
	</div>	
</nav>