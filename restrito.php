<?php
session_start();
if ($_SESSION["fatec"]==1) {

/* echo "Bem-vindo, ".$_SESSION["professor"]."!<hr><a href='logoff.php'>Sair</a>"; */
header("location:cms/index.php");
				
} else {
	echo "Você não tem permissão para acessar esta página!<hr><a href='index.php'>Voltar</a>";
}
?>
