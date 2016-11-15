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
foreach ($sql_dados_template as $key => $value) {
    $titulo_ativo = $value['titulo'];
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
        // $ultimo_id = $DB->ultimoid($db, "template");
        // /* cria registro em menu e seleciona o novo template como ativo */
        // $DB->insertdb($db,"menu","`template_id`","'{$ultimo_id}'");
        // $return_antigo_ativo = $DB->updatedb( $db, "`template`","`ativo`='0'","`ativo`='1'" );
        // $return_novo_ativo = $DB->updatedb( $db, "`template`","`ativo`='1'","`id`='{$ultimo_id}'" );
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
