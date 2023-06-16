<?php
include("../models/conexao.php");
$diretorio = "../views/imgs/";
$nomeUser = $_POST["nomeUser"];
$emailUser = $_POST["emailUser"];
$senhaUser = $_POST["senhaUser"];
$senhacripto = md5($senhaUser);

mysqli_query($conexao, "INSERT INTO usuario (usuario_nome, usuario_email, usuario_senha) values ('$nomeUser', '$emailUser', '$senhacripto')");; //funciona
$iduser = mysqli_insert_id($conexao);

header("location:../index.php"); //te manda pra index novamente

?>