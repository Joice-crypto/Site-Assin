<?php
require_once('lib/Mobile_Detect.php');
require_once('common/cookie_message.php');
require_once('lang/common.php');
require_once('panel/app/CarouselImageController.php');
require_once('panel/app/HighlightController.php');
require_once('panel/app/CardController.php');
require_once('panel/app/GeneralSettingController.php');

?>

<link rel="stylesheet" href="css\business-frontpage.css">
<!-- Bootstrap CSS -->
<div class="teste">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> -->
        <div class="carousel-inner1">
          <div class="carousel-item active">
            <img class="d-block2" src="assets\images\IMG_20170308_141328030.jpg" alt="First slide">
            <h5>Martiniano Alves - Engenharia Civil (Lakehead University - ELAP) 2019/2</h5>
            <p class="a">Há alunos voluntários que ficam por conta de receber os intercambistas assim que eles chegam na
              universidade. A minha voluntária foi me buscar no hotel (pois eu cheguei antes da data de entrada na
              universidade) para me levar para a UGA</p>

          </div>
          <div class="carousel-item">
            <img class="d-block2" src="assets\images\Martin - Lakehead University.jpg" alt="Second slide">
            <h5>Dayse Maria Pena - Letras UGA 2017/1</h5>
            <p class="a">Há alunos voluntários que ficam por conta de receber os intercambistas assim que eles chegam na
              universidade. A minha voluntária foi me buscar no hotel (pois eu cheguei antes da data de entrada na
              universidade) para me levar para a UGA</p>
          </div>
          <div class="carousel-item">
            <img class="d-block2" src="assets\images\WhatsApp Image 2017-06-05 at  13_04_21.jpg" alt="Third slide">
            <h5>Virgínia Della Sávia Brasil - Letras UGA 2017/1</h5>
            <p class="a">Há alunos voluntários que ficam por conta de receber os intercambistas assim que eles chegam na
              universidade. A minha voluntária foi me buscar no hotel (pois eu cheguei antes da data de entrada na
              universidade) para me levar para a UGA</p>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>




<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/base.js"></script>