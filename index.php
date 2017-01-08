<?php 
require_once 'header.php';
require_once 'menu.php'; 
require_once "conexaoDB.php";

$rt = $_SERVER['REQUEST_URI'];
$fl = basename($rt,".php");

$p = pathinfo($_SERVER['SCRIPT_FILENAME']);
$d = $p['dirname'] . DIRECTORY_SEPARATOR . $fl . ".php";

$conn = conexaoDB();
$sql = "SELECT `titulo`, `conteudo` FROM `paginas` WHERE `pagina` = '$fl'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rotasMD = $stmt->fetch(PDO::FETCH_ASSOC);  //rotasMD é um array multidimensional
$rotas = ["index","home","empresa", "contato", "produtos", "servicos"];

?>	
	<body>
		<div style="width: 80%; margin: auto; text-align: center">
		<?php	if(in_array($fl, $rotas) && (file_exists($d))){ ?>
				<h1><?php echo $rotasMD['titulo'];?></h1>
				    <h4 style="margin-top: 50px;">
				    	<?php echo $rotasMD['conteudo'];?>
				    </h4>
		<?php	}else{
				header("HTTP/1.0 404 Not Found");  ?>
				<h4 style="margin-top: 50px;">
					<?php echo "404 - Esta página não existe!";?>
				</h4>
		<?php	} ?>
		</div>
	</body>			
<?php require_once 'footer.php'; ?>
			
