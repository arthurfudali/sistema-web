<?php
include("../models/conexao.php");
$diretorio = "../views/imgs/";
$varTitulo = $_POST["blogTitulo"];
$varCorpo = $_POST["blogCorpo"];
$varData = $_POST["blogData"];
$varUsuario = $_POST["blogUsuario"];

$query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo group by blog_bloginfo_codigo");
$result = mysqli_fetch_array($query);
$varBlogInfoCodigo = $result['bloginfo_codigo'];
mysqli_query($conexao, "UPDATE bloginfo set bloginfo_titulo = '$varTitulo', bloginfo_corpo = '$varCorpo', bloginfo_data = '$varData' where bloginfo_codigo = '$varBlogInfoCodigo';");

/* header("location:../") */
    ?>