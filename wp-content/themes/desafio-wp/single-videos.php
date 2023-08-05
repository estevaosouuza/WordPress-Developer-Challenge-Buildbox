<?php
get_header();
$idPost = get_queried_object_id();
$post = get_post($idPost);

$taxonomy = 'video_type';
$term = get_the_terms($idPost, $taxonomy);


function get_youtube_video_id($url)
{
    if (preg_match('/^https:\/\/www\.youtube\.com\/watch\?v=([0-9a-zA-Z-]+)/', $url, $matches)) {
        $id = $matches[1];
    } elseif (preg_match('/^https:\/\/youtu\.be\/([0-9a-zA-Z-]+)/', $url, $matches)) {
        $id = $matches[1];
    } else {
        throw new Exception('O URL não é um URL válido do YouTube.');
    }

    echo $id;
}

?>

<section id="single-video">
    <div class="container pt-5">
        <div class="row mt-5">
            <div class="col-11 col-md-10 col-lg-11 col-xl-9 mx-auto">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="categoria">
                        <p><?= $term[0]->name ?? '' ?></p>
                    </div>
                    <div class="duracao">
                        <p><?= get_field('bx_play_video_duration', $idPost) ?>m</p>
                    </div>
                </div>
                <h1>
                    <?= $post->post_title; ?>
                </h1>
            </div>
            <div class="col-12">
                <div>
                    <div class="plyr__video-embed" id="player">
                        <iframe data-poster="<?= get_post(get_post_thumbnail_id($idPost))->guid ?? "" ?>" src="https://www.youtube.com/embed/<?= get_youtube_video_id(get_field('bx_play_video_ID', $idPost)); ?>" type="video/youtube"> </iframe>
                    </div>
                </div>
            </div>
            <div class="col-11 col-md-10 col-lg-11 col-xl-9 mx-auto mt-5">
                <p class="descricao">
                    <?= $post->post_content; ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

?>