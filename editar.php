<?php
session_start();

require_once 'header.php';
require_once 'menu.php';
require_once 'conexaoDB.php'; 

if (!isset($_SESSION["logado"]) && $_SESSION["logado"] != 1){
	header("Location: login.php");
	exit;
}

$id = $_REQUEST[id];
$conn = conexaoDB();
$sql = "SELECT * FROM `paginas` WHERE `id` =$id";
$stmt = $conn->prepare($sql); 

if(!$stmt->execute()){
		print_r($stmt->errorInfo());
	}else{
		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($resultado as $key) {
			$titulo = $key['titulo'];
			$conteudo = $key['conteudo'];
		}
	}	

?>

<!--Mensagem de erro no cadastro/edição -->
  	<?php if (isset($_SESSION['erro'])) : ?>
  	<div class="alert alert-danger alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>Atenção!</h4>
        <?php echo $_SESSION['erro']; 
        unset($_SESSION['erro']);?>
    </div>
    <?php endif;?>
    <!--Mensagem de sucesso no cadastro/edição -->
  	<?php if (isset($_SESSION['msg'])) : ?>
  	<div class="alert alert-success alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Ok!</h4>
        <?php echo $_SESSION['msg']; 
        unset($_SESSION['msg']);?>
    </div>
    <?php endif;?>
    
<div id="cont" style="max-width: 90%; margin: auto;" >
    <form method="post" action="validap.php">
		<div class="input-group" style="margin: 0 0 10px;">
			<span class="input-group-addon" id="basic-addon3">Título</span>
		  <input type="text" class="form-control" id="basic-title" name="titulo" value="<?php echo $titulo;?>" aria-describedby="basic-addon3">
		</div>
		<p>			
			<textarea id="conteudo" name="conteudo"><?php echo $conteudo;?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'conteudo' );
			</script>
		</p>
		<input type="hidden" readonly="readonly" name="id" value="<?php echo $id;?>"/>
		<p>
			<input type="submit" />
		</p>
	</form>
</div>
<?php require_once 'footer.php';?>