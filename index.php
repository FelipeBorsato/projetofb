<?php
   include("class/conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Controle Produto</title>
	<style>
		.principal{
			text-align: center;
			width: 35%;
			margin: 0 auto;
			background-color: #FFF;
			border: 1px solid #e3e3e3;
			border-radius: 5px;
		}
		body{
			background: #eaeaea;
			padding: 10px;
			font-family: Arial;
			font-size: 18px;
		}

		label{display: block; font-weight: bold;}
		.espaco{ height: 1px; display: block;}
		input{ font-size: 16px; padding:5px;}
	    .titulo{font-weight: bold;}
	</style>
</head>
<body>
	<div class="principal">
	<?php

	if(isset($_GET['p'])){

		$pagina = $_GET['p'].".php";
		if(is_file("conteudo/$pagina"))
		  include("conteudo/$pagina");
		else
		  include("conteudo/404.php");
	
	}else
	  include("conteudo/inicial.php");

	?>	
	</div>

</body>
</html>