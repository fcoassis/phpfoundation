<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

<body>
	<div style="width: 60%; margin: auto">
		<?php
			if(isset($_POST)) {
				echo "<h4>Dados enviados com sucesso, abaixo seguem os dados que você enviou:</h4><br/>";
				foreach ($_POST as $key => $value) {
					echo "<b>" . $key . "</b>: " . $value . "<br/>";
				}
			}
		?>
	</div>
</body>
<?php require_once 'footer.php';?>