<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>
<body>

	<div>
		
		<div class="container" style="margin: auto; width: 480px; padding: 10px; border: 1px solid rgb(194, 191, 179); border-radius: 5px;">
			<h2><?php echo "Formulário de contato";?></h2>
	        <form class="form-horizontal" method="POST" action="enviar.php" >
	        	<div class="control-group">
	        		<label class="control-label" for="inputName">Nome</label>
	        		<div class="controls">
		        		<input id="inputName" class="form-control" type="text" name="Nome" placeholder="Nome" required/><br />
		        	</div>
		       </div>
		       <div class="control-group">
	        		<label class="control-label" for="inputEmail">E-mail</label>
	        		<div class="controls"> 	
		        		<input id="inputEmail" class="form-control" type="email" name="E-mail" placeholder="E-mail" required/><br />
		        	</div>
		       </div>	
		       <div class="control-group">
	        		<label class="control-label" for="inputAssunto">Assunto</label>
	        		<div class="controls"> 		
		        		<input id="inputAssunto" class="form-control" type="text" name="Assunto" placeholder="Assunto" required/><br />
		            </div>
		       </div> 	
		       <div class="control-group">
	        		<label class="control-label" for="inputMensagem">Mensagem</label>
	        		<div class="controls"> 	
		        		<textarea class="form-control" id="inputMensagem" rows="4"  name="Mensagem" placeholder="Digite aqui sua mensagem" required></textarea><br />
		        	   	<button class="btn btn-primary" type="submit">Enviar</button>  
	                </div>
		       </div>         	 
	    	</form>
  		</div>
	</div>
	
	
	
</body>			
<?php require_once 'footer.php';?>
