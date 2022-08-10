<?php
  require_once('lib/Mobile_Detect.php');
  include_once('lang/common.php');

  $Detection = new Mobile_Detect;

  if(!$Detection->isMobile()) {
    header('location: index.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="<?php echo $lang['CURRENT_LANG_PREFIX']; ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Assessoria Internacional UFSJ">
    <meta name="author" content="José Venâncio">

    <title><?php echo $lang['SITE_TITLE']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  </head>

  <body>
    <div class="w-100 bg-dark">
      <div class="dropdown">
        <button class="dropdown-toggle astext text-white float-right mr-4 mt-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="assets/images/<?php switch($lang['CURRENT_LANG_PREFIX']){case 'pt': echo 'if_Brazil_flat_91992.png';break;case 'en': echo 'if_United-States_flat_92406.png';break; case 'es': echo 'if_Spain_flat_92356.png';break; case 'fr': echo 'if_France_flat_92086.png';break;default: echo 'if_United-States_flat_92406.png';}?>">&nbsp;<?php echo $lang['CURRENT_LANG']; ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . '?lang=en' ?>'"><img src="assets/images/if_United-States_flat_92406.png">&nbsp;English</a>
          <a class="dropdown-item" href="#" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . '?lang=pt' ?>'"><img src="assets/images/if_Brazil_flat_91992.png">&nbsp;Português</a>
          <a class="dropdown-item" href="#" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . '?lang=fr' ?>'"><img src="assets/images/if_France_flat_92086.png">&nbsp;Français</a>
          <a class="dropdown-item" href="#" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . '?lang=es' ?>'"><img src="assets/images/if_Spain_flat_92356.png">&nbsp;Español</a>
        </div>
      </div>
      <div class="container py-5">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-11 text-center">
              <a href="#"><img class="img-responsive" src="assets/images/menu-logo_menorainda.png" class="logo-img rounded"/></a>
              <h1 class="float-left ml-4 text-white"><?php echo $lang['UNIVERSITY_NAME']; ?></h1>
              <h4 class="float-left ml-4 text-white"><?php echo $lang['HEADER_SUBTITLE']; ?></h4>
          </div>
        </div>
      </div>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <div class="container">
        <!--<a class="navbar-brand" href="#"><img src="assets/images/menu-logo_menorainda.png" class="logo-img rounded"/>ASSIN</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['ABOUT_UFSJ']; ?>
                <span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_HISTORIC']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_MISSION']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_MANAGEMENT']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_CAMPI']; ?></a>
                <div class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES']; ?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownright">
                    <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES_CULTURAL_CENTER']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES_CEREM']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES_FORTIM']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES_FARMS']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_ACADEMIC_CULTURAL_SPACES_PLANETARY']; ?></a>
                  </div>
                </div>
                <a class="dropdown-item" href="#"><?php echo $lang['ABOUT_UFSJ_STANDARTS']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['EDUCATION']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['EDUCATION_GRADUATION']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['EDUCATION_POST_GRADUATION']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['EDUCATION_MENU']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['RESEARCH_INOVATION']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['RESEARCH_INOVATION_RESEARCH_GROUPS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['RESEARCH_INOVATION_INTERNATIONAL_RESEARCH_GROUPS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['RESEARCH_INOVATION_NETEC']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['RESEARCH_INOVATION_STARTUPS']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['EXTENSION']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['EXTENSION_PROGRAMS_PROJECTS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['EXTENSION_CULTURAL_WINTER']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['INTERNATIONAL']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <div class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN']; ?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownright">
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN_MISSION']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN_INTERNATIONALIZATION_POLICY']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN_INTERNATIONALIZATION_PLAN']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN_LINGUISTIC_POLICY']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ABOUT_ASSIN_RESOLUTIONS']; ?></a>
                  </div>
                </div>
                <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_INTERNATIONAL_COLAB']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_INTERNATIONAL_PROGRAMS']; ?></a>
                <div class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['INTERNATIONAL_MOBILITY']; ?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownright">
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_MOBILITY_UFSJ_STUDENTS']; ?></a>
                    <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_MOBILITY_FOREIGN_STUDENTS']; ?></a>
                  </div>
                </div>
                <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_ITERNATIONAL_INTERNSHIP']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['STUDENT_LIFE']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['STUDENT_HOUSING']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['UNIVERSITY_RESTAURANTS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['INTERNATIONAL_STUDENT_GUIDE']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['BUS_SCHEDULES_STOPS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['USEFUL_INFO']; ?></a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $lang['REGISTER']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#"><?php echo $lang['REGISTER_PROFESSORS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['REGISTER_EX_STUDENTS']; ?></a>
                <a class="dropdown-item" href="#"><?php echo $lang['REGISTER_EXCHANGERS']; ?></a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $lang['CHAT']; ?></a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav position-absolute"  style="right: 0;">
          <li class="nav-item">
            <a id="SearchButton" class="nav-link"><img src="assets/images/search_icon.png" height="26px" width="26px"></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <header class="business-header">
      <div id="carouselExampleControls" class="carousel slide h-100" data-ride="carousel">
        <div class="carousel-inner h-100">
          <div class="carousel-item active">
            <img class="d-block w-100" src="assets/pictures/slides/porto.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/pictures/slides/germany.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/pictures/slides/rome.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="mt-4">Highlights</h2>
          <div class="row mb-2">
            <div class="col-sm-3">
              <img src="assets/pictures/gallery/csa.jpg" class="img-fluid rounded"/>
            </div>
            <div class="col-sm-9">
              <a href="#" class="highlight-text a-dark">Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend.</a>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-3">
              <img src="assets/pictures/gallery/cdb.jpg" class="img-fluid rounded"/>
            </div>
            <div class="col-sm-9">
              <a href="#" class="highlight-text a-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <img src="assets/pictures/gallery/ctan_alojamento.jpg" class="img-fluid rounded"/>
            </div>
            <div class="col-sm-9">
              <a href="#" class="highlight-text a-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <h2 class="mt-4">Vídeo Institucional</h2>
          <iframe class="h-100 w-100" src="https://www.youtube.com/embed/FPM5O4OhxIY" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Idiomas sem Fronteiras</h4>
              <p class="card-text">Introdução Idiomas sem Fronteiras</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Leia mais</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Seminário de Internacionalização</h4>
              <p class="card-text">Introdução</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Leia mais</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title">Editais abertos</h4>
              <p class="card-text">Confira aqui os editais abertos</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Leia mais</a>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-4 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h3 class="text-white"><?php echo $lang['GALLERY']; ?></h3>
            <div class="row">
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/cdb.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/csa.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/ctan_alojamento.jpg"/>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/ctan_alojamento.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/csa.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/cdb.jpg"/>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/cdb.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/csa.jpg"/>
              </div>
              <div class="col-sm-4 p-1">
                <img class="img-fluid" style="height: 65px;" src="assets/pictures/gallery/ctan_alojamento.jpg"/>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <h3 class="text-white">Informação</h3>
            <h6 class="text-white mt-3"><a class="a-light" href="#">Info 1</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">Info 2</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">Info 3</a></h6>
          </div>
          <div class="col-sm-3">
            <h3 class="text-white">Guia do Estudante</h3>
            <h6 class="text-white mt-3"><a class="a-light" href="#">Guia 1</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">Guia 2</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">Guia 4</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">Guia 3</a></h6>
            <h6 class="text-white"><a class="a-light" href="#">FAQ</a></h6>
          </div>
          <div class="col-sm-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24933603.40066159!2d-65.71129417016233!3d-15.198518954500694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDA4JzI1LjYiUyA0NMKwMTUnMzkuMiJX!5e0!3m2!1spt-BR!2sbr!4v1538748164411" class="w-100 h-100" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!--<address>
              <strong class="text-white">Endereço</strong>
              <h6 class="text-white">Praça Frei Orlando, 170
              Centro, São João del-Rei - MG</h6>
              <strong class="text-white">CEP</strong>
              <h6 class="text-white">36307-334 - <strong><a href="#">Ver mapa</a></strong></h6>
            </address>
            <address>
              <strong class="text-white">Fone</strong>
              <h6 class="text-white">(32) 1234-5678</h6>
              <strong class="text-white">Email</strong>
              <a href="mailto:#" class="a-light"><h6 class="text-white"></h6></a>
            </address>-->

          </div>
        </div>
      </div>
      <!-- /.container -->
    </footer>
    <footer class="py-2" style="background-color: #000;">
      <div class="container">
        <div class="row">
          <div class="col-sm-2 text-center">
            <a href="https://ufsj.edu.br/"><img class="img-fluid" width="50%" src="assets/images/menu-logo_menor.png"/></a>
          </div>
          <div class="col-sm-8 my-auto">
            <p class="m-0 text-center text-white">Praça Frei Orlando, 170 - Centro, São João del-Rei - MG, 36307-334</p>
            <p class="m-0 text-center text-white">Telefone: +55 (32) 3379-5812 | Email: <a href="mailto:assin@ufsj.edu.br" class="a-light">assin@ufsj.edu.br</a></p>
          </div>
          <div class="col-sm-2 my-auto">
            <div class="row">
              <div class="col-sm-3 px-1 text-center">
              </div>
              <div class="col-sm-3 px-1 text-center">
                <a href="https://pt-br.facebook.com/AssessoriaInternacionalUFSJ/" target="_blank"><img src="assets/images/if_facebook_291720.png" width="32px" height="32px;"/></a>
              </div>
              <div class="col-sm-3 px-1 text-center">
                <a href="https://twitter.com/assinufsj" target="_blank"><img src="assets/images/if_twitter_291710.png" width="32px" height="32px;"/></a>
              </div>
              <div class="col-sm-3 px-1 text-center">
                <a href="https://www.youtube.com/user/tvufsj" target="_blank"><img src="assets/images/if_youtube_291691.png" width="32px" height="32px;"/></a>
              </div>
              <div class="col-sm-3 px-1 text-center">
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/base.js"></script>
  </body>

</html>
