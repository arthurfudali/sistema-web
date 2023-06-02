<?php include("blades/header.php"); 
include("../models/conexao.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">

<form action="../controllers/cadastrar.php"  enctype="multipart/form-data" method="post">
<h3 class="p-3" > Cadastrar</h3>
    <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
    <label class="form-label">Título Da Noticia</label>
    <input class="form-control" type="text" name="blogTitulo"> <br>

    <label class="form-label">Conteúdo</label>
    <input class="form-control"type="text" name="blogCorpo"> <br>

    <label class="form-date" >Data</label> <br>
    <input type="date" name="blogData"> <br>

    <label for="usuario">Selecione um usuario</label>     
    <?php  
    $query = mysqli_query($conexao, "SELECT * FROM usuario ORDER BY usuario_codigo;");
/*     $iduser = mysqli_query($conexao, "SELECT LAST_INSERT_ID();"); */
    ?>
    <select name="blogUsuario" id="">
        <?php 
            while ($row = mysqli_fetch_array($query))
            {
                    echo "<option value='" . $row['usuario_codigo'] ."'>" . $row['usuario_nome'] ."</option>";
            }
        ?> 
    </select>
    
    <br>

     <!-- Se tirar enctype ele para de funcionar, ele mostra o tipo de form -->
    <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
    <input type="file" name="arquivo[]" multiple="multiple"/>
    <br>
    <input class="btn btn-success mt-3 ms-1" type="submit" value="Cadastrar">

</form>
</div>
<?php include("blades/footer.php"); ?>