$("#btnLogout").click(function() {
  $.post("app/UserController.php", {action: "logout"}).done(function(data) {location.reload()});
});

function registerUser() {
  if ($("#registerUser").valid()) {
    $("#Alerts").empty();
    $.ajax({
      type: 'POST',
      url: 'app/UserController.php',
      data: $("#registerUser").serialize()
    }).done(function(data) {
      //console.log(data);
      dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = "login.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function loginUser() {
  if ($("#LoginForm").valid()) {
    $("#Alerts").empty();
    $.ajax({
      type: 'POST',
      url: 'app/UserController.php',
      data: $("#LoginForm").serialize()
    }).done(function(data) {
      //console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = "index.php";
        }, 500);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function editUserName() {
  if ($("#editNameForm").valid()) {
    $("#EditNameModal").modal("hide");
    $('#Alerts').empty();
    $.ajax({
      type: 'POST',
      url: 'app/UserController.php',
      data: {action: 'edit', subaction: 'name', name: $("#txtNome").val()}
    }).done(function(data) {
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = "index.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function editUserEmail() {
  if ($("#editEmailForm").valid()) {
    $("EditEmailModal").modal("hide");
    $('#Alerts').empty();
    $.ajax({
      type: 'POST',
      url: 'app/UserController.php',
      data: {action: 'edit', subaction: 'email', email: $("#txtEmail").val()}
    }).done(function(data) {
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = "index.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function editUserPassword() {
  if($("#editPasswordForm").valid()) {
    $("#EditPasswordModal").modal("hide");
    $('#Alerts').empty();
    $.ajax({
      type: 'POST',
      url: 'app/UserController.php',
      data: {action: 'edit', subaction: 'password', password: $("#txtPassword").val(), oldpassword: $("#txtOldPassword").val()}
    }).done(function(data) {
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = "index.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function resetPassword() {
  $('#Alerts').empty();
  $.ajax({
    type: 'POST',
    url: 'app/UserController.php',
    data: { action: 'resetpassword', email: $("#inputEmail").val() }
  }).done(function(data) {
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        window.location.href = "login.php";
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
    }
  });
}

function deleteHighlight(idHighlight) {
  $.ajax({
    type: 'POST',
    url: 'app/HighlightController.php',
    data: {actionHighlight: 'delete', id: idHighlight}
  }).done(function(data) {
    console.log(data);
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

function createHighlight() {
  if ($("#createHighlight").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#createHighlight')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/HighlightController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = 'highlights.php';
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function editHighlight() {
  if ($("#editHighlight").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#editHighlight')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/HighlightController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = 'highlights.php';
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function deleteGalleryImage(idGalleryImage) {
  $.ajax({
    type: 'POST',
    url: 'app/GalleryImageController.php',
    data: {actionGalleryImage: 'delete', id: idGalleryImage}
  }).done(function(data) {
    console.log(data);
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

function uploadCarouselPhoto() {
  if ($("#createCarouselImage").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#createCarouselImage')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/CarouselImageController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function deleteCarouselImage(idCarouselImage) {
  $.ajax({
    type: 'POST',
    url: 'app/CarouselImageController.php',
    data: {actionCarouselImage: 'delete', id: idCarouselImage}
  }).done(function(data) {
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

function uploadGalleryPhoto() {
  if ($("#createGalleryImage").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#createGalleryImage')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/GalleryImageController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
	console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function editCard() {
  if ($("#editCard").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#editCard')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/CardController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href = 'cards.php';
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function uploadServerFile() {
  if ($("#createServerFile").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#createServerFile')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/ServerFileController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
}

function deleteServerFile(ServerFileID) {
  $.ajax({
    type: 'POST',
    url: 'app/ServerFileController.php',
    data: {actionServerFile: 'delete', id: ServerFileID}
  }).done(function(data) {
    console.log(data);
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

function editVideoLink() {
  if ($("#videoForm").valid()) {
    $("#Alerts").empty();
    $.ajax({
      type: 'POST',
      url: 'app/GeneralSettingController.php',
      data: {actionGeneralSetting: 'edit', VideoLink: $("#inputLink").val()}
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}

function createPage() {
  if ($("#createPage").valid()) {
    $.ajax({
      type: 'POST',
      url: 'app/PageController.php',
      data: $("#createPage").serialize() + "&actionPage=create"
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href="pages.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}


function deleteCarouselImage(idCarouselImage) {
  $.ajax({
    type: 'POST',
    url: 'app/CarouselImageController.php',
    data: {actionCarouselImage: 'delete', id: idCarouselImage}
  }).done(function(data) {
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}


function createDepoimento() {

  if ($("#createDepoimento").valid()) {
    $("#Alerts").empty();
    var form_data = new FormData($('#createDepoimento')[0]);
    $.ajax({
      type: 'POST',
      url: 'app/DepoimentoController.php',
      data: form_data,
      processData: false,
      contentType: false
    }).done(function(data) {
	console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').append('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href="Depoimentos.php";
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').append('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      }
    });
  }
 

}


function editDepoimento(DepoID) {
  if ($("#editDepoimento").valid()) {
    $.ajax({
      type: 'POST',
      url: 'app/DepoimentoController.php',
      data: $("#editDepoimento").serialize() + "&actionDepoimento=edit" + "&DepoimentoID=" + DepoID
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href="Depoimentos.php"
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}



function deleteDepoimento(DepoimentoID) {
  $.ajax({
    type: 'POST',
    url: 'app/DepoimentoController.php',
    data: {actionDepoimento: 'delete', id: DepoimentoID}
  }).done(function(data) {
    console.log(data);
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}


function editPage(PageID) {
  if ($("#editPage").valid()) {
    $.ajax({
      type: 'POST',
      url: 'app/PageController.php',
      data: $("#editPage").serialize() + "&actionPage=edit" + "&PageID=" + PageID
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          window.location.href="pages.php"
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}

function deletePage(PageID) {
  $.ajax({
    type: 'POST',
    url: 'app/PageController.php',
    data: {actionPage: 'delete', id: PageID}
  }).done(function(data) {
    console.log(data);
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

function newItem() {
  if ($("#newItemForm").valid()) {
    $("#newMenu").modal("hide");
    $.ajax({
      type: 'POST',
      url: 'app/MenuController.php',
      data: $("#newItemForm").serialize()
    }).done(function(data) { 
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}

function editItem() {
  if ($("#editItemForm").valid()) {
    $("#editMenu").modal("hide");
    $.ajax({
      type: 'POST',
      url: 'app/MenuController.php',
      data: $("#editItemForm").serialize()
    }).done(function(data) {
      console.log(data);
      var dataReturned = JSON.parse(data);
      if(dataReturned.status == 'success') {
        $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else if(dataReturned.status == 'failure') {
        $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
        setTimeout(function() {
          $('#Alerts div').last().remove();
        }, 5000);
      }
    });
  }
}

function deleteItem(MenuID, MenuLevel) {
  $.ajax({
    type: 'POST',
    url: 'app/MenuController.php',
    data: {actionMenu: 'delete', id: MenuID, level: MenuLevel}
  }).done(function(data) {
    var dataReturned = JSON.parse(data);
    if(dataReturned.status == 'success') {
      $('#Alerts').prepend('<div class="alert alert-success" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        location.reload();
      }, 2000);
    } else if(dataReturned.status == 'failure') {
      $('#Alerts').prepend('<div class="alert alert-danger" role="alert">' + dataReturned.message + '</div>');
      setTimeout(function() {
        $('#Alerts div').last().remove();
      }, 5000);
    }
  });
}

$("document").ready(function() {
    $("#uploadImage").change(function() {
        if($('#uploadImage').get(0).files.length === 0) {
          $("#btnUploadImage").attr("disabled", true);
        } else {
          $("#btnUploadImage").removeAttr("disabled");
        }
    });

    $("#uploadFile").change(function() {
      if($('#uploadFile').get(0).files.length === 0) {
        $("#btnUploadFile").attr("disabled", true);
      } else {
        $("#btnUploadFile").removeAttr("disabled");
      }
    });
});

function copyToClipboard(Location) {

  var sURL = Location;
  sTemp = "<input id=\"copy_to_Clipboard\" value=\"" + sURL + "\" />";
  
  $("body").append(sTemp);
  $("#copy_to_Clipboard").select();

  document.execCommand("copy");

  $("#copy_to_Clipboard").remove();        

  console.log("COPIADOOOOOOOOO");
}
