$(document).ready(function() {
  $('.nav-link').click(function() {
    var selected = $('.active.nav-link');
    selected.removeClass('active');
    $(this).addClass('active');

  });
});