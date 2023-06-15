<?php
include ("../models/conexao.php");
$guardarNome = $_POST["campoNome"];
$guardarSenha = $_POST["campoSenha"];
$dados = mysqli_query($conexao, "SELECT * from usuario where usuario_nome = '$guardarNome' && usuario_senha = '$guardarSenha';");
$result = mysqli_fetch_array($dados); 

if ($guardarNome == $result['usuario_nome'] && $guardarSenha == $result['usuario_senha']) { 
    session_start();
    $_SESSION["fatec"]=1;
    $_SESSION["professor"]="Maria";
    header("location:../restrito.php");
}

else
	{
        echo "Erro";
    }
?>
