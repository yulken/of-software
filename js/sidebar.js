$(document).ready(function() {

  function sidebarHeightAdjust() {
    var album = document.getElementsByClassName('album');
    $('#sidebar').height(album[0].scrollHeight);
  }

  var ativo = false;
  $(".bt").click(function() {
    sidebarHeightAdjust();
    if (!ativo) {
      $("#sidebar").animate({
        left: '0'
      }, 500);
      $(this).animate({
        left: '190px'
      }, 500);
      $(this).removeClass('oi-magnifying-glass');
      $(this).addClass('oi-x');
      ativo = true;
    } else {
      $("#sidebar").animate({
        left: '-250px'
      }, 500);
      $(this).animate({
        left: '10px'
      }, 500);
      $(this).removeClass('oi-x');
      $(this).addClass('oi-magnifying-glass');
      ativo = false;
    }
  });

});

// pesquisar por direct and delegate events