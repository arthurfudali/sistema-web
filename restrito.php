<?php
session_start();
if ($_SESSION["admin"]==1) {
header("location:cms/index.php");
				
} else {
	echo "Você não tem permissão para acessar esta página!<hr><a href='index.php'>Voltar</a>";
}
?>
