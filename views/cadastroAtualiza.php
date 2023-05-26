<?php include("blades/header.php"); ?>
<?php include("../models/conexao.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">
<?php
$varIdAluno = $_GET["id_aluno"];
$query = mysqli_query($conexao, "SELECT * from alunos WHERE codigo = $varIdAluno");
while ($exibe = mysqli_fetch_array($query)) {
    ?>
    <h3 class="p-3" > Atualizar</h3>
    <form action="../controllers/atualizar.php" method="post">
        <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
        <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>">
        <label class="form-label">nome</label>
        <input class="form-control"type="text" name="alunoNome" value="<?php echo $exibe[1] ?>"> <br>
        <label class="form-label">cidade</label>
        <input class="form-control"type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>"> <br>
        <label class="form-label">sexo</label> <br>

        <input type="radio" name="alunoSexo" value="m" <?php echo ($exibe[3]=="m")?"checked":"" ?>> Masculino
        <input type="radio" name="alunoSexo" value="f" <?php echo ($exibe[3]=="f")?"checked":"" ?>> Feminino <br>

        <input class="btn btn-success mt-3 ms-1"type="submit" value="Atualizar">

    </form>

<?php } ?>
</div>
<?php include("blades/footer.php"); ?>