<?php
session_start();
if ( isset($_SESSION['user']) ) {
  include('../view/header_template_2.php');
  include('../class/Paginas.php');
?>
<ol class="breadcrumb">
  <li class="active">
    <i class='glyphicon glyphicon-menu-right'></i> Testemunhos
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
                    <form method="POST" action="template_footer_2.php?id_menu=1">
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
    <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Testemunhos</div>
    <div class="padding-interno">
      <form method="post" enctype="multipart/form-data" action="../controller/template_2.php">
        <table class="table" style="margin-bottom:0">
          <tbody>
          <tr>
              <td>
                <div class="form-group">
                  <label>Nome 1</label>
                  <input type="text" name="name-1" required value="<?=$testimonial_name_1; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Comentário 1</label>
                  <input type="text" name="testimonial-1" required value="<?=$testimonial_testimonial_1; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $testimonial_image_1 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$testimonial_image_1}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$testimonial_image_1}' width='140' />
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
                  <input type="file" name="image-1"  maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Nome 2</label>
                  <input type="text" name="name-2" required value="<?=$testimonial_name_2; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Comentário 2</label>
                  <input type="text" name="testimonial-2" required value="<?=$testimonial_testimonial_2; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $testimonial_image_2 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$testimonial_image_2}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$testimonial_image_2}' width='140' />
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
                  <input type="file" name="image-2" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Nome 3</label>
                  <input type="text" name="name-3" required value="<?=$testimonial_name_3; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  <label>Comentário 3</label>
                  <input type="text" name="testimonial-3" required value="<?=$testimonial_testimonial_3; ?>" maxlength="255" class="form-control" />
                </div>
              </td>
            </tr>
            <?php
              if ( isset( $testimonial_image_3 ) ){
                echo 
                "
                <tr>
                  <td>
                    <div class='box col-md-6'>
                      <div class='form-group'>
                          <br />
                        <a href='" . DIR_IMG_UP_REL . "/{$testimonial_image_3}' target='_blank'>
                          <img src='" . DIR_IMG_UP_REL . "/{$testimonial_image_3}' width='140' />
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
                  <input type="file" name="image-3" maxlength="255" class="form-control" />
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
                  <input type='submit' class='btn btn-block btn-success' name='update-testimonial-2' value='Salvar' />
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