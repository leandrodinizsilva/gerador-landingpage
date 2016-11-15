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

/*******************HOME*******************/
$sql_template_home = $DB->selectdb($db,"`id`,`titulo`","`template`", 1);

/* selecionar um template */
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

/* adiciona novo template */
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
        /* cria registro em todas as tabelas e seleciona o novo template como ativo */
        $DB->insertdb($db,"menu","`template_id`","'{$ultimo_id}'");
        $DB->insertdb($db,"bloco1","`template_id`","'{$ultimo_id}'");
        $DB->insertdb($db,"bloco2","`template_id`","'{$ultimo_id}'");
        $DB->insertdb($db,"bloco3","`template_id`","'{$ultimo_id}'");
        $DB->insertdb($db,"bloco4","`template_id`","'{$ultimo_id}'");
        $DB->insertdb($db,"rodape","`template_id`","'{$ultimo_id}'");
        $return_antigo_ativo = $DB->updatedb( $db, "`template`","`ativo`='0'","`ativo`='1'" );
        $return_novo_ativo = $DB->updatedb( $db, "`template`","`ativo`='1'","`id`='{$ultimo_id}'" );
        echo "<script>window.location='template.php?id_template=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos de template */
if ( isset( $_GET['id_template'] ) ) {
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

     if ( isset($_POST['update_template']) ) {
        $sql_update_template = $DB->updatedb(
            $db, "`template`","
            `titulo`='{$_POST['titulo_template']}',
            `logotipo`='{$_POST['logotipo_template']}',
            `cor_primaria`='{$_POST['cor_primaria_template']}',
            `cor_secundaria`='{$_POST['cor_secundaria_template']}',
            `cor_terciaria`='{$_POST['cor_terciaria_template']}'",
            "`id`='{$_SESSION['id']}'"
        );

        if ( isset($sql_update_template) ) {
            echo "<script>window.location='template.php?id_template=1&retorno=1'</script>";
        } else {
            $_GET['retorno'] = 0;
        }
    }
}

/*******************MENU*******************/
$cor_selecionado = ( isset($_POST['cor_selecionado_menu']) ) ? $_POST['cor_selecionado_menu'] : null;
$titulo_menu = ( isset($_POST['titulo_menu']) ) ? $_POST['titulo_menu'] : null;
$icone_menu = ( isset($_POST['icone_menu']) ) ? $_POST['icone_menu'] : null;

/* carrega id de menu e cor selecionado */
$sql_menu = $DB->selectdb($db,"`id`,`cor_selecionado`   ","`menu`", "template_id='{$_SESSION['id']}'");
$obj = $DB->objectdb( $sql_menu );
$id_menu = $obj->id;
$cor_selecionado_menu = $obj->cor_selecionado;

/* altera o campo cor selecinado independente de submit update ou insert */
if ( isset($_POST['salvar_menu']) || isset($_POST['update_menu']) ) {
    if ( $cor_selecionado_menu != $cor_selecionado ) {
        $update_cor = $DB->updatedb(
            $db, "`menu`",
            "`cor_selecionado`='{$cor_selecionado}'",
            "`template_id`='{$_SESSION['id']}'"
            );
    }
}

/* adiciona um novo menu */
if ( isset( $_POST['salvar_menu']) ) {
    if ( $titulo_menu != null ) {
        $return_insert = $DB->insertdb($db,"menu_pagina",
            "`menu_id`,`titulo`,`icon`",
            "'{$id_menu}',
            '{$titulo_menu}',
            '{$icone_menu}'"
        );
    }
    /* exibe mensagem de sucesso ou erro */
    if ( isset($update_cor) || isset($return_insert) ) {
        echo "<script>window.location='menu.php?retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe lista de menus */
$sql_menu_paginas = $DB->selectdb($db,"`id`,`titulo`","`menu_pagina`", "menu_id='{$id_menu}'");

/* lista os campos de menu */
if ( isset($_GET['id_menu']) ) {
     $sql_menu = $DB->selectdb(
        $db,"`id`,`titulo`,`icon`",
        "`menu_pagina`", "`id` = '{$_GET['id_menu']}'"
    );

     if ( $sql_menu->num_rows > 0 ) {
        $obj = $DB->objectdb( $sql_menu );
        $titulo_menu = $obj->titulo;
        $icone_menu = $obj->icon;
    }

    /* alterar menu */
    if ( isset($_POST['update_menu']) ) {
        $sql_update_menu = $DB->updatedb(
            $db, "`menu_pagina`",
            "`titulo`='{$_POST['titulo_menu']}',`icon`='{$_POST['icone_menu']}'",
            "`id`='{$_GET['id_menu']}'"
        );

        if ( isset($sql_update_menu) ) {
            echo "<script>window.location='menu.php?retorno=1'</script>";
        }
    }
}

/* remove menu */
if ( isset( $_GET['excluir'] ) ) {
    $excluir_menu = $DB->deletedb( $db, "`menu_pagina`", "`id`='{$_GET['excluir']}'" );
    if ( isset( $excluir_menu ) && $excluir_menu == 1 ) {
         echo "<script>window.location='menu.php?retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
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
