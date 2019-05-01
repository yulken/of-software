<?php
require_once 'global.php';
$generos_lista = Genero::listar();
$plataformas_lista = Plataforma::listar();
?>
<div class="carousel-item mt-5 mx-auto">
  <div id="content" class="h-100 mx-auto">
      <div class="album py-5 w-75 bg-darker h-100 text-light mx-auto">
        <div id="fader" class="w-100 col-12 unfaded"></div>
        <div id="sidebar" class="bg-main-lighter">
          <div class="sidebar-content p-2 pt-4">
            <div class="sidebar-header">
                <h3 class="font-weight-bold">Filtros</h3>
            </div>

            <ul class="list-unstyled components  pl-4">
                <li>
                  <a href="#platSubmenu" data-toggle="collapse" aria-expanded="false" class="font-weight-bold  ">Plataforma</a>
                  <ul class="lista-filtro collapse list-unstyled" id="platSubmenu">
                    <!-- PHP QUE EXIBE PLATAFORMAS -->
                  <?php foreach ($plataformas_lista as $plataforma):?>
                      <li><a class="filtro filtro-plataforma plat<?=$plataforma->getId()?>" href='#'><?=utf8_encode($plataforma->getNome());?></a></li>
                  <?php endforeach ?>
                  </ul>
                </li>
                <li>
                    <a href="#generoSubmenu" data-toggle="collapse" aria-expanded="false" class="font-weight-bold">Gênero</a>
                    <ul class="lista-filtro collapse list-unstyled" id="generoSubmenu">
                      <!-- PHP QUE EXIBE GENEROS -->
                    <?php foreach ($generos_lista as $genero): ?>
                          <li><a class="filtro filtro-genero gen<?=$genero->getId()?>" href="#"><?= utf8_encode($genero->getNome())?></a></li>
                    <?php endforeach ?>
                    </ul>
                </li>
            </ul>
          </div>
          </div>
          <span class="oi oi-magnifying-glass bt"></span>
        <div class="text-center w-100 pb-5">
          <h2 class="t-produtos">Lançamentos</h2>
        </div>
        <div class="row mx-auto album-list h-100">
              <!-- JQUERY JOGA CONTEUDO AQUI   -->
        </div>
      </div>
    <div class="overlay"></div>
  </div>
</div>
<!-- FIM DE PRODUTOS, AMIGO -->