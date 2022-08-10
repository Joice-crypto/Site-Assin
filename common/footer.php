<?php
require_once('panel/app/GalleryImageController.php');
require_once('panel/app/Constants.php');
$GalleryImageController = new GalleryImageController();
$GalleryImagesArray = $GalleryImageController->getLastestGalleryImages();
?>
<footer class="py-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h3 class="text-white"><a class="a-light" href="gallery.php"><?php echo $lang['GALLERY']; ?></a></h3>
        <?php $Counter = 0;
        for ($i = 0; $i < 3; $i++) { ?>
          <div class="row">
            <?php for ($j = 0; $j < 3; $j++) {
              if ($Counter < count($GalleryImagesArray)) { ?>
                <div class="col-sm-4 p-1">
                  <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" data-caption="<?php echo $GalleryImagesArray[$Counter]->getGImageDescription(); ?>" data-image="assets/pictures/gallery/<?php echo $GalleryImagesArray[$Counter]->getGImageName(); ?>" data-target="#image-gallery"><img class="img-fluid" style="height: 65px;" src="assets/<?php if (count($GalleryImagesArray) == 0) {
                                                                                                                                                                                                                                                                                                                                                                                  echo "images/" . IMAGE_PLACEHOLDER;
                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                  echo "pictures/gallery/" . $GalleryImagesArray[$Counter]->getGImageName();
                                                                                                                                                                                                                                                                                                                                                                                } ?>" /></a>
                </div>
                <?php $Counter++;
              } else {
                if ($Counter < 12) { ?>
                  <div class="col-sm-4 p-1 text-center">
                    <img class="img-fluid" style="height: 100px;" src="assets/images/<?php echo IMAGE_PLACEHOLDER; ?>" />
                  </div>
            <?php }
              }
            } ?>
          </div>
        <?php } ?>
      </div>
      <div class="col-sm-3">
        <h3 class="text-white"><?php echo $lang['DOCUMENTS']; ?></h3>
        <h6 class="text-white mt-3"><a class="a-light" href="page.php?type=3&id=15"><?php echo $lang['DOCUMENTS_INTERNATIONALIZATION_POLICY']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=16"><?php echo $lang['DOCUMENTS_INTERNATIONALIZATION_PLAN']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=17"><?php echo $lang['DOCUMENTS_LANGUAGE_POLICY']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=18"><?php echo $lang['DOCUMENTS_STUDENT_GUIDE']; ?></a></h6>
      </div>
      <div class="col-sm-3">
        <h3 class="text-white"><?php echo $lang['REGISTER']; ?></h3>
        <h6 class="text-white mt-3"><a class="a-light" href="page.php?type=3&id=12"><?php echo $lang['REGISTER_PROFESSORS']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=11"><?php echo $lang['REGISTER_FORMER_STUDENTS']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=13"><?php echo $lang['REGISTER_EXCHANGERS']; ?></a></h6>
        <h6 class="text-white"><a class="a-light" href="page.php?type=3&id=14"><?php echo $lang['FAQ']; ?></a></h6>
      </div>
      <div class="col-sm-3">
        
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d465.16530859526836!2d-44.261005170639024!3d-21.139561499999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa1c896cbc63d2d%3A0x10029cbfc63076ef!2sUniversidade%20Federal%20de%20S%C3%A3o%20Jo%C3%A3o%20del-Rei!5e0!3m2!1spt-BR!2sbr!4v1660134373751!5m2!1spt-BR!2sbr" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  <!-- /.container -->
</footer>
<footer class="py-2" style="background-color: #000;">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <a href="https://ufsj.edu.br/"><img class="img-fluid" width="50%" src="assets/images/menu-logo_menor.png" /></a>
      </div>
      <div class="col-sm-8 my-auto">
        <p class="m-0 text-center text-white">Praça Frei Orlando, 170 - Centro, São João del-Rei - MG, 36307-352</p>
        <p class="m-0 text-center text-white">Telefone: +55 (32) 3379-5812 | Email: <a href="mailto:assin@ufsj.edu.br" class="a-light">assin@ufsj.edu.br</a></p>
      </div>
      <div class="col-sm-2 my-auto">
        <div class="row">
          <div class="col-sm-3 px-1 text-center">
            <a href="https://pt-br.facebook.com/AssessoriaInternacionalUFSJ/" target="_blank"><img src="assets/images/if_facebook_291720.png" width="32px" height="32px;" /></a>
          </div>
          <div class="col-sm-3 px-1 text-center">
            <a href="https://www.instagram.com/assinufsj/" target="_blank"><img src="assets/images/icons8-instagram-48.png" width="32px" height="32px;" /></a>
          </div>
          <div class="col-sm-3 px-1 text-center">
            <a href="https://twitter.com/assinufsj" target="_blank"><img src="assets/images/if_twitter_291710.png" width="32px" height="32px;" /></a>
          </div>
          <div class="col-sm-3 px-1 text-center">
            <a href="https://www.youtube.com/user/tvufsj" target="_blank"><img src="assets/images/if_youtube_291691.png" width="32px" height="32px;" /></a>
          </div>
        </div>


      </div>
    </div>
  </div>
  </div>
</footer>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="image-gallery-title"></h4>
      </div>
      <div class="modal-body">
        <img id="image-gallery-image" class="img-responsive" src="">
      </div>
      <div class="modal-footer">
        <!--<div class="col-md-2">
          <button type="button" class="btn btn-primary" id="show-previous-image">Anterior</button>
        </div>-->
        <div class="col-md-12 text-justify" id="image-gallery-caption">
          This text will be overwritten by jQuery
        </div>
        <!--<div class="col-md-2">
          <button type="button" id="show-next-image" class="btn btn-default">Próximo</button>
        </div>-->
      </div>
    </div>
  </div>
</div>