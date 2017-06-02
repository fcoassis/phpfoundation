<?php
	session_start();
    require_once 'conexaoDB.php';
	
	if (!isset($_SESSION["logado"]) && $_SESSION["logado"] != 1){
		header("Location: login.php");
		exit;
	}
	
	$conn = conexaoDB();
	$id = $_POST['id'];
	$titulo = $conteudo="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		if ((empty($_POST['titulo'])) || (empty($_POST['conteudo']))) {
			$_SESSION['erro'] = "Todos os campos são obrigatórios!";
			header("Location: editar.php?id=$id");
			exit;
		}else{
			$titulo = $_POST['titulo'];
			$conteudo = $_POST['conteudo'];
			$sql = "UPDATE `paginas` SET `titulo`=:tt, `conteudo`=:ct WHERE `id`=:id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":id",$id);
			$stmt->bindParam(":tt",$titulo);
			$stmt->bindParam(":ct",$conteudo);
			
			if (!$stmt->execute()) {
			   print_r($stmt->errorInfo());
			}else{
				$_SESSION['msg'] = "Página atualizada com sucesso!";
				header("Location: editar.php?id=$id");
				exit;
			}
		}
	}
?>