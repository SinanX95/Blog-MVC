<h1><?= $post['title']; ?></h1>
<div>
    <time><?= $post['date']; ?></time>
    &#9679;
    <time><?= "{$post['duration']} minutes";?></time>
</div>
<p><?= $post['content']; ?></p>