<?php
include("../models/conexao.php");
$varAlunoCodigo = $_POST["alunoCodigo"];
$varAlunoNome = $_POST["alunoNome"];
$varAlunoCidade = $_POST["alunoCidade"];
$varAlunoSexo = $_POST["alunoSexo"];

mysqli_query($conexao, "UPDATE alunos set  nome = '$varAlunoNome', cidade = '$varAlunoCidade', sexo = '$varAlunoCidade' where codigo = '$varAlunoCodigo';");

header("location:../")
    ?>