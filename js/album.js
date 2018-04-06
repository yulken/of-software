$(document).ready(function() {
  //carrega album completo ao carregar a pagina
  $('.album-list').load('scripts/carrega-album.php');

  function sidebarHeightAdjust() {
    var album = document.getElementsByClassName('album');
    $('#sidebar').height(album[0].scrollHeight);
  }

  function activate(element) {
    if ($(element).hasClass('ativa')) {
      $(element).removeClass("ativa");
    } else {
      $(element).addClass("ativa");
    }
  }

  function checkFilter(maxIdP, maxIdG) {
    var plataformas = document.getElementsByClassName('filtro-plataforma');
    var generos = document.getElementsByClassName('filtro-genero');
    var idPlat = [];
    var idGen = [];
    var TodosIds = [];
    //
    for (var i = 0; i < plataformas.length; i++) {
      if ($(plataformas[i]).hasClass('ativa')) {
        for (var j = 1; j <= maxIdP; j++) {
          if ($(plataformas[i]).hasClass('plat' + j)) {
            idPlat.push(j);

          }

        }
      }
    }

    for (var i = 0; i < generos.length; i++) {
      if ($(generos[i]).hasClass('ativa')) {
        for (var j = 1; j <= maxIdG; j++) {
          if ($(generos[i]).hasClass('gen' + j)) {
            idGen.push(j);
          }
        }
      }
    }

    // if (idPlat.length != 0) {
    TodosIds.push(idPlat);
    // }
    // if (idGen.length != 0) {
    TodosIds.push(idGen);
    // }

    return TodosIds;
  }

  function pegaResultado(filtroPlat, filtroGen) {
    //envia o f:filtroData para o carrega-album e obtem a resposta
    var dados = {
      filtroP: filtroPlat,
      filtroG: filtroGen
    };
    $.post('scripts/carrega-album.php', dados, function(resposta) {
        $('.album-list').html(resposta);
      })
      .done(function() {
        $('#fader').addClass('unfaded');
        $('#fader').removeClass('faded');
      });
  }

  function executaFiltro() {
    $('.filtro').click(function() {

      activate(this);
      //COMECO DO JSON
      var json;
      x = $.getJSON("scripts/variaveis.php", function(result) {
          json = result;
        })
        .done(function acceptJSON() {
          //COMECO DO DONE
          var maxIdP = json.MaxPlat;
          var maxIdG = json.MaxGen;

          TodosIds = checkFilter(maxIdP, maxIdG);


          // idPlat = TodosIds[0];
          // idGen = TodosIds[1];
          var filtroPlat;
          var filtroGen;

          if (TodosIds[0] != undefined) {
            filtroPlat = TodosIds[0];
          }
          if (TodosIds[1] != undefined) {
            filtroGen = TodosIds[1];
          }

          $('#fader').addClass('faded');
          $('#fader').removeClass('unfaded');
          setTimeout(function() {
            pegaResultado(filtroPlat, filtroGen);
          }, 400);
          $('#sidebar').height('100%');
          setTimeout(sidebarHeightAdjust(), 400);

        })

    });
  }

  executaFiltro();

  setTimeout(function(){
  $(".cartao").hover(function(){
      var imgs = document.getElementsByClassName("cartao");
      var labels = document.getElementsByClassName("cartao-corpo");
      var x;
      for(var i=0; i< imgs.length ; i++){
        if (imgs[i] == this){
          x = i;
        }
      }
      labels[x].classList.add("flutua");
  },function(){
    var imgs = document.getElementsByClassName("cartao");
    var labels = document.getElementsByClassName("cartao-corpo");
    var x;
    for(var i=0; i< imgs.length ; i++){
      if (imgs[i] == this){
        x = i;
      }
    }
      labels[x].classList.remove("flutua");
    });
    },300);

});
