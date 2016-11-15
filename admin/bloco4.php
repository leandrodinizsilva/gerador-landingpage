<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Blocos.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Bloco 4
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
                                <?php
                                if ( isset($_GET['id_bloco4']) ) {
                                    echo "<a href='bloco3.php?id_bloco3=1' class='btn btn-block btn-warning'><< Anterior</a>";
                                    echo "<a href='rodape.php?id_rodape=1' class='btn btn-block btn-primary'>Próximo >></a>";
                                } else {
                                    echo "<a href='bloco3.php' class='btn btn-block btn-warning'><< Anterior</a>";
                                    echo "<a href='rodape.php' class='btn btn-block btn-primary'>Próximo >></a>";
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
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 4</div>
        <div class="padding-interno">
            <form method="post" enctype="multipart/form-data">
               <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="titulo_bloco4" value="<?php echo $titulo_bloco4 ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Subtítulo</label>
                                <input type="text" name="subtitulo_bloco4" value="<?php echo $subtitulo_bloco4 ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" name="endereco_bloco4" value="<?php echo $endereco_bloco4 ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email_bloco4" value="<?php echo $email_bloco4 ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Texto</label>
                                <textarea name="texto_bloco4"><?php echo $texto_bloco4 ?></textarea>
                                <br />
                                <input type='submit' class='btn btn-block btn-success' name='update_bloco4' value='Salvar' />
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
