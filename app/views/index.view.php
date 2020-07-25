<h1><?= $title; ?> - Blog</h1>

<?php foreach ($posts as $post) : ?>
    <li><a href="<?= $post->url; ?>"><?= $post->title; ?></a></li>
<?php endforeach; ?>