<?php

$varIdAluno = $_GET["id_aluno"];

include("../models/conexao.php");
mysqli_query($conexao, "DELETE FROM alunos where codigo = $varIdAluno ");
header("location:../"); //voltar pra index


?>