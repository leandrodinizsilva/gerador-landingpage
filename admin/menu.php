<?php
session_start();
if (1 == 1) {
// if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Home.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> <a href="template.php">Menu</a>
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
                                <a href="template.php" class="btn btn-block btn-warning"><< Anterior</a>
                                <a href="bloco1.php" class="btn btn-block btn-primary">Próximo >></a>
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
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Adicionar Menu</div>
            <div class="padding-interno">
               <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Cor Selecionado</label>
                                <input type="text" name="cor_selecionado" placeholder="#ffffff" value="<?php echo ( isset($titulo_e) ) ? $titulo_e : $titulo ?>" maxlength="20" class="form-control" />
                            </div>
                        </td>
                    </tr>
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
                                <label>Ícone</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                <input type="text" name="icone" maxlength="20" class="form-control" placeholder="titulo-icone" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type='submit' class='btn btn-block btn-success' name='adicionar' value='Adicionar' />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Menus</div>
            <div class="padding-interno">
               <table class="table" style="margin-bottom:0">
                <tbody>
                    <tr>
                        <td>Teste</td>
                        <td class="text-right">
                            <a class='btn btn-warning btn-sm' href='#'>
                                <i class='glyphicon glyphicon-pencil icon-white'></i>
                            </a>
                            <a class='btn btn-danger btn-sm' href='#' onclick='return confirm(\"Tem certeza?\");'>
                                <i class='glyphicon glyphicon-trash icon-white'></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
