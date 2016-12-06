<?php
session_start();
if ( isset($_SESSION['user']) ) {
    include('inc/header_home.php');
    include('class/Paginas.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Home
        </li>
    </ol>
    <div class="box col-md-4"></div>
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Selecionar Template</div>
            <div class="padding-interno">
                <form method="post" enctype="multipart/form-data">
                    <table class="table" style="margin-bottom:0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php
                                        if ( isset($_GET['retorno']) ) {
                                            if ($_GET['retorno'] === '1') {
                                                echo $DB->msg('Template removido com sucesso!', 'success');
                                            } else {
                                                echo $DB->msg('Falha na remoção do template!', 'danger');
                                            }
                                        }
                                        ?>
                                        <label>Template ativo</label>
                                        <?php
                                        if ( isset($titulo_ativo) ) {
                                            echo "<h4>
                                                        {$titulo_ativo} &nbsp;
                                                        <a class='btn btn-warning btn-md' href='template.php?id_template=1'>
                                                            <i class='glyphicon glyphicon-pencil icon-white'></i>
                                                        </a>
                                                        <a class='btn btn-danger btn-md' href='home.php?excluir_template=1' onclick='return confirm(\"Tem certeza?\");'>
                                                            <i class='glyphicon glyphicon-trash icon-white'></i>
                                                        </a>
                                                      </h4>";
                                        } else {
                                            echo "<h4>Não existe template ativo!</h4>";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Selecionar outro template</label>
                                        <select name="template_home" data-rel="chosen" class="form-control">
                                            <option>Selecione...</option>
                                            <?php
                                            if ( isset( $sql_template_home ) ) {
                                                foreach ($sql_template_home as $key => $value) {
                                                    echo "<option value='{$value['id']}'>{$value['titulo']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type='submit' class='btn btn-block btn-success' name='confirmar_home' value='Confirmar' />
                                        <br />
                                        <a href="template.php" class="btn btn-block btn-primary">Novo Template</a>
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
