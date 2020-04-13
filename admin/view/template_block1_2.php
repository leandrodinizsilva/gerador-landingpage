<?php
session_start();
if ( isset($_SESSION['user']) ) {
  include('../view/header_template_2.php');
  include('../class/Paginas.php');
?>
<ol class="breadcrumb">
  <li class="active">
    <i class='glyphicon glyphicon-menu-right'></i> Bloco 1
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
                  <a href='template_menu_2.php?id_menu=1' class='btn btn-block btn-warning'><< Anterior</a>
                  <form method="POST" action="template_block2_2.php">
                    <?php
                      if (isset($_POST["template-id"])) {
                    ?>
                      <input type="hidden" name="template-id" value="<?=$_POST['template-id'];?>">
                    <?php
                      }
                    ?>
                    <input type="submit" class='btn btn-block btn-primary' value="Próximo >>">
                    </input>
                  </form>
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
    <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 1</div>
    <div class="padding-interno">
      <form method="post" enctype="multipart/form-data" action="../controller/template_2.php">
        <table class="table" style="margin-bottom:0">
          <tbody>
          <tr>
              <td>
                <div class="form-group">
                  <label>Título 1</label>
                  <input type="text" name="title-1" required value="<?=$block1['title_1'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 1</label>
                  <input type="text" name="text-1" required value="<?=$block1['text_1'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Ícone 1</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                  <input type="text" name="icon-1" required value="<?=$block1['icon_1'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Título 2</label>
                  <input type="text" name="title-2" required value="<?=$block1['title_2'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 2</label>
                  <input type="text" name="text-2" required value="<?=$block1['text_2'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Ícone 2</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                  <input type="text" name="icon-2" required value="<?=$block1['icon_2'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Título 3</label>
                  <input type="text" name="title-3" required value="<?=$block1['title_3'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 3</label>
                  <input type="text" name="text-3" required value="<?=$block1['text_3'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Ícone 3</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                  <input type="text" name="icon-3" required value="<?=$block1['icon_3'];?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <input type="hidden" name="template-id" value="<?=$_SESSION['id'];?>"> </input>
                  <input type='submit' class='btn btn-block btn-success' name='update-block1-2' value='Salvar' />
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
include('../inc/footer.php');
} else {
    echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
