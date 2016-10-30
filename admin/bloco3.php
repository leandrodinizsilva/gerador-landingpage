<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Home.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> <a href="template.php">Bloco 3</a>
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
                                <h4>Teste</h4>
                            </div>
                            <div class="form-group">
                                <a href="bloco2.php" class="btn btn-block btn-warning"><< Anterior</a>
                                <a href="bloco4.php" class="btn btn-block btn-primary">Próximo >></a>
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
        <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 3</div>
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
                            <label>Subtítulo</label>
                            <input type="text" name="subtitulo" value="<?php echo ( isset($titulo_e) ) ? $titulo_e : $titulo ?>" maxlength="20" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Imagem 1</label>
                            <input type="file" name="imagem1" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Imagem 2</label>
                            <input type="file" name="imagem2" class="form-control" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Imagem 3</label>
                            <input type="file" name="imagem3" class="form-control" />
                            <br />
                            <input type='submit' class='btn btn-block btn-success' name='salvar' value='Salvar' />
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
