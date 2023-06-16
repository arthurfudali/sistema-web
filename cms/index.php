<?php include("models/conexao.php") ?>
<?php include("views/blades/header.php");
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../index.php';</script>";
}
?>
<link rel="stylesheet" href="views/css/style.css">
<div class="container pt-2 mt-5 p-3 rounded-2 shadow" id="main">
    <p class="h3">Blog</p>
    <div class="row">
    <a class="m-3 col-2" id="btn" href="views/cadastro.php">
        <button class="full-rounded">
            <span>Criar Post</span>
            <div class="border full-rounded"></div>
        </button>
    </a> 
    <a class="m-3 col-3"id="btn" href="views/cadastroUser.php">
        <button class="full-rounded">
            <span>Cadastrar Usuário</span>
            <div class="border full-rounded"></div>
        </button>
    </a>
    <a class="m-3 col-6 "id="btn" href="controllers/logoff.php">
        <button class="full-rounded buttonsair">
            <span>Sair</span>
            <div class="border full-rounded"></div>
        </button>
    </a>
    </div>
        <table class="table table-bordered table-striped table-hover mt-3" id="table" width="500px">
            <tr>
                <td>Imagens</td>
                <td>Noticia</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>

            <?php

            $query = mysqli_query($conexao, "SELECT * from posts INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo INNER JOIN imagens on blog_blogimgs_codigo = id_imagem INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo group by blog_bloginfo_codigo;");
            while ($exibe = mysqli_fetch_array($query)) {?>
            <tr><!--  -->
                <td><img class="rounded mx-auto d-block " src="views/imgs/<?php echo $exibe[10] ?>" width="200px" alt=""></td>
                <td>
                    <a class="link-underline-opacity-0" href="views/page.php?blog_codigo=<?php echo $exibe[0] ?>">
                    <h3 class="title" ><?php echo $exibe[5] ?></h3>
                    Criada por <b><?php echo $exibe[12] ?></b> em <?php echo $exibe[7] ?>
                    <hr>
                    <?php  echo substr($exibe[6],0,250)."..."  ?> 
                </a>
                </td>
                <td><a class="btn" href="views/cadastroAtualiza.php?bloginfo_codigo=<?php echo $exibe[0] ?>">Editar</a>
                </td>
                <td>
                <input type="hidden" name="excluir_imagem" value="<?php echo $exibe[10];?>">     
                <a class="btn" name="deletar_imagem" href="controllers/deletar.php?bloginfo_codigo=<?php echo $exibe[0]; ?>">Excluir</a>
                </td>
            </tr>               
            <?php } ?>
        </table>
</div>
<?php include("views/blades/footer.php"); ?>