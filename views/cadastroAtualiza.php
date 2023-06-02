<?php include("blades/header.php"); ?>
<?php include("../models/conexao.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">
<?php
$varIdPost = $_GET["bloginfo_codigo"];
$query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo group by blog_bloginfo_codigo WHERE blog_codigo = $varIdPost");
while ($exibe = mysqli_fetch_array($query)) {
    ?>
    <h3 class="p-3" > Atualizar</h3>
    <form action="../controllers/atualizar.php" method="post">
        <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
       <!--  <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>">
        <label class="form-label">nome</label>
        <input class="form-control"type="text" name="alunoNome" value="<?php echo $exibe[1] ?>"> <br>
        <label class="form-label">cidade</label>
        <input class="form-control"type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>"> <br>
        <label class="form-label">sexo</label> <br>

        <input type="radio" name="alunoSexo" value="m" <?php echo ($exibe[3]=="m")?"checked":"" ?>> Masculino
        <input type="radio" name="alunoSexo" value="f" <?php echo ($exibe[3]=="f")?"checked":"" ?>> Feminino <br>

        <input class="btn btn-success mt-3 ms-1"type="submit" value="Atualizar">
    --><label class="form-label">Título Da Noticia</label>
        <input class="form-control" type="text" name="blogTitulo"> <br>
        <label class="form-label">Conteúdo</label>
        <input class="form-control"type="text" name="blogCorpo"> <br>
        <label class="form-date" >Data</label> <br>
        <input type="date" name="blogData"> <br>
        <label for="usuario">Selecione um usuario</label>
        
            
                <?php  /* $query = mysqli_query($conexao, "SELECT usuario_codigo, usuario_nome from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo  INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo ORDER BY usuario_codigo; "); */
                $query = mysqli_query($conexao, "SELECT usuario_codigo, usuario_nome FROM usuario ORDER BY usuario_codigo;")
                ?>
                <select name="blogUsuario" id="">
                <?php 
                    while ($row = mysqli_fetch_array($query))
                    {
                        echo "<option value='" . $row['usuario_codigo'] ."'>" . $row['usuario_nome'] ."</option>";
                    }
                ?> 
                </select>
                
        <!-- Se tirar enctype ele para de funcionar, ele mostra o tipo de form -->
        <form name="upload" enctype="multipart/form-data" ction="../controllers/upload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <input type="file" name="arquivo[]" multiple="multiple"/>
            <input class="btn btn-success mt-3 ms-1" name="enviar" type="submit" value="Enviar">
        </form>



    </form>

<?php } ?>
</div>
<?php include("blades/footer.php"); ?>