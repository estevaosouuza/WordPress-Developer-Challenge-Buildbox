<?php
global $baseUrl, $themeUrl;
$baseUrl = get_site_url();
$themeUrl = get_template_directory_uri();

$taxonomy = get_queried_object() ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play</title>
    <link rel="stylesheet" href="<?= $themeUrl ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $themeUrl ?>/assets/framework/bootstrap-5.3/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $themeUrl ?>/assets/framework/splide-4.1.3/dist/css/splide.min.css">
</head>


<body>
    <header>
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 d-flex align-items-center">
                    <a href="<?= $baseUrl ?>" class="logo h-auto">
                        <img src="<?= $themeUrl ?>/assets/img/logo-play.png" alt="Play Logo" class="">
                    </a>
                </div>
                <div class="col-md-6 d-flex algin-items-center">
                    <ul class="menu d-flex flex-row justify-content-md-end justify-content-center gap-5 w-100 align-items-center mb-0 px-0">
                        <li>
                            <a href="<?= get_term_link(get_term_by('slug', 'filmes', 'video_type')); ?>" class= <?= $taxonomy->name == 'Filmes' ? 'active' : '';?> >
                                <span class="icon-ico-filmes"></span>
                                Filmes</a>
                        </li>
                        <li>
                            <a href="<?= get_term_link(get_term_by('slug', 'documentarios', 'video_type')); ?>" class= <?= $taxonomy->name == 'Documentários' ? 'active' : '';?> >
                                <span class="icon-ico-documentarios"></span>
                                Documentários</a>
                        </li>
                        <li>
                            <a href="<?= get_term_link(get_term_by('slug', 'series', 'video_type')); ?>" class= <?= $taxonomy->name == 'Séries' ? 'active' : '';?> >
                                <span class="icon-ico-series"></span>
                                Series</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>