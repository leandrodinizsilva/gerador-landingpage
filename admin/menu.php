<?php
session_start();
if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Paginas.php');
    ?>
    <ol class="breadcrumb">
        <li class="active">
            <i class='glyphicon glyphicon-menu-right'></i> <a href="template.php">Menu</a>
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
                                <a href='template.php?id_template=1' class='btn btn-block btn-warning'><< Anterior</a>
                                <a href='bloco1.php?id_bloco1=1' class='btn btn-block btn-primary'>Próximo >></a>
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
            <form method="post" enctype="multipart/form-data">
                <table class="table" style="margin-bottom:0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Cor Selecionado</label>
                                    <span style="color: #bbb">( site restrito a 4 menus )</span>
                                    <input type="text" name="cor_selecionado_menu" placeholder="#ffffff" value="<?php echo $cor_selecionado_menu ?>" maxlength="7" class="form-control" />
                                    <input type="hidden" name="id_menu" value="<?php echo $id_menu ?>" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="titulo_menu" value="<?php echo $titulo_menu ?>" maxlength="20" class="form-control" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Ícone</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                    <input type="text" name="icone_menu" value="<?php echo $icone_menu ?>" maxlength="20" class="form-control" placeholder="titulo-icone" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php
                                        if ( isset( $_GET['id_menu'] ) ) {
                                           echo "<input type='submit' class='btn btn-block btn-success' name='update_menu' value='Salvar' />" ;
                                        } else {
                                            echo "<input type='submit' class='btn btn-block btn-success' name='salvar_menu' value='Salvar' />";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="box col-md-4">
        <div class="panel panel-primary shadow">
            <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Menus</div>
            <div class="padding-interno">
             <table class="table" style="margin-bottom:0">
                <tbody>
                    <?php
                    if ( isset($sql_menu_paginas) && $sql_menu_paginas->num_rows > 0 ) {//
                        foreach ($sql_menu_paginas as $key => $value) {
                            echo "
                                <tr>
                                    <td>{$value['titulo']}</td>
                                    <td class='text-right'>
                                        <a class='btn btn-warning btn-sm' href='menu.php?id_menu={$value['id']}'>
                                            <i class='glyphicon glyphicon-pencil icon-white'></i>
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='menu.php?excluir={$value['id']}' onclick='return confirm(\"Tem certeza?\");'>
                                            <i class='glyphicon glyphicon-trash icon-white'></i>
                                        </a>
                                    </td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "<td>Não existe menu cadastrado!</td>";
                    }
                    ?>
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
