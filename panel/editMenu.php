<?php
  require_once("app/MenuController.php");

  $MenuController = new MenuController();
  $MenusArray = $MenuController->getMenusAllLang();
?>

<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASSIN - Menu</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body id="page-top">

    <!-- Navbar -->
    <?php require_once("common/header.php"); ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php require_once("common/menu.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Editar</li>
            <li class="breadcrumb-item active">Menu</li>
          </ol>

          <nav class="navbar rounded navbar-especial navbar-expand-lg navbar-dark bg-secondary">
            <div class="container">
                <!--<a class="navbar-brand" href="#"><img src="assets/images/menu-logo_menorainda.png" class="logo-img rounded"/>ASSIN</a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
                    <ul class="navbar-nav">
                    <?php for ($i = 0; $i < count($MenusArray); $i++) { ?>
                        <?php if(empty(count($MenusArray[$i]->getMenuSon()))) { ?>
                            <!--<li class="nav-item nav-item-especial">
                              <a class="nav-link nav-link-especial" href="#" data-toggle="modal" data-target="#editMenu" onclick="EditMenu(<?php //echo $MenusArray[$i]->getMenuID(); ?>, 0, '<?php //echo $MenusArray[$i]->getMenuRedirection(); ?>', '<?php //echo $MenusArray[$i]->getMenuName()['pt-br']; ?>', '<?php //echo $MenusArray[$i]->getMenuName()['en-us']; ?>', '<?php //echo $MenusArray[$i]->getMenuName()['es-es']; ?>', '<?php //echo $MenusArray[$i]->getMenuName()['fr-fr']; ?>');"><?php //echo $MenusArray[$i]->getMenuName()['pt-br']; ?></a>
                            </li>-->
                            <li class="nav-item nav-item-especial dropdown active">
                              <a class="nav-link nav-link-especial dropdown-toggle dropdown-toggle-especial" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="EditMenu(<?php echo $MenusArray[$i]->getMenuID(); ?>, 0, '<?php echo $MenusArray[$i]->getMenuRedirection(); ?>', '<?php echo $MenusArray[$i]->getMenuName()['pt-br']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['en-us']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['es-es']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['fr-fr']; ?>'); $('#editMenu').modal('show');">
                                <?php echo $MenusArray[$i]->getMenuName()['pt-br']; ?>
                                <span class="sr-only">(current)</span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item dropdown-item-especial bg-dark text-white" href="#" data-toggle="modal" data-target="#newMenu" onclick="NewMenu(<?php echo $MenusArray[$i]->getMenuID(); ?>, 1);">Novo Item</a>
                              </div>
                            </li>
                        <?php } else { ?>
                          <li class="nav-item nav-item-especial dropdown active">
                            <a class="nav-link nav-link-especial dropdown-toggle dropdown-toggle-especial" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="EditMenu(<?php echo $MenusArray[$i]->getMenuID(); ?>, 0, '<?php echo $MenusArray[$i]->getMenuRedirection(); ?>', '<?php echo $MenusArray[$i]->getMenuName()['pt-br']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['en-us']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['es-es']; ?>', '<?php echo $MenusArray[$i]->getMenuName()['fr-fr']; ?>'); $('#editMenu').modal('show');">
                              <?php echo $MenusArray[$i]->getMenuName()['pt-br']; ?>
                              <span class="sr-only">(current)</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <?php for($j = 0; $j < count($MenusArray[$i]->getMenuSon()); $j++) { ?>
                              <?php if (empty(count($MenusArray[$i]->getMenuSon()[$j]->getMenuSon()))) { ?>
                                <div class="dropright">
                                  <a class="dropdown-item dropdown-item-especial dropdown-toggle dropdown-toggle-especial" href="#" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="EditMenu(<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuID(); ?>, 1, '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuRedirection(); ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['pt-br']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['en-us']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['es-es']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['fr-fr']; ?>'); $('#editMenu').modal('show');"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['pt-br']; ?></a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownright">
                                    <a class="dropdown-item dropdown-item-especial bg-dark text-white" href="#" data-toggle="modal" data-target="#newMenu" onclick="NewMenu(<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuID(); ?>, 2);">Novo Item</a>
                                  </div>
                                </div>
                              <?php } else { ?>
                                <div class="dropright">
                                  <a class="dropdown-item dropdown-item-especial dropdown-toggle dropdown-toggle-especial" href="#" id="dropdownright" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="EditMenu(<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuID(); ?>, 1, '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuRedirection(); ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['pt-br']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['en-us']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['es-es']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['fr-fr']; ?>'); $('#editMenu').modal('show');"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuName()['pt-br']; ?></a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownright">
                                    <?php for ($k = 0 ; $k < count($MenusArray[$i]->getMenuSon()[$j]->getMenuSon()); $k++) { ?>
                                      <a class="dropdown-item dropdown-item-especial" href="#" data-toggle="modal" data-target="#editMenu" onclick="EditMenu(<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuID(); ?>, 2, '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuRedirection(); ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName()['pt-br']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName()['en-us']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName()['es-es']; ?>', '<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName()['fr-fr']; ?>');"><?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuSon()[$k]->getMenuName()['pt-br']; ?></a>
                                    <?php } ?>
                                    <a class="dropdown-item dropdown-item-especial bg-dark text-white" href="#" data-toggle="modal" data-target="#newMenu" onclick="NewMenu(<?php echo $MenusArray[$i]->getMenuSon()[$j]->getMenuID(); ?>, 2);">Novo Item</a>
                                  </div>
                                </div>
                              <?php } ?>
                            <?php } ?>
                              <a class="dropdown-item dropdown-item-especial bg-dark text-white" href="#" data-toggle="modal" data-target="#newMenu" onclick="NewMenu(<?php echo $MenusArray[$i]->getMenuID(); ?>, 1);">Novo Item</a>
                            </div>
                          </li>
                        <?php } ?>  
                    <?php } ?>
                      <li class="nav-item nav-item-especial bg-dark">
                        <a class="nav-link nav-link-especial" href="#" data-toggle="modal" data-target="#newMenu" onclick="NewMenu(null, 0);">Novo Item</a>
                      </li>
                    </ul>
                </div>
            </div>
          </nav>

          <div id="Alerts" class="mt-3">
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php require_once("common/footer.php"); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div class="modal fade" id="newMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Novo Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="newItemForm">
              <div class="form-group">
                <input type="hidden" name="actionMenu" value="create">
                <input type="hidden" id="MenuLevel" name="MenuLevel">
                <input type="hidden" id="MenuSonOf" name="MenuSonOf">
                <ul class="nav nav-tabs" id="Title" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pt-BR-tab" data-toggle="tab" href="#title_portuguese" role="tab" aria-controls="portuguese" aria-selected="true">Português</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="en-US-tab" data-toggle="tab" href="#title_english" role="tab" aria-controls="english" aria-selected="false">Inglês</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="es-ES-tab" data-toggle="tab" href="#title_spanish" role="tab" aria-controls="spanish" aria-selected="false">Espanhol</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="fr-FR-tab" data-toggle="tab" href="#title_french" role="tab" aria-controls="french" aria-selected="false">Francês</a>
                  </li>
                </ul>
                <div class="tab-content" id="TitleContent">
                  <div class="tab-pane fade mt-1 show active" id="title_portuguese" role="tabpanel" aria-labelledby="pt-BR-tab">
                    <input type="text" name="txtNamePT-BR" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="title_english" role="tabpanel" aria-labelledby="en-US-tab">
                    <input type="text" name="txtNameEN-US" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="title_spanish" role="tabpanel" aria-labelledby="es-ES-tab">
                    <input type="text" name="txtNameES-ES" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="title_french" role="tabpanel" aria-labelledby="fr-FR-tab">
                    <input type="text" name="txtNameFR-FR" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <input type="text" class="form-control" placeholder="Redirecionamento..." name="txtRedirection">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="newItem();">Criar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editItemForm">
              <div class="form-group">
                <input type="hidden" name="actionMenu" value="edit">
                <input type="hidden" id="EditMenuID" name="MenuID">
                <input type="hidden" id="EditMenuLevel" name="MenuLevel">
                <ul class="nav nav-tabs" id="Title" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pt-BR-tab-edit" data-toggle="tab" href="#edit_name_portuguese" role="tab" aria-controls="portuguese" aria-selected="true">Português</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="en-US-tab-edit" data-toggle="tab" href="#edit_name_english" role="tab" aria-controls="english" aria-selected="false">Inglês</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="es-ES-tab-edit" data-toggle="tab" href="#edit_name_spanish" role="tab" aria-controls="spanish" aria-selected="false">Espanhol</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="fr-FR-tab-edit" data-toggle="tab" href="#edit_name_french" role="tab" aria-controls="french" aria-selected="false">Francês</a>
                  </li>
                </ul>
                <div class="tab-content" id="TitleContent">
                  <div class="tab-pane fade mt-1 show active" id="edit_name_portuguese" role="tabpanel" aria-labelledby="pt-BR-tab-edit">
                    <input type="text" id="txtEditNamePT-BR" name="txtNamePT-BR" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="edit_name_english" role="tabpanel" aria-labelledby="en-US-tab-edit">
                    <input type="text" id="txtEditNameEN-US" name="txtNameEN-US" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="edit_name_spanish" role="tabpanel" aria-labelledby="es-ES-tab-edit">
                    <input type="text" id="txtEditNameES-ES" name="txtNameES-ES" class="form-control" value="">
                  </div>
                  <div class="tab-pane fade mt-1" id="edit_name_french" role="tabpanel" aria-labelledby="fr-FR-tab-edit">
                    <input type="text" id="txtEditNameFR-FR" name="txtNameFR-FR" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <input type="text" id="txtEditRedirection" class="form-control" placeholder="Redirecionamento..." name="txtEditRedirection">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="editItem();">Editar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteItem($('#EditMenuID').val(), $('#EditMenuLevel').val());">Remover</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require_once("common/logoutmodal.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script>
      function NewMenu (MenuSonOf, MenuLevel) {
        $("#MenuSonOf").val(MenuSonOf);
        $("#MenuLevel").val(MenuLevel);
      }

      function EditMenu (MenuID, MenuLevel, MenuRedirection, MenuNamePT, MenuNameEN) {
        $("#EditMenuID").val(MenuID);
        $("#EditMenuLevel").val(MenuLevel);
        $("#txtEditRedirection").val(MenuRedirection);
        $("#txtEditNamePT-BR").val(MenuNamePT);
        $("#txtEditNameEN-US").val(MenuNameEN);
        // $("#txtEditNameES-ES").val(MenuNameES);
        // $("#txtEditNameFR-FR").val(MenuNameFR);
      }
    </script>

    <!-- Validation plugin -->
    <script src="js/jquery-validation/dist/jquery.validate.js"></script>
    <script src="js/validation.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="js/front.js"></script>
  </body>

</html>