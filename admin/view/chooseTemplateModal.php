<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
    <form action="./controller/template_route.php" method="POST" id="form-template">
      <div class="template-checkbox-container">
        <div class="template">
          <label class="template-img-container" for="myCheck1">
            <div class="template-img" style="background-image: url('./images/previewTemplate1.png')">
              <input id="myCheck1" type="checkbox" name="template" groupname="template-group" " value="template1" class="template-checkbox" />
            </div>
          </label>
          <div class="template-text">
            <a href="view/template.php" target="_blank"><button type="button" class="btn btn-secondary btn-see-template">Ver Template</button></a>
          </div>
        </div>
        <div class="template">
        <label class="template-img-container" for="myCheck2">
            <div class="template-img" style="background-image: url('./images/previewTemplate2.png')">
              <input id="myCheck2" type="checkbox" name="template" groupname="template-group" " value="template2" class="template-checkbox" />
          </div>
          <div class="template-text">
            <a href="view/template_2.php" target="_blank"> <button type="button" class="btn btn-secondary btn-see-template">Ver Template</button> </a>
          </div>
        </div>
        <div class="template">
        <label class="template-img-container" for="myCheck3">
            <div class="template-img" style="background-image: url('./images/previewTemplate3.png')">
              <input id="myCheck3" type="checkbox" name="template" groupname="template-group" " value="template3" class="template-checkbox" />
          </div>
          <div class="template-text">
            <button type="button" class="btn btn-secondary btn-see-template">Ver Template</button>
          </div>
          </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-primary" form="form-template">Confirmar</button>
  </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('input[type=checkbox]').click(function() {
    var groupName = $(this).attr('groupname');

      if (!groupName)
        return;

      var checked = $(this).is(':checked');

      $("input[groupname='" + groupName + "']:checked").each(function() {
        $(this).prop('checked', '');
      });

      if (checked)
        $(this).prop('checked', 'checked');
    });
  });
</script>