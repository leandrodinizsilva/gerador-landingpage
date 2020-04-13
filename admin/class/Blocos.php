<?php
extract($_POST);

/*******************TEMPLATE ATIVO*******************/
$sql_template_ativo = $DB->selectdb($db,"`id`,`titulo`","`template`", "active=1");

/* armazena template selecionado em sessão */
foreach ($sql_template_ativo as $key => $value) {
    $_SESSION['id'] = $value['id'];
}

$sql_dados_template = $DB->selectdb($db,"`titulo`","`template`", "id={$_SESSION['id']}");

/* carrega titulo do template active */
if ( $sql_dados_template->num_rows > 0 ) {
    foreach ($sql_dados_template as $key => $value) {
        $titulo_ativo = $value['titulo'];
    }
}

/*******************BLOCO 1 *******************/
$titulo_bloco1      = ( isset($_POST['titulo_bloco1']) ) ? $_POST['titulo_bloco1'] : null;
$subtitulo_bloco1= ( isset($_POST['subtitulo_bloco1']) ) ? $_POST['subtitulo_bloco1'] : null;
$imagem_bloco1 = ( isset($_POST['imagem_bloco1']) ) ? $_POST['imagem_bloco1'] : null;
$texto_bloco1      = ( isset($_POST['texto_bloco1']) ) ? $_POST['texto_bloco1'] : null;

/* exibe campos de template */
if ( isset( $_GET['id_bloco1'] ) ) {
    $sql_bloco1 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`texto`,`imagem`",
        "`bloco1`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco1->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco1 );
        $titulo_bloco1     = $obj->titulo;
        $subtitulo_bloco1= $obj->subtitulo;
        $texto_bloco1      = $obj->texto;
        $imagem_bloco1  = $obj->imagem;
    }
}

