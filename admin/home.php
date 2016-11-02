<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header_home.php');
    include('class/Home.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Home
        </li>
    </ol>
    <!-- <form method="post" enctype="multipart/form-data"> -->
    <div class="box col-md-4"></div>
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Selecionar Template</div>
            <div class="padding-interno">
               <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Template ativo</label>
                                <h4>Não existe template ativo! &nbsp;
                                    <a class='btn btn-warning btn-md' href='#'>
                                        <i class='glyphicon glyphicon-pencil icon-white'></i>
                                    </a>
                                    <a class='btn btn-danger btn-md' href='#' onclick='return confirm(\"Tem certeza?\");'>
                                        <i class='glyphicon glyphicon-trash icon-white'></i>
                                    </a>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Selecionar outro template</label>
                                <select name="posicao" data-rel="chosen" class="form-control">
                                    <option>Selecione...</option>
                                    <?php
                                        if ( isset( $sql_template ) ) {
                                            foreach ($sql_template as $key => $value) {
                                                echo "<option value='{$value['titulo']}' selected>{$value['titulo']}</option>";
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
                                <input type='submit' class='btn btn-block btn-success' name='confirmar' value='Confirmar' />
                                <br />
                                <a href="template.php" class="btn btn-block btn-primary">Novo Template</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box col-md-4"></div>
    <!-- </form> -->
</div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
