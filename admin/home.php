<?php
session_start();

if ( isset($_SESSION['user']) ) {
  include('inc/header_home.php');
  include('class/Paginas.php');
  unset($_SESSION["edit"]);
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
                      if ($_SESSION["template"] == "template") {
                        ?>
                          <form action="template.php?id_template=1" id="update-template" method="POST">
                            <?="{$titulo_ativo} &nbsp;"; ?>
                            <button type="submit" name="update-template" class='btn btn-warning btn-md'>
                              <i class='glyphicon glyphicon-pencil icon-white'></i>
                            </button>
                          </form>
                          <form action="controller/template_2.php" method="POST" id="delete-template">
                            <button type="submit" name="delete-template" class="btn btn-danger btn-md" onclick='return confirm("Tem certeza?");'>
                              <input type="hidden" name="template-id" value="<?=$_SESSION['id']?>">
                              <i class='glyphicon glyphicon-trash icon-white'></i>
                            </button>                          
                          </form>
                        <?php
                      } else if ($_SESSION["template"] == "template_2") {
                        ?>
                        <form action="view/template_menu_2.php?id_template=1" id="update-template-2" method="POST">
                          <?="{$titulo_ativo} &nbsp;"; ?>
                          <input type="hidden" name="template-id" value="<?=$_SESSION['id']?>">
                          <button form="update-template-2" type="submit" name="update-template-2" class='btn btn-warning btn-md'>
                            <i class='glyphicon glyphicon-pencil icon-white'></i>
                          </button>
                        </form>
                        <form action="controller/template_2.php" method="POST" id="delete-template">
                          <button type="submit" name="delete-template-2" class="btn btn-danger btn-md" onclick='return confirm("Tem certeza?");'>
                            <input type="hidden" name="template-id" value="<?=$_SESSION['id']?>">
                            <i class='glyphicon glyphicon-trash icon-white'></i>
                          </button>                          
                        </form>
                        <?php
                      }
                    } else {
                      echo "<h4>Não existe template ativo!</h4>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <form method="post" enctype="multipart/form-data" action="./controller/template_2.php">
              <tr>
                <td>
                  <div class="form-group">
                    <label>Selecionar outro template</label>
                    <select name="template_home" data-rel="chosen" class="form-control">
                    <option value="">Selecione...</option>
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
                    <label>Selecionar outro template</label>
                    <select name="template_home_2" data-rel="chosen_2" class="form-control">
                    <option value="">Selecione...</option>
                    <?php
                      if ( isset( $sql_template_home_2 ) ) {
                        foreach ($sql_template_home_2 as $key => $value) {
                          echo "<option value='{$value['id']}'>{$value['title']}</option>";
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
                      <a  id="new-template" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Novo Template</a>
                </td>
              </tr>
            </tbody>
          </form>
        </table>
      </div>
    </div>
  </div>
  <div class="box col-md-4"></div>
  </div>
  <?php
  include('inc/footer.php');
  include('view/chooseTemplateModal.php');
} else {
  echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}