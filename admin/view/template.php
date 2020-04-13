<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPOTLIGHT</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
  <!--Icon Fonts-->
  <link rel="stylesheet" media="screen" href="../../assets/fonts/font-awesome/font-awesome.min.css" />
  <!-- Extras -->
  <link rel="stylesheet" type="text/css" href="../../assets/extras/animate.css">
  <link rel="stylesheet" type="text/css" href="../../assets/extras/lightbox.css">
  <style>
    .active-first:active {background-color: #456732 !important;}
    .background-first {background-color: 1231253 !important;}
    .text-first {color: 1231253 !important;}
    .background-second {background-color: 6790789 !important;}
    .text-second {color: 6790789 !important;}
    .background-third {background-color: 2344568 !important;}
    .text-third {color: 2344568 !important;}
    .border-first {border-color: 1231253 !important;}
    .back-top {border: 2px solid 1231253 !important;}
    .back-top:hover {background-color: 2344568 !important;}
    .navbar-default .navbar-nav > .active,
    .navbar-default .navbar-nav li:hover {
    background: #456732;
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
      <a class="navbar-brand text-third" href="#home"><i class="fa abacus"></i> SPOTLIGHT</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav col-md-8 pull-right"></ul>
    </div>
  </div>
</nav>
</div>
<!-- Nav Menu Section End -->

<!-- home Area Section -->

<section id="" class="background-first">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title text-second">Título 1</h1>
        <h2 class="subtitle text-third">Subtítulo</h2>
        <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="../images/img_temp_1_1.jpg" alt="">
        <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
          <p class="text-second">Texto</p>
          <a href="" class="btn btn-primary btn-lg text-third background-second">Leia Mais</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- home Area Section End-->

<!-- sobre Section -->

<section id="" style="background-color:6790789">
  <div class="container">
    <div class="row">
      <h1 class="title text-first">Título</h1>
      <h2 class="subtitle text-third">Subtítulo</h2>
      <div class="col-md-8 col-sm-12">
        <p class="text-first">
            Texto
        </p>
      </div>
      <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="../images/img_temp_1_2.jpg" alt="">
    </div>
  </div>
</section>
<!-- sobre Section End -->

<!-- Portfolio Section -->

<section id="" class="background-first">
  <div class="container">
    <div class="row">
      <h1 class="title text-second">Título</h1>
      <h2 class="subtitle text-third">Subtítulo</h2>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="portfolio-item wow fadeInLeft" data-wow-delay=".5s">
          <a href="#"><img src="../images/img_temp_1_3.png" alt=""></a>
          <div class="overlay">
            <div class="icons">
              <a data-lightbox="image1" href="../images/img_temp_1_3.png" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="portfolio-item wow fadeInLeft" data-wow-delay=".7s">
          <a href="#"><img src="../images/img_temp_1_2.jpg" alt=""></a>
          <div class="overlay">
            <div class="icons">
              <a data-lightbox="image1" href="../images/img_temp_1_2.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="portfolio-item wow fadeInLeft" data-wow-delay=".9s">
          <a href="#"><img src="../images/img_temp_1_1.jpg" alt=""></a>
          <div class="overlay">
            <div class="icons">
              <a data-lightbox="image1" href="../images/img_temp_1_1.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Portfolio Section End -->
<!-- Conatct Section -->
<section id="" style="background-color:6790789">
  <div class="container text-center">
    <div class="row">
      <h1 class="title text-first">Título</h1>
      <h2 class="subtitle text-third">Subtítulo</h2>
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
          <p class="text-first"><i class="fa fa-map-marker" class="text-first"></i> Endereço</p>
          <p class="text-first"><i class="fa fa-envelope" class="text-first"></i> Email</p>
        </div>
        <p class="text-first">
          Texto<br>
        </p>
      </div>
    </div>
  </div>
</section>
<div id="copyright" class="background-second">
  <div class="container">
    <div class="col-md-10"><p class="text-first">Texto</p></div>
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