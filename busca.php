<?php
require_once 'header.php';
require_once 'menu.php'; 
require_once "conexaoDB.php";

$rt = $_SERVER['REQUEST_URI'];
$fl = basename($rt);

$d= $_SERVER['HTTP_HOST'];
$r = $_SERVER['REQUEST_URI'];
$u = str_replace($fl, "", $r);

if ((!isset($_POST['consulta'])) || (empty($_POST['consulta']))) {
		header("Location: index");
		exit;
	}else{
		$busca = $_POST['consulta'];
	}

$conn = conexaoDB();
$sql = "SELECT * FROM `paginas` WHERE `conteudo` LIKE :buscaParam ORDER BY 'pagina' ASC";
$stmt = $conn->prepare($sql);

$termo = "%".$busca."%";

$stmt-> bindParam(":buscaParam", $termo);

if (!$stmt->execute()) {
   print_r($stmt->errorInfo());
}else{
	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($resultado)) {
		
	echo "<ul>";
	echo "Resultados: \n";
	foreach ($resultado as $k) {
		
		$pagina = $k['pagina'];
		$titulo = $k['titulo'];
		$link =  $d . $u . $pagina;
	?>	
 		<li>
    		<a href=<?= $link;?>><h5 style="display: inline-block;"><?= $titulo;?></h5></a>
  		</li>
	<?php }
	echo "</ul>";
	}else{
		echo "Nenhum resultado encontrado";
	}
}

?>