<?php
include("../models/conexao.php");

$diretorio = "../views/imgs/";

/* Operador ternário */
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

for ($k = 0; $k < count($arquivo['name']); $k++) {

	$destino = $diretorio . "/" . $arquivo['name'][$k];

	/* Extensão: */
	$extension = pathinfo($destino, PATHINFO_EXTENSION);

	$nomeImagem = $arquivo['name'][$k];
	$nomeImagemRandom = md5(uniqid($nomeImagem));
	/* ou $varImgNameRandom = uniqid() . "." . $extension;
	 */

	/* move_uploaded_file(arquivo, destino do arquivo) */
	if ($extension == "png") {
		/* Mover arquivo para a pasta com o nome randomico */
		if (move_uploaded_file($arquivo['tmp_name'][$k], $diretorio . "/" . $varImgNameRandom . "." . $extension)) {

			mysqli_query($conexao, "INSERT INTO imagens (nome_imagem, nome_randomico_imagem) VALUES ('$nomeImagem', '$nomeImagemRandom.$extension')");
			echo " <br> Arquivo enviado com sucesso! <br>";

		} else {
			echo "Falha ao enviar o arquivo";
		}
		mysqli_query($conexao, "INSERT INTO posts (blog_bloginfo_codigo, blog_blogimgs_codigo, blog_usuario_codigo) VALUES ('$idblog', '$idimg', '$iduser')");
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG'";
	}
}
?>