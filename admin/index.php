<?php
if ( isset( $_GET['logout'] ) ) {
    $msg_logout = "
                    <div class='text-center alert alert-success'>
                        Até logo, nos vemos em breve!
                    </div>";
}
if ( isset($_POST['entrar']) ) {
    require ("inc/db.php");
    $DB = new DB;
    $db = $DB->connect();

    $user = mysqli_real_escape_string( $db, $_POST['usuario'] );
    $pass = mysqli_real_escape_string( $db, $_POST['senha'] );
    $result = $DB->selectdb( $db,"`senha`","`usuario`","`login`='{$user}'" );
    if ($result->num_rows === 1) {
        foreach ( $result as $value ) {
            if ( $value['senha'] === $pass ) {
                $DB->log( $db, $_POST['usuario'], $value['senha'], 'ok' );
                session_start();
                $_SESSION['user'] = true;
                echo "<script>window.location='" . URL_DEFINITIVA . "home.php';</script>";
            } else {
                $DB->log( $db, $_POST['usuario'], $_POST['senha'], 'senha invalida' );
                $msg = $DB->msg( "Usuário ou senha inválidos!", "danger" );
            }
        }
    } else {
        $DB->log( $db, $_POST['usuario'], $_POST['senha'], 'usuario invalido' );
        $msg = $DB->msg( "Usuário ou senha inválidos!","danger" );
    }
   $DB->disconnect( $db ) ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Gerador Landingpage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="agenciaponto">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
</head>
<body>
    <div class="col-md-12">
        <!--LOGO E CABEÇALHO-->
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2><a href="../"><img src="images/logo.png" alt="" title="" width="100"/></a></h2><br />
                <h4>LandinPage</h4>
                <h4><small>ACESSO AO SISTEMA</small></h4><br />
            </div>
        </div>
    </div>
    <!--BOX COM INPUTS-->
    <div class="col-md-12">
        <div class="col-md-4 col-md-offset-4 text-center well">
            <?php
            if ( isset($msg) ) {
                echo $msg;
            } elseif ( isset( $msg_logout ) ) {
                echo $msg_logout;
            }
            ?>
            <div class="form-group">
                <form method="post">
                    <fieldset>
                        <!--LOGIN-->
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="usuario" placeholder="usuário" required />
                        </div>
                        <br />
                        <!--SENHA-->
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="senha" placeholder="senha" required />
                        </div>
                        <br />
                        <!--ENTRAR-->
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="entrar">Entrar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p class="col-md-12 text-center">
        <a href="https://github.com/jmessiass/" target="_blank">Jmessi@s -</a> <?= date('Y') ?> | DIREITOS RESERVADOS
        </p>
    </footer>
</body>
</html>