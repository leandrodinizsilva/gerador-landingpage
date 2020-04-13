<?php 
require_once ("../gerador-landingpage/admin/controller/template_2.php");
$template_2 = new Template_2;
$page = $template_2->generateTemplate();
print_r($page);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$page["main"]["data"][0]["title"];?></title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" media="screen" href="../assets/fonts/font-awesome/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/landing-page.min.css" rel="stylesheet">
  <style>
    .main-color {
      background-color: <?php echo "#".$page["main"]["data"][0]["main_color"] ?> !important;
    }
    .secondary-color {
      background-color: <?php echo "#".$page["main"]["data"][0]["secondary_color"] ?> !important;
    }
    .secondary-color-icon {
      color: <?php echo "#".$page["main"]["data"][0]["secondary_color"] ?> !important;
    }
    .masthead {
      color: <?php echo "#".$page["main"]["data"][0]["secondary_text_color"] ?> !important;
      background: url("../admin/images/upload/<?=$page["main"]["data"][0]["background_image"];?>") no-repeat center center !important;
      background-size: cover;
    }
    .call-to-action {
      color: <?php echo "#".$page["main"]["data"][0]["secondary_text_color"] ?> !important;
      background: url("../admin/images/upload/<?=$page["footer"]["background_img"];?>") no-repeat center center !important;
    }
    .features-icons {
      color: <?php echo "#".$page["main"]["data"][0]["main_text_color"] ?> !important;
    }
    .navbar-brand {
      color: <?php echo "#".$page["main"]["data"][0]["main_text_color"] ?> !important;
    }
    .showcase {
      color: <?php echo "#".$page["main"]["data"][0]["main_text_color"] ?> !important;
    }
    .testimonials {
      color: <?php echo "#".$page["main"]["data"][0]["main_text_color"] ?> !important;
    }
    footer {
      color: <?php echo "#".$page["main"]["data"][0]["main_text_color"] ?> !important;
    }
  </style>
</head>

<body class="">

  </div>
  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top main-color">
    <div class="container">
      <a class="navbar-brand" href="#"><?=$page["main"]["data"][0]["title"]; ?></a>
      <!-- <a class="btn btn-primary secondary-color" href="#">Sign In</a> -->
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5"><?=$page["main"]["data"][0]["main_text"];?></h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Coloque seu email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary secondary-color">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-<?=$page["block1"]["icon_1"];?> m-auto secondary-color-icon"></i>
            </div>
            <h3><?=$page["block1"]["title_1"];?></h3>
            <p class="lead mb-0"><?=$page["block1"]["text_1"];?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-<?=$page["block1"]["icon_2"];?> m-auto secondary-color-icon"></i>
            </div>
            <h3><?=$page["block1"]["title_2"];?></h3>
            <p class="lead mb-0"><?=$page["block1"]["text_2"];?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-<?=$page["block1"]["icon_3"];?> m-auto secondary-color-icon"></i>
            </div>
            <h3><?=$page["block1"]["title_3"];?></h3>
            <p class="lead mb-0"><?=$page["block1"]["text_3"];?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../admin/images/upload/<?=$page["block2"]["image_1"];?>');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2><?=$page["block2"]["title_1"];?></h2>
          <p class="lead mb-0"><?=$page["block2"]["text_1"];?></p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('../admin/images/upload/<?=$page["block2"]["image_2"];?>');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2><?=$page["block2"]["title_2"];?></h2>
          <p class="lead mb-0"><?=$page["block2"]["text_2"];?></p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../admin/images/upload/<?=$page["block2"]["image_3"];?>');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2><?=$page["block2"]["title_3"];?></h2>
          <p class="lead mb-0"><?=$page["block2"]["text_3"];?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Comentários dos clientes</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="../admin/images/upload/<?=$page["testimonial"]["image_1"];?>" alt="">
            <h5><?=$page["testimonial"]["name_1"]; ?></h5>
            <p class="font-weight-light mb-0"><?=$page["testimonial"]["testimonial_1"];?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="../admin/images/upload/<?=$page["testimonial"]["image_2"];?>" alt="">
            <h5><?=$page["testimonial"]["name_2"]; ?></h5>
            <p class="font-weight-light mb-0"><?=$page["testimonial"]["testimonial_2"];?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="../admin/images/upload/<?=$page["testimonial"]["image_3"];?>" alt="">
            <h5><?=$page["testimonial"]["name_3"]; ?></h5>
            <p class="font-weight-light mb-0"><?=$page["testimonial"]["testimonial_3"];?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4"><?=$page["main"]["data"][0]["main_text"]; ?></h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary secondary-color">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">

            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">

            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">

            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">

            </li>
          </ul>

        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="<?=$page["footer"]["facebook"];?>">
                <i class="fab fa-facebook fa-2x fa-fw secondary-color-icon"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="<?=$page["footer"]["twitter"];?>">
                <i class="fab fa-twitter-square fa-2x fa-fw secondary-color-icon"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="<?=$page["footer"]["instagram"];?>">
                <i class="fab fa-instagram fa-2x fa-fw secondary-color-icon"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
