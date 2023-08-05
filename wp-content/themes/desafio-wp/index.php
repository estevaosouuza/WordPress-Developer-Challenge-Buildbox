<?php
get_header();

function get_videos_by_category_slug($slug)
{
    $args = array(
        'post_type' => 'videos',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => array($slug)
            )
        )
    );
    $postsAll = get_posts($args);
    return $postsAll;
}

$args = array(
    'post_type' => 'videos',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
);
$posts = get_posts($args);

if ($posts) {
    $most_recent_post = $posts[0];
    $post_id = $most_recent_post->ID;
    $taxonomy = 'video_type';
    $terms = wp_get_post_terms($post_id, $taxonomy);

?>
    <section id="banner" style="background-image: url('<?= get_post(get_post_thumbnail_id($post_id))->guid ?? "" ?>')">
        <div class="container">
            <div class="row">
                <div class="col-11 col-md-10 col-lg-7 mt-5">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="categoria">
                            <p><?= $terms[0]->name ?? '' ?></p>
                        </div>
                        <div class="duracao">
                            <p><?= get_field('bx_play_video_duration', $post_id) ?>m</p>
                        </div>
                    </div>
                    <h1>
                        <?= $most_recent_post->post_title ?? ''; ?>
                    </h1>
                    <a href="<?= get_permalink($post_id) ?? ''; ?>" class="btn"></a>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
<section class="posts-term">
    <div class="container-right px-lg-0 flex-column">
        <div class="row space-top w-100">
            <div class="col-12">
                <h2>Filmes</h2>
            </div>
        </div>
        <div id="splide" class="splide row mx-0 px-0">
            <div class="splide__track col-12">

                <?php
                $videos = get_videos_by_category_slug('filmes');

                if ($videos) { ?>
                    <ul class="splide__list">
                        <?php
                        foreach ($videos as $video) {
                        ?>
                            <li class="splide__slide">
                                <a href="<?= get_permalink($video->ID) ?? ''; ?>">
                                    <div class="img-box-video">
                                        <img src="<?= get_post(get_post_thumbnail_id($video->ID))->guid ?? "" ?>" alt="<?= $video->post_title ?? ''; ?>">
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4">
                                        <div class="duracao">
                                            <p><?= get_field('bx_play_video_duration', $video->ID) ?>m</p>
                                        </div>
                                    </div>
                                    <h3><?= $video->post_title ?? ''; ?></h3>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php

                } else { ?>
                    <p class="not-found">Nenhum vídeo encontrado.</p>

                <?php
                }

                ?>
            </div>
        </div>
    </div>
</section>
<section class="posts-term">
    <div class="container-right px-lg-0 flex-column">
        <div class="row space-top w-100">
            <div class="col-12">
                <h2>Documentários</h2>
            </div>
        </div>
        <div id="splide" class="splide row mx-0 px-0">
            <div class="splide__track col-12">

                <?php
                $videos = get_videos_by_category_slug('documentarios');

                if ($videos) { ?>
                    <ul class="splide__list">
                        <?php
                        foreach ($videos as $video) {
                        ?>
                            <li class="splide__slide">
                                <a href="<?= get_permalink($video->ID) ?? ''; ?>">
                                    <div class="img-box-video">
                                        <img src="<?= get_post(get_post_thumbnail_id($video->ID))->guid ?? "" ?>" alt="<?= $video->post_title ?? ''; ?>">
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4">
                                        <div class="duracao">
                                            <p><?= get_field('bx_play_video_duration', $video->ID) ?>m</p>
                                        </div>
                                    </div>
                                    <h3><?= $video->post_title ?? ''; ?></h3>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php

                } else { ?>
                    <p class="not-found">Nenhum vídeo encontrado.</p>

                <?php
                }

                ?>
            </div>
        </div>
    </div>
</section>
<section class="posts-term">
    <div class="container-right px-lg-0 flex-column">
        <div class="row space-top w-100">
            <div class="col-12">
                <h2>Séries</h2>
            </div>
        </div>
        <div id="splide" class="splide row mx-0 px-0">
            <div class="splide__track col-12">

                <?php
                $videos = get_videos_by_category_slug('series');

                if ($videos) { ?>
                    <ul class="splide__list">
                        <?php
                        foreach ($videos as $video) {
                        ?>
                            <li class="splide__slide">
                                <a href="<?= get_permalink($video->ID) ?? ''; ?>">
                                    <div class="img-box-video">
                                        <img src="<?= get_post(get_post_thumbnail_id($video->ID))->guid ?? "" ?>" alt="<?= $video->post_title ?? ''; ?>">
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4">
                                        <div class="duracao">
                                            <p><?= get_field('bx_play_video_duration', $video->ID) ?>m</p>
                                        </div>
                                    </div>
                                    <h3><?= $video->post_title ?? ''; ?></h3>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php

                } else { ?>
                    <p class="not-found">Nenhum vídeo encontrado.</p>

                <?php
                }

                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>