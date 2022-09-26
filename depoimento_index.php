<?php

require_once('lang/common.php');
require_once('panel/app/DepoimentoController.php');
require_once('panel/app/GeneralSettingController.php');




$DepoimentoController = new DepoimentoController();
$DepoimentosArray = $DepoimentoController->getLastestDepoimentos($lang["CURRENT_LANG_ISO"]);

?>


<link rel="stylesheet" href="css\business-frontpage.css">
<!-- Bootstrap CSS -->

<div class="teste" style="width: 20rem;">
  <div class="card" >
    <div class="card-body">

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      
        <div class="carousel-inner">

    
          <?php for ($i = 0; $i < count($DepoimentosArray); $i++) {
            if ($i == 0) { ?>
            <div class="carousel-item active">
              <a href="assets\pictures\fotos\<?php echo $DepoimentosArray[$i]->getDepoimentoFile(); ?>">
              <img style="
                  width: 90px;
                  height: 70px;
                  border-radius:45%;
                  margin-left: 40%;" src="assets\pictures\fotos\<?php echo $DepoimentosArray[$i]->getDepoimentoThumbnail(); ?>" alt="First slide">
            <h5 style="text-align: center; color: #000; margin-top: 10px; font-size: 16px;"><?php echo $DepoimentosArray[$i]->getDepoimentoTitle(); ?> </h5>
            <p style="text-align:center"><?php echo $DepoimentosArray[$i]->getDepoimentoDescription(); ?></p>
            <p style="color: #000; margin-top: 10px; text-align:justify; overflow-wrap: break-word;"><?php echo $DepoimentosArray[$i]->getDepoimentoContent(); ?></p>
            </a>
            </div>
            <?php } else { ?>
              <div class="carousel-item">
              <img style="margin-top:10px;
                  width: 100px;
                  height: 90px;
                  border-radius:47%;
                  margin-left: 40%; "  src="assets/pictures/fotos/<?php echo $DepoimentosArray[$i]->getDepoimentoThumbnail(); ?>" alt="First slide">
                <h5 style="text-align: center; color: #000; margin-top: 10px; font-size: 16px;"><?php echo $DepoimentosArray[$i]->getDepoimentoTitle(); ?></h5>
                <p style="text-align:center"><?php echo $DepoimentosArray[$i]->getDepoimentoDescription(); ?></p>
                <p style="color: #000; margin-top: 10px; text-align:justify ;"><?php echo $DepoimentosArray[$i]->getDepoimentoContent(); ?></p>
              </div>
          <?php }
          } ?>
           
          </div>
         
        </div>
        <a class="carousel-control-prev" style="opacity: 0;"  href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" style="opacity: 0;"  href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      </div>
    </div>
  </div>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/base.js"></script>

