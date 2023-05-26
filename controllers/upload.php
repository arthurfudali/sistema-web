<?php

include("../models/conexao.php");

$diretorio = "imgs/";


/* Implementações (pathinfo)(md5()) (uniqid):
 -  Apenas arquivos png;
 -  Na hora que fizer o upload vai renomear o arquivo para um nome aleatório, mas no banco de dados fica salvo o nome antigo e o novo nome.
 */

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
	} else {
		echo "Arquivo não é compatível com o tipo 'PNG'";
	}
}
?>