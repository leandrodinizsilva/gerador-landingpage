<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Blocos.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Bloco 1
        </li>
    </ol>
    <!-- <form method="post" enctype="multipart/form-data"> -->
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Template Selecionado</div>
            <div class="padding-interno">
             <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <?php
                                if ( isset($titulo_ativo) ) {
                                    echo "<h4>{$titulo_ativo}</h4>";
                                } else {
                                    echo "<h4>Nenhum template selecionado!</h4>";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                if ( isset($_GET['retorno']) ) {
                                    if ($_GET['retorno'] === '1') {
                                        echo $DB->msg('Sucesso!', 'success');
                                    } else {
                                        echo $DB->msg('Falha!', 'danger');
                                    }
                                }
                                ?>
                                <?php
                                if ( isset($_GET['id_bloco1']) ) {
                                    echo "<a href='menu.php?id_menu=1' class='btn btn-block btn-warning'><< Anterior</a>";
                                    echo "<a href='bloco2.php?id_bloco2=1' class='btn btn-block btn-primary'>Próximo >></a>";
                                } else {
                                    echo "<a href='menu.php' class='btn btn-block btn-warning'><< Anterior</a>";
                                    echo "<a href='bloco2.php' class='btn btn-block btn-primary'>Próximo >></a>";
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="box col-md-8">
    <div class="panel panel-primary shadow">
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 1</div>
        <div class="padding-interno">
         <table class="table" style="margin-bottom:0">
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="titulo_bloco1" value="<?php echo $titulo_bloco1 ?>" maxlength="20" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Subtítulo</label>
                            <input type="text" name="subtitulo_bloco1" value="<?php echo $subtitulo_bloco1 ?>" maxlength="20" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="imagem_bloco1" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Texto</label>
                            <textarea name="texto_bloco1"></textarea>
                            <br />
                            <input type='submit' class='btn btn-block btn-success' name='salvar_bloco1' value='Salvar' />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
