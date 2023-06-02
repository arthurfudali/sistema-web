<?php include("models/conexao.php") ?>
<?php include("views/blades/header.php"); ?>
<div class="container bg-white pt-2 mt-5 p-3 rounded-2 shadow">
    <!-- 'p-3' é o padding geral do container, evitando ter que declarar o padding de cada lado (bottom, top, start e end), valeu igor filho da puta por ensinar.-->
    <p class="h3">Blog</p>
    <a class="btn btn-success" href="views/cadastro.php">cadastrar</a>

        
        <table class="table table-bordered table-strip
ed table-hover mt-3" width="500px">
            <tr>
                <td>Imagens</td>
                <td>Noticia</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>

            <?php

            $query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo group by blog_bloginfo_codigo;");
            while ($exibe = mysqli_fetch_array($query)) {?>
            <tr>
                <td><img class="rounded mx-auto d-block " src="views/imgs/<?php echo $exibe[10] ?>" width="200px" alt=""></td>
                <td>
                    <a class="link-underline-opacity-0" href="views/page.php?blog_codigo=<?php echo $exibe[0] ?>">
                    <h3 class="title" ><?php echo $exibe[5] ?></h3>
                    Criada por <b><?php echo $exibe[13] ?></b> em <?php echo $exibe[7] ?>
                    <hr>
                    <?php  echo substr($exibe[6],0,250)."..."  ?> 
                </a>
                </td>
                <td><a class="btn btn-primary" href="views/cadastroAtualiza.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Editar</a>
                </td>
                <td><a class="btn btn-danger " href="controllers/deletar.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Excluir</a>
                </td>
            </tr>

<!-- instert into tabela where codigo = last_id() -->
               
 
            <?php } ?>
        </table>
    <?php  ?>

</div>
<?php include("views/blades/footer.php"); ?>