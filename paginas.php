<?php
	session_start();
	
	require_once 'header.php';
	require_once 'menu.php';
	require_once 'conexaoDB.php';
	
	if(!isset($_SESSION['logado']) && $_SESSION['logado'] != 1){
		header("Location: login.php");
		exit;
	}
	
	$conn = conexaoDB();
	$sql = "SELECT * FROM `paginas`";
	$stmt = $conn->prepare($sql); 
	
	if(!$stmt->execute()){
		print_r($stmt->errorInfo());
	}else{
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		if(!empty($resultado)){
			echo "<ul>";
		echo "Páginas: \n";
		foreach ($resultado as $k) {
			$id = $k['id'];
			$pagina = $k['pagina'];
			$titulo = $k['titulo'];
			//$link =  $d . $u . $pagina;
		?>	
	 		<li>
	    		<!--<a href=<?= $link;?>><h5 style="display: inline-block;"><?= $titulo;?></h5></a> -->
	    		<p style="display: inline"><?php echo $titulo . "  -  ";?></p><a href='editar.php?id=<?=$id?>'><h5 style="display: inline-block;">Editar</h5></a>
	  		</li>
		<?php }
		echo "</ul>";
		}else{
			echo "Crie uma nova página!";
		}
	}	
	
?>