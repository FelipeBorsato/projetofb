<?php

    include("class/conexao.php");

    if(!isset($_GET['produto']))
    	echo "<script> alert('Cogigo invalido.'); location.href='index.php?p=inicial'; </script>";
    else{

    $pro_codigo = intval($_GET['produto']);

    if(isset($_POST['confirmar'])){

    	// 1 - Registro dos dados 
    	
    	if(!isset($_SESSION))
    		session_start();

    	foreach ($_POST as $chave=>$valor) 
    		$_SESSION[$chave] = $mysqli->real_escape_string($valor);

    	// 2 - Validação dos dados 
    	if(strlen($_SESSION['codigo']) == 0)
    		$erro[] = "Preencha o codigo.";

    	if(strlen($_SESSION['descricao']) == 0)
    		$erro[] = "Preencha a descricao.";

    	// 3 - Inserção no Banco e redirecionamento
    	if(count($erro) == 0){

    		$sql_code = "UPDATE produto SET
    		codigo = '$_SESSION[codigo]',
    		descricao = '$_SESSION[descricao]'
    		WHERE codigo = '$pro_codigo'";

    		$confirmar = $mysqli->query($sql_code) or die($mysqli->error);

    		if($confirmar){

    			unset($_SESSION[codigo],
    			$_SESSION[descricao]);

    			echo "<script> location.href='index.php?p=inicial'; </script>";
    		
    		}else 
    		   $erro[] = $confirma;

    	}

      }else{

      	$sql_code = "SELECT * FROM produto WHERE codigo = 'pro_codigo'";
      	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
      	$linha = $sql_query->fetch_assoc();

      	if(!isset($_SESSION))
    		session_start();

      	//$_SESSION[codigo] = $linha['codigo'];
    	//$_SESSION[descricao] = $linha['descricao'];


}

?>
<h1>Editar Produto</h1>
<?php 
//if(count($erro) > 0){ 
//	echo "<div class='erro'>"; 
//	foreach ($erro as $valor) 
//		echo "$valor <br>"; 

//	echo "</div>"; 
//}
?>
<a href="index.php?p=inicial">< Voltar</a>
<form action="index.php?p=editar&produto=<?php echo $pro_codigo; ?>" method="POST">

	<label for="Codigo">Codigo</label>
	<input name="codigo" value="" required type="text">
	<p class="espaco"></p>

	<label for="Descricao">Descricao</label>
	<input name="descricao" value="" required type="text">
	<p class="espaco"></p>

	<input value="Salvar" name="confirmar" type="submit">

</form>

<?php } ?>