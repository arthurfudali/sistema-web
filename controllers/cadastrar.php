<?php
include("../models/conexao.php");
$varTitulo = $_POST["blogTitulo"];
$varCorpo = $_POST["blogCorpo"];
$varData = $_POST["blogData"];

mysqli_query($conexao, "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) values ('$varTitulo ', '$varCorpo', '$varData')");
// guarda o que esta na caixinha alunoNome na variavel varAlunoNome
// variavel $_POST e uma variavel universal

header("location:../index.php"); //te manda pra index novamente


?>