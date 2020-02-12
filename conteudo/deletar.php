<?php
    
    include("class/conexao.php");

    $pro_codigo = intval($_GET['produto']);

    $sql_code = "DELETE FROM produto WHERE codigo = '$pro_codigo'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query)
    	echo "
        <script>
            alert('O produto foi deletado com sucesso.');
            location.href='index.php?p=inicial';
        </script>";
    else
    	echo"
        <script>
            alert('Não foi possível deletar o produto.');
            location.href='index.php?p=inicial';
        </script>";

?>