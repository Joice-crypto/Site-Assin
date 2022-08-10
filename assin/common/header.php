<?php
    require_once("panel/app/MenuController.php");

    $MenuController = new MenuController();
    $MenusArray = $MenuController->getMenus($lang['CURRENT_LANG_ISO']);
?>
<div class="w-100 bg-dark">
  <div class="dropdown">
    <button class="dropdown-toggle astext text-white float-right mr-4 mt-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="assets/images/<?php switch($lang['CURRENT_LANG_PREFIX']){case 'pt': echo 'if_Brazil_flat_91992.png';break;case 'en': echo 'if_United-States_flat_92406.png';break; case 'es': echo 'if_Spain_flat_92356.png';break; case 'fr': echo 'if_France_flat_92086.png';break;default: echo 'if_United-States_flat_92406.png';}?>">&nbsp;<?php echo $lang['CURRENT_LANG']; ?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <button class="dropdown-item" onclick="changeLang('<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>', 'pt');"><img src="assets/images/if_Brazil_flat_91992.png">&nbsp;Português</button>
      <button class="dropdown-item" onclick="changeLang('<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>', 'en');"><img src="assets/images/if_United-States_flat_92406.png">&nbsp;English</button>
      <button class="dropdown-item" onclick="changeLang('<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>', 'es');"><img src="assets/images/if_Spain_flat_92356.png">&nbsp;Español</button>
      <!--<button class="dropdown-item"  onclick="changeLang('<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>', 'fr');"><img src="assets/images/if_France_flat_92086.png">&nbsp;Français</button>-->
    </div>
  </div>
  <div class="container py-5">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-11">
          <a href="index.php"><img class="img-responsive float-left" src="assets/images/menu-logo_menorainda.png" class="logo-img rounded"/></a>
          <h1 class="float-left ml-4 text-white"><?php echo $lang['UNIVERSITY_NAME']; ?></h1>
          <h2 class="float-left ml-4 text-white"><?php echo $lang['HEADER_SUBTITLE']; ?></h2>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <!--<a class="navbar-brand" href="#"><img src="assets/images/menu-logo_menorainda.png" class="logo-img rounded"/>ASSIN</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
            <ul class="navbar-nav">
            <?php for ($i = 0; $i < count($MenusArray); $i++) { ?>
                <?php if(empty(count($MenusArray[$i]->getMenuSon()))) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $MenusArray[$i]->getMenuRedirection(); ?>"><?php echo $MenusArray[$i]->getMenuName(); ?></a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="<?php echo $MenusArray[$i]->getMenuRedirection(); ?>" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $MenusArray[$i]->getMenuName(); ?>
                            <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <?php for($j = 0; $j < count($MenusArray[$i]->getMenuSon()); $j++) { ?>
                            <?php if (empty(count($MenusArray[$i]->getMenuSon()[$j]->getMenuSon()))) { ?>
                                <a class="dropdown-item" href="<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuRedirection(); ?>"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName(); ?></a>
                            <?php } else { ?>
                                <div class="dropright">
                                    <a class="dropdown-item dropdown-toggle" href="<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuRedirection(); ?>" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName(); ?></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownright">
                                        <?php for ($k = 0 ; $k < count($MenusArray[$i]->getMenuSon()[$j]->getMenuSon()); $k++) { ?>
                                            <a class="dropdown-item" href="<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuRedirection(); ?>"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName(); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            <?php } ?>
            </ul>
        </div>
        <ul class="navbar-nav position-absolute" style="right: 0; overflow: hidden;">
            <li class="nav-item">
                <a id="SearchButton" class="nav-link"><img src="assets/images/search_icon.png" height="26px" width="26px"></a>
            </li>
        </ul>
    </div>
</nav>
