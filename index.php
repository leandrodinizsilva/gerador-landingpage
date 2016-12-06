<?php
require ("admin/inc/db.php");
$DB = new DB;
$db = $DB->connect();

$sql_template = $DB->selectdb(
        $db,"`id`,`titulo`,`logotipo`,`cor_primaria`,`cor_secundaria`,`cor_terciaria`",
        "`template`", "`ativo`=1"
    );

if (isset($sql_template) && $sql_template->num_rows === 1) {

    if ( $sql_template->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_template );
        $id_template                     = $obj->id;
        $titulo_template                = $obj->titulo;
        $logotipo_template            = $obj->logotipo;
        $cor_primaria_template     = $obj->cor_primaria;
        $cor_secundaria_template = $obj->cor_secundaria;
        $cor_terciaria_template     = $obj->cor_terciaria;
    }

    $sql_menu = $DB->selectdb(
            $db,"`id`,`cor_selecionado`",
            "`menu`", "`template_id`={$id_template}"
        );

    if ( $sql_menu->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_menu );
        $id_menu = $obj->id;
        $cor_selecionado = $obj->cor_selecionado;
    }

    $sql_menu_pagina = $DB->selectdb(
            $db,"`titulo`,`icon`",
            "`menu_pagina`", "`menu_id`={$id_template} LIMIT 0,4"
        );

    $sql_bloco1 = $DB->selectdb(
            $db,"`titulo`,`subtitulo`,`imagem`,`texto`",
            "`bloco1`", "`template_id`={$id_template}"
        );

    if ( $sql_bloco1->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco1 );
        $titulo_bloco1      = $obj->titulo;
        $subtitulo_bloco1 = $obj->subtitulo;
        $imagem_bloco1  = $obj->imagem;
        $texto_bloco1 = substr($obj->texto, 3, -4);
    }

    $sql_bloco2 = $DB->selectdb(
            $db,"`titulo`,`subtitulo`,`imagem`,`texto`",
            "`bloco2`", "`template_id`={$id_template}"
        );

    if ( $sql_bloco2->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco2 );
        $titulo_bloco2      = $obj->titulo;
        $subtitulo_bloco2 = $obj->subtitulo;
        $texto_bloco2 = substr($obj->texto, 3, -4);
        $imagem_bloco2  = $obj->imagem;
    }

    $sql_bloco3 = $DB->selectdb(
            $db,"`titulo`,`subtitulo`,`imagem1`,`imagem2`,`imagem3`",
            "`bloco3`", "`template_id`={$id_template}"
        );

    if ( $sql_bloco3->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco3 );
        $titulo_bloco3      = $obj->titulo;
        $subtitulo_bloco3 = $obj->subtitulo;
        $imagem1_bloco3  = $obj->imagem1;
        $imagem2_bloco3  = $obj->imagem2;
        $imagem3_bloco3  = $obj->imagem3;
    }

    $sql_bloco4 = $DB->selectdb(
            $db,"`titulo`,`subtitulo`,`endereco`,`email`,`texto`",
            "`bloco4`", "`template_id`={$id_template}"
        );

    if ( $sql_bloco4->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_bloco4 );
        $titulo_bloco4       = $obj->titulo;
        $subtitulo_bloco4  = $obj->subtitulo;
        $endereco_bloco4 = $obj->endereco;
        $email_bloco4       = $obj->email;
        $texto_bloco4 = substr($obj->texto, 3, -4);
    }

    $sql_rodape = $DB->selectdb(
            $db,"`texto`",
            "`rodape`", "`template_id`={$id_template}"
        );

    if ( $sql_rodape->num_rows === 1 ) {
        $obj = $DB->objectdb( $sql_rodape );
        $rodape = $obj->texto;
    }

    if (isset($_POST['enviar'])) {
        echo "<script>alert('Mensagem enviada com sucesso!')</script>";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $titulo_template ?></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />
        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="assets/extras/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/extras/lightbox.css">
        <style>
            .active-first:active {background-color: <?php echo $cor_selecionado ?> !important;}
            .background-first {background-color: <?php echo $cor_primaria_template ?> !important;}
            .text-first {color: <?php echo $cor_primaria_template ?> !important;}
            .background-second {background-color: <?php echo $cor_secundaria_template ?> !important;}
            .text-second {color: <?php echo $cor_secundaria_template ?> !important;}
            .background-third {background-color: <?php echo $cor_terciaria_template ?> !important;}
            .text-third {color: <?php echo $cor_terciaria_template ?> !important;}
            .border-first {border-color: <?php echo $cor_primaria_template ?> !important;}
            .back-top {border: 2px solid <?php echo $cor_primaria_template ?> !important;}
            .back-top:hover {background-color: <?php echo $cor_terciaria_template ?> !important;}
            .navbar-default .navbar-nav > .active,
            .navbar-default .navbar-nav li:hover {
            background: <?php echo $cor_selecionado ?>;
            padding-bottom: 5px;
            color: #fff;
            }
        </style>
        <!-- jQuery Load -->
        <script src="assets/js/jquery-min.js"></script>
    </head>
    <body data-spy="scroll" data-offset="20" data-target="#navbar">
        <!-- Nav Menu Section -->
        <div class="logo-menu">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-3">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-third" href="#home"><i class="fa <?php echo $logotipo_template ?>"></i> <?php echo $titulo_template ?></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav col-md-8 pull-right">
                    <?php
                    if ( $sql_menu_pagina->num_rows > 0 ) {
                        foreach ($sql_menu_pagina as $key => $value) {
                            $menu_slug[$key] = strtolower($value['titulo']);
                            if ($key == 0) {
                                echo "<li><a href='#{$menu_slug[$key]}' class='text-third'><i class='fa {$value['icon']}'></i> {$value['titulo']}</a></li>";
                            } else {
                                echo "<li><a href='#".strtolower($value['titulo'])."' class='text-third'><i class='fa {$value['icon']}'></i> {$value['titulo']}</a></li>";
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <!-- Nav Menu Section End -->

    <!-- home Area Section -->

    <section id="<?php echo $menu_slug[0] ?>" class="background-first">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title text-second"><?php echo $titulo_bloco1 ?></h1>
                    <h2 class="subtitle text-third"><?php echo $subtitulo_bloco1?></h2>
                    <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="admin/userfiles/bloco1/<?php echo $imagem_bloco1 ?>" alt="">
                    <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
                        <p class="text-second"><?php echo $texto_bloco1 ?></p>
                        <a href="#<?php echo $menu_slug[1] ?>" class="btn btn-primary btn-lg text-third background-second">Leia Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- home Area Section End-->

    <!-- sobre Section -->

    <section id="<?php echo $menu_slug[1] ?>" style="background-color:<?php echo $cor_secundaria_template ?>">
        <div class="container">
            <div class="row">
                <h1 class="title text-first"><?php echo $titulo_bloco2 ?></h1>
                <h2 class="subtitle text-third"><?php echo $subtitulo_bloco2 ?></h2>
                <div class="col-md-8 col-sm-12">
                    <p class="text-first">
                        <?php echo $texto_bloco2 ?>
                    </p>
                </div>
                <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="admin/userfiles/bloco2/<?php echo $imagem_bloco2 ?>" alt="">
            </div>
        </div>
    </section>
    <!-- sobre Section End -->

    <!-- Portfolio Section -->

    <section id="<?php echo $menu_slug[2] ?>" class="background-first">
        <div class="container">
            <div class="row">
                <h1 class="title text-second"><?php echo $titulo_bloco3 ?></h1>
                <h2 class="subtitle text-third"><?php echo $subtitulo_bloco3 ?></h2>



                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".5s">
                        <a href="#"><img src="admin/userfiles/bloco3/<?php echo $imagem1_bloco3 ?>" alt=""></a>
                        <div class="overlay">
                            <div class="icons">
                                <a data-lightbox="image1" href="admin/userfiles/bloco3/<?php echo $imagem1_bloco3 ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".7s">
                        <a href="#"><img src="admin/userfiles/bloco3/<?php echo $imagem2_bloco3 ?>" alt=""></a>
                        <div class="overlay">
                            <div class="icons">
                                <a data-lightbox="image1" href="admin/userfiles/bloco3/<?php echo $imagem2_bloco3 ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".9s">
                        <a href="#"><img src="admin/userfiles/bloco3/<?php echo $imagem3_bloco3 ?>" alt=""></a>
                        <div class="overlay">
                            <div class="icons">
                                <a data-lightbox="image1" href="admin/userfiles/bloco3/<?php echo $imagem3_bloco3 ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->
    <!-- Conatct Section -->
    <section id="<?php echo $menu_slug[3] ?>" style="background-color:<?php echo $cor_secundaria_template ?>">
        <div class="container text-center">
            <div class="row">
                <h1 class="title text-first"><?php echo $titulo_bloco4 ?></h1>
                <h2 class="subtitle text-third"><?php echo $subtitulo_bloco4 ?></h2>
                <form role="form" class="contact-form" method="post">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
                        <div class="form-group">
                            <div class="controls">
                                <input type="text" class="form-control" required placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <input type="email" class="form-control" required placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Subject" name="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <textarea rows="7" class="form-control" required placeholder="Message" name="message"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="enviar" class="btn btn-lg btn-common background-first text-third">Enviar</button>
                        <div id="success" style="color:#34495e;"></div>
                    </div>
                </form>
                <div class="col-md-6 wow fadeInRight">
                    <div class="contact-info">
                        <p class="text-first"><i class="fa fa-map-marker" class="text-first"></i> <?php echo $endereco_bloco4 ?></p>
                        <p class="text-first"><i class="fa fa-envelope" class="text-first"></i> <?php echo $email_bloco4 ?></p>
                    </div>
                    <p class="text-first">
                        <?php echo $texto_bloco4 ?><br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div id="copyright" class="background-second">
        <div class="container">
            <div class="col-md-10"><p class="text-first"><?php echo $rodape ?></p></div>
            <div class="col-md-2">
                <span class="to-top pull-right"><a href="#home"><i class="fa fa-angle-up fa-2x text-first back-top"></i></a></span>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Smooth Scroll -->
    <!-- Smooth Scroll -->
    <script src="assets/js/smooth-scroll.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <!-- All JS plugin Triggers -->
    <script src="assets/js/main.js"></script>
    </body>
    </html>

<?php
} else {
    echo "<h1>Você precisa criar um template.</h1>";
    echo "<h2>Acesse /admin e logue no sistema.</h2>";
}
?>