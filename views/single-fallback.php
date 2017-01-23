<?php
$post = get_page_by_path($route['slug'], OBJECT, 'post');
if (!$post) {
    include('404-fallback.php');
    return;
}
?>
<h1><?= $post->post_title ?></h1>
<?= $post->post->content ?>