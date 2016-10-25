<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Home.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> Novo Template
        </li>
    </ol>
    <!-- <form method="post" enctype="multipart/form-data"> -->
    <div class="box col-md-4"></div>
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Informações Básicas</div>
            <div class="padding-interno">
               <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="titulo" value="<?php echo ( isset($titulo_e) ) ? $titulo_e : $titulo ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type='submit' class='btn btn-block btn-success' name='salvar' value='Salvar' />
                                <br />
                                <a href="menu.php" class="btn btn-block btn-primary">Próximo >></a>
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
