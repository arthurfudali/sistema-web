<?php
include("../models/conexao.php");
$diretorio = "../views/imgs/";
$varTitulo = $_POST["blogTitulo"];
$varCorpo = $_POST["blogCorpo"];
$varData = $_POST["blogData"];
$varUsuario = $_POST["blogUsuario"];
$blogCodigo = $_POST["blogcodigo"];

mysqli_query($conexao, "UPDATE bloginfo set bloginfo_titulo = '$varTitulo', bloginfo_corpo = '$varCorpo', bloginfo_data = '$varData' where bloginfo_codigo = '$blogCodigo';");

header("location:../")
    ?>