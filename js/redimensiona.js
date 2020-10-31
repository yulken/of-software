$(document).ready(function(){
  setTimeout(function(){
    var body = document.body,
    html = document.documentElement;

    var height = Math.max(body.scrollHeight, body.offsetHeight,
      html.clientHeight, html.scrollHeight, html.offsetHeight);

      body.style.height = height + 'px';

}, 200);
});
