<?php include("models/conexao.php") ?>
<?php include("views/blades/header.php"); ?>
<div class="container pt-2 mt-5 p-3 rounded-2 shadow" style="background-color: #C4D7E0">
    <p class="h3">Blog</p>
    <a class="btn m-3" style="background-color: #C4D7E0" id="btn" href="views/cadastro.php">Cadastrar</a>
    <a class="btn m-3" style="background-color: #C4D7E0" id="btn" href="views/cadastroUser.php">Criar usuário</a>
    <a class="btn m-3" style="background-color: #C4D7E0" id="btn" href="controllers/logoff.php">Sair</a>

        
        <table class="table table-bordered table-striped table-hover mt-3" width="500px">
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
                    Criada por <b><?php echo $exibe[12] ?></b> em <?php echo $exibe[7] ?>
                    <hr>
                    <?php  echo substr($exibe[6],0,250)."..."  ?> 
                </a>
                </td>
                <td><a class="btn btn-primary" href="views/cadastroAtualiza.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Editar</a>
                </td>
                <td>
                <input type="hidden" name="excluir_imagem" value="<?php echo $exibe[10];?>">     
                <a class="btn btn-danger" name="deletar_imagem" href="controllers/deletar.php?bloginfo_codigo=<?php echo $exibe[0]; ?>">Excluir</a>
                </td>
            </tr>               
            <?php } ?>
        </table>
</div>
<?php include("views/blades/footer.php"); ?>