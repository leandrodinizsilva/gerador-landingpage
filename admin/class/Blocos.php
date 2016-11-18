<?php
extract($_POST);

/*******************TEMPLATE ATIVO*******************/
$sql_template_ativo = $DB->selectdb($db,"`id`,`titulo`","`template`", "ativo=1");

/* armazena template selecionado em sessão */
foreach ($sql_template_ativo as $key => $value) {
    $_SESSION['id'] = $value['id'];
}

$sql_dados_template = $DB->selectdb($db,"`titulo`","`template`", "id={$_SESSION['id']}");

/* carrega titulo do template ativo */
if ( $sql_dados_template->num_rows > 1 ) {
    foreach ($sql_dados_template as $key => $value) {
        $titulo_ativo = $value['titulo'];
    }
}

/*******************BLOCO 1 *******************/
$titulo_bloco1      = ( isset($_POST['titulo_bloco1']) ) ? $_POST['titulo_bloco1'] : null;
$subtitulo_bloco1= ( isset($_POST['subtitulo_bloco1']) ) ? $_POST['subtitulo_bloco1'] : null;
$imagem_bloco1 = ( isset($_POST['imagem_bloco1']) ) ? $_POST['imagem_bloco1'] : null;
$texto_bloco1      = ( isset($_POST['texto_bloco1']) ) ? $_POST['texto_bloco1'] : null;

