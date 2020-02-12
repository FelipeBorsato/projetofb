<?php
  
   include("class/conexao.php");

   $sql_code = "SELECT * FROM produto";
   $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
   $linha = $sql_query->fetch_assoc();

?>
<h1>Produto</h1>
<a href="index.php?p=cadastrar">Cadastar um produto</a>
<p class="espaco"></p>
<table border="1" cellpadding="10">
	<tr class="titulo">
		<td>Codigo</td>
		<td>Descricao</td>
	</tr>
	<?php 
	do{ 
	?>
	<tr>
		<td><?php echo $linha['codigo']; ?></td>
		<td><?php echo $linha['descricao']; ?></td>
	   	<td>
			<a href="index.php?p=editar&produto=<?php echo $linha['codigo']; ?>">Editar</a> |
			<a href="javascript: if(confirm('Tem certeza que deseja deletar o produto <?php echo $linha['codigo']; ?> ?')) location.href='index.php?p=deletar&produto=<?php echo $linha['codigo']; ?>' ;">Deletar</a>
		</td>
	</tr>
    <?php } while($linha = $sql_query->fetch_assoc()); ?>
</table>