if ( isset( $_POST['update_bloco1']) ) {
    $sql_update_bloco1 = $DB->updatedb(
        $db, "`bloco1`","
        `titulo`='{$_POST['titulo_bloco1']}',
        `subtitulo`='{$_POST['subtitulo_bloco1']}',
        `texto`='{$_POST['texto_bloco1']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco1 == true ) {
        if ( $_FILES['imagem_bloco1']['error'] === 0 ) {
            $arquivo = $DB->uploadfile( $_FILES['imagem_bloco1'],'bloco1' );
            if ( $arquivo != false ) {
                $update_img = $DB->updatedb( $db, "`bloco1`", "`imagem`='{$arquivo}'", "`template_id`='{$_SESSION['id']}'" );
                if ( $update_img == true ) {
                    unlink("userfiles/bloco1/".$imagem_bloco1);
                }
            }
        }
        echo "<script>window.location='bloco1.php?id_bloco1=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/*******************BLOCO 2 *******************/
$titulo_bloco2      = ( isset($_POST['titulo_bloco2']) ) ? $_POST['titulo_bloco2'] : null;
$subtitulo_bloco2= ( isset($_POST['subtitulo_bloco2']) ) ? $_POST['subtitulo_bloco2'] : null;
$imagem_bloco2 = ( isset($_POST['imagem_bloco2']) ) ? $_POST['imagem_bloco2'] : null;
$texto_bloco2      = ( isset($_POST['texto_bloco2']) ) ? $_POST['texto_bloco2'] : null;

/* exibe campos de template */
if ( isset( $_GET['id_bloco2'] ) ) {
    $sql_bloco2 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`texto`,`imagem`",
        "`bloco2`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco2->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco2 );
        $titulo_bloco2     = $obj->titulo;
        $subtitulo_bloco2= $obj->subtitulo;
        $texto_bloco2      = $obj->texto;
        $imagem_bloco2  = $obj->imagem;
    }
}

if ( isset( $_POST['update_bloco2']) ) {
    $sql_update_bloco2 = $DB->updatedb(
        $db, "`bloco2`","
        `titulo`='{$_POST['titulo_bloco2']}',
        `subtitulo`='{$_POST['subtitulo_bloco2']}',
        `texto`='{$_POST['texto_bloco2']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco2 == true ) {
        if ( $_FILES['imagem_bloco2']['error'] === 0 ) {
            $arquivo = $DB->uploadfile( $_FILES['imagem_bloco2'],'bloco2' );
            if ( $arquivo != false ) {
                $update_img = $DB->updatedb( $db, "`bloco2`", "`imagem`='{$arquivo}'", "`template_id`='{$_SESSION['id']}'" );
                if ( $update_img == true ) {
                    unlink("userfiles/bloco2/".$imagem_bloco2);
                }
            }
        }
        echo "<script>window.location='bloco2.php?id_bloco2=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/*******************BLOCO 3 *******************/
$titulo_bloco3      = ( isset($_POST['titulo_bloco3']) ) ? $_POST['titulo_bloco3'] : null;
$subtitulo_bloco3= ( isset($_POST['subtitulo_bloco3']) ) ? $_POST['subtitulo_bloco3'] : null;

/* exibe campos de template */
if ( isset( $_GET['id_bloco3'] ) ) {
    $sql_bloco3 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`imagem1`,`imagem2`,`imagem3`",
        "`bloco3`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco3->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco3 );
        $titulo_bloco3       = $obj->titulo;
        $subtitulo_bloco3  = $obj->subtitulo;
        $imagem1_bloco3 = $obj->imagem1;
        $imagem2_bloco3 = $obj->imagem2;
        $imagem3_bloco3 = $obj->imagem3;
    }
}

if ( isset( $_POST['update_bloco3']) ) {
    $sql_update_bloco3 = $DB->updatedb(
        $db, "`bloco3`","
        `titulo`='{$_POST['titulo_bloco3']}',
        `subtitulo`='{$_POST['subtitulo_bloco3']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco3 == true ) {
        if ( $_FILES['imagem1_bloco3']['error'] === 0 ) {
            $arquivo1 = $DB->uploadfile( $_FILES['imagem1_bloco3'],'bloco3' );
            if ( $arquivo1 != false ) {
                $update_img1 = $DB->updatedb( $db, "`bloco3`", "`imagem1`='{$arquivo1}'", "`template_id`='{$_SESSION['id']}'" );
                if ( $update_img1 == true ) {
                    unlink("userfiles/bloco3/".$imagem1_bloco3);
                }
            }
        }
        if ( $_FILES['imagem2_bloco3']['error'] === 0 ) {
            $arquivo2 = $DB->uploadfile( $_FILES['imagem2_bloco3'],'bloco3' );
            if ( $arquivo2 != false ) {
                $update_img2 = $DB->updatedb( $db, "`bloco3`", "`imagem2`='{$arquivo2}'", "`template_id`='{$_SESSION['id']}'" );
                if ( $update_img2 == true ) {
                    unlink("userfiles/bloco3/".$imagem2_bloco3);
                }
            }
        }
        if ( $_FILES['imagem3_bloco3']['error'] === 0 ) {
            $arquivo3 = $DB->uploadfile( $_FILES['imagem3_bloco3'],'bloco3' );
            if ( $arquivo3 != false ) {
                $update_img3 = $DB->updatedb( $db, "`bloco3`", "`imagem3`='{$arquivo3}'", "`template_id`='{$_SESSION['id']}'" );
                if ( $update_img3 == true ) {
                    unlink("userfiles/bloco3/".$imagem3_bloco3);
                }
            }
        }
        echo "<script>window.location='bloco3.php?id_bloco3=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/*******************BLOCO 4 *******************/
$titulo_bloco4      = ( isset($_POST['titulo_bloco4']) ) ? $_POST['titulo_bloco4'] : null;
$subtitulo_bloco4 = ( isset($_POST['subtitulo_bloco4']) ) ? $_POST['subtitulo_bloco4'] : null;
$endereco_bloco4= ( isset($_POST['endereco_bloco4']) ) ? $_POST['endereco_bloco4'] : null;
$email_bloco4      = ( isset($_POST['email_bloco4']) ) ? $_POST['email_bloco4'] : null;
$texto_bloco4      = ( isset($_POST['texto_bloco4']) ) ? $_POST['texto_bloco4'] : null;

if ( isset( $_POST['update_bloco4']) ) {
    $sql_update_bloco4 = $DB->updatedb(
        $db, "`bloco4`","
        `titulo`='{$_POST['titulo_bloco4']}',
        `subtitulo`='{$_POST['subtitulo_bloco4']}',
        `endereco`='{$_POST['endereco_bloco4']}',
        `email`='{$_POST['email_bloco4']}',
        `texto`='{$_POST['texto_bloco4']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco4 == true ) {
        echo "<script>window.location='bloco4.php?id_bloco4=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos de template */
if ( isset( $_GET['id_bloco4'] ) ) {
    $sql_bloco4 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`endereco`,`email`,`texto`",
        "`bloco4`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco4->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco4 );
        $titulo_bloco4        = $obj->titulo;
        $subtitulo_bloco4  = $obj->subtitulo;
        $endereco_bloco4 = $obj->endereco;
        $email_bloco4       = $obj->email;
        $texto_bloco4       = $obj->texto;
    }
}