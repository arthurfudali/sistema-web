<?php

$varIdPost = $_GET["bloginfo_codigo"];

include("../models/conexao.php");
mysqli_query($conexao, "DELETE FROM posts where blog_codigo = $varIdPost ");
header("location:../"); //voltar pra index


?>