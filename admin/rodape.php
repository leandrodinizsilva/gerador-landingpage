<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Paginas.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Rodapé
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
                                <a href='bloco4.php?id_bloco4=1' class='btn btn-block btn-warning'><< Anterior</a>
                                <?php
                                // if ( isset($_GET['id_bloco4']) ) {
                                //     echo "<a href='bloco4.php?id_bloco4=1' class='btn btn-block btn-warning'><< Anterior</a>";
                                // } else {
                                //     echo "<a href='bloco4.php' class='btn btn-block btn-warning'><< Anterior</a>";
                                // }
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
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Rodapé</div>
        <div class="padding-interno">
            <form method="post" enctype="multipart/form-data">
             <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Texto</label>
                                <input type="text" name="texto_rodape" value="<?php echo $texto_rodape ?>" maxlength="255" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type='submit' class='btn btn-block btn-success' name='update_rodape' value='Salvar' />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    </div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
