<?php 
session_start();

require_once 'header.php';
require_once 'menu.php';
require_once 'conexaoDB.php'; 

if ((!isset($_POST['usuario'])) || (!isset($_POST['senha']))) {
	    $_SESSION['message'] = 'Usuário ou senha inválida!';
		header("Location: login.php");
		exit;
	}else{
		$us = $_POST['usuario'];
		//$ps = password_hash($_POST['senha'], PASSWORD_DEFAULT);		
		$ps = $_POST['senha'];
	}
//echo $ps;
	
$conn = conexaoDB();
$sql = "SELECT * from `usuarios` where `nome` LIKE :usuario";
$stmt = $conn->prepare($sql);

$stmt-> bindParam(":usuario", $us);
//$stmt-> bindParam(":password", $ps);

if (!$stmt->execute()) {
   print_r($stmt->errorInfo());
}else{
	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (!empty($resultado)) {
		foreach ($resultado as $k) {
			$u = $k['nome'];
			$s = $k['senha'];
		}
		if(password_verify($ps,$s)){
			$_SESSION["logado"] = 1;
			header("Location: paginas.php");
			exit;
		}else{
			$_SESSION['message'] = 'Usuário ou senha inválida!';
			header("Location: login.php");
			exit;
		}
   }else{
	   $_SESSION['message'] = 'Usuário ou senha inválida!';
	   header("Location: login.php");
	   exit;
   }		
	
}
?>

<?php require_once 'footer.php';?>