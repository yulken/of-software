SELECT  `jogo`.`id` as id_jogo,
        `genero`.`id` as id_genero, 
        `plataforma`.`id` as id_plataforma 
FROM `jogo`
LEFT JOIN `relaciona_plataforma` ON `jogo`.id=`relaciona_plataforma`.id_jogo
LEFT JOIN `plataforma` ON `relaciona_plataforma`.id_plataforma=`plataforma`.id
LEFT JOIN `relaciona_genero` ON `jogo`.id=`relaciona_genero`.id_jogo
LEFT JOIN `genero` ON `relaciona_genero`.id_genero=`genero`.id;