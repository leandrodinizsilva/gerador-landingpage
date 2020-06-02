<?php
  session_start();
  if ( isset($_SESSION['user']) ) {
    include('inc/header.php');
    include('class/Paginas.php');
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
                    <a href="home.php" class="btn btn-block btn-warning"><< Anterior</a>
                    <a href='menu.php?id_menu=1' class='btn btn-block btn-primary'>Próximo >></a>
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
          <form method="post" enctype="multipart/form-data">
              <table class="table" style="margin-bottom:0">
                  <tbody>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Título</label>
                                  <input type="text" name="titulo_template" required value="<?php echo $titulo_template ?>" maxlength="40" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Logotipo</label><a class="mensagem-ajuda" href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                  <input type="text" name="logotipo_template" required value="<?php echo $logotipo_template ?>" maxlength="20" class="form-control" placeholder="titulo-icone" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group url-container">
                                <?php
                                  if (isset($sql_template_url)) {
                                    foreach ($sql_template_url as $url_data) { ?>
                                      <div id="container-links-<?=$url_data['id']; ?>">
                                        <label>
                                          Link para Página
                                          <button type="button" class="btn_remove_url" name="remove_url" value="remove_url=<?=$url_data['id']; ?>" onclick="removeUrlInput(this.value, <?=$url_data['id']; ?>)" >x</button>
                                        </label>
                                        <div class="template-input">
                                        <input type="text" name="template_url[]" required value="<?=$url_data['url']; ?>" class="form-control urlInput" placeholder="titulo-icone" />
                                        <div class="template-input-dates">
                                          <input type="hidden" name="url_id[]" value="<?=$url_data['id']; ?>">
                                          <input type="time" name="url_date_start[]" value="<?=$url_data['date_start']; ?>" class="form-control urlDate"> </input>
                                          <input type="time" name="url_date_end[]" value="<?=$url_data['date_end']; ?>" class="form-control urlDate urlDateLast"> </input>
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
                                      <button type="button" class="btn_remove_url" name="remove_url" value="" onclick='removeUrlInput(this.value, )' >x</button>
                                    </label>
                                      <div class="template-input">
                                        <input type="text" name="template_url[]" required class="form-control urlInput" placeholder="Link" />
                                        <div class="template-input-dates">
                                          <input type="time" name="url_date_start[]" class="form-control urlDate"> </input>
                                          <input type="time" name="url_date_end[]" class="form-control urlDate urlDateLast"> </input>
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
                                  <input type="text" name="cor_primaria_template" required value="<?php echo $cor_primaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor Secundária</label>
                                  <input type="text" name="cor_secundaria_template" required value="<?php echo $cor_secundaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <label>Cor Terciária</label>
                                  <input type="text" name="cor_terciaria_template" required value="<?php echo $cor_terciaria_template ?>" maxlength="7" placeholder="#ffffff" class="form-control" />
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
                                  <?php
                                      if ( isset( $_GET['id_template'] ) ) {
                                          echo "<input type='submit' class='btn btn-block btn-success' name='update_template' value='Salvar' />" ;
                                      } else {
                                          echo "<input type='submit' class='btn btn-block btn-success' name='salvar_template' value='Salvar' />";
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
include('inc/footer.php');
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
    + '<input type="time" name="url_date_start[]" class="form-control urlDate"> </input>'
    + '<input type="time" name="url_date_end[]" class="form-control urlDate urlDateLast"> </input>'
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
       url: './class/Paginas.php',
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