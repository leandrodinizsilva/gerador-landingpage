<?php
session_start();
if ( isset($_SESSION['user']) ) {
  include('../view/header_template_2.php');
  include('../class/Paginas.php');
?>
<ol class="breadcrumb">
  <li class="active">
    <i class='glyphicon glyphicon-menu-right'></i> Bloco 2
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
                if (isset($_GET["errorImg"]) && $_GET["errorImg"] == 1) {
                  echo $DB->msg('Falha no upload de imagem, arquivo não suportado ou muito grande.', 'danger');
                }  
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
                    <a href='template_block1_2.php?id_menu=1' class='btn btn-block btn-warning'><< Anterior</a>
                    <form method="POST" action="template_testimonial_2.php?id_menu=1">
                      <?php
                        if (isset($_SESSION["id"])) {
                      ?>
                        <input type="hidden" name="template-id" value="<?=$_SESSION["id"];?>">
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
    <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Bloco 2</div>
    <div class="padding-interno">
      <form method="post" enctype="multipart/form-data" action="../controller/template_2.php">
        <table class="table" style="margin-bottom:0">
          <tbody>
            <tr>
              <td>
                <div class="form-group">
                  <label>Título 1</label>
                  <input type="text" name="title-1" required value="<?=$block2_title_1; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 1</label>
                  <input type="text" name="text-1" required value="<?=$block2_text_1; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $block2_img_1 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$block2_img_1}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$block2_img_1}' width='140' />
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>";
              }
            ?>
            <tr>
              <td>
                <div class="form-group">
                  <label>Imagem 1</label>
                  <input type="file" name="image-1" value="<?=$block2_img_1; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Título 2</label>
                  <input type="text" name="title-2" required value="<?=$block2_title_2; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 2</label>
                  <input type="text" name="text-2" required value="<?=$block2_text_2; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $block2_img_2 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$block2_img_2}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$block2_img_2}' width='140' />
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>";
              }
            ?>
            <tr>
              <td>
                <div class="form-group">
                  <label>Imagem 2</label>
                  <input type="file" name="image-2" value="<?=$block2_img_2; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Título 3</label>
                  <input type="text" name="title-3" required value="<?=$block2_title_3; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Texto 3</label>
                  <input type="text" name="text-3" required value="<?=$block2_text_3; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $block2_img_3 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$block2_img_3}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$block2_img_3}' width='140' />
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>";
              }
            ?>
            <tr>
              <td>
                <div class="form-group">
                  <label>Imagem 3</label>
                  <input type="file" name="image-3" value="<?=$block2_img_3; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <?php
                    if (isset($_SESSION["id"])) {
                  ?>
                    <input type="hidden" name="template-id" value="<?=$_SESSION["id"];?>">
                  <?php
                    }
                  ?>
                  <input type='submit' class='btn btn-block btn-success' name='update-block2-2' value='Salvar' />
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
