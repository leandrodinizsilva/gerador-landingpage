<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Paginas.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Início
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
                                        echo $DB->msg('Template adicionado com sucesso!', 'success');
                                    } else {
                                        echo $DB->msg('Falha na criação do template!', 'danger');
                                    }
                                }
                                ?>
                                <a href="home.php" class="btn btn-block btn-warning"><< Anterior</a>
                                <?php
                                if ( isset($_GET['id']) ) {
                                    echo "<a href='menu.php?id=1' class='btn btn-block btn-primary'>Próximo >></a>";
                                } else {
                                    echo "<a href='menu.php' class='btn btn-block btn-primary'>Próximo >></a>";
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
<div class="box col-md-4">
    <div class="panel panel-primary shadow">
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Informações Básicas</div>
        <div class="padding-interno">
            <form method="post" enctype="multipart/form-data">
                <table class="table" style="margin-bottom:0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo_template" required value="<?php echo $titulo_template ?>" maxlength="40" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Logotipo</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                    <input type="text" name="logotipo_template" required value="<?php echo $logotipo_template ?>" maxlength="20" class="form-control" placeholder="titulo-icone" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Cor Primária</label>
                                    <input type="text" name="cor_primaria_template" required value="<?php echo $cor_primaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Cor Secundária</label>
                                    <input type="text" name="cor_secundaria_template" required value="<?php echo $cor_secundaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Cor Terciária</label>
                                    <input type="text" name="cor_terciaria_template" required value="<?php echo $cor_terciaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type='submit' class='btn btn-block btn-success' name='salvar_template' value='Salvar' />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="box col-md-4"></div>
</div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
