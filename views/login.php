<?php include("../models/conexao.php");
include("blades/header.php"); ?>
<form action="../controllers/validar.php" method="post">
        <input type="text" name="campoNome">
        <input type="password" name="campoSenha">
        <input type="submit" value="Enviar">
    </form>
<?php include("blades/footer.php"); ?>