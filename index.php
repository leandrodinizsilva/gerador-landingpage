<?php
require ("admin/inc/db.php");
$DB = new DB;
$db = $DB->connect();

$sql_template = $DB->selectdb(
        $db,"`id`,`titulo`,`logotipo`,`cor_primaria`,`cor_secundaria`,`cor_terciaria`",
        "`template`", "`ativo`=1"
    );


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
    $cor_selecionado = $obj->cor_selecionado;
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
                <li class="active"><a href="#home" class="text-third"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#sobre" class="text-third"><i class="fa fa-info"></i> Sobre</a></li>
                <li><a href="#portfolio" class="text-third"><i class="fa fa-flask"></i> Vinhos</a></li>
                <li><a href="#contact" class="text-third"><i class="fa fa-envelope"></i> Contato</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>
<!-- Nav Menu Section End -->

<!-- home Area Section -->

<section id="home" class="background-first">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title text-second">Adega Boa Vista</h1>
                <h2 class="subtitle text-third">Trazendo o melhor do vinho para</h2>

                <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="assets/img/home/garrafa.png" alt="">

                <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
                    <p class="text-second">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    <a href="#sobre" class="btn btn-primary btn-lg text-third background-second">Leia Mais</a>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- home Area Section End-->

<!-- sobre Section -->

<section id="sobre" style="background-color:<?php echo $cor_secundaria_template ?>">
    <div class="container">
        <div class="row">
            <h1 class="title text-first">Sobre Nós</h1>
            <h2 class="subtitle text-third">Um pouco sobre a nossa história</h2>

            <div class="col-md-8 col-sm-12">
                <p class="text-first">
                    A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                </p>
            </div>

            <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="assets/img/sobre/graph.png" alt="">

        </div>
    </div>
</section>
<!-- sobre Section End -->

<!-- Portfolio Section -->

<section id="portfolio" class="background-first">
    <div class="container">
        <div class="row">
            <h1 class="title text-second">Vinhos</h1>
            <h2 class="subtitle text-third">Uvas de excelente qualidade</h2>



            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="portfolio-item wow fadeInLeft" data-wow-delay=".5s">
                    <a href="#"><img src="assets/img/portfolio/img1.jpg" alt=""></a>
                    <div class="overlay">
                        <div class="icons">
                            <a data-lightbox="image1" href="assets/img/portfolio/img1.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="portfolio-item wow fadeInLeft" data-wow-delay=".7s">
                    <a href="#"><img src="assets/img/portfolio/img2.jpg" alt=""></a>
                    <div class="overlay">
                        <div class="icons">
                            <a data-lightbox="image1" href="assets/img/portfolio/img2.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="portfolio-item wow fadeInLeft" data-wow-delay=".9s">
                    <a href="#"><img src="assets/img/portfolio/img3.jpg" alt=""></a>
                    <div class="overlay">
                        <div class="icons">
                            <a data-lightbox="image1" href="assets/img/portfolio/img3.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Portfolio Section End -->
<!-- Conatct Section -->
<section id="contact" style="background-color:<?php echo $cor_secundaria_template ?>">
    <div class="container text-center">
        <div class="row">
            <h1 class="title text-first">Contato</h1>
            <h2 class="subtitle text-third">Fale conosco através dos campos abaixo</h2>
            <form role="form" class="contact-form" method="post">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="email" class="form-control email" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" class="form-control requiredField" placeholder="Subject" name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <textarea rows="7" class="form-control" placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-lg btn-common background-first text-third">Enviar</button>
                    <div id="success" style="color:#34495e;"></div>
                </div>
            </form>
            <div class="col-md-6 wow fadeInRight">
                <div class="social-links">
                    <a class="social" href="#" target="_blank" ><i class="fa fa-facebook fa-2x background-first text-third"></i></a>
                    <a class="social" href="#" target="_blank"><i class="fa fa-twitter fa-2x background-first text-third"></i></a>
                    <a class="social" href="#" target="_blank"><i class="fa fa-linkedin fa-2x background-first text-third"></i></a>
                </div>
                <div class="contact-info">
                    <p class="text-first"><i class="fa fa-map-marker" class="text-first"></i> São Roque - São Paulo - Brasil</p>
                    <p class="text-first"><i class="fa fa-envelope" class="text-first"></i> contato@adegaboavista.com.br</p>
                </div>
                <p class="text-first">
                    A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit.<br>
                </p>
            </div>
        </div>
    </div>
</section>
<div id="copyright" class="background-second">
    <div class="container">
        <div class="col-md-10"><p class="text-first">© Adega Boa Vista 2016 Todos os direitos reservados. by <a href="http://github.com/jmessiass" class="text-first">Jmessi@s</a></p></div>
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