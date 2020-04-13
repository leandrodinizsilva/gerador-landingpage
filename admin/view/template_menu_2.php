<?php
session_start();
if ( isset($_SESSION['user']) ) {
  include('../view/header_template_2.php');
  include('../class/Paginas.php');
  //
  ?>

  <link rel="stylesheet" type="text/css" href="./css/template.css">
  <ol class="breadcrumb">
    <li class="active">
      <i class='glyphicon glyphicon-menu-right'></i> Início
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
                          echo $DB->msg('Template adicionado com sucesso!', 'success');
                        } else {
                            echo $DB->msg('Falha na criação do template!', 'danger');
                          }
                        }
                    ?>
                    <a href='../home.php' class='btn btn-block btn-warning'><< Anterior</a>
                    <form method="POST" action="template_block1_2.php?id_menu=1">
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
<div class="box col-md-4">
  <div class="panel panel-primary shadow">
      <div class="panel-heading margin-header"><i class='glyphicon glyphicon-th-list'></i> &nbsp;Informações Básicas</div>
      <div class="padding-interno">
          <form method="post" enctype="multipart/form-data" action="../controller/template_2.php">
              <table class="table" style="margin-bottom:0">
                  <tbody>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Título</label>
                                  <input type="text" name="title" required value="<?php echo $template_title ?>" maxlength="40" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Texto Principal</label>
                                  <input type="text" name="main-text" required value="<?php echo $template_main_text ?>" maxlength="100" class="form-control"/>
                              </div>
                          </td>
                      </tr>
                      <?php
                      if ( isset( $bg_img ) ){
                        echo 
                        "
                        <tr>
                          <td>
                            <div class='box col-md-6'>
                              <div class='form-group'>
                                  <br />
                                <a href='" . DIR_IMG_UP_REL . "/{$bg_img}' target='_blank'>
                                  <img src='" . DIR_IMG_UP_REL . "/{$bg_img}' width='140' />
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
                                  <input type="file" name="bg-img" maxlength="20" class="form-control" placeholder="titulo-icone" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group url-container">
                                <?php
                                  if (isset($url_info)) {
                                    foreach ($url_info as $url_data) { ?>
                                      <div id="container-links-<?=$url_data['id']; ?>">
                                        <label>
                                          Link para Página
                                          <button type="button" class="btn_remove_url" name="remove_url_2" value="remove_url_2=<?=$url_data['id']; ?>" onclick="removeUrlInput(this.value, <?=$url_data['id']; ?>)" >x</button>
                                        </label>
                                        <div class="template-input">
                                        <input type="text" name="template_url[]" required value="<?=$url_data['url']; ?>" class="form-control urlInput" placeholder="titulo-icone" />
                                        <div class="template-input-dates">
                                          <input type="hidden" name="url-id[]" value="<?=$url_data['id']; ?>">
                                          <input type="time" name="url-date-start[]" value="<?=$url_data['date_start']; ?>" class="form-control urlDate"> </input>
                                          <input type="time" name="url-date-end[]" value="<?=$url_data['date_end']; ?>" class="form-control urlDate urlDateLast"> </input>
                                        </div>
                                      </div>
                              </div>
                                <?php
                                    }
                                  } else {
                                ?>
                                  <div id="container-links-">
                                    <label>
                                      Link para Página
                                      <button type="button" class="btn_remove_url" name="remove_url" value="" onclick='removeUrlInput(this.value)' >x</button>
                                    </label>
                                      <div class="template-input">
                                        <input type="text" name="template_url[]" required class="form-control urlInput" placeholder="titulo-icone" />
                                        <div class="template-input-dates">
                                          <input type="hidden" name="url_id[]" class="form-control"> </input>
                                          <input type="time" name="url-date-start[]" class="form-control urlDate"> </input>
                                          <input type="time" name="url-date-end[]" class="form-control urlDate urlDateLast"> </input>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                                  <?php } ?>
                                  <button type="button" class="btn_add_url" onclick="addUrlInput()" >+</button>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor Primária</label>
                                  <input type="text" name="main-color" required value="<?php echo $main_color ?>" maxlength="6" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor Secundária</label>
                                  <input type="text" name="secondary-color" required value="<?php echo $secondary_color ?>" maxlength="6" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor do Texto Primário</label>
                                  <input type="text" name="main-text-color" required value="<?php echo $main_text_color ?>" maxlength="6" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor do Texto Secundário</label>
                                  <input type="text" name="secondary-text-color" required value="<?php echo $secondary_text_color ?>" maxlength="6" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <?php
                                      if ( isset( $template_id ) ) {
                                        ?>
                                          <input type="hidden" value="<?=$template_id; ?>" name="template-id">
                                        <?php
                                          echo "<input type='submit' class='btn btn-block btn-success' name='salvar-template' value='Salvar' />" ;
                                      } else {
                                          echo "<input type='submit' class='btn btn-block btn-success' name='salvar-template' value='Salvar' />";
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
  <div class="box col-md-4"></div>
</div>
<?php
include('../inc/footer.php');
} else {
  echo "<script>alert('Desculpe, é uma área restrita! Faça login :) ');window.location = 'index.php';</script>";
}
?>
<script type="text/javascript">
  function addUrlInput() {
    var inputContent =
    '<div id="container-links-">'
    +'<label>Link para Página'
    + '<button type="button" name="remove_url" value="" class="btn_remove_url" onclick="removeUrlInput(this.value, \'\')" >x</button>'
    + '</label>'
    + '<div class="template-input">'
    + '<input type="text" name="template_url[]" required value="<?php ?>" class="form-control urlInput" placeholder="titulo-icone" />'
    + '<div class="template-input-dates">'
    + '<input type="time" name="url-date-start[]" class="form-control urlDate"> </input>'
    + '<input type="time" name="url-date-end[]" class="form-control urlDate urlDateLast"> </input>'
    + '</div>'
    + '</div>';
    var input = $('.template-input:last');
    var btn_add = $('.btn_add_url');
    if (input.length == 0) {
      console.log(btn_add);
      btn_add.before(inputContent);
    } else {
      input.after(inputContent);
    }
  }

  function removeUrlInput(dados, id) {
    var container = $('#container-links-'+ id );
    if (confirm("Deseja remover o url? A ação não pode ser revertida")){
      $.ajax({
       type: 'POST',
       async: false,
       dataType: 'json',
       url: '../class/Paginas.php',
       data: dados,
       sucess: function(response) {
        container.remove();
       },
       error: function(response) {
        container.remove();
       }
      });
    }
  }
</script>