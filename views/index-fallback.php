<h1>Homepage</h1>
<?php
$wpQuery = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
]);

if (count($wpQuery->posts) > 0) {
    echo '<ul>';
    foreach ($wpQuery->posts as $key => $post) {
        ?>
        <li>
            <a href="<?= get_permalink($post) ?>"><h2><?= $post->post_title ?></h2></a>
            <?= $post->post_excerpt ?>
        </li>
        <?php
    }
    echo '</ul>';
}