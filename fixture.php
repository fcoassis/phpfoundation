<?php
	require_once "conexaoDB.php";
	echo "# Executando fixture #\n";
	$conn = conexaoDB();
	
	echo "Removendo tabela \"paginas\"";
	$conn->query("DROP TABLE IF EXISTS paginas;");
	echo " - OK\n";
	
	echo "Removendo tabela \"usuarios\"";
	$conn->query("DROP TABLE IF EXISTS usuarios;");
	echo " - OK\n";
	
	echo "Criando tabela \"paginas\"";
	$conn->query("CREATE TABLE paginas(
		id INT NOT NULL AUTO_INCREMENT,
		pagina VARCHAR(20) NOT NULL,
		titulo VARCHAR(100) NOT NULL,
		conteudo TEXT NOT NULL,
		PRIMARY KEY (id));");
	echo " - OK\n";
	
	echo "Criando tabela \"usuarios\"";
	$conn->query("CREATE TABLE usuarios(
		id INT NOT NULL AUTO_INCREMENT,
		nome VARCHAR(10) NOT NULL UNIQUE,
		senha VARCHAR(100) NOT NULL,
		PRIMARY KEY (id));");
	echo " - OK\n";
	
	echo "Inserindo dados na tabela paginas";
	
	
	$contarr = [0 =>["pagina"    => "index",
					 "titulo"    => "Seja bem vindo",
					 "conteudo"  => "Esta é a página inicial do site"],
				1 =>["pagina"    => "home",
					 "titulo"    => "Página Home",
					 "conteudo"  => "Esta é a página home do site"],
				2 =>["pagina"    => "empresa",
					 "titulo"    => "Página empresa",
					 "conteudo"  => "Esta é a página empresa do site"],
				3 =>["pagina"    => "contato",
					 "titulo"    => "Página contato",
					 "conteudo"  => "Esta é a página contato do site"],
				4 =>["pagina"    => "produtos",
					 "titulo"    => "Página produtos",
					 "conteudo"  => "Esta é a página produtos do site"],
				5 =>["pagina"    => "servicos",
					 "titulo"    => "Página serviços",
					 "conteudo"  => "Esta é a página serviços do site"]				 
			   ];
			   
	foreach ($contarr as $c) {
		$pagina = $c["pagina"]; 
		$titulo = $c["titulo"];
		$conteudo = $c["conteudo"];
		
		$stmt = $conn->prepare("INSERT INTO paginas (pagina,titulo,conteudo) VALUE (:pagina,:titulo,:conteudo);");
		$stmt-> bindParam(":pagina", $pagina);
		$stmt-> bindParam(":titulo", $titulo);
		$stmt-> bindParam(":conteudo",$conteudo);
		$stmt->execute();
	}
	
	echo " - OK\n";
	
	echo "Inserindo dados na tabela usuarios";
	
	$user = "admin";
	$pass = password_hash("admin", PASSWORD_DEFAULT);
	
	$stmt = $conn->prepare("INSERT INTO usuarios (nome,senha) VALUE (:usuario,:senha);");
		$stmt-> bindParam(":usuario", $user);
		$stmt-> bindParam(":senha", $pass);
        $stmt->execute();
	
	echo " - OK\n";
	
	echo "# Concluído #\n";
?>