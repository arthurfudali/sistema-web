<?php include("blades/header.php"); ?>
<?php include("../models/conexao.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">

<?php
$varIdPost = $_GET["bloginfo_codigo"];


$query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo where blog_codigo = $varIdPost ORDER BY blog_codigo DESC"); 

while ($exibe = mysqli_fetch_array($query)) {
?>
    <h3 class="p-3" > Atualizar</h3>
    <form action="../controllers/atualizar.php?blogCodigo=<?php echo $exibe[1]?>" method="post">
        
      
        <label class="form-label">Título Da Noticia</label>
        <input type="hidden" name="fk_codigoImagem" value="<?php echo $exibe[11] ?>">
        <input class="form-control" type="text" name="blogTitulo" value="<?php echo $exibe[5]?>"> <br>
        <label class="form-label">Conteúdo</label>
        <textarea name="blogCorpo" class="form-control" cols="30" rows="10"><?php echo $exibe[6]?></textarea>
        <label class="form-date" >Data</label> <br>
        <input type="date" name="blogData"> <br>
        <label class="form-label">Imagens</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="file" name="arquivo[]" multiple="multiple" /><br><br>
        <input class="btn btn-success mt-3 ms-1" name="enviar" type="submit" value="Enviar">
    </form>

<?php } ?>
</div>
<?php include("blades/footer.php"); ?>