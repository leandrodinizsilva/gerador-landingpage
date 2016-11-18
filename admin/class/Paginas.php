<?php
extract($_POST);

/*******************TEMPLATE ATIVO*******************/
$sql_template_ativo = $DB->selectdb($db,"`id`,`titulo`","`template`", "ativo=1");

// echo "<pre>";
// print_r($sql_template_ativo);die;

/* armazena template selecionado em sessão */
if ( $sql_template_ativo->num_rows > 0 ) {
    foreach ($sql_template_ativo as $key => $value) {
        $_SESSION['id'] = $value['id'];
    }
}

if ( isset($_SESSION['id']) ) {
    $sql_dados_template = $DB->selectdb($db,"`titulo`","`template`", "id={$_SESSION['id']}");
}

/* carrega titulo do template ativo */
if ( $sql_template_ativo->num_rows > 0 ) {
    foreach ($sql_template_ativo as $key => $value) {
        $titulo_ativo = $value['titulo'];
    }
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

/* remove template */
if ( isset( $_GET['excluir_template'] ) ) {
    $excluir_template = $DB->deletedb( $db, "`template`", "`id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`menu`", "`template_id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`bloco1`", "`template_id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`bloco2`", "`template_id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`bloco3`", "`template_id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`bloco4`", "`template_id`='{$_SESSION['id']}'" );
    $DB->deletedb( $db, "`rodape`", "`template_id`='{$_SESSION['id']}'" );
    // echo "<pre>";
    // print_r($excluir_template);die;
    if ( isset( $excluir_template ) && $excluir_template == 1 ) {
         echo "<script>window.location='home.php?retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
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
if ( isset($_SESSION['id']) ) {
    $sql_menu = $DB->selectdb($db,"`id`,`cor_selecionado`   ","`menu`", "template_id='{$_SESSION['id']}'");
}

if ( isset($sql_menu) && $sql_menu->num_rows > 0 ) {
    $obj = $DB->objectdb( $sql_menu );
    $id_menu = $obj->id;
    $cor_selecionado_menu = $obj->cor_selecionado;
}

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
if ( isset($id_menu) ) {
    $sql_menu_paginas = $DB->selectdb($db,"`id`,`titulo`","`menu_pagina`", "menu_id='{$id_menu}'");
}

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

/*******************RODAPÉ *******************/
$texto_rodape = ( isset($_POST['texto_rodape']) ) ? $_POST['texto_rodape'] : null;

if ( isset( $_POST['update_rodape']) ) {
    $sql_update_rodape = $DB->updatedb(
        $db, "`rodape`","
        `texto`='{$_POST['texto_rodape']}'",
        "`template_id`='{$_SESSION['id']}'"
    );
    if ( $sql_update_rodape == true ) {
        echo "<script>window.location='rodape.php?id_rodape=1&retorno=1'</script>";
    } else {
        $_GET['retorno'] = 0;
    }
}

/* exibe campos do rodapé */
if ( isset( $_GET['id_rodape'] ) ) {
    $sql_rodape = $DB->selectdb(
        $db,"`id`,`texto`",
        "`rodape`", "`template_id` = '{$_SESSION['id']}'"
    );

    if ( $sql_rodape->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_rodape );
        $texto_rodape     = $obj->texto;
    }
}