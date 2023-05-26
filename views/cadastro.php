<?php include("blades/header.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">
<form action="../controllers/cadastrar.php" method="post">
<h3 class="p-3" > Cadastrar</h3>
    <!-- metodo: "post" serve para enviar as paginas desse formulario pro "cadastrar.php" -->
    <label class="form-label">Título Da Noticia</label>
    <input class="form-control" type="text" name="blogTitulo"> <br>
    <label class="form-label">Conteúdo</label>
    <input class="form-control"type="text" name="blogCorpo"> <br>
    <label class="form-date" >Data</label> <br>
    <input type="date" name="blogData"> <br>
    <label for="usuario">Selecione um usuario</label>
        <select name="cars" id="cars" name="blogUsuario">
            <?PHP
            $query =  mysqli_query($conexao, "SELECT count(*) as usuarios from usuario") ;
            for ($k = 0; $k < $query; $k++) {
            ?>
            <?php $query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo group by blog_bloginfo_codigo;")?>
            <option value="usuario<?php echo $exibe[11]?>"><?PHP echo $exibe[12] ?></option>
            <?php }?>
        </select>
            <br>
     <!-- Se tirar enctype ele para de funcionar, ele mostra o tipo de form -->
     <form name="upload" enctype="multipart/form-data" method="post" action="../controllers/upload.php">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple"/>
        <input name="enviar" type="submit" value="Enviar">
    </form>

    <input class="btn btn-success mt-3 ms-1" type="submit" value="Cadastrar">

</form>
</div>
<?php include("blades/footer.php"); ?>