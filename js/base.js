$(document).ready(function() {
  var ToggleSearch = false;

  $("#SearchButton").click(function() {
    if(!ToggleSearch) {
      $(this).append('<div id="SearchBox" class="input-group input-group-sm"><input id="txtSearch" type="text" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="basic-addon2"><div class="input-group-append"><button id="OK_SearchButton" class="btn btn-primary type="button">OK</button></div></div>');
      $(this).find("#txtSearch").focus();
      $(this).find("img").remove();
      $(this).css("background-color", "rgb(52, 58, 64)");
      ToggleSearch = true;

      $("#OK_SearchButton").click(function () {
        if ($("#txtSearch").val()) {
          location.href = "search.php?query=" + encodeURIComponent($("#txtSearch").val());
        }
      });
    }
  });

  $(document).mouseup(function(e) {
    var container = $("#SearchButton");

    //Checa que o usuário clicou fora do container
    if (!container.is(e.target) && container.has(e.target).length === 0 && ToggleSearch) {
      container.find("#SearchBox").remove();
      container.append("<img src='assets/images/search_icon.png' height='26px' width='26px'>");
      container.css("background-color", "");
      ToggleSearch = false;
    }
  });

  $(".cookie-button").click(function() {
    $("body").find(".cookie-message").remove();
  });

  loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            $('#image-gallery-image').css('width', '100%');
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }

});

function CookieMessage() {
  $.get(window.location.href, {set_cookie_message: false});
}

if (localStorage.cookie) {
  if (localStorage.cookie === true) {
     $("#cookiemessage").remove();
  }
} else {
  localStorage.setItem("cookie", false);
}

/*if(localStorage.getItem("FirstTime") !== null) {
  localStorage.FirstTime = false;
} else {
  localStorage.setItem("FirstTime", true);
  var userLang = (navigator.language || navigator.userLanguage).toLowerCase();
  var lang = userLang.substring(0,2);
  var url = window.location.href;

  if(lang == "pt" || lang == "es" || lang == "fr") {
    changeLang(window.location.href, lang);
  } else {
    changeLang(window.location.href, "en");
  }
}*/

function changeLang(URL, Lang) {
    $.get(URL, {lang: Lang}).done(function(){
        location.reload();
    });
}

