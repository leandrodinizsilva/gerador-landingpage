<?php
require_once ("db.php");
$DB = new DB;
$db = $DB->connect();
include_once ('../admin/controller/template_2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - LandingPage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="agenciaponto">
    <link rel="stylesheet" href="<?php echo URL_DEFINITIVA ?>css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo URL_DEFINITIVA ?>css/jquery.dataTables.css" >
    <link rel="stylesheet" href="<?php echo URL_DEFINITIVA ?>css/style.css" >
    <script src="<?php echo URL_DEFINITIVA ?>js/jquery-2.1.4.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
 <nav class="navbar navbar-fixed-top">
    <div class="navbar-inverse">
        <div class="container-fluid">
            <!-- VERSÃO MOBILE -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#expandir-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #ccc;"></span>
                    <span class="icon-bar" style="background-color: #ccc;"></span>
                    <span class="icon-bar" style="background-color: #ccc;"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php">
                    <h3 style="margin-top:0;color: #ccc;">Admin - LandingPage</h3>
                    <!-- <img src="<?= URL_DEFINITIVA ?>images/logo.png" title="Logotipo Consultoria CS" alt="logotipo consultoria cs" class="topo" width="160"> -->
                </a>
            </div>
            <!-- LINKS -->
            <div class="collapse navbar-collapse menu" id="expandir-menu">
                <ul class="nav navbar-nav navbar-right topo">
                    <li><a href="<?php echo URL_DEFINITIVA ?>home.php">Home</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>template.php?id_template=1">Template</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>menu.php?id_menu=1">Menu</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>bloco1.php?id_bloco1=1">Bloco 1</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>bloco2.php?id_bloco2=1">Bloco 2</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>bloco3.php?id_bloco3=1">Bloco 3</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>bloco4.php?id_bloco4=1">Bloco 4</a></li>
                    <li><a href="<?php echo URL_DEFINITIVA ?>rodape.php?id_rodape=1">Rodapé</a></li>
                    <li>
                        <a href="<?php echo URL_DEFINITIVA ?>inc/logout.php">
                            <i class='glyphicon glyphicon-off'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>