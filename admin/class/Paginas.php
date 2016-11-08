<?php
extract($_POST);

/*******************TEMPLATE ATIVO*******************/
$sql_template_ativo = $DB->selectdb($db,"`id`,`titulo`","`template`", "ativo=1");

foreach ($sql_template_ativo as $key => $value) {
    $_SESSION['id'] = $value['id'];
}

$sql_dados_template = $DB->selectdb($db,"`titulo`","`template`", "id={$_SESSION['id']}");

foreach ($sql_dados_template as $key => $value) {
    $titulo_ativo = $value['titulo'];
}

/*******************HOME*******************/
$sql_template_home = $DB->selectdb($db,"`id`,`titulo`","`template`", 1);

if ( isset($confirmar_home) && isset($template_home) ) {
    $return_antigo_ativo = $DB->updatedb( $db, "`template`","`ativo`='0'","`ativo`='1'" );
    $return_novo_ativo = $DB->updatedb( $db, "`template`","`ativo`='1'","`id`='{$template_home}'" );
    if ( $return_novo_ativo == true ) {
        echo "<script>window.location='home.php'</script>";
    }
}

/*******************TEMPLATE*******************/
$titulo_template                = ( isset($_POST['titulo_template']) ) ? $_POST['titulo_template'] : null;
$logotipo_template            = ( isset($_POST['logotipo_template']) ) ? $_POST['logotipo_template'] : null;
$cor_primaria_template     = ( isset($_POST['cor_primaria_template']) ) ? $_POST['cor_primaria_template'] : null;
$cor_secundaria_template = ( isset($_POST['cor_secundaria_template']) ) ? $_POST['cor_secundaria_template'] : null;
$cor_terciaria_template     = ( isset($_POST['cor_terciaria_template']) ) ? $_POST['cor_terciaria_template'] : null;

if ( isset( $_POST['salvar_template']) ) {
    $return_insert = $DB->insertdb($db,"template",
        "`titulo`,`logotipo`,`cor_primaria`,`cor_secundaria`,`cor_terciaria`","
        '{$titulo_template}',
        '{$logotipo_template}',
        '{$cor_primaria_template}',
        '{$cor_secundaria_template}',
        '{$cor_terciaria_template}'"
    );
    if ( $return_insert == true ) {
        $ultimo_id = $DB->ultimoid($db, "template");
        /* cria registro em menu */
        $DB->insertdb($db,"menu","`template_id`","'{$ultimo_id}'");
        $return_antigo_ativo = $DB->updatedb( $db, "`template`","`ativo`='0'","`ativo`='1'" );
        $return_novo_ativo = $DB->updatedb( $db, "`template`","`ativo`='1'","`id`='{$ultimo_id}'" );
        echo "<script>window.location='template.php?retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

if ( isset( $_GET['id'] ) ) {
    $sql_template = $DB->selectdb(
        $db,"`id`,`titulo`,`logotipo`,`cor_primaria`,`cor_secundaria`,`cor_terciaria`",
        "`template`", "`id` = '{$_SESSION['id']}'"
    );

    if ( $sql_template->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_template );
        $titulo_template                = $obj->titulo;
        $logotipo_template            = $obj->logotipo;
        $cor_primaria_template     = $obj->cor_primaria;
        $cor_secundaria_template = $obj->cor_secundaria;
        $cor_terciaria_template     = $obj->cor_terciaria;
    }
}

/*******************MENU*******************/
$cor_selecionado = ( isset($_POST['cor_selecionado']) ) ? $_POST['cor_selecionado'] : null;
$titulo                 = ( isset($_POST['titulo']) ) ? $_POST['titulo'] : null;
$icone                 = ( isset($_POST['icone']) ) ? $_POST['icone'] : null;

$sql_menu = $DB->selectdb($db,"`id`","`menu`", "template_id='{$_SESSION['id']}'");
$obj = $DB->objectdb( $sql_menu );
$id_menu = $obj->id;

if ( isset( $_POST['salvar_menu']) ) {
    if ( $cor_selecionado != null ) {
        $update_cor = $DB->updatedb(
            $db, "`menu`",
            "`cor_selecionado`='{$cor_selecionado}'",
            "`template_id`='{$_SESSION['id']}'"
        );
    }

    if ( $titulo != null ) {
        $return_insert = $DB->insertdb($db,"menu_pagina",
            "`menu_id`,`titulo`,`icon`",
            "'{$id_menu}',
            '{$titulo}',
            '{$icone}'"
        );
    }
    if ( isset($update_cor) || isset($return_insert) ) {
        echo "<script>window.location='menu.php?retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

$sql_menu_paginas = $DB->selectdb($db,"`id`,`titulo`","`menu_pagina`", "menu_id='{$id_menu}'");
// echo "<pre>";
// print_r($sql_menu_paginas);die;
// echo "</pre>";

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