if ( isset( $_POST['update_bloco1']) ) {
    $sql_update_bloco1 = $DB->updatedb(
        $db, "`bloco1`","
        `titulo`='{$_POST['titulo_bloco1']}',
        `subtitulo`='{$_POST['subtitulo_bloco1']}',
        `texto`='{$_POST['texto_bloco1']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco1 == true ) {
        echo "<script>window.location='bloco1.php?id_bloco1=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos de template */
if ( isset( $_GET['id_bloco1'] ) ) {
    $sql_bloco1 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`texto`",
        "`bloco1`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco1->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco1 );
        $titulo_bloco1     = $obj->titulo;
        $subtitulo_bloco1= $obj->subtitulo;
        $texto_bloco1      = $obj->texto;
    }
}

/*******************BLOCO 2 *******************/
$titulo_bloco2      = ( isset($_POST['titulo_bloco2']) ) ? $_POST['titulo_bloco2'] : null;
$subtitulo_bloco2= ( isset($_POST['subtitulo_bloco2']) ) ? $_POST['subtitulo_bloco2'] : null;
$imagem_bloco2 = ( isset($_POST['imagem_bloco2']) ) ? $_POST['imagem_bloco2'] : null;
$texto_bloco2      = ( isset($_POST['texto_bloco2']) ) ? $_POST['texto_bloco2'] : null;

if ( isset( $_POST['update_bloco2']) ) {
    $sql_update_bloco2 = $DB->updatedb(
        $db, "`bloco2`","
        `titulo`='{$_POST['titulo_bloco2']}',
        `subtitulo`='{$_POST['subtitulo_bloco2']}',
        `texto`='{$_POST['texto_bloco2']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco2 == true ) {
        echo "<script>window.location='bloco2.php?id_bloco2=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos de template */
if ( isset( $_GET['id_bloco2'] ) ) {
    $sql_bloco2 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`,`texto`",
        "`bloco2`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco2->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco2 );
        $titulo_bloco2     = $obj->titulo;
        $subtitulo_bloco2= $obj->subtitulo;
        $texto_bloco2      = $obj->texto;
    }
}

/*******************BLOCO 3 *******************/
$titulo_bloco3      = ( isset($_POST['titulo_bloco3']) ) ? $_POST['titulo_bloco3'] : null;
$subtitulo_bloco3= ( isset($_POST['subtitulo_bloco3']) ) ? $_POST['subtitulo_bloco3'] : null;

if ( isset( $_POST['update_bloco3']) ) {
    $sql_update_bloco3 = $DB->updatedb(
        $db, "`bloco3`","
        `titulo`='{$_POST['titulo_bloco3']}',
        `subtitulo`='{$_POST['subtitulo_bloco3']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_bloco3 == true ) {
        echo "<script>window.location='bloco3.php?id_bloco3=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos de template */
if ( isset( $_GET['id_bloco3'] ) ) {
    $sql_bloco3 = $DB->selectdb(
        $db,"`id`,`titulo`,`subtitulo`",
        "`bloco3`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_bloco3->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco3 );
        $titulo_bloco3     = $obj->titulo;
        $subtitulo_bloco3= $obj->subtitulo;
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
        $titulo_bloco4     = $obj->titulo;
        $subtitulo_bloco4 = $obj->subtitulo;
        $endereco_bloco4 = $obj->endereco;
        $email_bloco4       = $obj->email;
        $texto_bloco4       = $obj->texto;
    }
}

        // echo "<pre>";
        // print_r($cor_selecionado_menu);die;
        // echo "</pre>";

    // } elseif ( isset($_GET['id']) )  ) {
    //     $_GET['retorno'] = 0;
    // }

// if ( isset( $_POST['adicionar']) ) {
//     if ( $_FILES['imagem']['error'] === 0 ) {
//         $arquivo = $DB->uploadfile( $_FILES['imagem'],'home' );
//         if ( $arquivo != false ) {
//             $ativo = ( isset($_POST['ativo']) ) ? $_POST['ativo'] : 0;
//             $return_insert = $DB->insertdb(
//              $db,
//              "home", "`titulo`,`texto`,`posicao`,`imagem`,`status`",
//              "'{$titulo}','{$texto}','{$posicao}','{$arquivo}','{$ativo}'"
//              );
//             if ( $return_insert == true ) {
//                 if ( isset( $sql_verifica_pos ) && $sql_verifica_pos->num_rows == '1' ) {
//                     $DB->deletedb( $db, "`posicao`", "`pagina`='home' AND `posicao`='{$posicao}'" );
//                 }
//                 // die;
//                 echo "<script>window.location='home.php?ok=1'</script>";
//             } else {
//                 echo "<script>window.location='home.php?error=1'</script>";
//             }
//         }else{
//             $error = 1;
//         }
//     } else {
//         $msg_img = 1;
//     }
// }

// if ( isset( $_POST['alterar'] ) && isset( $id_e ) ) {
//     ( empty( $ativo ) ) ? $ativo = '0' : $ativo = $ativo;
//     /*Se fizer upload de arquivo */
//     if ( $_FILES['imagem']['error'] === 0 ) {
//         $update_pos = $DB->updatedb( $db, "`home`", "`posicao`='{$posicao_e}'", "`posicao`='{$posicao}'" );
//         if ( isset( $update_pos ) && $update_pos == 1 ) {
//             $update_all = $DB->updatedb( $db, "`home`",
//                 "`titulo`='{$titulo}',`texto`='{$texto}',`posicao`='{$posicao}',`status`='{$ativo}'",
//                 "`id`='{$id_e}'" );
//             if ( isset( $update_all ) && $update_all == 1 ) {
//                 $arquivo = $DB->uploadfile( $_FILES['imagem'],'home' );
//                 if ( $arquivo != false ) {
//                     unlink("userfiles/home/".$imagem_e);
//                     $update_img = $DB->updatedb( $db, "`home`", "`imagem`='{$arquivo}'", "`id`='{$id_e}'" );
//                     echo "<script>window.location='home.php?up=1'</script>";
//                 } else {
//                     echo "<script>window.location='home.php?edit={$id_e}&erro_img=1'</script>";
//                 }
//             } else {
//                 echo "<script>window.location='home.php?edit={$id_e}&erro_up=1'</script>";
//             }
//         } else {
//             echo "<script>window.location='home.php?edit={$id_e}&erro_pos=1'</script>";
//         }
//     } else {
//         /*Se NÃO fizer upload de arquivo */
//         $update_pos = $DB->updatedb( $db, "`home`", "`posicao`='{$posicao_e}'", "`posicao`='$posicao'" );
//         if ( isset( $update_pos ) && $update_pos == 1 ) {
//             $update_all = $DB->updatedb( $db, "`home`",
//                 "`titulo`='{$titulo}',`texto`='{$texto}',`posicao`='{$posicao}',`status`='{$ativo}'",
//                 "`id`='{$id_e}'" );
//             if ( isset( $update_all ) && $update_all == 1 ) {
//                 echo "<script>window.location='home.php?up=1'</script>";
//             } else {
//                 echo "<script>window.location='home.php?edit={$id_e}&erro_up=1'</script>";
//             }
//         } else {
//             echo "<script>window.location='home.php?edit={$id_e}&erro_pos=1'</script>";
//         }
//     }
// }

// if ( isset( $_GET['delete'] ) ) {
//     $id = $_GET['delete'];
//     $sql_posicao = $DB->selectdb( $db,"`posicao`","`home`","`id` = '{$id}'" );
//     $sql_img = $DB->selectdb( $db,"`imagem`","`home`","`id` = '{$id}'" );
//     if ( $sql_posicao->num_rows === 1 ) {
//         $obj = $DB->objectdb( $sql_posicao );
//         $return_posicao = $obj->posicao;
//     }
//     if ( $sql_img->num_rows === 1 ) {
//         $obj = $DB->objectdb( $sql_img );
//         $return_img = $obj->imagem;
//     }
//     $delete = $DB->deletedb( $db, "`home`", "`id`='{$id}'" );
//     if ( isset( $delete ) && $delete == 1 && isset( $return_posicao ) && isset( $return_img ) ) {
//         $DB->insertdb( $db,"posicao", "`pagina`,`posicao`","'home','{$return_posicao}'" );
//         unlink("userfiles/home/".$return_img);
//         echo "<script>window.location='home.php?del=1'</script>";
//     } else {
//         echo "<script>window.location='home.php?del_erro=1'</script>";
//     }
// }
