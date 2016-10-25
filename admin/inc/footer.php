    <footer>
      <p class="col-md-12 text-center">
        Consultoria CS - <?= date('Y') ?> | DIREITOS RESERVADOS
      </p>
    </footer>
    <script type="text/javascript" class="init">
      $(document).ready(function() {
        $('#data-home').dataTable( {
         "aProcessing": true,
         "aServerSide": true,
         "ajax": "class/data-home.php",
       } );
      } );
    </script>
    <?php
    if ( isset( $_GET['tela'] ) ) { ?>
    <script type="text/javascript" class="init">
      $(document).ready(function() {
        $('#data-tratamentos').dataTable( {
         "aProcessing": true,
         "aServerSide": true,
         "ajax": "class/data-tratamentos.php?id=<?php echo $_GET['tela'] ?>",
       } );
      } );
    </script>
    <?php }?>
    <script src="<?php echo URL_DEFINITIVA ?>js/jquery.dataTables.js"></script>
    <script src="<?php echo URL_DEFINITIVA ?>js/bootstrap.min.js"></script>
  </body>
  </html>
  <?php
  $DB->disconnect( $db );