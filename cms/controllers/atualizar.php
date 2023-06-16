<?php
include("../models/conexao.php");
$diretorio = "../views/imgs/";
$varTitulo = $_POST["blogTitulo"];
$varCorpo = $_POST["blogCorpo"];
$varData = $_POST["blogData"];
/* $varUsuario = $_POST["blogUsuario"]; */
$varImagem = $_POST["fk_codigoImagem"];

$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

$query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo group by blog_bloginfo_codigo");
$result = mysqli_fetch_array($query);
$varBlogInfoCodigo = $result['bloginfo_codigo'];
mysqli_query($conexao, "UPDATE bloginfo set bloginfo_titulo = '$varTitulo', bloginfo_corpo = '$varCorpo', bloginfo_data = '$varData' where bloginfo_codigo = '$varBlogInfoCodigo';");

$query = mysqli_query($conexao, "SELECT * FROM imagens WHERE fk_id_imagem = $varImagem");
$codigosImg = array();
while ($exibe = mysqli_fetch_array($query)) {
    $blogImagemRandom = $exibe[2];
    $codigosImg[] = $exibe[0];
}

if (!empty($blogImagemRandom) && file_exists($diretorio . "/" . $blogImagemRandom)) 
{
    unlink($diretorio . "/" . $nomeImagemRandom);
}
for ($k = 0; $k < count($arquivo['name']); $k++) {
	$destino = $diretorio . "/" . $arquivo['name'][$k];
	$extension = pathinfo($destino, PATHINFO_EXTENSION);
	$nomeImagem = $arquivo['name'][$k];
	$nomeImagemRandom = md5(uniqid($nomeImagem));

	/* move_uploaded_file(arquivo, destino do arquivo) */
	if ($extension == "png") {
		/* Mover arquivo para a pasta com o nome randomico */
		if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $nomeImagemRandom . "." . $extension)) {
            $codigoImagem = $codigosImg[$k];
			mysqli_query($conexao, "UPDATE imagens SET nome_imagem ='$nomeImagem', nome_randomico_imagem = '$nomeImagemRandom.$extension' WHERE id_imagem = '$codigoImagem')");

		} else {
			echo "Falha ao enviar o arquivo";
		}   
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG'";
	}

}
/* header("location:../") */
    ?>