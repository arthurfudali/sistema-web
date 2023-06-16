<?php
include("../models/conexao.php");
session_start();
$diretorio = "../views/imgs/";
$varTitulo = $_POST["blogTitulo"];
$varCorpo = $_POST["blogCorpo"];
$varData = $_POST["blogData"];
/* $varUsuario = $_POST["blogUsuario"]; */
$varUsuario = $_SESSION["codigo"];

mysqli_query($conexao, "INSERT INTO bloginfo (bloginfo_titulo, bloginfo_corpo, bloginfo_data) values ('$varTitulo ', '$varCorpo', '$varData')"); //funciona
$idblog = mysqli_insert_id($conexao);

/* Operador ternário */
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

for ($k = 0; $k < count($arquivo['name']); $k++) {
	$destino = $diretorio . "/" . $arquivo['name'][$k];
	$extension = pathinfo($destino, PATHINFO_EXTENSION);
	$nomeImagem = $arquivo['name'][$k];
	$nomeImagemRandom = md5(uniqid($nomeImagem));

	/* move_uploaded_file(arquivo, destino do arquivo) */
	if ($extension == "png") {
		/* Mover arquivo para a pasta com o nome randomico */
		if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $nomeImagemRandom . "." . $extension)) {

			mysqli_query($conexao, "INSERT INTO imagens (nome_imagem, nome_randomico_imagem, fk_id_imagem) VALUES ('$nomeImagem', '$nomeImagemRandom.$extension', '$idblog')");
			$idimagem = mysqli_insert_id($conexao);

		} else {
			echo "Falha ao enviar o arquivo";
		}   
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG'";
	}

}
mysqli_query($conexao, "INSERT INTO posts (blog_bloginfo_codigo, blog_blogimgs_codigo, blog_usuario_codigo) VALUES ('$idblog', '$idimagem', '$varUsuario')");


header("location:../index.php"); //te manda pra index novamente

?>