<?php
require_once ("../inc/db.php");
$DB = new DB;
$db = $DB->connect();
include_once ('../controller/template_2.php');

if (isset($_POST["template-id"]) || isset($_SESSION["id"])) {
    if (isset($_POST["template-id"])) {
      $id = $_POST["template-id"];
    } else {
      $id = $_SESSION["id"];
    }

    $templateInfo = new Template_2;
    $templateData = $templateInfo->readTemplate($id);
    $template_id = $templateData["data"][0]["id"];
    $template_title = $templateData["data"][0]["title"];
    $template_main_text = $templateData["data"][0]["main_text"];
    $template_logo = $templateData["data"][0]["logo"];
    $main_color = $templateData["data"][0]["main_color"];
    $secondary_color = $templateData["data"][0]["secondary_color"];
    $main_text_color = $templateData["data"][0]["main_text_color"];
    $secondary_text_color = $templateData["data"][0]["secondary_text_color"];
    $bg_img = $templateData["data"][0]["background_image"];
    
    $url_info = $templateData["url"];

    $block1 = $templateInfo->readTemplateBlock1($_SESSION["id"]);
    if ($block1 != false) {
        $block1_text_1 = $block1["text_1"];
        $block1_text_2 = $block1["text_2"];
        $block1_text_3 = $block1["text_3"];
        $block1_icon_1 = $block1["icon_1"];
        $block1_icon_2 = $block1["icon_2"];
        $block1_icon_3 = $block1["icon_3"];
        $block1_title_1 = $block1["title_1"];
        $block1_title_2 = $block1["title_2"];
        $block1_title_3 = $block1["title_3"];
    } else {
        $block1_text_1 = null;
        $block1_text_2 = null;
        $block1_text_3 = null;
        $block1_icon_1 = null;
        $block1_icon_2 = null;
        $block1_icon_3 = null;
        $block1_title_1 = null;
        $block1_title_2 = null;
        $block1_title_3 = null;
    }

    $block2 = $templateInfo->readTemplateBlock2($_SESSION["id"]);
    if ($block2 != false) {
        $block2_text_1 = $block2["text_1"];
        $block2_text_2 = $block2["text_2"];
        $block2_text_3 = $block2["text_3"];
        $block2_img_1 = $block2["image_1"];
        $block2_img_2 = $block2["image_2"];
        $block2_img_3 = $block2["image_3"];
        $block2_title_1 = $block2["title_1"];
        $block2_title_2 = $block2["title_2"];
        $block2_title_3 = $block2["title_3"];
    } else {
        $block2_text_1 = null;
        $block2_text_2 = null;
        $block2_text_3 = null;
        $block2_img_1 = null;
        $block2_img_2 = null;
        $block2_img_3 = null;
        $block2_title_1 = null;
        $block2_title_2 = null;
        $block2_title_3 = null;
    }

    $testimonial = $templateInfo->readTemplateTestimonial2($_SESSION["id"]);
    if ($testimonial != false) {
        $testimonial_name_1 = $testimonial["name_1"];
        $testimonial_testimonial_1 = $testimonial["testimonial_1"];
        $testimonial_image_1 = $testimonial["image_1"];
        $testimonial_name_2 = $testimonial["name_2"];
        $testimonial_testimonial_2 = $testimonial["testimonial_2"];
        $testimonial_image_2 = $testimonial["image_2"];
        $testimonial_name_3 = $testimonial["name_3"];
        $testimonial_testimonial_3 = $testimonial["testimonial_3"];
        $testimonial_image_3 = $testimonial["image_3"];
    } else {
        $testimonial_name_1 = null;
        $testimonial_testimonial_1 = null;
        $testimonial_image_1 = null;
        $testimonial_name_2 = null;
        $testimonial_testimonial_2 = null;
        $testimonial_image_2 = null;
        $testimonial_name_3 = null;
        $testimonial_testimonial_3 = null;
        $testimonial_image_3 = null;
    }

    $footer = $templateInfo->readTemplateFooter($_SESSION["id"]);
    if ($footer != false) {
        $footer_bg_img = $footer["background_img"];
        $footer_facebook = $footer["facebook"];
        $footer_instagram = $footer["instagram"];
        $footer_twitter = $footer["twitter"];
    } else {
        $footer_bg_img = null;
        $footer_facebook = null;
        $footer_instagram = null;
        $footer_twitter = null;
    }

  } else {
    $template_id = null;
    $template_title =  null;
    $template_main_text = null;
    $main_color =  null;
    $secondary_color =  null;
    $main_text_color =  null;
    $secondary_text_color =  null;
    $template_logo = null;

    $block1_text_1 = null;
    $block1_text_2 = null;
    $block1_text_3 = null;
    $block1_icon_1 = null;
    $block1_icon_2 = null;
    $block1_icon_2 = null;

    $block2_text_1 = null;
    $block2_text_2 = null;
    $block2_text_3 = null;
    $block2_img_1 = null;
    $block2_img_2 = null;
    $block2_img_3 = null;
    $block2_comment_1 = null;
    $block2_comment_2 = null;
    $block2_comment_3 = null;

    $testimonial_name_1 = null;
    $testimonial_testimonial_1 = null;
    $testimonial_image_1 = null;
    $testimonial_name_2 = null;
    $testimonial_testimonial_2 = null;
    $testimonial_image_2 = null;
    $testimonial_name_3 = null;
    $testimonial_testimonial_3 = null;
    $testimonial_image_3 = null;

    $footer_bg_img = null;
    $footer_facebook = null;
    $footer_instagram = null;
    $footer_twitter = null;
  }
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
                    <li><a href="template_menu_2.php?id_menu=1">Menu</a></li>
                    <li><a href="template_block1_2.php?id_bloco1=1">Bloco 1</a></li>
                    <li><a href="template_block2_2.php?id_bloco2=1">Bloco 2</a></li>
                    <li><a href="template_testimonial_2.php?id_bloco3=1">Testemunhos</a></li>
                    <li><a href="template_footer_2.php?id_rodape=1">Rodapé</a></li>
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