<?php
session_start();
if ( isset($_SESSION['user']) ) {
  include('../view/header_template_2.php');
  include('../class/Paginas.php');
?>
<ol class="breadcrumb">
  <li class="active">
    <i class='glyphicon glyphicon-menu-right'></i> Rodapé
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
                  <a href='template_testimonial_2.php?id_menu=1' class='btn btn-block btn-warning'><< Anterior</a>
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
          <?php
            if ( isset( $footer_bg_img ) ){
              echo 
              "
              <tr>
                <td>
                  <div class='box col-md-6'>
                    <div class='form-group'>
                        <br />
                      <a href='" . DIR_IMG_UP_REL . "/{$footer_bg_img}' target='_blank'>
                        <img src='" . DIR_IMG_UP_REL . "/{$footer_bg_img}' width='140' />
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
                  <label>Imagem de Fundo</label>
                  <input type="file" name="background-img" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" name="facebook" required value="<?=$footer_facebook; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" name="instagram" required value="<?=$footer_instagram; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" name="twitter" required value="<?=$footer_twitter; ?>" maxlength="255" class="form-control" />
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
                  <input type='submit' class='btn btn-block btn-success' name='update-footer-2' value='Salvar' />
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
