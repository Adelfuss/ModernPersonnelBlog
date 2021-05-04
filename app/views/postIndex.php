<div class="blog-post">
    <h2 class="blog-post-title"><?=$post['title']?></h2>
    <p class="blog-post-meta"><?=dateTransform($post['created_at'])?><a href="#"><?=$post['username']?></a></p>
    <p><img class="img img-thumbnail" src="<?=URL['images'] . $post['image']?>"></p>
    <?=$post['body']?>
</div>