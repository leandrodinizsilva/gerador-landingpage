<?php
session_start();
if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Blocos.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Bloco 2
        </li>
    </ol>
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
                                <a href='bloco1.php?id_bloco1=1' class='btn btn-block btn-warning'><< Anterior</a>
                                <a href='bloco3.php?id_bloco3=1' class='btn btn-block btn-primary'>Próximo >></a>
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
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 2</div>
        <div class="padding-interno">
            <form method="post" enctype="multipart/form-data">
                <table class="table" style="margin-bottom:0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo_bloco2" value="<?php echo $titulo_bloco2 ?>" maxlength="20" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Subtítulo</label>
                                    <input type="text" name="subtitulo_bloco2" value="<?php echo $subtitulo_bloco2 ?>" maxlength="20" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Texto</label>
                                    <textarea name="texto_bloco2"><?php echo $texto_bloco2 ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <?php
                        if ( isset( $imagem_bloco2 ) ){
                        echo "
                            <tr>
                                <td>
                                    <div class='box col-md-6'>
                                        <div class='form-group'>
                                            <br />
                                            <a href='userfiles/bloco2/{$imagem_bloco2}' target='_blank'>
                                                <img src='userfiles/bloco2/{$imagem_bloco2}' width='140' />
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>";
                        }
                        ?>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Imagem</label>
                                    <input type="file" name="imagem_bloco2" class="form-control" />
                                    <br />
                                    <input type='submit' class='btn btn-block btn-success' name='update_bloco2' value='Salvar' />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
