<?php
include ("../models/conexao.php");
$guardarNome = $_POST["campoNome"];
$guardarSenha = $_POST["campoSenha"];
$senhacripto = md5($guardarSenha);
$dados = mysqli_query($conexao, "SELECT * from usuario where usuario_nome = '$guardarNome' && usuario_senha = '$senhacripto';");
$result = mysqli_fetch_array($dados); 
if ($guardarNome == $result['usuario_nome'] && $senhacripto == $result['usuario_senha']) 
{ 
    session_start();
    $_SESSION["admin"]=1;
    $_SESSION["usuario"]=$result['usuario_nome'];
    $_SESSION["codigo"] =$result['usuario_codigo'];
    header("location:../restrito.php");
}
else
	{
        echo "Erro";
    }
?>
