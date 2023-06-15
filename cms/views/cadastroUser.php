<?php include("blades/header.php"); 
include("../models/conexao.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">

<form action="../controllers/cadastrarUsuario.php" method="post">
<h3 class="p-3" > Cadastrar</h3>
    <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
    <label class="form-label">Nome</label>
    <input class="form-control" type="text" name="nomeUser"> <br>

    <label class="form-label">Email</label>
    <input class="form-control" type="text" name="emailUser">

    <label class="form-label">Senha</label>
    <input class="form-control" type="password" name="senhaUser">

    <input class="btn btn-success mt-3 ms-1" type="submit" value="Cadastrar">

</form>
</div>
<?php include("blades/footer.php"); ?>