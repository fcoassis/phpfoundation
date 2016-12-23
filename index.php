<?php 
require_once 'header.php';
require_once 'menu.php'; 

$rt = $_SERVER['REQUEST_URI'];
$fl = basename($rt,".php");

$p = pathinfo($_SERVER['SCRIPT_FILENAME']);
$d = $p['dirname'] . DIRECTORY_SEPARATOR . $fl . ".php";

function verifica($rota, $path){
	
	$rotas = ["index","home","empresa", "contato", "produtos", "servicos"];
	
	if(in_array($rota, $rotas) && (file_exists($path))){
		require_once($rota.".php");		
	}else{
		header("HTTP/1.0 404 Not Found");
		require_once('404.php');
	}
}

?>	
	<body>
		<div style="width: 80%; margin: auto; text-align: center">
			<h1><?php echo "Bem vindo à School of Net";?></h1>
			    <?php 
				   verifica($fl,$d);							
				?>
		</div>
	</body>			
<?php require_once 'footer.php'; ?>
			
