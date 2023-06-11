<?php
include("../models/conexao.php");

$varIdPost = $_GET["bloginfo_codigo"];

$dados = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem WHERE blog_codigo = $varIdPost;");

$result = mysqli_fetch_array($dados);

$path = '../views/imgs/'.$result['nome_randomico_imagem'];
unlink($path);

mysqli_query($conexao, "DELETE FROM posts where blog_codigo = $varIdPost ");
echo $result['nome_randomico_imagem'];
header("location:../"); //voltar pra index


?>