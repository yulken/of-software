SELECT  `title`.`id` as title_id,
        `genre`.`id` as genre_id, 
        `platform`.`id` as platform_id 
FROM `title`
LEFT JOIN `rl_platform` ON `title`.id=`rl_platform`.title_id
LEFT JOIN `platform` ON `rl_platform`.platform_id=`platform`.id
LEFT JOIN `rl_genre` ON `title`.id=`rl_genre`.title_id
LEFT JOIN `genre` ON `rl_genre`.genre_id=`genre`.id;