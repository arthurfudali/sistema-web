<?php include("blades/header.php"); ?>
<?php include("../models/conexao.php"); ?>
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

<!--     <input class="btn btn-success mt-3 ms-1" type="submit" value="Cadastrar">
 -->
</form>
</div>
<?php include("blades/footer.php"); ?>