<?php
get_header();

$taxonomy = get_queried_object() ?? '';
$args = array(
    'post_type' => 'videos',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'video_type',
            'field' => 'slug',
            'terms' => array($taxonomy->slug)
        )
    )
);
$postsAll = get_posts($args);


?>
<section id="taxonomy">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6">
                <h2><?= $taxonomy->name ?></h2>
                <p class="pe-lg-5 descricao"><?= $taxonomy->description ?? '' ?></p>
            </div>
            <div class="col-12 col-lg-12 col-xl-6">
                <div id="splide" class="w-100 mx-0 px-0">
                    <div class="splide__track col-12">

                        <?php
                        $videos = $postsAll;

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
        </div>
    </div>
</section>

<?php
get_footer();
?>